<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ActorController extends Controller
{
    public function listActors()
    {
        $actorsData = DB::table('actors')->get()->map(function ($actor) {
            return (array) $actor; // Convertir cada objeto stdClass a un array para que en la vista se muestre con el array_keys sin problemas
        })->toArray();
    
        $title = "Listado de todos los actores";
    
        return view("actors.list", ["actors" => $actorsData, "title" => $title]);
    }

    public function listActorsByDecade(Request $request)
    {
        $decade = $request->input('decade');

        if (!$decade) {
            return redirect()->route('listActors')->with('error', 'Debe seleccionar una década');
        }

        $startYear = (int) $decade;
        $endYear = $startYear + 9;

        $actorsData = DB::table('actors')
            ->whereBetween(DB::raw("YEAR(STR_TO_DATE(birthdate, '%Y-%m-%d'))"), [$startYear, $endYear])
            ->get()
            ->map(fn($actor) => (array) $actor)
            ->toArray();

        $title = "Actores nacidos entre $startYear y $endYear";

        return view("actors.list", ["actors" => $actorsData, "title" => $title]);
    }

    

    public function countActors()
    {
        $title = "Número de Actores";
        $actorsData = DB::table('actors')->count();

        return view("actors.count", ["numberActors" => $actorsData, "title" => $title]);
        
    }

    public function destroy($id)
    {
        $actor = DB::table('actors')->where('id', $id)->first();

        if (!$actor) {
            return response()->json([
                'action' => 'delete',
                'status' => false
            ], 404);
        }

        $deleted = DB::table('actors')->where('id', $id)->delete();

        return response()->json([
            'action' => 'delete',
            'status' => $deleted ? true : false
        ]);
    }
}