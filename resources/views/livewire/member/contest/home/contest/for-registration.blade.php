<div class="cursor-pointer rounded-lg bg-gradient-to-tl from-accent-400 dark:from-accent-600 hover:to-accent-600 hover:dark:to-accent-400 p-4" style="{{ $contest->theme_variables }}"
    @click="modal.open('join-contest-{{ $contest->id }}')">
    <p class="font-bold text-2xl">{{ $contest->contestDay->name }}</p>
    <p class="font-bold text-xl">{{ $contest->name }}</p>
    <div class="flex justify-between mt-1">
        <p>{{ $contest->contestDay->date->format('d.m.Y') }}</p>
        @if($contest->participants_limit !== null)
            <p>{{ $contest->participants_limit - $contest->users->count() }} freie Plätze</p>
        @endif
    </div>
    <p class="mt-1">Klicke, um dich für diesen Contest anzumelden</p>

    <x-modal.confirm id="join-contest-{{ $contest->id }}">
        <p>
            Mit dem Klicke auf "Anmelden" wirst du für den Contest angemeldet.
            Du kannst dich jederzeit wieder abmelden.
        </p>

        <p class="mt-1 mb-3">
            Des weiteren akzeptierst du damit automatisch das <a href="{{ route('public.rules') }}" class="underline">Regelwerk</a> des Contests.
        </p>

        <x-button.big.livewire
            id="join-{{ $contest->id }}" action="join">
            Anmelden
        </x-button.big.livewire>
    </x-modal.confirm>
</div>
