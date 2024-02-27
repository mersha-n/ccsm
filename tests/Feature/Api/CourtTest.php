<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Court;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourtTest extends TestCase
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
    public function it_gets_courts_list(): void
    {
        $courts = Court::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.courts.index'));

        $response->assertOk()->assertSee($courts[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_court(): void
    {
        $data = Court::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.courts.store'), $data);

        $this->assertDatabaseHas('courts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_court(): void
    {
        $court = Court::factory()->create();

        $data = [
            'courtID' => $this->faker->text(255),
            'name' => $this->faker->name(),
            'courtType' => $this->faker->text(255),
            'speciality' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->putJson(route('api.courts.update', $court), $data);

        $data['id'] = $court->id;

        $this->assertDatabaseHas('courts', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_court(): void
    {
        $court = Court::factory()->create();

        $response = $this->deleteJson(route('api.courts.destroy', $court));

        $this->assertModelMissing($court);

        $response->assertNoContent();
    }
}
