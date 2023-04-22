<div>
    <div class="mb-3">
        <x-form.input.checkbox
            id="ignore_freeze" updatable
            :model="\App\Models\Components\Modeled\Model::livewire('ignore_freeze', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)">
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

            @foreach($leaderboard as $place => $team)
                <x-table.body.row :hover="false" :border="!$loop->last">
                    <x-table.body.cell>{{ $place }}</x-table.body.cell>
                    <x-table.body.cell>{{ $team['name'] }}</x-table.body.cell>
                    <x-table.body.cell>{{ $team['points'] }}</x-table.body.cell>
                    <x-table.body.cell>{{ $team['human_friendly_total_resolution_time'] }}</x-table.body.cell>
                </x-table.body.row>
            @endforeach
        </x-table.x>
    </div>
</div>
