<?php

namespace App\Http\Controllers;

use App\Events\SeriesCreated as EventsSeriesCreated;
use App\Events\SeriesDeleted;
use App\Http\Requests\SeriesFormRequest;
use App\Mail\SeriesCreated;
use App\Models\Serie;
use App\Models\User;
use App\Repository\SeriesRepository;
use Illuminate\Support\Facades\Mail;

class seriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('autenticator')->except('index');
    }

    public function index()
    {
        $messageSucess = session('mensagem.sucesso');
        return view('series.index')->with('series', Serie::all())->with('msgSucess', $messageSucess);
    }

    public function create()
    {
        return view('series.create');
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function store(SeriesFormRequest $request, SeriesRepository $seriesRepository)
    {

        $coverPath = $request->hasFile('cover')
            ?? $request->file('cover')
            ->store('series_cover', 'public');
        $request->coverPath = $coverPath;
        $serie = $seriesRepository->add($request);

        EventsSeriesCreated::dispatch(
            $serie->name,
            $serie->id,
            $request->seasonsQtd,
            $request->episodesPerSeason
        );

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->name}' adicionada com sucesso.");
    }

    public function destroy(Serie $series)
    {
        $series->delete();

        SeriesDeleted::dispatch(
            $series->id,
            $series->cover_path
        );

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->name}' removida com sucesso");
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();
        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->name}' atualizada com sucesso");
    }
}
