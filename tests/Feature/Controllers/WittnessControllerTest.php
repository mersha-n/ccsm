<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Wittness;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WittnessControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_wittnesses(): void
    {
        $wittnesses = Wittness::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('wittnesses.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.wittnesses.index')
            ->assertViewHas('wittnesses');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_wittness(): void
    {
        $response = $this->get(route('wittnesses.create'));

        $response->assertOk()->assertViewIs('app.wittnesses.create');
    }

    /**
     * @test
     */
    public function it_stores_the_wittness(): void
    {
        $data = Wittness::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('wittnesses.store'), $data);

        $this->assertDatabaseHas('wittnesses', $data);

        $wittness = Wittness::latest('id')->first();

        $response->assertRedirect(route('wittnesses.edit', $wittness));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_wittness(): void
    {
        $wittness = Wittness::factory()->create();

        $response = $this->get(route('wittnesses.show', $wittness));

        $response
            ->assertOk()
            ->assertViewIs('app.wittnesses.show')
            ->assertViewHas('wittness');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_wittness(): void
    {
        $wittness = Wittness::factory()->create();

        $response = $this->get(route('wittnesses.edit', $wittness));

        $response
            ->assertOk()
            ->assertViewIs('app.wittnesses.edit')
            ->assertViewHas('wittness');
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

        $response = $this->put(route('wittnesses.update', $wittness), $data);

        $data['id'] = $wittness->id;

        $this->assertDatabaseHas('wittnesses', $data);

        $response->assertRedirect(route('wittnesses.edit', $wittness));
    }

    /**
     * @test
     */
    public function it_deletes_the_wittness(): void
    {
        $wittness = Wittness::factory()->create();

        $response = $this->delete(route('wittnesses.destroy', $wittness));

        $response->assertRedirect(route('wittnesses.index'));

        $this->assertModelMissing($wittness);
    }
}
