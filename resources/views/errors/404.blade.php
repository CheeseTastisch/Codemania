@extends('errors::minimal')

@section('title', 'Page Not Found')
@section('code', '404')
@section('message', 'Page Not Found')
@section('description')
    <p class="mt-1">Die angeforderte Seite konnte nicht gefunden werden.</p>
    <p class="mt-1">Bitte überprüfe die URL und versuche es erneut.</p>
    <p class="mt-2">Solltest du denken, dass diese Meldung ein Fehler ist, wende dich bitte an die Organisatoren.</p>
@endsection
