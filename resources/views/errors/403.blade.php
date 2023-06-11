@extends('errors::layout')

@section('title', 'Forbidden')
@section('code', '403')
@section('message', $exception->getMessage() ?: 'Forbidden')
@section('description')
    <p>Du bist nicht berechtigt, diese Seite aufzurufen.</p>
    <p>Bitte melde dich mit einem Account an, der die nötigen Berechtigungen hat.</p>
@endsection
