<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ActorController extends Controller
{
    public static function index()
    {
        $actors = Actor::with('films')->get();

        return response()->json($actors);
    }

    
    public function listActors()
    {
        $title = "Listado de todos los actores";
        $actorsData = Actor::all();
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

        $title = "Actores nacidos entre $startYear y $endYear";
        
    $actors = Actor::whereBetween(DB::raw('YEAR(birthdate)'), [$startYear, $endYear])->get();

        return view('actors.list', ['actors' => $actors, 'title' => $title]);
    }

    

    public function countActors()
    {
        $title = "Número de Actores";
         $countActors = Actor::count();

        return view("actors.count", ["numberActors" => $countActors, "title" => $title]);
        
    }

    public function destroy($id)
    {
        $status = Actor::where('id', $id)->delete();

       return response()->json(["action" => "delete", "status" => $status]);
    }
}