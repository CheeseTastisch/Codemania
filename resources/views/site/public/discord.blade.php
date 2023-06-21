@php($alwaysDark = true)
@php($noCookie = true)

@extends('layouts.components.base')

@section('title', 'Discord')

@section('baseContent')
    <div class="container mx-auto h-screen flex justify-center items-center p-20">
        <img src="{{ asset('storage/img/discord.png') }}" alt="Discord" class="w-1/2 rounded-3xl">
    </div>
@endsection
