@if($error !== '' && $errors->has($error) || $error === '')
    <x-alert.x :style="\App\Models\Components\Styled\Style::Danger">
        <p class="font-semibold">{{ $message }}</p>
        <p class="mt-1" @if($poll) wire:poll.500ms @endif>
            Bitte versuche es in @switch($from)
                @case('message')
                    {{ $errors->first($error) }}
                    @break
                @case('alpinejs')
                    <span x-text='{{ $value }}'></span>
                    @break
                @default
                    {{ $value }}
            @endswitch Sekunden erneut.
        </p>
    </x-alert.x>
@endif
