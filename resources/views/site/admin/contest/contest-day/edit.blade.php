@extends('layouts.admin')

@section('title', 'Contests')

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        <div class="grid grid-cols-1 xl:grid-cols-7 xl:gap-x-4">
            <x-card
                title="Tag bearbeiten"
                class="col-span-1 mb-3 xl:col-span-4">
                @livewire('admin.contest.contest-day.edit.day', ['contestDay' => $contestDay])
            </x-card>

            <x-card
                title="Theme bearbeiten"
                class="col-span-1 mb-3 xl:col-span-3">
{{--                @livewire('admin.contest.contest-day.edit.theme', ['contestDay' => $contestDay])--}}
            </x-card>
        </div>

        <x-card
            title="Contests"
            class="mb-3">
{{--            @livewire('admin.contest.contest-day.edit.contests', ['contestDay' => $contestDay])--}}
        </x-card>

        <div class="grid grid-cols-1 xl:grid-cols-2 xl:gap-x-4">
            <x-card
                title="Sponsoren"
                class="mb-3">
{{--                @livewire('admin.contest.contest-day.edit.sponsors', ['contestDay' => $contestDay])--}}
            </x-card>

            <x-card
                title="Teams"
                class="mb-3">
{{--                @livewire('admin.contest.contest-day.edit.teams', ['contestDay' => $contestDay])--}}
            </x-card>
        </div>
    </div>
@endpush
