@extends('errors::minimal')

@section('title', 'Internal Server Error')
@section('code', '500')
@section('message', 'Internal Server Error')
@section('description')
    <p class="mt-1">Es ist ein Fehler aufgetreten.</p>
    <p class="mt-1">Bitte versuche es später noch einmal.</p>
    <p class="mt-2">Solltest du denken, dass diese Meldung ein Fehler ist, wende dich bitte an die Organisatoren.</p>
@endsection
