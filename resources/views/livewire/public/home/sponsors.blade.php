<div class="swiper" id="sponsors-swiper">
    <div class="swiper-wrapper" x-data="{count: @entangle('count')}" x-init="new window.swiper.Swiper('#sponsors-swiper', {
        modules: [window.swiper.Autoplay],
        loop: true,
        grabCursor: true,
        spaceBetween: 50,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },
        slidesPerView: 1,
        breakpoints: {
            640: {
                slidesPerView: Math.min(2, count)
            },
            768: {
                slidesPerView: Math.min(3, count)
            },
            1024: {
                slidesPerView: Math.min(4, count)
            },
            1280: {
                slidesPerView: Math.min(5, count)
            },
            1536: {
                slidesPerView: Math.min(6, count)
            }
        }
    })">
        @foreach((day()?->sponsors ?? []) as $sponsor)
            <div class="swiper-slide">
                <div class="flex justify-center">
                    <div class="relative w-[12.5rem] h-[12.5rem]">
                        <div class="inset-0 z-0 p-3 rounded-lg flex items-center justify-center  w-[12.5rem] h-[12.5rem]
                                                @if($sponsor->background == 'light') bg-white @elseif($sponsor->background == 'dark') bg-slate-800 @endif">
                            <img src="{{ route('public.file', $sponsor->logo_id) }}"
                                 alt="{{ $sponsor->name }}">
                        </div>
                        <a class="opacity-0 hover:opacity-100 focus:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center items-center text-center bg-accent-400 dark:bg-accent-600 !bg-opacity-70 text-xl font-bold px-5 box"
                           tabindex="0" href="{{ $sponsor->url }}" target="_blank">
                            {{ $sponsor->name }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
