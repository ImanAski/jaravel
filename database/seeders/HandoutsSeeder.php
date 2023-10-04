<?php

namespace Database\Seeders;

use App\Models\Handouts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HandoutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            Handouts::create([
                'image' => $faker->imageUrl,
                'name' => $faker->sentence,
                'price' => 130000,
                'discount' => null,
                'description' => $faker->sentence,
            ]);
        }
    }
}
