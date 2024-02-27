<?php

namespace Database\Factories;

use App\Models\Decision;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DecisionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Decision::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'decisionDate' => $this->faker->dateTime(),
            'Decisiontype' => $this->faker->text(255),
            'Description' => $this->faker->sentence(15),
            'case_hear_id' => \App\Models\CaseHear::factory(),
        ];
    }
}
