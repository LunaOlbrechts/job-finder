<?php

namespace Database\Factories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Application::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 4),
            'internship_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'label' => $this->faker->randomElement(['new', 'starred', 'approved', 'declined']),
            'motivation' => $this->faker->text

        ];
    }
}
