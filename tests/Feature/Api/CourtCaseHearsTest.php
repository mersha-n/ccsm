<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Court;
use App\Models\CaseHear;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourtCaseHearsTest extends TestCase
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
    public function it_gets_court_case_hears(): void
    {
        $court = Court::factory()->create();
        $caseHears = CaseHear::factory()
            ->count(2)
            ->create([
                'court_id' => $court->id,
            ]);

        $response = $this->getJson(
            route('api.courts.case-hears.index', $court)
        );

        $response->assertOk()->assertSee($caseHears[0]->CaseID);
    }

    /**
     * @test
     */
    public function it_stores_the_court_case_hears(): void
    {
        $court = Court::factory()->create();
        $data = CaseHear::factory()
            ->make([
                'court_id' => $court->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.courts.case-hears.store', $court),
            $data
        );

        $this->assertDatabaseHas('case_hears', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $caseHear = CaseHear::latest('id')->first();

        $this->assertEquals($court->id, $caseHear->court_id);
    }
}
