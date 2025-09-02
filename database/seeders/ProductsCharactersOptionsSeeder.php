<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsCharactersOptions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsCharactersOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mapping = [
            20 => ['Hardcover', 'Paperback', 'Softcover'],
            19 => ['A4', 'A5', 'Letter', 'Legal'],
            21 => ['Glossy', 'Matte'],
            22 => ['Uzbekistan', 'Russia', 'China', 'Germany', 'USA'],
            24 => ['Leather', 'Cloth', 'Plastic', 'Cardboard'],
            25 => ['Red', 'Blue', 'Black', 'White', 'Green'],
            27 => ['Wall Mount', 'Desk Mount', 'Ceiling Mount'],
            28 => ['In-ear', 'On-ear', 'Over-ear'],
            30 => ['Round', 'Square', 'Rectangle', 'Oval'],
            31 => ['Electronics', 'Books', 'Clothing', 'Accessories'],
            32 => ['Office', 'Gaming', 'Home', 'Travel'],
            33 => ['Waterproof', 'Shockproof', 'Dustproof'],
            34 => ['Windows', 'MacOS', 'Linux', 'Android', 'iOS'],
            35 => ['Black', 'Brown', 'Silver', 'Gold'],
            36 => ['Lightweight', 'Durable', 'Eco-Friendly'],
            38 => ['Leather', 'Silicone', 'Metal'],
            39 => ['Aluminum', 'Plastic', 'Steel'],
            40 => ['Bluetooth', 'Wi-Fi', 'NFC'],
            41 => ['Class I', 'Class II', 'Class III'],
            42 => ['LED', 'OLED', 'LCD'],
            49 => ['Windows 11', 'macOS Ventura', 'Android 14', 'Linux Ubuntu'],
            50 => ['Dolby Atmos', 'Stereo', 'Mono'],
            51 => ['4K', '1080p', '8K'],
            52 => ['IPS', 'AMOLED', 'Retina'],
            54 => ['JPEG', 'PNG', 'GIF', 'RAW'],
            55 => ['Wi-Fi 4', 'Wi-Fi 5', 'Wi-Fi 6'],
            57 => ['2G', '3G', '4G', '5G'],
            63 => ['Bluetooth', 'Wi-Fi', 'Zigbee'],
            68 => ['Inverter', 'Reciprocating'],
            70 => ['HDD', 'SSD', 'Hybrid'],
            71 => ['NVIDIA', 'AMD'],
            75 => ['Laptop', 'Desktop', 'Tablet'],
            77 => ['Intel', 'AMD'],
            80 => ['Webcam', 'Microphone', 'Speakers'],
            84 => ['NVIDIA', 'AMD'],
            85 => ['DDR3', 'DDR4', 'DDR5'],
            91 => ['Top', 'Bottom'],
            92 => ['No Frost', 'Manual Defrost'],
        ];

        DB::transaction(function () use ($mapping) {
            foreach ($mapping as $characterId => $labels) {
                // Remove previous entries for that character to avoid duplicates
                ProductsCharactersOptions::where('product_character_id', $characterId)->delete();

                foreach ($labels as $index => $label) {
                    ProductsCharactersOptions::create([
                        'product_character_id' => $characterId,
                        'label'                => $label,
                        'value'                => Str::slug($label, '_'),
                        'sort_order'           => $index,
                    ]);
                }
            }
        });
    }
}
