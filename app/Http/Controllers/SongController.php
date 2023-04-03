<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Song;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) //faccio passare la richiesta
    {
        if ($request->has('term')) {
            $term = $request->get('term');
            $songs = Song::where('title', 'LIKE', "%$term%")->paginate(5)->withQueryString();
        } else {
            $songs = Song::paginate(5); //con paginate vedrò i primi 5 IN QUESTO CASO risultati
        }

        return view('songs.index', compact('songs')); //rispecchia il nome del metodo cosi distinguo meglio
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all(); //passo tutti i valori

        $song = new Song;
        $song->fill($data); //tutti gli attributi
        $song->save();

        return redirect()->route('songs.show', $song); //reindirizzo al nuovo album
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        return view('songs.show', compact('song'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
