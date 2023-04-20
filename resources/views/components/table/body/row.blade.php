<tr class="
    @if($border) border-b border-accent-400 dark:border-accent-600 @endif
    @if($stripe) bg-accent-100 dark:bg-accent-900 @endif
    @if($hover) hover:bg-accent-200 dark:hover:bg-accent-800 @endif">
    {{ $slot }}
</tr>
