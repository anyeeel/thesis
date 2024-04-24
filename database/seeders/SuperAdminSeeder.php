<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Super Admin', 
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin1234')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'Admin', 
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('123456789')
        ]);
        $admin->assignRole('Admin');
    }
}