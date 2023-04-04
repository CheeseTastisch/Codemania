@extends('errors::minimal')

@section('title', 'Unauthorized')
@section('code', '401')
@section('message', 'Unauthorized')
@section('description')
    <p class="mt-1">Du bist nicht berechtigt, diese Seite aufzurufen.</p>
    <p class="mt-1">Bitte melde dich mit deinem Account an.</p>
@endsection
