<?php

namespace Tests\Feature;

use App\Http\Requests\SeriesFormRequest;
use App\Repository\SeriesRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_when_a_series_is_created_its_seasons_and_episodes_are_also(): void
    {

        $repository = $this->app->make(SeriesRepository::class);
        $request = new SeriesFormRequest();
        $request->name = "Nome da série";
        $request->seasonsQtd = 1;
        $request->episodesPerSeason = 1;

        $repository->add($request);

        $this->assertDatabaseHas('series', ['name' => "Nome da série"]);
        $this->assertDatabaseHas('seasons', ['number' => 1]);
        $this->assertDatabaseHas('episodes', ['number' => 1]);
    }
}
