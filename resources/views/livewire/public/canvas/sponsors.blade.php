<div class="flex flex-wrap justify-center items-center h-screen p-5 gap-3">
    @foreach($day->sponsors->where('on_canvas', true) as $sponsor)
        <div class="p-3 rounded-lg flex items-center justify-center aspect-square
            @if($sponsor->background == 'light') bg-slate-100 @elseif($sponsor->background == 'dark') bg-slate-900 @endif"
             style="flex-basis: calc(100% / 7 - 0.75rem);">
            <img src="{{ route('public.file', $sponsor->logo_id) }}" alt="{{ $sponsor->name }}"
                 class="max-h-full max-w-full grow">
        </div>
        <div class="p-3 rounded-lg flex items-center justify-center aspect-square
            @if($sponsor->background == 'light') bg-slate-100 @elseif($sponsor->background == 'dark') bg-slate-900 @endif"
             style="flex-basis: calc(100% / 7 - 0.75rem);">
            <img src="{{ route('public.file', $sponsor->logo_id) }}" alt="{{ $sponsor->name }}"
                 class="max-h-full max-w-full grow">
        </div>
    @endforeach
</div>
