@extends('layouts.admin')

@section('title', 'FAQ')

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        @livewire('admin.faq.container')
    </div>
@endpush
