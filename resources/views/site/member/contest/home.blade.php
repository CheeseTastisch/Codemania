@extends('layouts.app')

@section('title', 'Contests')

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        @livewire('member.contest.home.container')
    </div>
@endpush
