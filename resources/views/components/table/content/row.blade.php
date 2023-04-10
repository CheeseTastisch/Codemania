<tr class="border-b border-accent-400 dark:border-accent-600
    @if($withStripe) bg-accent-100 dark:bg-accent-900 @endif
    @if($withHover) hover:bg-accent-200 dark:hover:bg-accent-800 @endif">
    {{ $slot }}
</tr>
