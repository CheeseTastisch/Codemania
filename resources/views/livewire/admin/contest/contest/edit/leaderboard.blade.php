<div wire:init="initData">
    @if($loadData)
        <div class="mb-3">
            <x-form.input.checkbox
                id="ignore_freeze" updatable
                :model="\App\Models\Components\Modeled\Model::livewire('ignore_freeze')">
                Eingefrorene Punkte ignorieren
            </x-form.input.checkbox>
        </div>

        <div wire:poll.10s>
            <x-table.x>
                <x-slot name="header">
                    <x-table.header.simple name="#" />
                    <x-table.header.simple name="Team" />
                    <x-table.header.simple name="Punkte" />
                    <x-table.header.simple name="Lösungszeit" />
                </x-slot>

                @foreach($leaderboard as $team)
                    <x-table.body.row :hover="false" :border="!$loop->last">
                        <x-table.body.cell>{{ $team->get('place') }}</x-table.body.cell>
                        <x-table.body.cell>{{ $team->get('name') }}</x-table.body.cell>
                        <x-table.body.cell>{{ $team->get('points') }}</x-table.body.cell>
                        <x-table.body.cell>{{ $team->get('human_friendly_total_resolution_time') }}</x-table.body.cell>
                    </x-table.body.row>
                @endforeach
            </x-table.x>
        </div>
    @endif

    <div class="flex justify-end mt-3">
        <x-button.big.link id="fullLeader" href="{{ route('admin.contest.contest.leaderboard', $contest) }}">
            Gesamtes Leaderboard anzeigen
        </x-button.big.link>
    </div>
</div>
