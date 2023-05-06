<div class="space-y-3" wire:poll.60s>
    <x-card.x title="{{ $contest->name }}">
        <p class="text-xl font-bold">Vielen Dank für deine Teilnahme am Contest!</p>

        @if($contest->contestDay->registration_deadline?->isPast())
            <p class="mt-2">Da die Anmeldefrist bereits abgelaufen ist, kannst du dein Team nicht mehr ändern.</p>
            <p class="mt-1">Du kannst den Contest jedoch noch verlassen.</p>
            <p class="text-danger-400 dark:text-danger-600">Bitte beachte, dass du nach dem Verlassen des Contests nicht mehr zurückkehren kannst!</p>
            <p class="mb-3">Des weiteren kann es sein, dass ein Teammitglied dann alleine im Team ist und somit alleine antreten muss.</p>
        @elseif($contest->contestDay->registration_deadline !== null)
            <p class="mb-3">Du kannst dein Team noch bis zum Ende der Anmeldefrist ({{ $contest->contestDay->registration_deadline->format('d.m.Y') }}) ändern.</p>
        @else
            <p class="mb-3">Du kannst dein Team noch bis zum Start des Contests ({{ $contest->start_time->format('d.m.Y') }}) ändern.</p>
        @endif

        <x-button.big.livewire id="leave-contest" action="leaveContest">
            Contest verlassen
        </x-button.big.livewire>

        <p class="mt-1">Du kannst den Contest jederzeit verlassen, indem du auf den Button klickst.</p>

        <p class="mt-3">
            Durch die Teilnahme am Contest erklärst du dich mit dem
            <a href="{{ route('public.rules') }}" class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400">Regelwerk</a>
            einverstanden.
        </p>
    </x-card.x>

    <x-card.x title="Team">
{{--        @livewire('member.contest.team.team', ['contest' => $contest], key($contest->contestDay->registration_deadline?->isPast() ? 0 : 1))--}}
    </x-card.x>
</div>
