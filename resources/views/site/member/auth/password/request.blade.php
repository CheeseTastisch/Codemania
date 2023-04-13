@extends('layouts.app')

@section('title', 'Password zurücksetzen')

@push('content')
    <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto pt:mt-0">
        <x-card
            title="Password zurücksetzen"
            class="w-full max-w-xl">
            @livewire('member.auth.password.request.form')
        </x-card>
    </div>
@endpush
