<?php

namespace Database\Seeders;

use App\Models\Cart;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 1; $i < 25; $i++) {
            $car = Cart::insert([
                'name' => $faker->name,
                'range_of_vehicle' => $faker->name,
                'car_company' => $faker->name,
                'number_of_seats' => $faker->randomNumber(1, 2),
            ]);
        }
    }
}
