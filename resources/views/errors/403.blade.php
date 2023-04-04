@extends('errors::minimal')

@section('title', 'Forbidden')
@section('code', '403')
@section('message', $exception->getMessage() ?: 'Forbidden')
@section('description')
    <p class="mt-1">Du bist nicht berechtigt, diese Seite aufzurufen.</p>
    <p class="mt-1">Bitte melde dich mit deinem Account an.</p>
    <p class="mt-2">Solltest du bereits angemeldet sein und denken diese Meldung ist ein Fehler, wende dich bitte an die Organisatoren.</p>
@endsection
