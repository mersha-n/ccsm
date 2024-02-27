<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTime(),
            'Description' => $this->faker->sentence(15),
            'case_hear_id' => \App\Models\CaseHear::factory(),
        ];
    }
}
