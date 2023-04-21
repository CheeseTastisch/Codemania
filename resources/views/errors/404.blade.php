@extends('errors::minimal')

@section('title', 'Page Not Found')
@section('code', '404')
@section('message', 'Page Not Found')
@section('description')
    <p>Die angeforderte Seite konnte nicht gefunden werden.</p>
    <p>Bitte überprüfe die URL und versuche es erneut.</p>
    <p>Bei Fragen wende dich bitte an ein Mitglied der Organisation.</p>
@endsection
