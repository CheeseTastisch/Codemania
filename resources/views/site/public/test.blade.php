@extends('layouts.center')

@push('content')
<x-breadcrumb.x
    :items="[
        ['home' => true, 'name' => 'Projects', 'link' => '#'],
        ['name' => 'Snap Inc.', 'link' => '#'],
        ['name' => '2023', 'link' => '#'],
        ['name' => 'Bitmoji', 'current' => true],
    ]"
/>
@endpush
