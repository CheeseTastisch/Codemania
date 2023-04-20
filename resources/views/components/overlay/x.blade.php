<div class="{{ $classes }}">
    <div class="relative w-full h-full">
        <div class="w-full h-full">
            {{ $slot }}
        </div>
        <div class="absolute inset-0 z-10 opacity-0 hover:opacity-100 focus:opacity-100 duration-300">
            {{ $overlay }}
        </div>
    </div>
</div>
