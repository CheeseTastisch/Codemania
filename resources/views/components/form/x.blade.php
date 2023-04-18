@switch($type)
    @case('form')
        <form class="{{ $ySpace }}"
              @if($livewire != '' && $prevent) wire:submit.prevent="{{ $livewire }}"
              @elseif($livewire != '') wire:submit="{{ $livewire }}"
              @endif>
            {{ $slot }}
        </form>
        @break
    @default
        <div class="{{ $ySpace }}">
            {{ $slot }}
        </div>
        @break
@endswitch
