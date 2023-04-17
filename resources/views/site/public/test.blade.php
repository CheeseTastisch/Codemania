@extends('layouts.center')

@push('content')
    <x-alert.x
        title="Title"
        sr-info="Information"
        :style="\App\Models\Components\Styled\Style::Warning">
        <p>This is an alert</p>

        <x-slot name="actions">
            <x-alert.actions.link href="{{ url()->previous() }}" :style="\App\Models\Components\Styled\OutlinedStyle::FilledAccent">
                Zurück
            </x-alert.actions.link>
        </x-slot>
    </x-alert.x>
@endpush
