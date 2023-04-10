@extends('layouts.admin')

@section('title', 'Contests')

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        <div class="md:p-4 p-2 border-2 rounded-lg shadow-sm border-accent-400 dark:border-accent-600">
            @livewire('admin.contest.home.table')
        </div>
    </div>
@endpush
