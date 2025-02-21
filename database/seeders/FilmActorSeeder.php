<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class FilmActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();


        $filmId = DB::table("films")->inRandomOrder()->value("id");

        $actorsIds = DB::table("actors")->inRandomOrder()->limit(3)->pluck('id')->toArray();

        foreach($actorsIds as $actorId){
            DB::table("films_actors")->insert(
                [
                            "film_id" => $filmId,
                            "actor_id" => $actorId,
                            "created_at" => $faker->dateTimeBetween("-10 years", "now")->format('Y-m-d'),
                            "updated_at" => $faker->dateTimeBetween("-10 years","now")
                        ]
                    );     
        }
    }
}
