@extends('errors::minimal')

@section('title', 'Service Unavailable')
@section('code', '503')
@section('message', 'Service Unavailable')
@section('description')
    <p>Der Server ist nicht erreichbar.</p>
    <p>Bitte versuche es später erneut.</p>
    <p>Melde diesen Fehler bitte an die Organisatoren.</p>
@endsection
