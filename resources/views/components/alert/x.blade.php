<div id="alert-additional-content-1" class="p-4 border rounded-lg {{ $byStyle([
    \App\Models\Components\Styled\Style::Info->value => 'text-blue-800 border-blue-300 bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800',
    \App\Models\Components\Styled\Style::Danger->value => 'text-red-800 border-red-300 bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800',
    \App\Models\Components\Styled\Style::Success->value => 'text-green-800 border-green-300 bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800',
    \App\Models\Components\Styled\Style::Warning->value => 'text-yellow-800 border-yellow-300 bg-yellow-50 dark:bg-gray-800 dark:text-yellow-400 dark:border-yellow-800',
    \App\Models\Components\Styled\Style::Accent->value => 'text-accent-800 border-accent-300 bg-accent-50 dark:bg-gray-800 dark:text-accent-400 dark:border-accent-800',
]) }}" role="alert">
    @if($title != '')
        <div class="mb-2 flex items-center">
            @switch($style->value)
                @case(\App\Models\Components\Styled\Style::Danger->value)
                    <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" fill-rule="evenodd"></path></svg>
                    @break
                @case(\App\Models\Components\Styled\Style::Success->value)
                    <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">  <path clip-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" fill-rule="evenodd"></path></svg>
                    @break
                @case(\App\Models\Components\Styled\Style::Warning->value)
                    <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" fill-rule="evenodd"></path></svg>
                    @break
                @default
                    <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            @endswitch
            <span class="sr-only">{{ $srInfo }}</span>
            <h3 class="text-lg font-medium">{{ $title }}</h3>
        </div>
    @endif
    <div class="text-sm">
        {{ $slot }}
    </div>

    @if(($actions ?? false) !== false)
        <div class="flex mt-4">
            {{ $actions }}
        </div>
    @endif
</div>
