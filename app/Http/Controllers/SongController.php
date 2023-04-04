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
        $request->validate([ //devo validare tutto quello che ricevo
            'title' => 'required|string|max:30',
            'album' => 'required|string|max:30',
            'author' => 'required|string|max:20',
            'editor' => 'required|string|max:20',
            'lenght' => 'required|time',
            'poster' => 'required'
        ], [
            'title.required' => 'Il titolo è obbligatorio', //gestisco l'errore caso per caso
            'title.string' => 'Il titolo deve essere una stringa',
            'title.max' => 'La lunghezza massima del titolo è di 30 caratteri',

            'album.required' => 'L\'album è obbligatorio',
            'album.string' => 'L\'album deve essere una stringa',
            'album.max' => 'La lunghezza massima dell\'album è di 30 caratteri',

            'author.required' => 'L\'autore è obbligatorio',
            'author.string' => 'L\'autore deve essere una stringa',
            'author.max' => 'La lunghezza massima dell\'autore è di 20 caratteri',

            'editor.required' => 'L\'editore è obbligatorio',
            'editor.string' => 'L\'editore deve essere una stringa',
            'editor.max' => 'La lunghezza massima dell\'editore è di 20 caratteri',

            'lenght.required' => 'La durata è obbligatoria',

            'poster.required' => 'Il poster è obbligatorio',
        ]);


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
