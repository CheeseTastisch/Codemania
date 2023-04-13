@extends('layouts.app')

@section('title', 'Anmelden')

@push('content')
    <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto pt:mt-0">
        <x-card
            title="Anmelden"
            class="w-full max-w-xl">
            @livewire('member.auth.login.form')
        </x-card>
    </div>
@endpush
