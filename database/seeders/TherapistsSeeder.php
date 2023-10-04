<?php

namespace Database\Seeders;

use App\Models\Therapists;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TherapistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0;$i < 10;$i++) {
            Therapists::create([
                'name' => $faker->name,
                'image' => $faker->imageUrl,
                'education' => $faker->sentence,
                'description' => $faker->sentence,
            ]);
        }
    }
}
