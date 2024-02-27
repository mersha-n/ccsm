<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\CaseHear;

use App\Models\Court;
use App\Models\Judge;
use App\Models\Attorney;
use App\Models\Wittness;
use App\Models\CaseCharge;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaseHearControllerTest extends TestCase
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
    public function it_displays_index_view_with_case_hears(): void
    {
        $caseHears = CaseHear::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('case-hears.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.case_hears.index')
            ->assertViewHas('caseHears');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_case_hear(): void
    {
        $response = $this->get(route('case-hears.create'));

        $response->assertOk()->assertViewIs('app.case_hears.create');
    }

    /**
     * @test
     */
    public function it_stores_the_case_hear(): void
    {
        $data = CaseHear::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('case-hears.store'), $data);

        $this->assertDatabaseHas('case_hears', $data);

        $caseHear = CaseHear::latest('id')->first();

        $response->assertRedirect(route('case-hears.edit', $caseHear));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_case_hear(): void
    {
        $caseHear = CaseHear::factory()->create();

        $response = $this->get(route('case-hears.show', $caseHear));

        $response
            ->assertOk()
            ->assertViewIs('app.case_hears.show')
            ->assertViewHas('caseHear');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_case_hear(): void
    {
        $caseHear = CaseHear::factory()->create();

        $response = $this->get(route('case-hears.edit', $caseHear));

        $response
            ->assertOk()
            ->assertViewIs('app.case_hears.edit')
            ->assertViewHas('caseHear');
    }

    /**
     * @test
     */
    public function it_updates_the_case_hear(): void
    {
        $caseHear = CaseHear::factory()->create();

        $court = Court::factory()->create();
        $judge = Judge::factory()->create();
        $attorney = Attorney::factory()->create();
        $caseCharge = CaseCharge::factory()->create();
        $wittness = Wittness::factory()->create();

        $data = [
            'CaseID' => $this->faker->text(255),
            'casename' => $this->faker->text(255),
            'fileNumber' => $this->faker->text(255),
            'address' => $this->faker->address(),
            'state' => $this->faker->state(),
            'location' => $this->faker->text(255),
            'caseStartDate' => $this->faker->dateTime(),
            'description' => $this->faker->sentence(15),
            'court_id' => $court->id,
            'judge_id' => $judge->id,
            'attorney_id' => $attorney->id,
            'case_charge_id' => $caseCharge->id,
            'wittness_id' => $wittness->id,
        ];

        $response = $this->put(route('case-hears.update', $caseHear), $data);

        $data['id'] = $caseHear->id;

        $this->assertDatabaseHas('case_hears', $data);

        $response->assertRedirect(route('case-hears.edit', $caseHear));
    }

    /**
     * @test
     */
    public function it_deletes_the_case_hear(): void
    {
        $caseHear = CaseHear::factory()->create();

        $response = $this->delete(route('case-hears.destroy', $caseHear));

        $response->assertRedirect(route('case-hears.index'));

        $this->assertModelMissing($caseHear);
    }
}
