<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Books', 'slug' => 'books', 'image' => 'categories/books.jpg', 'status' => true],
            ['name' => 'Phones & Gadgets', 'slug' => 'phones-gadgets', 'image' => 'categories/phones.jpg', 'status' => true],
            ['name' => 'Home Appliances', 'slug' => 'home-appliances', 'image' => 'categories/appliances.jpg', 'status' => true],
            ['name' => 'Climate Control', 'slug' => 'climate-control', 'image' => 'categories/climate.jpg', 'status' => true],
            ['name' => 'Computers & Accessories', 'slug' => 'computers-accessories', 'image' => 'categories/computers.jpg', 'status' => true],
            ['name' => 'Sports & Outdoors', 'slug' => 'sports-outdoors', 'image' => 'categories/sports.jpg', 'status' => true],
            ['name' => 'Home & Office Supplies', 'slug' => 'home-office-supplies', 'image' => 'categories/home-office.jpg', 'status' => true],
            ['name' => 'TV, Video & Audio', 'slug' => 'tv-video-audio', 'image' => 'categories/tv.jpg', 'status' => true],
            ['name' => 'Gaming Gear', 'slug' => 'gaming-gear', 'image' => 'categories/gaming.jpg', 'status' => true],
            ['name' => 'Automotive Products', 'slug' => 'automotive-products', 'image' => 'categories/auto.jpg', 'status' => true],
            ['name' => 'Cookware & Tableware', 'slug' => 'cookware-tableware', 'image' => 'categories/cookware.jpg', 'status' => true],
            ['name' => 'Beauty & Health', 'slug' => 'beauty-health', 'image' => 'categories/beauty.jpg', 'status' => true],
            ['name' => 'Kids & Babies', 'slug' => 'kids-babies', 'image' => 'categories/kids.jpg', 'status' => true],
            ['name' => 'Clothing, Shoes & Accessories', 'slug' => 'clothing-shoes-accessories', 'image' => 'categories/clothing.jpg', 'status' => true],
            ['name' => 'Toys, Gifts & Accessories', 'slug' => 'toys-gifts-accessories', 'image' => 'categories/toys.jpg', 'status' => true],
            ['name' => 'Furniture', 'slug' => 'furniture', 'image' => 'categories/furniture.jpg', 'status' => true],
            ['name' => 'Construction & Renovation', 'slug' => 'construction-renovation', 'image' => 'categories/construction.jpg', 'status' => true],
            ['name' => 'Stationery & Office Supplies', 'slug' => 'stationery-office-supplies', 'image' => 'categories/stationery.jpg', 'status' => true],
            ['name' => 'Services', 'slug' => 'services', 'image' => 'categories/services.jpg', 'status' => true],
            ['name' => 'Flowers & Plants', 'slug' => 'flowers-plants', 'image' => 'categories/flowers.jpg', 'status' => true],
            ['name' => 'Online Courses', 'slug' => 'online-courses', 'image' => 'categories/courses.jpg', 'status' => true],
        ];

        DB::table('categories')->insert($categories);


    }
}
