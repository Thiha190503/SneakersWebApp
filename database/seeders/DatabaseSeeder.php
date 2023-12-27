<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ProductSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\DiscountProductsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '09123456789',
            'gender' => 'male',
            'address' => 'Yangon',
            'role' => 'admin',
            'password' => Hash::make('admin123')
        ]);

        User::factory()->create([
            "name" => "Luffy",
            "email" => "luffy@gmail.com",
            'phone' => '09123456789',
            'gender' => 'male',
            'address' => 'Japan',
            'role' => 'user',
            'password' => Hash::make('password')
        ]);

        User::factory()->create([
            "name" => "Nico Robin",
            "email" => "nicorobin@gmail.com",
            'phone' => '09123456789',
            'gender' => 'female',
            'address' => 'France',
            'role' => 'user',
            'password' => Hash::make('password')
        ]);

        $this->call(UserSeeder::class);

        Review::factory()->count(40)->create();
    }
}
