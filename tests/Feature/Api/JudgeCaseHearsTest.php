<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Judge;
use App\Models\CaseHear;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JudgeCaseHearsTest extends TestCase
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
    public function it_gets_judge_case_hears(): void
    {
        $judge = Judge::factory()->create();
        $caseHears = CaseHear::factory()
            ->count(2)
            ->create([
                'judge_id' => $judge->id,
            ]);

        $response = $this->getJson(
            route('api.judges.case-hears.index', $judge)
        );

        $response->assertOk()->assertSee($caseHears[0]->CaseID);
    }

    /**
     * @test
     */
    public function it_stores_the_judge_case_hears(): void
    {
        $judge = Judge::factory()->create();
        $data = CaseHear::factory()
            ->make([
                'judge_id' => $judge->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.judges.case-hears.store', $judge),
            $data
        );

        $this->assertDatabaseHas('case_hears', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $caseHear = CaseHear::latest('id')->first();

        $this->assertEquals($judge->id, $caseHear->judge_id);
    }
}
