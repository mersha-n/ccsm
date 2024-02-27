<?php

namespace Database\Factories;

use App\Models\CaseCharge;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CaseChargeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CaseCharge::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'deptName' => $this->faker->text(255),
            'mid' => $this->faker->text(255),
            'rank' => $this->faker->text(255),
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'state' => $this->faker->state(),
            'crimeDescription' => $this->faker->text(),
            'crimeDate' => $this->faker->dateTime(),
            'ChargeDate' => $this->faker->dateTime(),
        ];
    }
}
