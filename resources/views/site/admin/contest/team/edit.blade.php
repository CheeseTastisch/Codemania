@extends('layouts.admin')

@section('title', $team->name)

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        <div class="mb-3">
            <x-breadcrumb.x
                :items="[
                ['name' => 'Contests', 'link' => route('admin.contest.contest-day.view'), 'home' => true],
                ['name' => $team->contest->contestDay->name, 'link' => route('admin.contest.contest-day.edit',  $team->contest->contestDay)],
                ['name' => $team->contest->name, 'link' => route('admin.contest.contest.edit', $team->contest)],
                ['name' => $team->name, 'current' => true],
            ]"
            />
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-2 xl:gap-x-4">
            <div class="col-span-1 mb-3">
                <x-card.x title="Team" full-height>
                    @livewire('admin.contest.team.edit.general', ['team' => $team])
                </x-card.x>
            </div>

            <div class="col-span-1 mb-3">
                <x-card.x title="Mitglieder" full-height>
                    @livewire('admin.contest.team.edit.members', ['team' => $team])
                </x-card.x>
            </div>
        </div>

        <x-card.x title="Abgaben" full-height>
            @livewire('admin.contest.team.edit.submissions', ['team' => $team])
        </x-card.x>
    </div>
@endpush
