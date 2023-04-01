@extends('layouts.app')

@section('page-name', 'Lista Album')

@section('main-content')
    <div class="row">
        @foreach ($songs as $song)
            <div class="col-4 g-3">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$song->title}}</h5>
                        <p class="card-text">{{$song->album}}</p>
                        <a href="#" class="btn btn-danger">Dettaglio</a>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
@endsection