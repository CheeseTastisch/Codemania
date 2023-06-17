@extends('layouts.admin')

@section('title', $user->display_name)

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        <div class="grid grid-cols-1 xl:grid-cols-7 xl:gap-x-4">
            <div class="col-span-1 mb-3 xl:col-span-4">
                <x-card.x title="Benutzer" full-height>
                    @livewire('admin.user.edit.general', ['user' => $user])
                </x-card.x>
            </div>

            <div class="col-span-1 mb-3 xl:col-span-3">
                <x-card.x title="Teams" full-height>
                    @livewire('admin.user.edit.teams', ['user' => $user])
                </x-card.x>
            </div>
        </div>
    </div>
@endpush
