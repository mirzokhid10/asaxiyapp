<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChildCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $childCategories = [
            // 📚 Subcategory 1: Fiction
            ['category_id' => 1, 'sub_category_id' => 1, 'name' => 'All Products'],
            ['category_id' => 1, 'sub_category_id' => 2, 'name' => 'All Products'],
            ['category_id' => 1, 'sub_category_id' => 3, 'name' => 'All Products'],
            ['category_id' => 1, 'sub_category_id' => 4, 'name' => 'All Products'],
            ['category_id' => 1, 'sub_category_id' => 5, 'name' => 'All Products'],
            ['category_id' => 1, 'sub_category_id' => 6, 'name' => 'All Products'],
            ['category_id' => 1, 'sub_category_id' => 7, 'name' => 'All Products'],
            ['category_id' => 1, 'sub_category_id' => 7, 'name' => 'Books About IT'],
            ['category_id' => 1, 'sub_category_id' => 7, 'name' => 'Learning Foreign Language'],
            ['category_id' => 1, 'sub_category_id' => 7, 'name' => 'Books For University Preparation'],
            ['category_id' => 1, 'sub_category_id' => 7, 'name' => 'Dictionaries'],
            ['category_id' => 1, 'sub_category_id' => 8, 'name' =>  'All Products'],
            ['category_id' => 1, 'sub_category_id' => 9, 'name' =>  'All Products'],
            ['category_id' => 1, 'sub_category_id' => 10, 'name' => 'All Products'],
            ['category_id' => 1, 'sub_category_id' => 11, 'name' => 'All Products'],
            ['category_id' => 1, 'sub_category_id' => 12, 'name' => 'All Products'],
            ['category_id' => 1, 'sub_category_id' => 13, 'name' => 'All Products'],
            ['category_id' => 1, 'sub_category_id' => 14, 'name' => 'All Products'],
            ['category_id' => 1, 'sub_category_id' => 15, 'name' => 'All Products'],
            ['category_id' => 1, 'sub_category_id' => 16, 'name' => 'All Products'],
            ['category_id' => 1, 'sub_category_id' => 17, 'name' => 'All Products'],

            ['category_id' => 2, 'sub_category_id' => 18, 'name' => 'All Products'],
            ['category_id' => 2, 'sub_category_id' => 18, 'name' => 'Smart Phones'],
            ['category_id' => 2, 'sub_category_id' => 18, 'name' => 'Push-button telephones'],
            ['category_id' => 2, 'sub_category_id' => 18, 'name' => 'Radio Mobiles'],
            ['category_id' => 2, 'sub_category_id' => 18, 'name' => 'Corded phones'],
            ['category_id' => 2, 'sub_category_id' => 18, 'name' => 'IP Phones'],
            ['category_id' => 2, 'sub_category_id' => 19, 'name' => 'All Products'],
            ['category_id' => 2, 'sub_category_id' => 19, 'name' => 'Cases For Tables'],
            ['category_id' => 2, 'sub_category_id' => 19, 'name' => 'Graphic Tablets'],
            ['category_id' => 2, 'sub_category_id' => 20, 'name' => 'All Products'],
            ['category_id' => 2, 'sub_category_id' => 20, 'name' => 'Smart Watches'],
            ['category_id' => 2, 'sub_category_id' => 20, 'name' => 'Fitnes Tablets'],
            ['category_id' => 2, 'sub_category_id' => 21, 'name' => 'All Products'],
            ['category_id' => 2, 'sub_category_id' => 21, 'name' => 'Screen Protectors'],
            ['category_id' => 2, 'sub_category_id' => 21, 'name' => 'Phone cases'],
            ['category_id' => 2, 'sub_category_id' => 21, 'name' => 'Power Banks'],
            ['category_id' => 2, 'sub_category_id' => 21, 'name' => 'Chargers and USB Cables'],
            ['category_id' => 2, 'sub_category_id' => 21, 'name' => 'Adapters'],
            ['category_id' => 2, 'sub_category_id' => 21, 'name' => 'Memory Cards and Flash Drives'],
            ['category_id' => 2, 'sub_category_id' => 21, 'name' => 'Styluses'],
            ['category_id' => 2, 'sub_category_id' => 21, 'name' => 'Stands and Holders'],
            ['category_id' => 2, 'sub_category_id' => 21, 'name' => 'Phone Stabilizers / Gimbals'],
            ['category_id' => 2, 'sub_category_id' => 21, 'name' => 'Gadget Cleaning Supplies'],
            ['category_id' => 2, 'sub_category_id' => 21, 'name' => 'Smartphone Printers'],
            ['category_id' => 2, 'sub_category_id' => 21, 'name' => 'SIM Cards'],
            ['category_id' => 2, 'sub_category_id' => 21, 'name' => 'Card Holders'],
            ['category_id' => 2, 'sub_category_id' => 22, 'name' => 'All Products'],
            ['category_id' => 2, 'sub_category_id' => 22, 'name' => 'Wireless Earphones / Headphones'],
            ['category_id' => 2, 'sub_category_id' => 22, 'name' => 'Wired Earphones / Headphones'],
            ['category_id' => 2, 'sub_category_id' => 22, 'name' => 'Bluetooth Headsets'],
            ['category_id' => 2, 'sub_category_id' => 22, 'name' => 'Portable Speakers'],
            ['category_id' => 2, 'sub_category_id' => 22, 'name' => 'Microphones'],
            ['category_id' => 2, 'sub_category_id' => 22, 'name' => 'Voice Recorders / Dictaphones'],
            ['category_id' => 2, 'sub_category_id' => 22, 'name' => 'Smart Speakers'],
            ['category_id' => 2, 'sub_category_id' => 23, 'name' => 'All Products'],
            ['category_id' => 2, 'sub_category_id' => 24, 'name' => 'All Products'],
            ['category_id' => 2, 'sub_category_id' => 25, 'name' => 'All Products'],
            ['category_id' => 2, 'sub_category_id' => 26, 'name' => 'All Products'],


            ['category_id' => 3, 'sub_category_id' => 37, 'name' => 'All products'],
            ['category_id' => 3, 'sub_category_id' => 37, 'name' => 'Refrigerators'],
            ['category_id' => 3, 'sub_category_id' => 37, 'name' => 'Kitchen stoves'],
            ['category_id' => 3, 'sub_category_id' => 37, 'name' => 'Freezers'],
            ['category_id' => 3, 'sub_category_id' => 37, 'name' => 'Dishwashers'],
            ['category_id' => 3, 'sub_category_id' => 37, 'name' => 'Range hoods'],
            ['category_id' => 3, 'sub_category_id' => 37, 'name' => 'Water coolers'],
            ['category_id' => 3, 'sub_category_id' => 38, 'name' => 'All products'],
            ['category_id' => 3, 'sub_category_id' => 38, 'name' => 'Vacuum cleaners'],
            ['category_id' => 3, 'sub_category_id' => 38, 'name' => 'Laundry (washing, drying & accessories)'],
            ['category_id' => 3, 'sub_category_id' => 38, 'name' => 'Irons & accessories'],
            ['category_id' => 3, 'sub_category_id' => 38, 'name' => 'Sewing machines'],
            ['category_id' => 3, 'sub_category_id' => 38, 'name' => 'Steam cleaners'],
            ['category_id' => 3, 'sub_category_id' => 38, 'name' => 'Window cleaning robots'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'All products'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Multicookers'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Microwave & ovens'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Meat grinders'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Kitchen machines & food processors'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Electric kettles'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Bread makers'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Juicers'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Waffle makers'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Coffee machines'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Kitchen scales'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Built-in appliances'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Steamers'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Grills'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Blenders & mixers'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Food dehydrators'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Egg cookers'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Deep fryers'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'BBQ / Kebab grills'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Toasters'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Sandwich makers'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Coffee grinders'],
            ['category_id' => 3, 'sub_category_id' => 39, 'name' => 'Air fryers'],

            ['category_id' => 4, 'sub_category_id' => 40, 'name' => 'All products'],
            ['category_id' => 4, 'sub_category_id' => 40, 'name' => 'Oil heaters'],
            ['category_id' => 4, 'sub_category_id' => 40, 'name' => 'Fan heaters'],
            ['category_id' => 4, 'sub_category_id' => 40, 'name' => 'Convectors'],
            ['category_id' => 4, 'sub_category_id' => 40, 'name' => 'Infrared heaters'],
            ['category_id' => 4, 'sub_category_id' => 40, 'name' => 'Heat guns'],
            ['category_id' => 4, 'sub_category_id' => 40, 'name' => 'Air curtains'],
            ['category_id' => 4, 'sub_category_id' => 40, 'name' => 'Mini heaters'],

            ['category_id' => 4, 'sub_category_id' => 41, 'name' => 'All products'],
            ['category_id' => 4, 'sub_category_id' => 41, 'name' => 'Mobile air conditioners'],
            ['category_id' => 4, 'sub_category_id' => 42, 'name' => 'All products'],
            ['category_id' => 4, 'sub_category_id' => 43, 'name' => 'All products'],
            ['category_id' => 4, 'sub_category_id' => 44, 'name' => 'All products'],

            ['category_id' => 5, 'sub_category_id' => 45, 'name' => 'All products'],
            ['category_id' => 5, 'sub_category_id' => 45, 'name' => 'Laptops'],
            ['category_id' => 5, 'sub_category_id' => 45, 'name' => 'Laptop bags'],
            ['category_id' => 5, 'sub_category_id' => 45, 'name' => 'Laptop power bank'],
            ['category_id' => 5, 'sub_category_id' => 45, 'name' => 'Laptop charger'],
            ['category_id' => 5, 'sub_category_id' => 45, 'name' => 'Laptop stands'],
            ['category_id' => 5, 'sub_category_id' => 46, 'name' => 'All products'],
            ['category_id' => 5, 'sub_category_id' => 46, 'name' => 'Memory cards'],
            ['category_id' => 5, 'sub_category_id' => 46, 'name' => 'Hard drives'],
            ['category_id' => 5, 'sub_category_id' => 46, 'name' => 'USB flash drives'],
            ['category_id' => 5, 'sub_category_id' => 47, 'name' => 'All products'],
            ['category_id' => 5, 'sub_category_id' => 48, 'name' => 'All products'],
            ['category_id' => 5, 'sub_category_id' => 48, 'name' => 'Networking equipment'],
            ['category_id' => 5, 'sub_category_id' => 48, 'name' => 'ADSL modems (for telephone network)'],
            ['category_id' => 5, 'sub_category_id' => 48, 'name' => 'Wi-Fi routers (Optical)'],
            ['category_id' => 5, 'sub_category_id' => 48, 'name' => '3G/4G modems'],
            ['category_id' => 5, 'sub_category_id' => 48, 'name' => 'Wi-Fi adapters'],
            ['category_id' => 5, 'sub_category_id' => 48, 'name' => 'Wi-Fi amplifiers'],
            ['category_id' => 5, 'sub_category_id' => 48, 'name' => 'Network switches'],
            ['category_id' => 5, 'sub_category_id' => 48, 'name' => 'Wi-Fi controllers'],
            ['category_id' => 5, 'sub_category_id' => 49, 'name' => 'All products'],
            ['category_id' => 5, 'sub_category_id' => 49, 'name' => 'Desktop computers'],
            ['category_id' => 5, 'sub_category_id' => 49, 'name' => 'All-in-one PCs'],
            ['category_id' => 5, 'sub_category_id' => 50, 'name' => 'All products'],
            ['category_id' => 5, 'sub_category_id' => 50, 'name' => 'Video cards'],
            ['category_id' => 5, 'sub_category_id' => 50, 'name' => 'RAM (DDR)'],
            ['category_id' => 5, 'sub_category_id' => 50, 'name' => 'Uninterruptible power supplies'],
            ['category_id' => 5, 'sub_category_id' => 50, 'name' => 'Power supplies'],
            ['category_id' => 5, 'sub_category_id' => 50, 'name' => 'External DVD RW drives'],
            ['category_id' => 5, 'sub_category_id' => 50, 'name' => 'Webcams'],
            ['category_id' => 5, 'sub_category_id' => 50, 'name' => 'Motherboards'],
            ['category_id' => 5, 'sub_category_id' => 50, 'name' => 'Processors'],
            ['category_id' => 5, 'sub_category_id' => 50, 'name' => 'Water coolers'],
            ['category_id' => 5, 'sub_category_id' => 50, 'name' => 'Computer cases'],
            ['category_id' => 5, 'sub_category_id' => 50, 'name' => 'Case fans'],
            ['category_id' => 5, 'sub_category_id' => 51, 'name' => 'All products'],
            ['category_id' => 5, 'sub_category_id' => 51, 'name' => 'Printers'],
            ['category_id' => 5, 'sub_category_id' => 51, 'name' => 'Scanners'],
            ['category_id' => 5, 'sub_category_id' => 51, 'name' => 'Banknote counters'],
            ['category_id' => 5, 'sub_category_id' => 51, 'name' => 'Projectors'],
            ['category_id' => 5, 'sub_category_id' => 51, 'name' => 'Portable printers'],
            ['category_id' => 5, 'sub_category_id' => 51, 'name' => 'Plotters'],
            ['category_id' => 5, 'sub_category_id' => 51, 'name' => 'Office equipment consumables'],
            ['category_id' => 5, 'sub_category_id' => 51, 'name' => 'Paper cutters'],
            ['category_id' => 5, 'sub_category_id' => 51, 'name' => 'Binding machines'],
            ['category_id' => 5, 'sub_category_id' => 51, 'name' => 'Office equipment care products'],
            ['category_id' => 5, 'sub_category_id' => 52, 'name' => 'All products'],
            ['category_id' => 5, 'sub_category_id' => 53, 'name' => 'All products'],
            ['category_id' => 5, 'sub_category_id' => 54, 'name' => 'All products'],
            ['category_id' => 5, 'sub_category_id' => 54, 'name' => 'Power strips'],
            ['category_id' => 5, 'sub_category_id' => 54, 'name' => 'Cables, adapters'],
            ['category_id' => 5, 'sub_category_id' => 55, 'name' => 'All products'],
            ['category_id' => 5, 'sub_category_id' => 56, 'name' => 'All products'],
            ['category_id' => 5, 'sub_category_id' => 57, 'name' => 'All products'],
            ['category_id' => 5, 'sub_category_id' => 58, 'name' => 'All products'],
            ['category_id' => 5, 'sub_category_id' => 58, 'name' => 'Keyboard + mouse sets'],
            ['category_id' => 5, 'sub_category_id' => 58, 'name' => 'Keyboards'],
            ['category_id' => 5, 'sub_category_id' => 58, 'name' => 'Mice'],
            ['category_id' => 5, 'sub_category_id' => 58, 'name' => 'Trackpads'],
            ['category_id' => 5, 'sub_category_id' => 58, 'name' => 'Mouse pads'],

            ['category_id' => 7, 'sub_category_id' => 59, 'name' => 'All products'],
            ['category_id' => 7, 'sub_category_id' => 59, 'name' => 'Surveillance cameras'],
            ['category_id' => 7, 'sub_category_id' => 59, 'name' => 'NVR recorders'],
            ['category_id' => 7, 'sub_category_id' => 59, 'name' => 'Outdoor cameras'],
            ['category_id' => 7, 'sub_category_id' => 59, 'name' => 'DVR recorders'],
            ['category_id' => 7, 'sub_category_id' => 59, 'name' => 'PTZ cameras'],
            ['category_id' => 7, 'sub_category_id' => 59, 'name' => 'Control panels'],
            ['category_id' => 7, 'sub_category_id' => 59, 'name' => 'Video conferencing systems'],
            ['category_id' => 7, 'sub_category_id' => 60, 'name' => 'All products'],
            ['category_id' => 7, 'sub_category_id' => 60, 'name' => 'Access control systems'],
            ['category_id' => 7, 'sub_category_id' => 60, 'name' => 'Intercoms'],
            ['category_id' => 7, 'sub_category_id' => 60, 'name' => 'Locks'],
            ['category_id' => 7, 'sub_category_id' => 60, 'name' => 'Panic buttons'],
            ['category_id' => 7, 'sub_category_id' => 60, 'name' => 'Motion and door sensors'],
            ['category_id' => 7, 'sub_category_id' => 60, 'name' => 'Sirens'],
            ['category_id' => 7, 'sub_category_id' => 60, 'name' => 'Smoke detectors'],
            ['category_id' => 7, 'sub_category_id' => 60, 'name' => 'Security system hubs'],
            ['category_id' => 7, 'sub_category_id' => 60, 'name' => 'Security system kits'],
            ['category_id' => 7, 'sub_category_id' => 60, 'name' => 'Flood sensors'],
            ['category_id' => 7, 'sub_category_id' => 60, 'name' => 'Security cards and key fobs'],
            ['category_id' => 7, 'sub_category_id' => 60, 'name' => 'Safes'],
            ['category_id' => 7, 'sub_category_id' => 61, 'name' => 'All products'],
            ['category_id' => 7, 'sub_category_id' => 62, 'name' => 'All products'],
            ['category_id' => 7, 'sub_category_id' => 63, 'name' => 'All products'],
            ['category_id' => 7, 'sub_category_id' => 63, 'name' => 'Smart sockets'],
            ['category_id' => 7, 'sub_category_id' => 64, 'name' => 'All products'],
            ['category_id' => 7, 'sub_category_id' => 65, 'name' => 'All products'],
            ['category_id' => 7, 'sub_category_id' => 66, 'name' => 'All products'],
            ['category_id' => 7, 'sub_category_id' => 67, 'name' => 'All products'],
            ['category_id' => 7, 'sub_category_id' => 67, 'name' => 'Axes, saws'],
            ['category_id' => 7, 'sub_category_id' => 67, 'name' => 'Loppers, trimmers, pruning shears'],
            ['category_id' => 7, 'sub_category_id' => 67, 'name' => 'Shovels'],
            ['category_id' => 7, 'sub_category_id' => 67, 'name' => 'Garden forks'],
            ['category_id' => 7, 'sub_category_id' => 67, 'name' => 'Garden augers'],
            ['category_id' => 7, 'sub_category_id' => 67, 'name' => 'Weed removers'],
            ['category_id' => 7, 'sub_category_id' => 67, 'name' => 'Plant substrates'],
            ['category_id' => 7, 'sub_category_id' => 67, 'name' => 'Rakes'],
            ['category_id' => 7, 'sub_category_id' => 67, 'name' => 'Work gloves'],
            ['category_id' => 7, 'sub_category_id' => 67, 'name' => 'Watering, spraying'],
            ['category_id' => 7, 'sub_category_id' => 67, 'name' => 'Lawn care'],
            ['category_id' => 7, 'sub_category_id' => 68, 'name' => 'All products'],

            ['category_id' => 8, 'sub_category_id' => 69, 'name' => 'All products'],
            ['category_id' => 8, 'sub_category_id' => 70, 'name' => 'All products'],
            ['category_id' => 8, 'sub_category_id' => 70, 'name' => 'PlayStation'],
            ['category_id' => 8, 'sub_category_id' => 71, 'name' => 'All products'],
            ['category_id' => 8, 'sub_category_id' => 72, 'name' => 'All products'],
            ['category_id' => 8, 'sub_category_id' => 73, 'name' => 'All products'],

            ['category_id' => 9, 'sub_category_id' => 74, 'name' => 'All products'],
            ['category_id' => 9, 'sub_category_id' => 75, 'name' => 'All products'],
            ['category_id' => 9, 'sub_category_id' => 76, 'name' => 'All products'],
            ['category_id' => 9, 'sub_category_id' => 76, 'name' => 'PlayStation'],
            ['category_id' => 9, 'sub_category_id' => 77, 'name' => 'All products'],
            ['category_id' => 9, 'sub_category_id' => 78, 'name' => 'All products'],
            ['category_id' => 9, 'sub_category_id' => 79, 'name' => 'All products'],

            ['category_id' => 10, 'sub_category_id' => 80, 'name' => 'All products'], // Tires & Wheels
            ['category_id' => 10, 'sub_category_id' => 80, 'name' => 'Care for tires and wheels'],
            ['category_id' => 10, 'sub_category_id' => 80, 'name' => 'Car tires'],
            ['category_id' => 10, 'sub_category_id' => 80, 'name' => 'Wheel disks'],
            ['category_id' => 10, 'sub_category_id' => 81, 'name' => 'All products'], // Batteries & Accessories
            ['category_id' => 10, 'sub_category_id' => 81, 'name' => 'Jumper cables'],
            ['category_id' => 10, 'sub_category_id' => 82, 'name' => 'All products'], // Car Products
            ['category_id' => 10, 'sub_category_id' => 82, 'name' => 'Luggage systems'],
            ['category_id' => 10, 'sub_category_id' => 83, 'name' => 'All products'], // Automobile

            // Kitchenware (84)
            ['category_id' => 11, 'sub_category_id' => 84, 'name' => 'All products'],
            ['category_id' => 11, 'sub_category_id' => 84, 'name' => 'Cauldrons'],
            ['category_id' => 11, 'sub_category_id' => 84, 'name' => 'Frying pans'],
            ['category_id' => 11, 'sub_category_id' => 85, 'name' => 'All products'],
            ['category_id' => 11, 'sub_category_id' => 85, 'name' => 'Cutlery'],
            ['category_id' => 11, 'sub_category_id' => 85, 'name' => 'Trays'],
            ['category_id' => 11, 'sub_category_id' => 86, 'name' => 'All products'],
            ['category_id' => 11, 'sub_category_id' => 86, 'name' => 'Thermal cookware'],
            ['category_id' => 11, 'sub_category_id' => 86, 'name' => 'Jars and containers'],
            ['category_id' => 11, 'sub_category_id' => 87, 'name' => 'All products'],
            ['category_id' => 11, 'sub_category_id' => 87, 'name' => 'Graters'],
            ['category_id' => 11, 'sub_category_id' => 87, 'name' => 'Meat processing accessories'],
            ['category_id' => 11, 'sub_category_id' => 87, 'name' => 'Cooking spatulas, spoons, forks'],
            ['category_id' => 11, 'sub_category_id' => 87, 'name' => 'Kitchen sets'],


            // Vitamins & Supplements (88)
            ['category_id' => 12, 'sub_category_id' => 88, 'name' => 'All products'],

            // Face Care (89)
            ['category_id' => 12, 'sub_category_id' => 89, 'name' => 'All products'],
            ['category_id' => 12, 'sub_category_id' => 89, 'name' => 'Face masks'],
            ['category_id' => 12, 'sub_category_id' => 89, 'name' => 'Cleansing'],

            // Hair Care (90)
            ['category_id' => 12, 'sub_category_id' => 90, 'name' => 'All products'],
            ['category_id' => 12, 'sub_category_id' => 90, 'name' => 'Shampoo'],
            ['category_id' => 12, 'sub_category_id' => 90, 'name' => 'Complex oil'],

            // Body Care (91)
            ['category_id' => 12, 'sub_category_id' => 91, 'name' => 'All products'],
            ['category_id' => 12, 'sub_category_id' => 91, 'name' => 'Whitening'],
            ['category_id' => 12, 'sub_category_id' => 91, 'name' => 'Moisturizing'],

            // Medical Products (92)
            ['category_id' => 12, 'sub_category_id' => 92, 'name' => 'All products'],
            ['category_id' => 12, 'sub_category_id' => 92, 'name' => 'Medicinal oils'],
            ['category_id' => 12, 'sub_category_id' => 92, 'name' => 'Medicinal creams and ointments'],

            // Makeup (93)
            ['category_id' => 12, 'sub_category_id' => 93, 'name' => 'All products'],
            ['category_id' => 12, 'sub_category_id' => 93, 'name' => 'Face'],
            ['category_id' => 12, 'sub_category_id' => 93, 'name' => 'Eyes'],

            // Perfume (94)
            ['category_id' => 12, 'sub_category_id' => 94, 'name' => 'All products'],
            ['category_id' => 12, 'sub_category_id' => 94, 'name' => 'Perfume'],
            ['category_id' => 12, 'sub_category_id' => 94, 'name' => 'Perfumed freshener'],

            ['category_id' => 13, 'sub_category_id' => 95, 'name' => 'All products'],
            ['category_id' => 13, 'sub_category_id' => 96, 'name' => 'All products'],
            ['category_id' => 13, 'sub_category_id' => 97, 'name' => 'All products'],
            ['category_id' => 13, 'sub_category_id' => 98, 'name' => 'All products'],
            ['category_id' => 13, 'sub_category_id' => 99, 'name' => 'All products'],
            ['category_id' => 13, 'sub_category_id' => 100, 'name' => 'All products'],
            ['category_id' => 13, 'sub_category_id' => 101, 'name' => 'All products'],
            ['category_id' => 13, 'sub_category_id' => 102, 'name' => 'All products'],
            ['category_id' => 13, 'sub_category_id' => 103, 'name' => 'All products'],
            ['category_id' => 13, 'sub_category_id' => 104, 'name' => 'All products'],
            ['category_id' => 13, 'sub_category_id' => 105, 'name' => 'All products'],
            ['category_id' => 13, 'sub_category_id' => 106, 'name' => 'All products'],

            ['category_id' => 14, 'sub_category_id' => 107, 'name' => 'All products'],
            ['category_id' => 14, 'sub_category_id' => 107, 'name' => 'Suitcases'],

            ['category_id' => 14, 'sub_category_id' => 108, 'name' => 'All products'],
            ['category_id' => 14, 'sub_category_id' => 108, 'name' => 'Shorts'],
            ['category_id' => 14, 'sub_category_id' => 108, 'name' => 'Pants'],
            ['category_id' => 14, 'sub_category_id' => 108, 'name' => 'T-shirts'],

            ['category_id' => 15, 'sub_category_id' => 109, 'name' => 'All products'],
            ['category_id' => 15, 'sub_category_id' => 109, 'name' => 'Umbrellas'],

            ['category_id' => 15, 'sub_category_id' => 110, 'name' => 'All products'],
            ['category_id' => 15, 'sub_category_id' => 110, 'name' => 'Gift ideas for Muslims'],

            ['category_id' => 15, 'sub_category_id' => 111, 'name' => 'All products'],
            ['category_id' => 15, 'sub_category_id' => 111, 'name' => 'Collectible toys'],

            ['category_id' => 15, 'sub_category_id' => 112, 'name' => 'All products'],
            ['category_id' => 15, 'sub_category_id' => 112, 'name' => 'Paint by numbers'],
            ['category_id' => 15, 'sub_category_id' => 112, 'name' => 'Diamond painting'],

            ['category_id' => 16, 'sub_category_id' => 113, 'name' => 'All products'],
            ['category_id' => 16, 'sub_category_id' => 113, 'name' => 'Sofas'],
            ['category_id' => 16, 'sub_category_id' => 113, 'name' => 'Corner sofas'],

            ['category_id' => 16, 'sub_category_id' => 114, 'name' => 'All products'],
            ['category_id' => 16, 'sub_category_id' => 114, 'name' => 'Hi-tech kitchens'],
            ['category_id' => 16, 'sub_category_id' => 114, 'name' => 'Classic kitchens'],

            ['category_id' => 16, 'sub_category_id' => 115, 'name' => 'All products'],
            ['category_id' => 16, 'sub_category_id' => 115, 'name' => 'Wall unit'],
            ['category_id' => 16, 'sub_category_id' => 115, 'name' => 'Wall unit and cabinet'],

            ['category_id' => 16, 'sub_category_id' => 116, 'name' => 'All products'],
            ['category_id' => 16, 'sub_category_id' => 116, 'name' => 'Writing desks'],
            ['category_id' => 16, 'sub_category_id' => 116, 'name' => 'Art chair'],


            ['category_id' => 17, 'sub_category_id' => 117, 'name' => 'All products'],
            ['category_id' => 17, 'sub_category_id' => 117, 'name' => 'Night lights and bedside lamps'],
            ['category_id' => 17, 'sub_category_id' => 117, 'name' => 'Floor and table lamps'],

            ['category_id' => 17, 'sub_category_id' => 118, 'name' => 'All products'],
            ['category_id' => 17, 'sub_category_id' => 118, 'name' => 'Door stoppers, holders, anti-slip tapes'],

            ['category_id' => 17, 'sub_category_id' => 119, 'name' => 'All products'],


            ['category_id' => 18, 'sub_category_id' => 120, 'name' => 'All products'],

            ['category_id' => 18, 'sub_category_id' => 121, 'name' => 'All products'],
            ['category_id' => 18, 'sub_category_id' => 121, 'name' => 'Magnetic notebooks'],
            ['category_id' => 18, 'sub_category_id' => 121, 'name' => 'Puffy notebooks'],
            ['category_id' => 18, 'sub_category_id' => 122, 'name' => 'All products'],
            ['category_id' => 18, 'sub_category_id' => 123, 'name' => 'All products'],

            ['category_id' => 19, 'sub_category_id' => 124, 'name' => 'All products'],
            ['category_id' => 19, 'sub_category_id' => 125, 'name' => 'All products'],

            ['category_id' => 21, 'sub_category_id' => 127, 'name' => 'Mohirdev Courses'],



        ];

        foreach ($childCategories as $child) {
            DB::table('child_categories')->insert([
                'category_id'     => $child['category_id'],
                'sub_category_id' => $child['sub_category_id'],
                'name'            => $child['name'],
                'slug'            => Str::slug($child['name']),
                'status'          => true,
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        }
    }
}
