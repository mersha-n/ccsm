<?php

namespace Database\Factories;

use App\Models\CaseHear;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CaseHearFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CaseHear::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'CaseID' => $this->faker->text(255),
            'casename' => $this->faker->text(255),
            'fileNumber' => $this->faker->text(255),
            'address' => $this->faker->address(),
            'state' => $this->faker->state(),
            'location' => $this->faker->text(255),
            'caseStartDate' => $this->faker->dateTime(),
            'description' => $this->faker->sentence(15),
            'court_id' => \App\Models\Court::factory(),
            'judge_id' => \App\Models\Judge::factory(),
            'attorney_id' => \App\Models\Attorney::factory(),
            'case_charge_id' => \App\Models\CaseCharge::factory(),
            'wittness_id' => \App\Models\Wittness::factory(),
        ];
    }
}
