<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    function index(Serie $serie)
    {
        return view('seasons.index')
            ->with('seasons', $serie->seasons()->with(['episodes'])->get())
            ->with('serie', $serie);
    }
}
