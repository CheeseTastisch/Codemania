<div x-data="{open: false, translateX: 0, translateY: 0, translateXArrow: 0, translateYArrow: 0,
calculateOffset() {
    this.translateX = {{
        match($placement) {
            'bottom', 'top' => '$refs.button.offsetLeft + $refs.button.offsetWidth / 2 - $refs.box.offsetWidth / 2',
            'left' => '$refs.button.offsetLeft - $refs.box.offsetWidth - 10',
            'right' => '$refs.button.offsetLeft + $refs.button.offsetWidth + 10',
        }
    }};
    this.translateY = {{
        match($placement) {
            'bottom' => '$refs.button.offsetTop + $refs.button.offsetHeight + 10',
            'top' => '$refs.button.offsetTop - $refs.box.offsetHeight - 10',
            'left', 'right' => '$refs.button.offsetTop + $refs.button.offsetHeight / 2 - $refs.box.offsetHeight / 2',
        }
    }};
    @if($arrow)
    this.translateXArrow = {{
        match($placement) {
            'bottom', 'top' => '$refs.box.offsetLeft + $refs.box.offsetWidth / 2 - $refs.arrow.offsetWidth / 2',
            'left' => '$refs.box.offsetLeft + $refs.box.offsetWidth - $refs.arrow.offsetWidth / 2',
            'right' => '$refs.box.offsetLeft - $refs.arrow.offsetWidth / 2',
        }
    }};
    this.translateYArrow = {{
        match ($placement) {
            'bottom' => '$refs.box.offsetTop - $refs.arrow.offsetHeight / 2',
            'top' => '$refs.box.offsetTop + $refs.box.offsetHeight - $refs.arrow.offsetHeight / 2',
            'left', 'right' => '$refs.box.offsetTop + $refs.box.offsetHeight / 2 - $refs.arrow.offsetHeight / 2',
        }
        }};
    @endif
}}" x-init="$watch('open', function (value) {
    if (value) {
        $refs.box.classList.remove('hidden');
        calculateOffset();
    } else $refs.box.classList.add('hidden');
})" @resize.window.debounce="calculateOffset()" @click.outside="open = false">
    <button type="button" id="{{ $id }}-button" :aria-expanded="open" aria-controls="{{ $id }}" @mouseenter="open = true" @mouseleave="open = false" x-ref="button">
        {{ $button }}
    </button>
    <div id="{{ $id }}" class="z-50 hidden absolute inset-[0 auto auto 0] top-0 left-0 bg-white border border-gray-200 rounded-md shadow-lg p-2 text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200"
         aria-describedby="{{ $id }}"
         x-ref="box" x-cloak :style="`transform: translate3d(${translateX}px, ${translateY}px, 0);`">
        {{ $slot }}

        @if($arrow)
            <div x-ref="arrow" class="absolute top-0 left-0 w-0 h-0 border-l-8 border-l-transparent border-r-8 border-r-transparent border-t-8 border-t-white dark:border-t-gray-800"
                 :style="`transform: translate3d(${translateXArrow}px, ${translateYArrow}px, 0) rotate({{
                match ($placement) {
                    'bottom' => '180',
                    'top' => '0',
                    'left' => '270',
                    'right' => '90',
                }
             }}deg);`">
            </div>
        @endif
    </div>
</div>
