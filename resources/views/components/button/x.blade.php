<button type="{{ $type }}" id="{{ $id }}"
        class="{{ $byStyle([
        \App\Models\Components\Styled\OutlinedStyle::OutlinedInfo->value => 'text-blue-800 border-blue-800 hover:bg-blue-900 hover:text-white focus:ring-blue-300 dark:hover:bg-blue-600 dark:border-blue-600 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800',
        \App\Models\Components\Styled\OutlinedStyle::OutlinedDanger->value => 'text-red-800 border-red-800 hover:bg-red-900 hover:text-white focus:ring-red-300 dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800',
        \App\Models\Components\Styled\OutlinedStyle::OutlinedSuccess->value => 'text-green-800 border-green-800 hover:bg-green-900 hover:text-white focus:ring-green-300 dark:hover:bg-green-600 dark:border-green-600 dark:text-green-500 dark:hover:text-white dark:focus:ring-green-800',
        \App\Models\Components\Styled\OutlinedStyle::OutlinedWarning->value => 'text-yellow-800 border-yellow-800 hover:bg-yellow-900 hover:text-white focus:ring-yellow-300 dark:hover:bg-yellow-600 dark:border-yellow-600 dark:text-yellow-500 dark:hover:text-white dark:focus:ring-yellow-800',
        \App\Models\Components\Styled\OutlinedStyle::OutlinedAccent->value => 'text-accent-400 border-accent-400 hover:bg-accent-500 hover:text-white focus:ring-accent-300 dark:hover:bg-accent-600 dark:border-accent-600 dark:text-accent-500 dark:hover:text-white dark:focus:ring-accent-800',
        \App\Models\Components\Styled\OutlinedStyle::FilledInfo->value => 'text-white bg-blue-800 hover:bg-blue-900 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800',
        \App\Models\Components\Styled\OutlinedStyle::FilledDanger->value => 'text-white bg-red-800 hover:bg-red-900 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800',
        \App\Models\Components\Styled\OutlinedStyle::FilledSuccess->value => 'text-white bg-green-800 hover:bg-green-900 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800',
        \App\Models\Components\Styled\OutlinedStyle::FilledWarning->value => 'text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800',
        \App\Models\Components\Styled\OutlinedStyle::FilledAccent->value => 'text-white bg-accent-400 hover:bg-accent-500 focus:ring-accent-300 dark:bg-accent-600 dark:hover:bg-accent-700 dark:focus:ring-accent-800'
    ]) }}
    @if($isOutlined()) bg-transparent border focus:ring-4 focus:outline-none font-medium rounded-lg text-xs px-3 py-1.5 text-center
    @else focus:ring-4 focus:outline-none font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center @endif">
    {{ $slot }}
</button>
