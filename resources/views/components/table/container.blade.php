<div class="relative overflow-x-auto rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 dark:text-gray-300 uppercase bg-accent-300 dark:bg-accent-700">
        <tr>
            {{ $header }}
        </tr>
        </thead>
        <tbody>
        {{ $slot }}
        </tbody>
    </table>

    @if($withPagination)
        {{ $pagination }}
    @endif
</div>
