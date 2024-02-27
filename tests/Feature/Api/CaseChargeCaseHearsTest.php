<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CaseHear;
use App\Models\CaseCharge;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaseChargeCaseHearsTest extends TestCase
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
    public function it_gets_case_charge_case_hears(): void
    {
        $caseCharge = CaseCharge::factory()->create();
        $caseHears = CaseHear::factory()
            ->count(2)
            ->create([
                'case_charge_id' => $caseCharge->id,
            ]);

        $response = $this->getJson(
            route('api.case-charges.case-hears.index', $caseCharge)
        );

        $response->assertOk()->assertSee($caseHears[0]->CaseID);
    }

    /**
     * @test
     */
    public function it_stores_the_case_charge_case_hears(): void
    {
        $caseCharge = CaseCharge::factory()->create();
        $data = CaseHear::factory()
            ->make([
                'case_charge_id' => $caseCharge->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.case-charges.case-hears.store', $caseCharge),
            $data
        );

        $this->assertDatabaseHas('case_hears', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $caseHear = CaseHear::latest('id')->first();

        $this->assertEquals($caseCharge->id, $caseHear->case_charge_id);
    }
}
