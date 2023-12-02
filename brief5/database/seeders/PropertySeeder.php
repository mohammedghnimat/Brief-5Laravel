<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $imageIndices = range(1, 24);

        // Shuffle the array
        shuffle($imageIndices);

        // Generate 16 property records
        for ($i = 0; $i < 16; $i++) {
            $imageIndex = array_shift($imageIndices);

            // Construct the image path
            $imagePath = 'images/house' . $imageIndex . '.jpg';

            DB::table('properties')->insert([
                'name' => 'Property ' . $i,
                'image' => $imagePath, // Assuming you have images named house1.jpg, house2.jpg, etc.
                'lessor_id' => rand(1, 10), // Assuming you have users with IDs 1 to 10
                'property_type_id' => rand(1, 10), // Assuming you have property types with IDs 1 to 10
                'location_id' => rand(1, 5), // Assuming you have locations with IDs 1 to 5
                'one_day_price' => rand(50, 500), // Adjust the price range as needed
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
