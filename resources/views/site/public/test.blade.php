@extends('layouts.center')

@push('content')
    <x-button.js
    id="test"
    action="alert('test')"
    :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedDanger"
    >
        Test
    </x-button.js>
@endpush
