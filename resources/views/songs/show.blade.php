@extends('layouts.app')

@section('page-name', 'Titolo: ' . $song->title)

@section('main-content')
    <h3>Album: {{$song->album}}</h3>
    <h3>Autore: {{$song->author}}</h3>
    <h3>Editore: {{$song->editor}}</h3>
    <img src="{{$song->poster}}" alt="">

@endsection