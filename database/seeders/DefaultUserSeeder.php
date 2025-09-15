<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        // $superAdmin = User::create([
        // 'name' => 'Ser Charles Root',
        // 'email' => 'super@my.com',
        // 'password' => Hash::make('super1234')
        // ]);
        // $superAdmin->assignRole('Super Admin');

        // Creating Admin User
       $admin = User::create([
        'name' => 'Mary Poppins',
        'email' => 'mp@my.com',
        'password' => Hash::make('mary1234')
        ]);
        $admin->assignRole('Admin');

        // Creating Product Manager User
       $productManager = User::create([
        'name' => 'Tim Dog',
        'email' => 'tid@my.com',
        'password' => Hash::make('dog1234')
        ]);
        $productManager->assignRole('Product Manager');

        // Creating Application User
        $user = User::create([
            'name' => 'Sara Club',
            'email' => 'sara@my.com',
            'password' => Hash::make('sara1234')
        ]);
        $user->assignRole('User');

        
    }
}
