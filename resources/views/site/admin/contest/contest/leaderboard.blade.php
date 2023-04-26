@extends('layouts.admin')

@section('title', 'Leaderboard')

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        <div class="mb-3">
            <x-breadcrumb.x
                :items="[
                ['name' => 'Contests', 'link' => route('admin.contest.contest-day.view'), 'home' => true],
                ['name' => $contest->contestDay->name, 'link' => route('admin.contest.contest-day.edit', $contest->contestDay->id)],
                ['name' => $contest->name, 'link' => route('admin.contest.contest.edit', $contest)],
                ['name' => 'Leaderboard', 'current' => true],
            ]"
            />
        </div>

        <x-card.x title="Leaderboard">
            @livewire('admin.contest.contest.leaderboard.leaderboard', ['contest' => $contest])
        </x-card.x>
    </div>
@endpush
