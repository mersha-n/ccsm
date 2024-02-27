<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\CaseHear;
use App\Models\Appointment;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaseHearAppointmentsTest extends TestCase
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
    public function it_gets_case_hear_appointments(): void
    {
        $caseHear = CaseHear::factory()->create();
        $appointments = Appointment::factory()
            ->count(2)
            ->create([
                'case_hear_id' => $caseHear->id,
            ]);

        $response = $this->getJson(
            route('api.case-hears.appointments.index', $caseHear)
        );

        $response->assertOk()->assertSee($appointments[0]->Description);
    }

    /**
     * @test
     */
    public function it_stores_the_case_hear_appointments(): void
    {
        $caseHear = CaseHear::factory()->create();
        $data = Appointment::factory()
            ->make([
                'case_hear_id' => $caseHear->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.case-hears.appointments.store', $caseHear),
            $data
        );

        $this->assertDatabaseHas('appointments', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $appointment = Appointment::latest('id')->first();

        $this->assertEquals($caseHear->id, $appointment->case_hear_id);
    }
}
