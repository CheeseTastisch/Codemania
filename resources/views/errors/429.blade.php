@extends('errors::minimal')

@section('title', 'Too Many Requests')
@section('code', '429')
@section('message', 'Too Many Requests')
@section('description')
    <p class="mt-1">Du hast zu viele Anfragen gestellt.</p>
    <p class="mt-1">Bitte warte einen Moment und versuche es erneut.</p>
@endsection
