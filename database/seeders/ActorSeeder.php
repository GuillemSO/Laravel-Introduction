<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $lastInsertedId = DB::table("actors")->max("id");


        for ($i = $lastInsertedId ; $i < $lastInsertedId+20; $i++){
            DB::table("actors")->insert(
        [
                    "id" => $i + 1,
                    "name" => $faker->name,
                    "surname" => $faker->lastName(),
                    "birthdate" => $faker->date(),
                    "country" => $faker->country(),
                    "img_url" => $faker->imageUrl(),
                    "salary" => $faker->numberBetween(2000,7000),
                    "created_at" => $faker->dateTimeBetween("-10 years", "now")->format('Y-m-d'),
                    "updated_at" => $faker->dateTimeBetween("-10 years","now")
                ]
            );
        }
    }
}
