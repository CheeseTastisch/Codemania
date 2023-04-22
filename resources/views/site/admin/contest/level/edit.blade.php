@extends('layouts.admin')

@section('title', $level->task->name . ' - Level ' . $level->level)

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        <div class="mb-3">
            <x-breadcrumb.x
                :items="[
                ['name' => 'Contests', 'link' => route('admin.contest.contest-day.view'), 'home' => true],
                ['name' => $level->task->contest->contestDay->name, 'link' => route('admin.contest.contest-day.edit',  $level->task->contest->contestDay)],
                ['name' => $level->task->contest->name, 'link' => route('admin.contest.contest.edit', $level->task->contest)],
                ['name' => $level->task->name, 'link' => route('admin.contest.task.edit', $level->task)],
                ['name' => 'Level ' . $level->level, 'current' => true],
            ]"
            />
        </div>

        <div class="space-y-4">
            <x-card.x title="Level">
                @livewire('admin.contest.level.edit.general', ['level' => $level])
            </x-card.x>

            <x-card.x title="Abgaben">
                @livewire('admin.contest.level.edit.files', ['level' => $level])
            </x-card.x>
        </div>
    </div>
@endpush
