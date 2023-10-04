<?php

namespace Database\Seeders;

use App\Models\Courses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            Courses::create([
                'name' => $faker->sentence,
                'description' => $faker->sentence,
                'image' => $faker->imageUrl,
                'title_image' => $faker->sentence,
                'tutor' => $faker->sentence,
                'time' => $faker->date,
                'price' => 120000,
            ]);
        }
    }
}
