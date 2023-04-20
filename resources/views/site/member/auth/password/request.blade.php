@extends('layouts.app')

@section('title', 'Password zurücksetzen')

@push('content')
    <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto pt:mt-0">
        <x-card.x
            title="Password zurücksetzen"
            max-width="xl">
            @livewire('member.auth.password.request.form')
        </x-card.x>
    </div>
@endpush
