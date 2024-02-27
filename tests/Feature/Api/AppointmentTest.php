<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Appointment;

use App\Models\CaseHear;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppointmentTest extends TestCase
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
    public function it_gets_appointments_list(): void
    {
        $appointments = Appointment::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.appointments.index'));

        $response->assertOk()->assertSee($appointments[0]->Description);
    }

    /**
     * @test
     */
    public function it_stores_the_appointment(): void
    {
        $data = Appointment::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.appointments.store'), $data);

        $this->assertDatabaseHas('appointments', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_appointment(): void
    {
        $appointment = Appointment::factory()->create();

        $caseHear = CaseHear::factory()->create();

        $data = [
            'date' => $this->faker->dateTime(),
            'Description' => $this->faker->sentence(15),
            'case_hear_id' => $caseHear->id,
        ];

        $response = $this->putJson(
            route('api.appointments.update', $appointment),
            $data
        );

        $data['id'] = $appointment->id;

        $this->assertDatabaseHas('appointments', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_appointment(): void
    {
        $appointment = Appointment::factory()->create();

        $response = $this->deleteJson(
            route('api.appointments.destroy', $appointment)
        );

        $this->assertModelMissing($appointment);

        $response->assertNoContent();
    }
}
