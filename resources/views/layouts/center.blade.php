@extends('layouts.components.base')

@section('baseContent')
    @include('layouts.components.user.navbar')

    <div class="pt-[4.5rem] flex flex-col min-h-full">
        <main class="flex-1/0 flex items-center justify-center">
            @stack('content')
        </main>

        @include('layouts.components.base.footer')
    </div>
@endsection
