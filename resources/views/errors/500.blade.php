@extends('errors::layout')

@section('title', 'Internal Server Error')
@section('code', '500')
@section('message', 'Internal Server Error')
@section('description')
    <p>Es ist ein Fehler aufgetreten.</p>
    <p>Bitte versuche es später noch einmal.</p>
    <p>Melde diesen Fehler bitte an die Organisatoren.</p>
@endsection
