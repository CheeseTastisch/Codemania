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
        px-5 py-3 text-base font-medium text-center  rounded-lg focus:ring-4 disabled:cursor-not-allowed"
        @if($prevent) wire:click.prevent="{{ $action }}" @else wire:click="{{ $action }} @endif"
        @if($loading) wire:target="{{ $action }}" wire:loading.attr="disabled"@endif>
    @if($loading)
        <span wire:loading.remove wire:target="{{ $action }}">{{ $slot }}</span>
        <span wire:loading wire:target="{{ $action }}">
            <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-gray-200 animate-spin dark:text-gray-600 fill-accent-600 dark:fill-accent-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="fillColor"/></svg>
            Lädt...
        </span>
    @else
        {{ $slot }}
    @endif
</button>
