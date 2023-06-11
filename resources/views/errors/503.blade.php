@extends('errors::minimal')

{{--@extends('layouts.components.base')--}}

{{--@section('title', 'Service Unavailable')--}}

{{--@section('baseContent')--}}
{{--    <div class="w-screem h-screen flex justify-center flex-col items-center">--}}
{{--        <div class="flex justify-center relative">--}}
{{--            <h1 class="text-9xl font-extrabold tracking-widest">503</h1>--}}
{{--            <div class="bg-accent-400 dark:bg-accent-600 px-2 text-sm rounded rotate-[10deg] absolute bottom-6">--}}
{{--                Service Unavailable--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="text-center mt-4">--}}
{{--            <p>Der Server ist nicht erreichbar.</p>--}}
{{--            <p>Bitte versuche es später erneut.</p>--}}
{{--            <p>Wir sind bald wieder für dich da.</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

@section('title', 'Service Unavailable')
@section('code', '503')
@section('message', 'Service Unavailable')
@section('description')
    <p>Der Server ist derzeit nicht erreichbar.</p>
    <p>Bitte versuche es später erneut.</p>
    <p>Wir sind bald wieder für dich da.</p>
@endsection
