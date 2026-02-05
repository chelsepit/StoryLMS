<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class landingpagecontroller extends Controller
{
    // Public landing page (currently rendered directly via view in routes)
    public function index()
    {
        return view('landing');
    }

    // Authenticated welcome page
    public function welcome()
    {
        return view('welcome');
    }

    // Stories index (placeholder)
    public function stories()
    {
        return view('welcome'); // TODO: replace with stories view when available
    }

    // Settings page (placeholder)
    public function settings()
    {
        return view('welcome'); // TODO: replace with settings view when available
    }

    // Example settings mutation endpoints (placeholders)
    public function updateAudioPreference(Request $request)
    {
        // Stub for audio preference update
        return response()->json(['status' => 'ok']);
    }

    public function saveSettings(Request $request)
    {
        // Stub for saving settings
        return response()->json(['status' => 'ok']);
    }
}
