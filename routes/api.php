<?php

use App\Http\Controllers\Api\SeriesControllerApi;
use App\Models\Episode;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/series', SeriesControllerApi::class);
    Route::get('/series/{serie}/seasons', function (Serie $serie) {
        return $serie->seasons();
    });

    Route::get('/series/{serie}/episodes', function (Serie $serie) {
        return $serie->seasons;
    });

    Route::patch('/episodes/{episode}', function (Episode $episode, Request $request) {
        $episode->watched = $request->watched;
        return $episode->save();
    });
});


Route::post('/login', function (Request $request) {
    $credentials = $request->only(['email', 'password']);

    if (Auth::attempt($credentials) === false) {
        return response()->json('Unauthorized', 401);
    }
    $user = Auth::user();
    $user->tokens()->delete();
    $token = $user->createToken('token');

    return response()->json($token->plainTextToken);
});