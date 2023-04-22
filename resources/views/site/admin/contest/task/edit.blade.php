@extends('layouts.admin')

@section('title', $task->name)

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        <div class="mb-3">
            <x-breadcrumb.x
                :items="[
                ['name' => 'Contests', 'link' => route('admin.contest.contest-day.view'), 'home' => true],
                ['name' => $task->contest->contestDay->name, 'link' => route('admin.contest.contest-day.edit',  $task->contest->contestDay->id)],
                ['name' => $task->contest->name, 'link' => route('admin.contest.contest.edit', $task->contest->id)],
                ['name' => $task->name, 'current' => true],
            ]"
            />
        </div>

        <x-card.x title="Aufgabe & Levels">
            @livewire('admin.contest.task.edit.general', ['task' => $task])

            <div class="mt-5">
                @livewire('admin.contest.task.edit.levels', ['task' => $task])
            </div>
        </x-card.x>
    </div>
@endpush
