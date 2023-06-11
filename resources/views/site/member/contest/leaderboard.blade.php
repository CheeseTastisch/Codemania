@extends('layouts.app')

@section('title', "$contest->name Leaderboard")

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        @livewire('member.contest.leaderboard.container', ['contest' => $contest])
    </div>
@endpush
