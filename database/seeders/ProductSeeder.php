<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 1; $i < 10; $i++) {
            $product = Product::insert([
                'name' => $faker->name,
                'price' => $faker->randomNumber(1, 20),
                'size' => $faker->randomNumber(1, 10),
                'shoe_code' => $faker->randomNumber(1, 10),
                'category_id' => Category::all()->random()->id,
                'suitable_gender' => $faker->randomElement(["nam", "nữ"]),
                'image' => $faker->name,
                'quantity' => $faker->randomNumber(1, 10),
            ]);
        }
    }
}
