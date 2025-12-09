<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin User
        \App\User::create([
            'name' => 'Admin User',
            'email' => 'admin@jimsindia.com',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'avatar' => 'user.png',
            'role' => 'admin',
            'activation_status' => 1,
            'gender' => 'male',
            'phone' => '+91 9876543210',
            'address' => 'New Delhi, India',
            'about' => 'Website Administrator',
        ]);

        // Create 3 Regular Users
        \App\User::create([
            'name' => 'Rajesh Kumar',
            'email' => 'rajesh@example.com',
            'username' => 'rajesh',
            'password' => Hash::make('password123'),
            'avatar' => 'user.png',
            'role' => 'user',
            'activation_status' => 1,
            'gender' => 'male',
            'phone' => '+91 9123456789',
            'address' => 'Mumbai, Maharashtra',
            'facebook' => 'https://facebook.com/rajesh',
            'twitter' => 'https://twitter.com/rajesh',
            'about' => 'Technology enthusiast and blogger',
        ]);

        \App\User::create([
            'name' => 'Priya Sharma',
            'email' => 'priya@example.com',
            'username' => 'priya',
            'password' => Hash::make('password123'),
            'avatar' => 'user.png',
            'role' => 'user',
            'activation_status' => 1,
            'gender' => 'female',
            'phone' => '+91 9234567890',
            'address' => 'Bangalore, Karnataka',
            'facebook' => 'https://facebook.com/priya',
            'linkedin' => 'https://linkedin.com/in/priya',
            'about' => 'Content writer and digital marketing professional',
        ]);

        \App\User::create([
            'name' => 'Amit Patel',
            'email' => 'amit@example.com',
            'username' => 'amit',
            'password' => Hash::make('password123'),
            'avatar' => 'user.png',
            'role' => 'user',
            'activation_status' => 1,
            'gender' => 'male',
            'phone' => '+91 9345678901',
            'address' => 'Ahmedabad, Gujarat',
            'twitter' => 'https://twitter.com/amit',
            'github' => 'https://github.com/amit',
            'about' => 'Software developer and tech blogger',
        ]);
    }
}
