@extends('layouts.admin')

@section('title', $contest->name)

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        <div class="mb-3">
            <x-breadcrumb.x
                :items="[
                ['name' => 'Contests', 'link' => route('admin.contest.contest-day.view'), 'home' => true],
                ['name' => $contest->contestDay->name, 'link' => route('admin.contest.contest-day.edit', $contest->contestDay->id)],
                ['name' => $contest->name, 'current' => true],
            ]"
            />
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-2 xl:gap-x-4">
            <div class="col-span-1 mb-3">
                <x-card.x title="Contest" full-height>
                    @livewire('admin.contest.contest.edit.contest', ['contest' => $contest])
                </x-card.x>
            </div>

            <div class="col-span-1 mb-3">
                <x-card.x title="Aufgaben" full-height>
                    @livewire('admin.contest.contest.edit.tasks', ['contest' => $contest])
                </x-card.x>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-2 xl:gap-x-4">
            <div class="col-span-1 mb-3">
                <x-card.x title="Leaderboard" full-height>
                    @livewire('admin.contest.contest.edit.leaderboard', ['contest' => $contest])
                </x-card.x>
            </div>

            <div class="col-span-1 mb-3">
                <x-card.x title="Links" full-height>
{{--                    @livewire('admin.contest.contest.edit.teams', ['contest' => $contest])--}}
                </x-card.x>
            </div>
        </div>
    </div>
@endpush
