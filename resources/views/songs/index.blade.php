@extends('layouts.app')

@section('page-name', 'Lista Album')

@section('cdn')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
@endsection

@section('main-content')

    <div class="row">
        <form class="col-5 d-flex">{{-- form per cercare la canzone --}}

            {{-- importante, altrimenti non parte nulla --}}

            <input type="text" class="form-control" placeholder="Cerca..." name="term">
            <button class="btn btn-outline-danger" type="submit">Filtra</button>
        </form>
        <div class="col-5">
            <a href="{{route('songs.create')}}" class="btn btn-outline-danger" type="button">Crea nuova Canzone</a>{{-- bottone che mi porta sul form per creare una nuova canzone --}}
        </div>
    </div>
    

    <div class="text-danger">
        {{$songs->links('pagination::bootstrap-5')}}{{-- per far apparire i tasti delle pagine --}}
    </div>

    <div class="row">
        @foreach ($songs as $song)
            <div class="col-4 g-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{$song->poster}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$song->title}}</h5>
                        <p class="card-text">{{$song->album}}</p>
                        <a href="{{ route('songs.show', $song) }}" class="btn btn-danger">{{-- funzione show in SongController, dettaglio --}}
                            <i class="bi bi-box"></i>
                        </a>
                        <a href="{{ route('songs.edit', $song) }}" class="btn btn-danger">{{-- funzione edit in SongController, per modificare --}}
                            <i class="bi bi-tools"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
@endsection