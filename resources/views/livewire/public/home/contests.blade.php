<div class="swiper mt-6" id="contests-swiper" wire:init="initData" x-data="{swiper: null, count: @entangle('count')}" wire:ignore.self>
    @if($loadData)
        <div class="swiper-wrapper" x-init="swiper.params.breakpoints = {
            1024: {
                slidesPerView: Math.min(2, count)
            },
            1280: {
                slidesPerView: Math.min(3, count)
            },
            1536: {
                slidesPerView: Math.min(4, count)
            }
        }">
            @foreach($contests as $contest)
                <a class="swiper-slide box rounded-lg bg-gradient-to-tl from-accent-400 dark:from-accent-600 hover:to-accent-600 hover:dark:to-accent-400 p-4" style="{{ $contest->theme_variables }}"
                   href="{{ route('member.contest.training', $contest) }}">
                    @if($contest->contestDay->training_only)
                        <p class="font-bold text-2xl">
                            {{ $contest->name }}
                        </p>
                        <p class="font-bold text-xl">Viel Spaß</p>
                        <p class="mt-1">Dieser Contest dient nur als Training</p>
                        <div class="flex justify-between mt-1">
                            <p>{{ $contest->tasks->count() }} Aufgaben</p>
                            @auth
                                <p>
                                    {{ auth()->user()?->getTeamForContest($contest, true)?->getPoints(true, $contest) ?? 0 }}
                                    /
                                    {{ $contest->tasks->flatMap(fn ($task) => $task->levels)->map(fn ($level) => $level->points)->sum() }}
                                    Punkte im Training
                                </p>
                            @else
                                <p>
                                    {{ $contest->tasks->flatMap(fn ($task) => $task->levels)->map(fn ($level) => $level->points)->sum() }} Punkte möglich
                                </p>
                            @endauth
                        </div>
                        @auth
                            <div class="flex justify-between mt-1">
                                <p>Teilnahme nicht möglich</p>
                            </div>
                        @endauth
                    @else
                        <p class="font-bold text-2xl">
                            {{ $contest->contestDay->name }}
                        </p>
                        <p class="font-bold text-xl">
                            {{ $contest->name }}
                        </p>
                        <p class="mt-1">{{ $contest->contestDay->date->format('d. m. Y') }}</p>
                        <div class="flex justify-between mt-1">
                            <p>{{ $contest->tasks->count() }} Aufgaben</p>
                            @auth
                                <p>
                                    {{ auth()->user()?->getTeamForContest($contest, true)?->getPoints(true, $contest) ?? 0 }}
                                    /
                                    {{ $contest->tasks->flatMap(fn ($task) => $task->levels)->map(fn ($level) => $level->points)->sum() }}
                                    Punkte im Training
                                </p>
                            @else
                                <p>
                                    {{ $contest->tasks->flatMap(fn ($task) => $task->levels)->map(fn ($level) => $level->points)->sum() }} Punkte möglich
                                </p>
                            @endauth
                        </div>
                        @auth
                            <div class="flex justify-between mt-1">
                                @if(($team = auth()->user()?->getTeamForContest($contest)) !== null)
                                    <p>
                                        {{ $team->getPlace() }}. Platz
                                    </p>
                                    <p>
                                        {{ $team->getPoints() }} Punkte erreicht
                                    </p>
                                @else
                                    <p>Nicht teilgenommen</p>
                                @endif
                            </div>
                        @endauth
                    @endif
                </a>
            @endforeach
        </div>
    @else
        <div class="swiper-wrapper" x-init="swiper = new window.swiper.Swiper('#contests-swiper', {
            grabCursor: true,
            spaceBetween: 50,
            slidesPerView: 1,
            breakpoints: {
                640: {
                    slidesPerView: 2
                }
            }
        })">
            <div class="swiper-slide box rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse !h-[148px]">
            </div>

            <div class="swiper-slide box rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse !h-[148px]">
            </div>

        </div>
    @endif
</div>
