@extends('errors::minimal')

@section('title', 'Service Unavailable')
@section('code', '503')
@section('message', 'Service Unavailable')
@section('description')
    <p class="mt-1">Der Server ist nicht erreichbar.</p>
    <p class="mt-1">Bitte versuche es später erneut.</p>
    <p class="mt-2">Solltest du denken, dass diese Meldung ein Fehler ist, wende dich bitte an die Organisatoren.</p>
@endsection
