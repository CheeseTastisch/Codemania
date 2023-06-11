@extends('errors::layout')

@section('title', 'Too Many Requests')
@section('code', '429')
@section('message', 'Too Many Requests')
@section('description')
    <p>Du hast zu viele Anfragen gestellt.</p>
    <p>Bitte warte einen Moment und versuche es erneut.</p>
@endsection
