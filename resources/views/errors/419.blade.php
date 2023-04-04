@extends('errors::minimal')

@section('title', 'Page Expired')
@section('code', '419')
@section('message', 'Page Expired')
@section('description')
    <p class="mt-1">Deine Sitzung ist abgelaufen.</p>
    <p class="mt-1">Bitte lade die Seite neu.</p>
@endsection
