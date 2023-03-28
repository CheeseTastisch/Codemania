@extends('layouts.app')

@section('title', 'Profile')

@push('content')
    <div class="container mx-auto sm:px-4 px-2">
        <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4">
            <div class="col-span-full xl:col-auto">
                <div
                    class="p-4 mb-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-900">
                    <div
                        class="px-4 py-2 text-gray-400 rounded font-bold text-xl">
                        <h3>Persönliche Informationen</h3>
                    </div>
                    <div
                        class="px-4 py-2 text-gray-400 rounded">
                        @livewire('member.profile.personal-form')
                    </div>
                </div>
                <div
                    class="p-4 mb-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-900">
                    <div
                        class="px-4 py-2 text-gray-400 border border-gray-200 border-dashed rounded dark:border-gray-600">
                        <h3>Card header</h3>
                    </div>
                    <div
                        class="h-32 px-4 py-2 text-gray-400 border border-gray-200 border-dashed rounded dark:border-gray-600">
                        <h3>Card body</h3>
                    </div>
                    <div
                        class="px-4 py-2 text-gray-400 border border-gray-200 border-dashed rounded dark:border-gray-600">
                        <h3>Card footer</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
