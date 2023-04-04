@extends('layouts.app')

@section('page-name', 'Titolo: ' . $song->title)

@section('main-content')
    <div class="row">
        <div class="col-4">
            <h2 class="text-danger">Titolo</h2>
            <br>
            <p>{{$song->title}}</p>
        </div>
    
        <div class="col-4">
            <h2 class="text-danger">Album</h2>
            <br>
            <p>{{$song->album}}</p>
        </div>

        <div class="col-4">
            <h2 class="text-danger">Autore</h2>
            <br>
            <p>{{$song->author}}</p>
        </div>

        <div class="col-4">
            <h2 class="text-danger">Editore</h2>
            <br>
            <p>{{$song->editor}}</p>
        </div>

        <div class="col-2">
            <h2 class="text-danger">Durata</h2>
            <br>
            <p>{{$song->lenght}}</p>
        </div>

        <div class="col-6">
            <h2 class="text-danger">Poster</h2>
            <br>
            <img src="{{$song->poster}}" alt="">        </div>
    </div>
@endsection