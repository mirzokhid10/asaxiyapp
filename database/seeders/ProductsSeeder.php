<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\Products;
use App\Models\Category;
use App\Models\Brands;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('uz_UZ');

        $categories = Category::pluck('id', 'name')->toArray(); // ['Books' => 1, ...]
        $brandIds = Brands::pluck('id')->toArray();
        $typeOptions = ['super_price', 'top', 'discount', 'new'];

        foreach ($categories as $categoryName => $categoryId) {
            for ($i = 1; $i <= 20; $i++) {
                $name = $categoryName === 'Books'
                    ? $faker->sentence(3) . ' - ' . $faker->name
                    : $faker->words(3, true);

                Products::create([
                    'name' => $name,
                    'slug' => Str::slug($name . '-' . $i),
                    'thumb_image' => 'products/' . Str::slug($categoryName) . '-' . $i . '.jpg',
                    'category_id' => $categoryId,
                    'sub_category_id' => null,
                    'child_category_id' => null,
                    'description' => $faker->paragraph,
                    'brand_id' => $faker->randomElement($brandIds),
                    'qty' => rand(10, 100),
                    'sku' => strtoupper(Str::random(8)),
                    'short_description' => $faker->sentence,
                    'long_description' => $faker->paragraphs(2, true),
                    'price' => rand(50000, 5000000),
                    'discount_price' => rand(0, 1) ? rand(40000, 4900000) : null,
                    'offer_start_date' => rand(0, 1) ? now()->subDays(rand(1, 5)) : null,
                    'offer_end_date' => rand(0, 1) ? now()->addDays(rand(3, 10)) : null,
                    'product_type' => $typeOptions[array_rand($typeOptions)],
                    'status' => true,
                    'is_approved' => 1,
                    'seo_title' => $name,
                    'seo_description' => $faker->sentence,
                ]);
            }
        }

    }
}
