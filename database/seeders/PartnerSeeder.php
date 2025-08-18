<?php

namespace Database\Seeders;

use App\Models\Brands;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brands::create([
            'name'      => 'Hofmann',
            'slug'      => 'hofmann',
            'link'      => '/brand/hofmann',
            'image'     => 'https://assets.asaxiy.uz/brand/webp//60347ea272e9e.webp',
            'alt_text'  => 'Hofmann brand logo',
            'status'    => true,
        ]);
    }
}