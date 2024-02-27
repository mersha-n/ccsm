<?php

namespace Database\Factories;

use App\Models\Wittness;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class WittnessFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Wittness::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'wittnessID' => $this->faker->text(255),
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'state' => $this->faker->state(),
            'wittnessType' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
        ];
    }
}
