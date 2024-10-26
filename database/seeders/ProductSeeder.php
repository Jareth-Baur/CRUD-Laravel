<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 500; $i++) {
            DB::table('products')->insert([
                'name' => $faker->words(3, true),
                'quantity' => $faker->numberBetween(1, 100),
                'price' => $faker->randomFloat(2, 5, 1000),
                'description' => $faker->sentence(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
