<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategories = [
            // 📚 Category 1: Books
            ['category_id' => 1, 'name' => 'Fiction'],
            ['category_id' => 1, 'name' => 'Psychology & Self-Development'],
            ['category_id' => 1, 'name' => 'Business Books'],
            ['category_id' => 1, 'name' => 'Children’s Literature'],
            ['category_id' => 1, 'name' => 'Religious Literature'],
            ['category_id' => 1, 'name' => 'Books in Russian'],
            ['category_id' => 1, 'name' => 'Educational Literature'],
            ['category_id' => 1, 'name' => 'IT & Technology Books'],
            ['category_id' => 1, 'name' => 'Top 100 Bestsellers'],
            ['category_id' => 1, 'name' => 'Bestseller Collections'],
            ['category_id' => 1, 'name' => 'Detectives & Fantasy'],
            ['category_id' => 1, 'name' => 'Politics'],
            ['category_id' => 1, 'name' => 'Biographies'],
            ['category_id' => 1, 'name' => 'Gift Book Sets'],
            ['category_id' => 1, 'name' => 'Turkish Literature'],
            ['category_id' => 1, 'name' => 'History'],
            ['category_id' => 1, 'name' => 'Books in English'],
            ['category_id' => 1, 'name' => 'Collector’s Books'],

            // 📱 Category 2: Electronics
            ['category_id' => 2, 'name' => 'Mobile Phones'],
            ['category_id' => 2, 'name' => 'Tablets'],
            ['category_id' => 2, 'name' => 'Smartwatches & Fitness Bands'],
            ['category_id' => 2, 'name' => 'Smartphone & Tablet Accessories'],
            ['category_id' => 2, 'name' => 'Headphones & Audio Equipment'],
            ['category_id' => 2, 'name' => 'E-Readers'],
            ['category_id' => 2, 'name' => 'Walkie-Talkies'],
            ['category_id' => 2, 'name' => 'VR Headsets'],
            ['category_id' => 2, 'name' => 'Smart Glasses'],

            // 📱 Category 3: Electronics
            ['category_id' => 3, 'name' => 'Large Kitchen Appliances'],
            ['category_id' => 3, 'name' => 'Home Appliances'],
            ['category_id' => 3, 'name' => 'Kitchen Appliances'],

            ['category_id' => 4, 'name' => 'Heaters'],
            ['category_id' => 4, 'name' => 'Air Conditioners'],
            ['category_id' => 4, 'name' => 'Fans'],
            ['category_id' => 4, 'name' => 'Humidifiers'],
            ['category_id' => 4, 'name' => 'Air Purifiers'],

            // Category ID = 5 (Computers & Accessories)
            ['category_id' => 5, 'name' => 'Laptops & Accessories'],
            ['category_id' => 5, 'name' => 'Data Storage Devices'],
            ['category_id' => 5, 'name' => 'Monitors'],
            ['category_id' => 5, 'name' => 'Modems, Routers & Networking'],
            ['category_id' => 5, 'name' => 'Desktop Computers'],
            ['category_id' => 5, 'name' => 'Components'],
            ['category_id' => 5, 'name' => 'Office Equipment'],
            ['category_id' => 5, 'name' => 'Cameras'],
            ['category_id' => 5, 'name' => 'Computer Speakers'],
            ['category_id' => 5, 'name' => 'Computer Accessories'],
            ['category_id' => 5, 'name' => 'Gaming Chairs'],
            ['category_id' => 5, 'name' => 'Optical Cables & Connectors'],
            ['category_id' => 5, 'name' => 'Monitor Mounts'],
            ['category_id' => 5, 'name' => 'Keyboards & Mice'],

            // Category ID = 7 (Home & Security Gadgets)
            ['category_id' => 7, 'name' => 'Video Surveillance'],
            ['category_id' => 7, 'name' => 'Security'],
            ['category_id' => 7, 'name' => 'Voltage Stabilizers'],
            ['category_id' => 7, 'name' => 'Xiaomi Gadgets'],
            ['category_id' => 7, 'name' => 'Home Gadgets'],
            ['category_id' => 7, 'name' => 'Ladders & Stepladders'],
            ['category_id' => 7, 'name' => 'Mirrors'],
            ['category_id' => 7, 'name' => 'Hangers & Shelves'],
            ['category_id' => 7, 'name' => 'Home Decor'],
            ['category_id' => 7, 'name' => 'Kitchen Timers'],

        // Category ID = 8 (TV & Audio Systems)
            ['category_id' => 8, 'name' => 'Televisions'],
            ['category_id' => 8, 'name' => 'Smart TV Boxes'],
            ['category_id' => 8, 'name' => 'Home Theaters & Audio Systems'],
            ['category_id' => 8, 'name' => 'TV Antennas & Accessories'],
            ['category_id' => 8, 'name' => 'TV Mounts'],

        // Category ID = 9 (Gaming)
            ['category_id' => 9, 'name' => 'Gaming Headsets & Headphones'],
            ['category_id' => 9, 'name' => 'Gaming Chairs'],
            ['category_id' => 9, 'name' => 'Game Consoles'],
            ['category_id' => 9, 'name' => 'Gamepads & Joysticks'],
            ['category_id' => 9, 'name' => 'Cable Holders'],
            ['category_id' => 9, 'name' => 'Gaming Glasses'],

            ['category_id' => 10, 'name' => 'Tires & Rims'],
            ['category_id' => 10, 'name' => 'Batteries & Accessories'],
            ['category_id' => 10, 'name' => 'Car Accessories'],
            ['category_id' => 10, 'name' => 'Cars'],

            ['category_id' => 11, 'name' => 'Kitchenware'],
            ['category_id' => 11, 'name' => 'Tableware'],
            ['category_id' => 11, 'name' => 'Storage'],
            ['category_id' => 11, 'name' => 'Kitchen Tools'],

            ['category_id' => 12, 'name' => 'Vitamins & Supplements'],
            ['category_id' => 12, 'name' => 'Skincare'],
            ['category_id' => 12, 'name' => 'Hair Care'],
            ['category_id' => 12, 'name' => 'Body Care'],
            ['category_id' => 12, 'name' => 'Makeup'],
            ['category_id' => 12, 'name' => 'Perfumes'],
            ['category_id' => 12, 'name' => 'Gift Sets'],

            ['category_id' => 13, 'name' => 'Baby Strollers'],
            ['category_id' => 13, 'name' => 'Soft Toys'],
            ['category_id' => 13, 'name' => 'Building Sets (Lego, etc.)'],
            ['category_id' => 13, 'name' => 'Baby High Chairs'],
            ['category_id' => 13, 'name' => 'Kids’ Electric Cars'],
            ['category_id' => 13, 'name' => 'Kids’ Motorcycles'],
            ['category_id' => 13, 'name' => 'Kids’ Bicycles'],
            ['category_id' => 13, 'name' => 'Baby Walkers'],
            ['category_id' => 13, 'name' => 'Tricycle'],
            ['category_id' => 13, 'name' => 'Toys'],
            ['category_id' => 13, 'name' => 'Kids’ Scooters'],
            ['category_id' => 13, 'name' => 'Potty Training & Toilet Seats'],


            ['category_id' => 14, 'name' => 'Suitcases & Travel Bags'],
            ['category_id' => 14, 'name' => 'Men’s Clothing, Shoes & Accessories'],

            ['category_id' => 15, 'name' => 'Umbrellas'],
            ['category_id' => 15, 'name' => 'Muslim Gift Ideas'],
            ['category_id' => 15, 'name' => 'Collectible Toys'],
            ['category_id' => 15, 'name' => 'Creative & DIY Kits'],
            ['category_id' => 15, 'name' => 'Gadgets'],

            ['category_id' => 16, 'name' => 'Upholstered Furniture'],
            ['category_id' => 16, 'name' => 'Kitchen Furniture'],
            ['category_id' => 16, 'name' => 'Living Room Furniture'],
            ['category_id' => 16, 'name' => 'Office Furniture'],

            ['category_id' => 17, 'name' => 'Lighting & Electrical'],
            ['category_id' => 17, 'name' => 'Doors, Windows & Fittings'],
            ['category_id' => 17, 'name' => 'Ventilation Systems'],

            ['category_id' => 18, 'name' => 'Pens'],
            ['category_id' => 18, 'name' => 'Notebooks & Bookmarks'],
            ['category_id' => 18, 'name' => 'Calculators'],
            ['category_id' => 18, 'name' => 'Folders & Files'],

            ['category_id' => 19, 'name' => 'Window Tinting Services'],
            ['category_id' => 19, 'name' => 'Air Conditioner Installation Services'],

            // Category ID 20 was empty (I’ll skip it unless you provide names)

            ['category_id' => 21, 'name' => 'Mohirdev'],

        ];

        foreach ($subCategories as $sub) {
            DB::table('sub_categories')->insert([
                'category_id' => $sub['category_id'],
                'name' => $sub['name'],
                'slug' => Str::slug($sub['name']),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
