@extends('layouts.admin')

@section('title', $contestDay->name)

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        <div class="mb-3">
            <x-breadcrumb.x
                :items="[
                    ['name' => 'Contests', 'link' => route('admin.contest.contest-day.view'), 'home' => true],
                    ['name' => $contestDay->name, 'current' => true],
                ]"
            />
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-7 xl:gap-x-4">
            <div class="col-span-1 mb-3 xl:col-span-4">
                <x-card.x title="Tag bearbeiten" full-height>
                    @livewire('admin.contest.contest-day.edit.general', ['contestDay' => $contestDay])
                </x-card.x>
            </div>

            <div class="col-span-1 mb-3 xl:col-span-3">
                <x-card.x title="Theme bearbeiten" full-height>
                    @livewire('admin.contest.contest-day.edit.theme', ['contestDay' => $contestDay])
                </x-card.x>
            </div>
        </div>

        <x-card.x title="Contests">
            @livewire('admin.contest.contest-day.edit.contests', ['contestDay' => $contestDay])
        </x-card.x>

        <div class="mt-3">
            <x-card.x title="Sponsoren" full-height>
                @livewire('admin.contest.contest-day.edit.sponsors', ['contestDay' => $contestDay])
            </x-card.x>
        </div>
    </div>
@endpush
