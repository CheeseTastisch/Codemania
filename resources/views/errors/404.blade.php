@extends('errors::layout')

@section('title', 'Page Not Found')
@section('code', '404')
@section('message', 'Page Not Found')
@section('description')
    <p>Die angeforderte Seite konnte nicht gefunden werden.</p>
    <p>Bitte überprüfe die URL und versuche es erneut.</p>
@endsection
