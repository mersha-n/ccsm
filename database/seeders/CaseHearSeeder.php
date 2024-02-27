<?php

namespace Database\Seeders;

use App\Models\CaseHear;
use Illuminate\Database\Seeder;

class CaseHearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CaseHear::factory()
            ->count(5)
            ->create();
    }
}
