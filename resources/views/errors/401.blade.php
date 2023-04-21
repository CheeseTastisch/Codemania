@extends('errors::minimal')

@section('title', 'Unauthorized')
@section('code', '401')
@section('message', 'Unauthorized')
@section('description')
    <p>Du bist nicht berechtigt, diese Seite aufzurufen.</p>
    <p>Bitte melde dich mit deinem Account an.</p>
@endsection
