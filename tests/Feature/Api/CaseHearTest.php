<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CaseHear;

use App\Models\Court;
use App\Models\Judge;
use App\Models\Attorney;
use App\Models\Wittness;
use App\Models\CaseCharge;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaseHearTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_case_hears_list(): void
    {
        $caseHears = CaseHear::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.case-hears.index'));

        $response->assertOk()->assertSee($caseHears[0]->CaseID);
    }

    /**
     * @test
     */
    public function it_stores_the_case_hear(): void
    {
        $data = CaseHear::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.case-hears.store'), $data);

        $this->assertDatabaseHas('case_hears', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_case_hear(): void
    {
        $caseHear = CaseHear::factory()->create();

        $court = Court::factory()->create();
        $judge = Judge::factory()->create();
        $attorney = Attorney::factory()->create();
        $caseCharge = CaseCharge::factory()->create();
        $wittness = Wittness::factory()->create();

        $data = [
            'CaseID' => $this->faker->text(255),
            'casename' => $this->faker->text(255),
            'fileNumber' => $this->faker->text(255),
            'address' => $this->faker->address(),
            'state' => $this->faker->state(),
            'location' => $this->faker->text(255),
            'caseStartDate' => $this->faker->dateTime(),
            'description' => $this->faker->sentence(15),
            'court_id' => $court->id,
            'judge_id' => $judge->id,
            'attorney_id' => $attorney->id,
            'case_charge_id' => $caseCharge->id,
            'wittness_id' => $wittness->id,
        ];

        $response = $this->putJson(
            route('api.case-hears.update', $caseHear),
            $data
        );

        $data['id'] = $caseHear->id;

        $this->assertDatabaseHas('case_hears', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_case_hear(): void
    {
        $caseHear = CaseHear::factory()->create();

        $response = $this->deleteJson(
            route('api.case-hears.destroy', $caseHear)
        );

        $this->assertModelMissing($caseHear);

        $response->assertNoContent();
    }
}
