<div class="flex flex-wrap justify-center items-center h-screen p-5 gap-10">
    @foreach($day->sponsors->where('on_canvas', true) as $sponsor)
        <div class="p-3 rounded-lg flex items-center justify-center aspect-square
            @if($sponsor->background == 'light') bg-white @elseif($sponsor->background == 'dark') bg-slate-900 @endif"
             style="flex-basis: calc(100% / 3 - 2.5rem);">
            <img src="{{ route('public.file', $sponsor->logo_id) }}" alt="{{ $sponsor->name }}"
                 class="max-h-full max-w-full grow">
        </div>
    @endforeach
</div>
