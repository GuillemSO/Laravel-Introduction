<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class FilmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $lastInsertedId = DB::table("films")->max("id");

        // function generateGenre(){
        //     $genreTypes = [];

        //     $genreTypes = 
        //     [
        //         "Action",
        //         "Drama",
        //         "Comedy",
        //         "Terror",
        //         "Adventure",
        //         "Fantasy",
        //         "Fiction",
        //         "Thriller",
        //         "Animation",
        //         "Musical"
        //     ];

        //     $random = rand(0,9);

        //     return $genreTypes[$random];

        // }

        for ($i = $lastInsertedId ; $i < $lastInsertedId+20; $i++){
            DB::table("films")->insert(
        [
                    "id" => $i + 1,
                    "name" => $faker->name,
                    "year" => $faker->year,
                    "genre" => $faker->randomElement([
                        "Action",
                        "Drama",
                        "Comedy",
                        "Terror",
                        "Adventure",
                        "Fantasy",
                        "Fiction",
                        "Thriller",
                        "Animation",
                        "Musical"
                    ]),
                    "country" => $faker->country(),
                    "duration" => $faker->randomNumber(3,true),
                    "img_url" => $faker->imageUrl(),
                    "created_at" => $faker->dateTimeBetween("-10 years", "now")->format('Y-m-d'),
                    "updated_at" => $faker->dateTimeBetween("-10 years","now")
                ]
            );
        }

    }
}
