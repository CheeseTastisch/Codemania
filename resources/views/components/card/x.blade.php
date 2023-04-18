<div class="overflow-hidden p-4 rounded-lg border-2 shadow-lg {{
    match ($maxWidth) {
        'sm' => 'w-full max-w-sm',
        'md' => 'w-full max-w-md',
        'lg' => 'w-full max-w-lg',
        'xl' => 'w-full max-w-xl',
        '2xl' => 'w-full max-w-2xl',
        '3xl' => 'w-full max-w-3xl',
        '4xl' => 'w-full max-w-4xl',
        '5xl' => 'w-full max-w-5xl',
        '6xl' => 'w-full max-w-6xl',
        '7xl' => 'w-full max-w-7xl',
        default => '',
    }
}} {{ $byStyle([
    \App\Models\Components\Styled\Style::Info->value => 'border-info-400 dark:border-info-600',
    \App\Models\Components\Styled\Style::Danger->value => 'border-red-400 dark:border-red-600',
    \App\Models\Components\Styled\Style::Success->value => 'border-green-400 dark:border-green-600',
    \App\Models\Components\Styled\Style::Warning->value => 'border-yellow-400 dark:border-yellow-600',
    \App\Models\Components\Styled\Style::Accent->value => 'border-accent-400 dark:border-accent-600',
]) }}">
    @if($title != '')
        <div class="px-4 py-3 font-bold text-xl">
            <h3>{{ $title }}</h3>
        </div>
    @endif

    <div class="px-4 py-3">
        {{ $slot }}
    </div>
</div>
