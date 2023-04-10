<div class="swiper" id="sponsors-swiper" wire:init="initData">
    @if($loadData)
        <div class="swiper-wrapper">
            @foreach((day()?->sponsors ?? []) as $sponsor)
                <div class="swiper-slide">
                    <div class="relative flex justify-center">
                        <div
                            class="inset-0 z-0 p-3 rounded-lg flex items-center justify-center w-[200px] h-[200px]
                                                @if($sponsor->background == 'light') bg-slate-200 @elseif($sponsor->background == 'dark') bg-slate-800 @endif">
                            <img src="{{ route('public.file', $sponsor->logo_id) }}"
                                 alt="{{ $sponsor->name }}">
                        </div>
                        <a class="opacity-0 hover:opacity-100 focus:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center items-center text-center bg-accent-400 dark:bg-accent-600 !bg-opacity-70 text-xl font-bold px-5 box"
                           tabindex="0" href="{{ $sponsor->url }}" target="_blank">
                            {{ $sponsor->name }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
   @endif
</div>
