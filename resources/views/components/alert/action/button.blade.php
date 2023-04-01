<button onclick="{{ $click }}" type="button"
        class="{{ $getClasses }} {{ $classes }} @if($outlined) bg-transparent border focus:ring-4 focus:outline-none font-medium rounded-lg text-xs px-3 py-1.5 text-center @else focus:ring-4 focus:outline-none font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center @endif">
    {{ $slot }}
</button>
