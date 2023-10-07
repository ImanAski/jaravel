<?php

namespace Database\Seeders;

use App\Models\LibraryBg;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibraryBgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            LibraryBg::create([
                'background' => $faker->imageUrl,
            ]);
        }
    }
}
