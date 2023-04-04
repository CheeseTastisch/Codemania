@extends('errors::minimal')

@section('title', 'Payment Required')
@section('code', '402')
@section('message', 'Payment Required')
@section('description')
    <p class="mt-1">Du hast nicht genügend Guthaben auf deinem Konto.</p>
    <p class="mt-1">Bitte lade dein Konto auf.</p>
@endsection
