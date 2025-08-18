<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = ([
            [
                'name' => 'Admin user',
                'phone' => '998900169503',
                'email' => 'admin@gmail.com',
                'passport_seria' => 'AB4567898',
                'address' => 'Tashkent Sergeli Mirzotursinzoda 5',
                'job_address' => 'Epam IT',
                'user_code' => '',
                'role' => 'admin',
                'status' => 'active',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'User',
                'phone' => '998900169503',
                'email' => 'user@gmail.com',
                'passport_seria' => 'AB4567898',
                'address' => 'Tashkent Sergeli Mirzotursinzoda 5',
                'job_address' => 'Epam IT',
                'user_code' => '',
                'role' => 'user',
                'status' => 'active',
                'password' => Hash::make('123'),
            ],

        ]);

        foreach ($users as &$user) {
            // Split name into first and last words
            $parts = explode(' ', trim($user['name']));

            $firstLetter = strtoupper(substr($parts[0], 0, 1));
            $lastLetter  = isset($parts[1]) ? strtoupper(substr($parts[1], 0, 1)) : 'X';

            // Generate 4 random digits
            $randomNumbers = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

            $user['user_code'] = $firstLetter . $lastLetter . $randomNumbers;
        }

        DB::table('users')->insert($users);
    }
}