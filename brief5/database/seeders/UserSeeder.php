<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // You may want to change this to a secure password
            'role_id' => Role::where('name', 'Admin')->first()->id,
        ]);

        // Create landlord users
        for ($i = 1; $i <= 3; $i++) {
            User::create([
                'name' => "Landlord{$i}",
                'email' => "landlord{$i}@example.com",
                'password' => bcrypt('password'), // You may want to change this to a secure password
                'role_id' => Role::where('name', 'Landlord')->first()->id,
            ]);
        }

        // Create renter users
        for ($i = 1; $i <= 3; $i++) {
            User::create([
                'name' => "Renter{$i}",
                'email' => "renter{$i}@example.com",
                'password' => bcrypt('password'), // You may want to change this to a secure password
                'role_id' => Role::where('name', 'Renter')->first()->id,
            ]);
        }
    }
}
