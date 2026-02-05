<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'birthdate',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birthdate' => 'date',
    ];

    /**
     * Get the first name from the full name
     *
     * @return string
     */
    public function getFirstNameAttribute()
    {
        $parts = explode(' ', $this->name);
        return $parts[0];
    }

    /**
     * Get the last name from the full name
     *
     * @return string
     */
    public function getLastNameAttribute()
    {
        $parts = explode(' ', $this->name);
        return count($parts) > 1 ? $parts[1] : '';
    }
}