@extends('layouts.components.base')

@section('baseContent')
    @include('layouts.components.admin.navbar')

    <div class="pt-[4.5rem] flex flex-col min-h-full">
        <main class="flex-1/0">
            @stack('content')
        </main>

        @include('layouts.components.base.footer')
    </div>
@endsection
