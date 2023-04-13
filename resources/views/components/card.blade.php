<div class="overflow-hidden p-4 rounded-lg border-2 border-accent-400 dark:border-accent-600 shadow-lg @if($class) {{ $class }} @endif">
    @if($title)
        <div class="px-4 py-3 font-bold text-xl">
            <h3>{{ $title }}</h3>
        </div>
    @endif

    <div class="px-4 py-3">
        {{ $slot }}
    </div>
</div>
