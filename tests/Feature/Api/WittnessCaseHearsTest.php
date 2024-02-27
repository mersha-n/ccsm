<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Wittness;
use App\Models\CaseHear;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WittnessCaseHearsTest extends TestCase
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
    public function it_gets_wittness_case_hears(): void
    {
        $wittness = Wittness::factory()->create();
        $caseHears = CaseHear::factory()
            ->count(2)
            ->create([
                'wittness_id' => $wittness->id,
            ]);

        $response = $this->getJson(
            route('api.wittnesses.case-hears.index', $wittness)
        );

        $response->assertOk()->assertSee($caseHears[0]->CaseID);
    }

    /**
     * @test
     */
    public function it_stores_the_wittness_case_hears(): void
    {
        $wittness = Wittness::factory()->create();
        $data = CaseHear::factory()
            ->make([
                'wittness_id' => $wittness->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.wittnesses.case-hears.store', $wittness),
            $data
        );

        $this->assertDatabaseHas('case_hears', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $caseHear = CaseHear::latest('id')->first();

        $this->assertEquals($wittness->id, $caseHear->wittness_id);
    }
}
