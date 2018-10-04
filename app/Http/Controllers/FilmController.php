<?php

namespace App\Http\Controllers;

use App\Film;
use App\Http\Requests\StoreUpdateFilm;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::with('genres', 'comments')->get();
        return response()->json(['films' => $films]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateFilm $request)
    {
        $film = new Film();
        $film->fill($request->all());
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
            $film->photo = $name;
        }
        $film->save();
        $genres = explode(',', $request->get('genre'));
        $film->genres()->sync($genres);
        return response()->json($film);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $film = Film::with('genres', 'comments.user')->whereSlug($slug)->first();
        return response()->json(['film' => $film]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateFilm $request, $id)
    {
        $film = Film::findOrFail($id);
        $film->fill($request->all());
        $film->save();
        $film->genres()->sync($request->get('genres'), false);
        return response()->json($film);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();
        return response()->json(["message" => "Film deleted successfully"]);
    }
}
