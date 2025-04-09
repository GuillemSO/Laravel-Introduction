<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Actor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
 */
class ActorFactory extends Factory
{
    protected $model = Actor::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'surname' => $this->faker->name(),
            'birthdate' => $this->faker->date(),
            'country' => $this->faker->country(),
            'img_url' => $this->faker->imageUrl(),
            'salary' => $this->faker->numberBetween(30000, 100000),
            'created_at' => $this->faker->dateTimeBetween('now', '+1 week'),
            'updated_at' => $this->faker->dateTimeBetween('now', '+1 week'),
        ];
    }
}
