<div class="space-y-3" wire:poll.60s>
    <x-card.x title="{{ $contest->name }}">
        <p class="text-xl font-bold">Vielen Dank für deine Teilnahme am Contest!</p>

        <p class="mt-1">Wir wünschen dir viel Erfolg!</p>

        <p class="mt-3">Du kannst den Contest jederzeit verlassen.</p>
        <p>Bitte beachte, dass du den Contest nach Ende der Anmeldefrist nicht mehr betreten kannst, wenn du ihn verlassen hast.</p>
        <p>Des weiteren kann es sein, dass einer deiner Teammitglieder alleine bleibt und somit alleine am Contest teilnehmen muss.</p>

        <div class="flex justify-center mt-3">
            <x-button.big.livewire id="leave-contest" action="leaveContest">
                Contest verlassen
            </x-button.big.livewire>
        </div>
    </x-card.x>

    <x-card.x title="Team">
{{--        @livewire('member.contest.team.team', ['contest' => $contest], key($contest->contestDay->registration_deadline?->isPast() ? 0 : 1))--}}
    </x-card.x>
</div>
