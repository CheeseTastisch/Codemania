@extends('layouts.app')

@section('title', $contest->name)

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        @if($contest->start_time->isPast() && $contest->end_time->isFuture())
            @livewire('member.contest.contest.running', ['contest' => $contest])
        @elseif($contest->start_time->isFuture())
            @livewire('member.contest.contest.upcoming', ['contest' => $contest])
        @elseif($contest->end_time->isPast())
            @livewire('member.contest.contest.past', ['contest' => $contest])
        @endif
    </div>
@endpush
