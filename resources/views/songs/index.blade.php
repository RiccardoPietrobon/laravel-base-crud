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
                        <div class="d-flex justify-content-around">
                            <a href="{{ route('songs.show', $song) }}" class="btn btn-danger">{{-- funzione show in SongController, dettaglio --}}
                                <i class="bi bi-box"></i>
                            </a>
                            <a href="{{ route('songs.edit', $song) }}" class="btn btn-danger">{{-- funzione edit in SongController, per modificare --}}
                                <i class="bi bi-tools"></i>
                            </a>
                            
                            <button class="bi bi-x-circle-fill btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $song->id }}"></button>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
@endsection

@section('modal')
    @foreach ($songs as $song)
        <!-- Modal -->
        <div class="modal fade" id="delete-modal-{{ $song->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina la risorsa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Vuoi eliminare la risorsa: <strong>{{ $song->title }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULLA</button>

                <form action="{{ route('songs.destroy', $song) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-primary">ELIMINA</button>

                </form>
            </div>
            </div>
        </div>
        </div>
    @endforeach
    

@endsection