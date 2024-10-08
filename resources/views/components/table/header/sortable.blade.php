<th scope="col" class="px-6 py-3">
    <div class="flex items-center">
        {{ $name }}

        <svg wire:click="sortBy('{{ $field }}')" class="w-3 h-3 ml-1 cursor-pointer"
             aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            @if($currentField === $field && $currentDirection === 'asc')
                <path d="M8.25 6.75L12 3m0 0l3.75 3.75M12 3v18" stroke-linecap="round" stroke-linejoin="round" />
            @elseif($currentField === $field && $currentDirection === 'desc')
                <path d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3" stroke-linecap="round" stroke-linejoin="round" />
            @else
                <path d="M3 7.5L7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" stroke-linecap="round" stroke-linejoin="round" />
            @endif
        </svg>
    </div>
</th>
