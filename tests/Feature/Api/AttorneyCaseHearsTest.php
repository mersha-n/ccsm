<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Attorney;
use App\Models\CaseHear;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AttorneyCaseHearsTest extends TestCase
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
    public function it_gets_attorney_case_hears(): void
    {
        $attorney = Attorney::factory()->create();
        $caseHears = CaseHear::factory()
            ->count(2)
            ->create([
                'attorney_id' => $attorney->id,
            ]);

        $response = $this->getJson(
            route('api.attorneys.case-hears.index', $attorney)
        );

        $response->assertOk()->assertSee($caseHears[0]->CaseID);
    }

    /**
     * @test
     */
    public function it_stores_the_attorney_case_hears(): void
    {
        $attorney = Attorney::factory()->create();
        $data = CaseHear::factory()
            ->make([
                'attorney_id' => $attorney->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.attorneys.case-hears.store', $attorney),
            $data
        );

        $this->assertDatabaseHas('case_hears', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $caseHear = CaseHear::latest('id')->first();

        $this->assertEquals($attorney->id, $caseHear->attorney_id);
    }
}
