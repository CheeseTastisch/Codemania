<div>
    {{-- TODO: Style --}}
    @foreach($day->sponsors as $sponsor)
        <div class="w-12 h-12">
            <img src="{{ route('public.file', $sponsor->logo_id) }}">
        </div>
    @endforeach
</div>
