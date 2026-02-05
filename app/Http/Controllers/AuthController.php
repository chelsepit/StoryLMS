<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show the login/register page
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle user login with case-insensitive name matching
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string',
            'birthdate' => 'required|date',
        ]);

        // Case-insensitive name search
        // Convert input to Title Case for consistency
        $inputName = $this->formatName($credentials['name']);

        // Find user with case-insensitive name match
        $user = User::whereRaw('LOWER(name) = ?', [strtolower($inputName)])
                    ->where('birthdate', $credentials['birthdate'])
                    ->first();

        if ($user) {
            Auth::login($user);

            // Store first name in session for welcome page
            $firstName = $this->getFirstName($user->name);
            session(['user_first_name' => $firstName]);

            return redirect()->route('welcome');
        }

        return back()
            ->withErrors([
                'name' => 'The name and birthday combination does not match our records.',
            ])
            ->withInput($request->only('name'));
    }

    /**
     * Handle user registration
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'register_mode' => 'nullable',
        ]);

        // Format name to Title Case
        $fullName = $this->formatName($validated['name']);

        // Check if user already exists by name only (DB enforces unique name)
        $existingUser = User::whereRaw('LOWER(name) = ?', [strtolower($fullName)])
            ->first();

        if ($existingUser) {
            return back()
                ->withErrors([
                    'name' => 'An account with this name already exists. Please log in instead.',
                ])
                ->withInput();
        }

        // Create new user
        User::create([
            'name' => $fullName,
            'birthdate' => $validated['birthdate'],
        ]);

        // Do NOT log the user in after registration. Send them back to login.
        return redirect()->route('login.show')
            ->with('success', 'Account created successfully! You can now log in.');
    }

    /**
     * Handle user logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Format name to Title Case (handles all caps or lowercase input)
     *
     * @param string $name
     * @return string
     */
    private function formatName($name)
    {
        // Trim whitespace
        $name = trim($name);

        // Convert to Title Case
        // This handles: "JAN LOUISE" → "Jan Louise", "jan louise" → "Jan Louise"
        return ucwords(strtolower($name));
    }

    /**
     * Extract first name from full name
     *
     * @param string $fullName
     * @return string
     */
    private function getFirstName($fullName)
    {
        $parts = explode(' ', trim($fullName));
        return $parts[0];
    }
}
