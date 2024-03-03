<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// database/seeders/DatabaseSeeder.php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'Admin',
            'email' => 'admin@role',
            'role' => 'admin',
            'password' => Hash::make('11111111'),
        ]);
    }
}
