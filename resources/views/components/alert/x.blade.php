<div id="alert-additional-content-1" class="p-4 border rounded-lg {{ $byStyle([
    \App\Models\Components\Styled\Style::Info->value => 'text-blue-800 border-blue-300 bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800',
    \App\Models\Components\Styled\Style::Danger->value => 'text-red-800 border-red-300 bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800',
    \App\Models\Components\Styled\Style::Success->value => 'text-green-800 border-green-300 bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800',
    \App\Models\Components\Styled\Style::Warning->value => 'text-yellow-800 border-yellow-300 bg-yellow-50 dark:bg-gray-800 dark:text-yellow-400 dark:border-yellow-800',
    \App\Models\Components\Styled\Style::Accent->value => 'text-accent-800 border-accent-300 bg-accent-50 dark:bg-gray-800 dark:text-accent-400 dark:border-accent-800',
]) }}" role="alert">
    <div class="flex items-center">
        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">{{ $srInfo }}</span>
        <h3 class="text-lg font-medium">{{ $title }}</h3>
    </div>
    <div class="mt-2 text-sm">
        {{ $slot }}
    </div>

    @if(($actions ?? false) !== false)
        <div class="flex mt-4">
            {{ $actions }}
        </div>
    @endif
</div>
