@extends('layouts.app')

@section('page-name', 'Aggiungi Album')

@section('cdn')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
@endsection

@section('main-content')

    <form action="{{route('songs.store')}}" method="POST" class="row g-3">

        @csrf{{-- attenzione --}}
        <div class="col-4">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">{{-- con OLD rimane quello che ho scritto in caso di errore --}}
            @error('title'){{-- se c'è l'errore stampa il messaggio --}}
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
    
        <div class="col-4">
            <label for="album" class="form-label">Album</label>
            <input type="text" class="form-control @error('album') is-invalid @enderror" id="album" name="album" value="{{ old('album') }}">
            @error('album')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="col-4">
            <label for="author" class="form-label">Autore</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') }}">
            @error('author')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="col-4">
            <label for="editor" class="form-label">Editore</label>
            <input type="text" class="form-control @error('editor') is-invalid @enderror" id="editor" name="editor" value="{{ old('editor') }}">
            @error('editor')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="col-2">
            <label for="lenght" class="form-label">Durata</label>
            <input type="time" class="form-control @error('lenght') is-invalid @enderror" id="lenght" name="lenght" value="{{ old('lenght') }}">
            @error('lenght')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="col-6">
            <label for="poster" class="form-label">Immagine</label>
            <input type="text" class="form-control @error('poster') is-invalid @enderror" id="poster" name="poster" value="{{ old('poster') }}">
            @error('poster')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="col-3">
            <button type="submit" class="btn btn-danger">Invia i nuovi dati</button>
        </div>

    </form>

@endsection