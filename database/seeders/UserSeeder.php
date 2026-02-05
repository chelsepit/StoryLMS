<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Jan Louise',
                'birthdate' => '2004-08-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chelsie Faith',
                'birthdate' => '2004-1-14',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carl Rey',
                'birthdate' => '2000-01-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
