<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'role'=>'admin', // Added role column with default value
            'password' => Hash::make('password'),  // Hash the password for security
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
