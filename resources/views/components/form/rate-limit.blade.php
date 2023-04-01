@error($error)
<x-alert.simple type="danger" sr-info="Stop">
    <p class="font-semibold">{{ $firstLine }}</p>
    <p class="mt-1" @if($wirePoll) wire:poll.500ms @endif>
        Bitte versuche es in {{ $seconds == '!message!' ? $message : $seconds }} Sekunden erneut.
    </p>
</x-alert.simple>
@enderror
