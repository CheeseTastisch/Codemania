@extends('errors::minimal')

@section('title', 'Forbidden')
@section('code', '403')
@section('message', $exception->getMessage() ?: 'Forbidden')
@section('description')
    <p>Du bist nicht berechtigt, diese Seite aufzurufen.</p>
    <p>Bitte melde dich mit deinem Account an.</p>
    <p>Bei Fragen wende dich bitte an ein Mitglied der Organisation.</p>
@endsection
