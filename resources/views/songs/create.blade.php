@extends('layouts.app')

@section('page-name', 'Aggiungi Album')

@section('cdn')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
@endsection

@section('main-content')

    <form action="{{route('songs.store')}}" method="POST" class="row g-3">
        <div class="col-4">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
    
        <div class="col-4">
            <label for="album" class="form-label">Album</label>
            <input type="text" class="form-control" id="album" name="album">
        </div>

        <div class="col-4">
            <label for="author" class="form-label">Autore</label>
            <input type="text" class="form-control" id="author" name="author">
        </div>

        <div class="col-4">
            <label for="editor" class="form-label">Editore</label>
            <input type="text" class="form-control" id="editor" name="editor">
        </div>

        <div class="col-2">
            <label for="lenght" class="form-label">Durata</label>
            <input type="time" class="form-control" id="lenght" name="lenght">
        </div>

        <div class="col-6">
            <label for="poster" class="form-label">Immagine</label>
            <input type="text" class="form-control" id="poster" name="poster">
        </div>

        <div class="col-3">
            <button type="submit" class="btn btn-danger">Invia i nuovi dati</button>
        </div>

    </form>

@endsection