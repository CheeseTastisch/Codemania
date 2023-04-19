@extends('layouts.app')

@push('content')
    <div class="container mx-auto mt-5">
        <x-card.x>
            @livewire('public.test')
        </x-card.x>
    </div>
@endpush
