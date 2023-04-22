@extends('layouts.admin')

@section('title', 'Contests')

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        <div class="mb-3">
            <x-breadcrumb.x
                :items="[['name' => 'Contests', 'current' => true, 'home' => true],]"
            />
        </div>

        <x-card.x title="Tage">
            @livewire('admin.contest.contest-day.view.table')
        </x-card.x>
    </div>
@endpush
