@extends('layouts.app')

@section('title', $contest->name)

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        @if($contest->end_time->isPast())
            @livewire('member.contest.contest.past', ['contest' => $contest])
        @elseif($contest->start_time->isPast())
            @livewire('member.contest.contest.running', ['contest' => $contest])
        @else
            @livewire('member.contest.contest.upcoming', ['contest' => $contest])
        @endif
    </div>
@endpush
