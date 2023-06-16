@extends('layouts.admin')

@section('title', 'Benutzer')

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        <x-card.x title="Benutzer">
            @livewire('admin.user.index')
        </x-card.x>
    </div>
@endpush
