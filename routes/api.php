<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\FilmController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::delete('actors/{id}', [ActorController::class, 'destroy'])->name('actors.destroy');
Route::delete('deleteFilm/{id}', [FilmController::class, 'deleteFilm'])->name('film.delete');
Route::get('actorsByFilm/{id}',[FilmController::class, 'actorsByFilm'])->name('actors.byFilm');