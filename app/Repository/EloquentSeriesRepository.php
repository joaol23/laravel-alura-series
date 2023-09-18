<?php

namespace App\Repository;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{
    public function add(SeriesFormRequest $request): Serie
    {
        return DB::transaction(function () use ($request) {
            $serie = Serie::create([
                "name" => $request->name,
                "cover_path" => $request->coverPath
            ]);
            $seasons = [];
            for ($i = 1; $i <= $request->seasonsQtd; $i++) {
                $seasons[] = [
                    'serie_id' => $serie->id,
                    'number' => $i
                ];
            }
            Season::insert($seasons);
            $episodes = [];
            foreach ($serie->seasons as $season) {
                for ($i = 1; $i <= $request->episodesPerSeason; $i++)
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $i
                    ];
            }
            Episode::insert($episodes);
            return $serie;
        });
    }
}
