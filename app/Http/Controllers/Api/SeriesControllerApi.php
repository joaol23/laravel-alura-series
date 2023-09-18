<?php

namespace App\Http\Controllers\Api;

use App\Events\SeriesDeleted;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use App\Repository\SeriesRepository;
use Illuminate\Http\Request;

class SeriesControllerApi extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Serie::query();
        if ($request->has('name')) {
            $query = $query->where('name', $request->get('name'));
        }

        return $query->paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeriesFormRequest $request)
    {
        return response()
            ->json($this->seriesRepository->add($request))
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $serie)
    {
        $seriesModel = Serie::with('seasons.episodes')
            ->find($serie);
        return is_null($seriesModel) ? response()->json([
            'message' => "Série não encontrada."
        ])->setStatusCode(400) : $seriesModel;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeriesFormRequest $request, Serie $serie)
    {
        $serie->fill($request->all());
        $serie->save();

        return $serie;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Serie $serie)
    {
        $serie->delete();

        SeriesDeleted::dispatch(
            $serie->id,
            $serie->cover_path
        );
        return response()->noContent();
    }
}