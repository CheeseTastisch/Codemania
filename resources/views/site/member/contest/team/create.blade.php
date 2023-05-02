@extends('layouts.app')

@section('title', 'Team erstellen')

@push('content')
    <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto">
        <x-card.x
            title="Team erstellen"
            max-width="xl">
            @livewire('member.contest.team.create.form', ['contest' => $contest])
        </x-card.x>
    </div>
@endpush
