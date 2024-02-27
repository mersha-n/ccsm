<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CaseHear;
use App\Models\Decision;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaseHearDecisionsTest extends TestCase
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
    public function it_gets_case_hear_decisions(): void
    {
        $caseHear = CaseHear::factory()->create();
        $decisions = Decision::factory()
            ->count(2)
            ->create([
                'case_hear_id' => $caseHear->id,
            ]);

        $response = $this->getJson(
            route('api.case-hears.decisions.index', $caseHear)
        );

        $response->assertOk()->assertSee($decisions[0]->Decisiontype);
    }

    /**
     * @test
     */
    public function it_stores_the_case_hear_decisions(): void
    {
        $caseHear = CaseHear::factory()->create();
        $data = Decision::factory()
            ->make([
                'case_hear_id' => $caseHear->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.case-hears.decisions.store', $caseHear),
            $data
        );

        $this->assertDatabaseHas('decisions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $decision = Decision::latest('id')->first();

        $this->assertEquals($caseHear->id, $decision->case_hear_id);
    }
}
