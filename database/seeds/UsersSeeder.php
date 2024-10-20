<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Root',
            'username' => 'Root123', // Added username field
            'email' => 'user@example.com',
            // 'role' => 'admin', // Added role column with default value
            'password' => Hash::make('password'),  // Hash the password for security
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
