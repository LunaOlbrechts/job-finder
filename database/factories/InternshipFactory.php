<?php

namespace Database\Factories;

use App\Models\Internship;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class InternshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Internship::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 4, $variableNbWords = true),
            'company_id' => $this->faker->numberBetween($min = 1, $max = 6),
            'bio' => $this->faker->text,
            'type' => $this->faker->randomElement($array = array ('front-end', 'back-end', 'design')),
            'expectations' => $this->faker->sentence($nbWords = 15, $variableNbWords = true),
            'offers' => $this->faker->sentence($nbWords = 12, $variableNbWords = true),
            'location' => $this->faker->address,
        ];
    }
}