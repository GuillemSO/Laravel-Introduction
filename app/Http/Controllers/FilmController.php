<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{

    /**
     * Read films from storage
     */
    public static function readFilms(): array 
    {
        // Obtener películas desde JSON
        $filmsJson = Storage::exists('public/films.json') ? json_decode(Storage::get('public/films.json'), true) : [];

        // Obtener películas desde la base de datos
        $filmsDB = DB::table('films')->get()->map(function ($film) {
            return (array) $film; // Convertir objetos a array
        })->toArray();

        // Combinar ambas fuentes de datos
        return array_merge($filmsJson, $filmsDB);
    }
    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {        
        $old_films = [];
        if (is_null($year))
        $year = 2000;
    
        $title = "Listado de Pelis Antiguas (Antes de $year)";    
        $films = FilmController::readFilms();

        foreach ($films as $film) {
        //foreach ($this->datasource as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }

    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function listFilms($year = null, $genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($year) && is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if ((!is_null($year) && is_null($genre)) && $film['year'] == $year){
                $title = "Listado de todas las pelis filtrado x año";
        
                $films_filtered[] = $film;
            }else if((is_null($year) && !is_null($genre)) && strtolower($film['genre']) == strtolower($genre)){
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            }else if(!is_null($year) && !is_null($genre) && strtolower($film['genre']) == strtolower($genre) && $film['year'] == $year){
                $title = "Listado de todas las pelis filtrado x categoria y año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }
    /**
     * Lista películas de ese año
     */
    public function listByYear($year)
    {   
        $films_filtered = [];
        $title = "Listado de todas las pelis de X año";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] == $year)
            $films_filtered[] = $film;
        }
        

        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * Lista películas por género
     */
    public function listByGenre($genre)
    {   
        $films_filtered = [];
        $title = "Listado de todas las pelis de ". $genre;
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['genre'] == $genre)
            $films_filtered[] = $film;
        }
        

        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }


    /**
     * Lista películas por género
     */
    public function sortFilms()
    {   
        $films_filtered = [];
        $title = "Listado de todas las pelis de ordenadas por años";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            $films_filtered[] = $film;
        }
        

        // Sort films by year
        usort($films_filtered, function($a, $b) {
            return $b['year'] <=> $a['year'];
        });

        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * Lista películas por género
     */
    public function countFilms()
    {   
        $filmsArray = [];
        $title = "Número de peliculas";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            $filmsArray[] = $film;
        }

        $count = count($filmsArray);
        
        
        return view("films.count", ["filmsArray" => $count, "title" => $title]);
    }

    /**
     * Crear Pelicula
     */
    public function createFilm(Request $request)
    {
        $title = "Listado de todas las pelis";

        $film = [
            'name'=>$request->input('name'),
            'year'=>$request->input('year'),
            'genre'=>$request->input('genre'),
            'img_url'=>$request->input('img_url'),
            'country'=>$request->input('country'),
            'duration'=>$request->input('duration')
        ];

        if(!FilmController::correctYear($film['year'])){
           
            return view("welcome", ["status" =>"Error, el año de la película debe de ser entre 1900-2024"]);

        }

        if(FilmController::isFilm($film['name'])){
           
            return view("welcome", ["status" =>"Error, la pelicula ya existe"]);

        }else{

            $films = FilmController::readFilms();
            array_push($films, $film);
            Storage::put('/public/films.json', json_encode($films));
            return view("films.list", ["films" => $films, "title" => $title]);
        }
        
    }

    /**
     * Comprobar nombre de la Pelicula
     */
    public function isFilm($nameFilm ){

        $films = FilmController::readFilms();

        foreach($films as $film){
            if($film['name'] === $nameFilm){
                return true;
            }
        }

        return false;
    }


    public function correctYear($year){
        //Validate if the film is in a year between 1900-2024
        if($year < 1900 || $year > 2024){
            return false;
        }
        return true;
    }

    public function deleteFilm($id)
    {
        $film = DB::table('films')->where('id', $id)->first();

        if (!$film) {
            return response()->json([
                'action' => 'delete',
                'status' => false
            ], 404);
        }

        $deleted = DB::table('films')->where('id', $id)->delete();

        return response()->json([
            'action' => 'delete',
            'status' => $deleted ? true : false
        ]);
    }

    public function actorsByFilm($id)
    {
        $actors = DB::table('films_actors')
            ->join('actors', 'films_actors.actor_id', '=', 'actors.id')
            ->where('films_actors.film_id', $id)
            ->select('actors.id', 'actors.name', 'actors.birthdate') 
            ->get();

        if ($actors->isEmpty()) {
            return response()->json(['message' => 'No se encontraron actores para esta película'], 404);
        }

        return response()->json($actors, 200);
    }
}
