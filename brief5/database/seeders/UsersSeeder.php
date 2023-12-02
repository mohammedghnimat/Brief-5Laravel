<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Generate 10 user records
        $imageIndices = range(1, 10);

        // Shuffle the array
        shuffle($imageIndices);
        for ($i = 0; $i < 10; $i++) {
            $imageIndex = array_shift($imageIndices);

            // Construct the image path
            $imagePath = 'images/user/house' . $imageIndex . '.jpg';
            DB::table('users')->insert([
                'name' => 'User' . $i,
                'image' =>$imagePath,
                'email' => 'user' . $i . '@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // You can change 'password' to the desired default password
                'role_id' => rand(1, 3), // Assuming roles are already seeded with IDs 1, 2, 3
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
