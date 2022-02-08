<?php

namespace Database\Seeders;

use App\Models\Student;
use Faker\Factory;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
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
            $student = Student::insert([
                'name' => $faker->name,
                'birthday' => $faker->date($format = 'Y-m-d'),
                'gender' => $faker->randomElement(["nam", "nữ"]),
                'address' => $faker->address,
                'specialized' => $faker->randomElement(["Cầu thủ"]),
                'academic' => $faker->randomElement(["Đại học"]),
            ]);
        }
    }
}
