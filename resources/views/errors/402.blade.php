@extends('errors::layout')

@section('title', 'Payment Required')
@section('code', '402')
@section('message', 'Payment Required')
@section('description')
    <p>Du hast nicht genügend Guthaben auf deinem Konto.</p>
    <p>Bitte lade dein Konto auf.</p>
@endsection
