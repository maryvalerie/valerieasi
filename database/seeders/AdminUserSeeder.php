<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => 'Barangay',
            'last_name' => 'Admin',
            'email' => 'admin@barangay.com',
            'phone' => '09123456789',
            'address' => 'Barangay Hall',
            'birthdate' => '1980-01-01',
            'user_type' => 'admin',
            'password' => Hash::make('admin123')
        ]);
    }
}