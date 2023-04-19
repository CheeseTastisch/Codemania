<button type="{{ $type }}" id="{{ $id }}"
        class="{{ $byStyle([
            \App\Models\Components\Styled\OutlinedStyle::OutlinedInfo->value => 'text-blue-400 border-blue-400 hover:bg-blue-400 hover:text-white focus:ring-blue-300 dark:hover:bg-blue-600 dark:border-blue-600 dark:text-blue-600 dark:hover:text-white dark:focus:ring-blue-800',
            \App\Models\Components\Styled\OutlinedStyle::OutlinedDanger->value => 'text-red-400 border-red-400 hover:bg-red-400 hover:text-white focus:ring-red-300 dark:hover:bg-red-600 dark:border-red-600 dark:text-red-600 dark:hover:text-white dark:focus:ring-red-800',
            \App\Models\Components\Styled\OutlinedStyle::OutlinedSuccess->value => 'text-green-400 border-green-400 hover:bg-green-400 hover:text-white focus:ring-green-300 dark:hover:bg-green-600 dark:border-green-600 dark:text-green-600 dark:hover:text-white dark:focus:ring-green-800',
            \App\Models\Components\Styled\OutlinedStyle::OutlinedWarning->value => 'text-yellow-400 border-yellow-400 hover:bg-yellow-400 hover:text-white focus:ring-yellow-300 dark:hover:bg-yellow-600 dark:border-yellow-600 dark:text-yellow-600 dark:hover:text-white dark:focus:ring-yellow-800',
            \App\Models\Components\Styled\OutlinedStyle::OutlinedAccent->value => 'text-accent-400 border-accent-400 hover:bg-accent-400 hover:text-white focus:ring-accent-300 dark:hover:bg-accent-600 dark:border-accent-600 dark:text-accent-600 dark:hover:text-white dark:focus:ring-accent-800',
            \App\Models\Components\Styled\OutlinedStyle::FilledInfo->value => 'bg-blue-400 hover:bg-blue-500 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-500 dark:focus:ring-blue-800',
            \App\Models\Components\Styled\OutlinedStyle::FilledDanger->value => 'bg-red-400 hover:bg-red-500 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-500 dark:focus:ring-red-800',
            \App\Models\Components\Styled\OutlinedStyle::FilledSuccess->value => 'bg-green-400 hover:bg-green-500 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800',
            \App\Models\Components\Styled\OutlinedStyle::FilledWarning->value => 'bg-yellow-400 hover:bg-yellow-500 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-500 dark:focus:ring-yellow-800',
            \App\Models\Components\Styled\OutlinedStyle::FilledAccent->value => 'bg-accent-400 hover:bg-accent-500 focus:ring-accent-300 dark:bg-accent-600 dark:hover:bg-accent-500 dark:focus:ring-accent-800'
        ]) }}
        @if($isOutlined()) bg-transparent border focus:outline-none @endif
         @if($fullWidth) w-full @endif
        px-5 py-3 text-base font-medium text-center  rounded-lg focus:ring-4 disabled:cursor-not-allowed">
    {{ $slot }}
</button>
