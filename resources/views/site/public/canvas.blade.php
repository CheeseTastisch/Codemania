@php($alwaysDark = true)

@extends('layouts.components.base')

@section('title', $contestDay->name)

@section('baseContent')
    @livewire('public.canvas.loader', ['contestDay' => $contestDay])
@endsection
