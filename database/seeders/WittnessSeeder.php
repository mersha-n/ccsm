<?php

namespace Database\Seeders;

use App\Models\Wittness;
use Illuminate\Database\Seeder;

class WittnessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Wittness::factory()
            ->count(5)
            ->create();
    }
}
