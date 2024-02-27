<?php

namespace Database\Factories;

use App\Models\Attorney;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttorneyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attorney::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'attorneyID' => $this->faker->text(255),
            'Name' => $this->faker->name(),
            'courtType' => $this->faker->text(255),
            'Address' => $this->faker->address(),
            'State' => $this->faker->state(),
            'EmpType' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
            'court_id' => \App\Models\Court::factory(),
        ];
    }
}
