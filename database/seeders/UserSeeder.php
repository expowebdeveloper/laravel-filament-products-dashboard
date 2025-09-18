<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create a specific admin with predictable credentials
       User::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('admin@123'),
        'role' => 'admin'
       ]);


        // Create a demo user with predictable credentials
        User::create([
            'name' => 'Demo User',
            'email' => 'user@example.com',
            'password' => bcrypt('user@123'),
            'role' => 'user',
        ]);

        // Create 5 random users
        User::factory()->count(5)->create();
    }
}
