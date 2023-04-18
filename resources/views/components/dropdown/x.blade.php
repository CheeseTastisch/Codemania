<div x-data="{open: false, translateX: 0, translateY: 0,
calculateOffset() {
    this.translateX = {{
        match($placement) {
            'bottom', 'top' => '$refs.button.offsetLeft + $refs.button.offsetWidth / 2 - $refs.box.offsetWidth / 2',
            'left' => '$refs.button.offsetLeft - $refs.box.offsetWidth',
            'right' => '$refs.button.offsetLeft + $refs.button.offsetWidth',
        }
    }};
    this.translateY = {{
        match($placement) {
            'bottom' => '$refs.button.offsetTop + $refs.button.offsetHeight',
            'top' => '$refs.button.offsetTop - $refs.box.offsetHeight',
            'left', 'right' => '$refs.button.offsetTop + $refs.button.offsetHeight / 2 - $refs.box.offsetHeight / 2',
        }
    }};
}}" x-init="$watch('open', function (value) {
    if (value) {
        $refs.box.classList.remove('hidden');
        calculateOffset();
    } else $refs.box.classList.add('hidden');
})" @resize.window.debounce="calculateOffset()" @click.outside="open = false">
    <button type="button" id="{{ $id }}-button" :aria-expanded="open" aria-controls="{{ $id }}" @click="open = !open" x-ref="button">
        {{ $button }}
    </button>
    <div id="{{ $id }}" class="z-50 hidden absolute inset-[0 auto auto 0] top-0 left-0" aria-describedby="{{ $id }}" x-ref="box"
         x-cloak
         :style="`transform: translate3d(${translateX}px, ${translateY}px, 0);`">
        {{ $slot }}
    </div>
</div>
