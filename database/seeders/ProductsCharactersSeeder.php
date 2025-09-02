<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductsCharactersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = [
            ['name' => 'Weight', 'type' => 'decimal', 'unit' => 'kg'],
            ['name' => 'ISBN', 'type' => 'string'],
            ['name' => 'Author', 'type' => 'string'],
            ['name' => 'Language', 'type' => 'select'],
            ['name' => 'Inscription', 'type' => 'string'],
            ['name' => 'Translator', 'type' => 'string'],
            ['name' => 'Page Count', 'type' => 'integer'],
            ['name' => 'Publisher', 'type' => 'string'],
            ['name' => 'Cover Type', 'type' => 'select'],
            ['name' => 'Paper Format', 'type' => 'select'],
            ['name' => 'Year of Publication', 'type' => 'integer'],
            ['name' => 'Page Surface', 'type' => 'select'],
            ['name' => 'Country of Origin', 'type' => 'select'],
            ['name' => 'Dimensions', 'type' => 'string', 'unit' => 'mm'],
            ['name' => 'Binding Material', 'type' => 'select'],
            ['name' => 'Color', 'type' => 'select'],
            ['name' => 'Microphone', 'type' => 'boolean'],
            ['name' => 'Mount Type', 'type' => 'select'],
            ['name' => 'Headphone Type', 'type' => 'select'],
            ['name' => 'Noise Cancellation', 'type' => 'boolean'],
            ['name' => 'Shape', 'type' => 'select'],
            ['name' => 'Category', 'type' => 'select'],
            ['name' => 'Purpose', 'type' => 'select'],
            ['name' => 'Features', 'type' => 'multiselect'],
            ['name' => 'Compatibility', 'type' => 'multiselect'],
            ['name' => 'Strap Color', 'type' => 'select'],
            ['name' => 'Key Features', 'type' => 'multiselect'],
            ['name' => 'Screen Size', 'type' => 'decimal', 'unit' => 'mm'],
            ['name' => 'Strap Material', 'type' => 'select'],
            ['name' => 'Case Material', 'type' => 'select'],
            ['name' => 'Wireless Technologies', 'type' => 'multiselect'],
            ['name' => 'Class', 'type' => 'select'],
            ['name' => 'Matrix Type', 'type' => 'select'],
            ['name' => 'Warranty Period', 'type' => 'integer'],
            ['name' => 'Screen Diagonal', 'type' => 'decimal', 'unit' => 'inch'],
            ['name' => 'Screen Resolution', 'type' => 'string'],
            ['name' => 'Internal Storage', 'type' => 'integer', 'unit' => 'GB'],
            ['name' => 'RAM', 'type' => 'integer', 'unit' => 'GB'],
            ['name' => 'SIM Card Count', 'type' => 'integer'],
            ['name' => 'Operating System', 'type' => 'select'],
            ['name' => 'Audio', 'type' => 'multiselect'],
            ['name' => 'Video', 'type' => 'multiselect'],
            ['name' => 'Screen Type', 'type' => 'select'],
            ['name' => 'OS Version', 'type' => 'string'],
            ['name' => 'Images', 'type' => 'multiselect'],
            ['name' => 'Wi-Fi Standard', 'type' => 'select'],
            ['name' => 'Model', 'type' => 'string'],
            ['name' => 'Network Standard', 'type' => 'select'],
            ['name' => 'GPU Model', 'type' => 'string'],
            ['name' => 'Main Camera', 'type' => 'string'],
            ['name' => 'Headphone Jack', 'type' => 'boolean'],
            ['name' => 'Rear Camera Count', 'type' => 'integer'],
            ['name' => 'Memory Card Slot', 'type' => 'boolean'],
            ['name' => 'Wireless Interfaces', 'type' => 'multiselect'],
            ['name' => 'Battery Capacity', 'type' => 'integer', 'unit' => 'mAh'],
            ['name' => '4K Frame Rate', 'type' => 'integer', 'unit' => 'fps'],
            ['name' => 'Max Video Frame Rate', 'type' => 'integer', 'unit' => 'fps'],
            ['name' => 'CPU Core Count', 'type' => 'integer'],
            ['name' => 'Compressor Type', 'type' => 'select'],
            ['name' => 'Volume', 'type' => 'decimal', 'unit' => 'l'],
            ['name' => 'Storage Type', 'type' => 'select'],
            ['name' => 'GPU Brand', 'type' => 'select'],
            ['name' => 'Card Reader', 'type' => 'boolean'],
            ['name' => 'Release Year', 'type' => 'integer'],
            ['name' => 'Graphics Card', 'type' => 'string'],
            ['name' => 'Device Type', 'type' => 'select'],
            ['name' => 'Battery Life', 'type' => 'decimal', 'unit' => 'h'],
            ['name' => 'CPU Brand', 'type' => 'select'],
            ['name' => 'USB Port Count', 'type' => 'integer'],
            ['name' => 'Keyboard Backlight', 'type' => 'boolean'],
            ['name' => 'Built-in Devices', 'type' => 'multiselect'],
            ['name' => 'Bluetooth Module', 'type' => 'boolean'],
            ['name' => 'Webcam Resolution', 'type' => 'string'],
            ['name' => 'Storage Capacity', 'type' => 'integer', 'unit' => 'GB'],
            ['name' => 'GPU Manufacturer', 'type' => 'select'],
            ['name' => 'RAM Type', 'type' => 'select'],
            ['name' => 'Refresh Rate', 'type' => 'integer', 'unit' => 'Hz'],
            ['name' => 'Freezer Volume', 'type' => 'decimal', 'unit' => 'l'],
            ['name' => 'Fridge Volume', 'type' => 'decimal', 'unit' => 'l'],
            ['name' => 'Exact Fridge Volume', 'type' => 'decimal', 'unit' => 'l'],
            ['name' => 'Usable Fridge Volume', 'type' => 'decimal', 'unit' => 'l'],
            ['name' => 'Freezer Position', 'type' => 'select'],
            ['name' => 'Fridge Defrosting Type', 'type' => 'select'],
            ['name' => 'Lower Shelf Count', 'type' => 'integer'],
            ['name' => 'Upper Shelf Count', 'type' => 'integer'],
        ];

        foreach ($attributes as $attr) {
            DB::table('products_characters')->insert([
                'name' => $attr['name'],
                'slug' => Str::slug($attr['name']),
                'type' => $attr['type'],
                'unit' => $attr['unit'] ?? null,
                'is_filterable' => true,
                'sort_order' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
