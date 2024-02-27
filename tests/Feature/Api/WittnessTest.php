<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Wittness;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WittnessTest extends TestCase
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
    public function it_gets_wittnesses_list(): void
    {
        $wittnesses = Wittness::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.wittnesses.index'));

        $response->assertOk()->assertSee($wittnesses[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_wittness(): void
    {
        $data = Wittness::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.wittnesses.store'), $data);

        $this->assertDatabaseHas('wittnesses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_wittness(): void
    {
        $wittness = Wittness::factory()->create();

        $data = [
            'wittnessID' => $this->faker->text(255),
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'state' => $this->faker->state(),
            'wittnessType' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->putJson(
            route('api.wittnesses.update', $wittness),
            $data
        );

        $data['id'] = $wittness->id;

        $this->assertDatabaseHas('wittnesses', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_wittness(): void
    {
        $wittness = Wittness::factory()->create();

        $response = $this->deleteJson(
            route('api.wittnesses.destroy', $wittness)
        );

        $this->assertModelMissing($wittness);

        $response->assertNoContent();
    }
}
