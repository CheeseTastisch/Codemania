@php($alwaysDark = true)
@php($noCookie = true)

@extends('layouts.components.base')

@section('title', $contestDay->name)

@section('baseContent')
    @livewire('public.canvas.loader', ['contestDay' => $contestDay])
@endsection
