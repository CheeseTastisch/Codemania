<div wire:init="initData">
    <div class="mb-3">
        <x-form.input.checkbox
            id="ignore_freeze" updatable
            :model="\App\Models\Components\Modeled\Model::livewire('ignore_freeze', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)">
            Eingefrorene Punkte auch anzeigen
        </x-form.input.checkbox>
    </div>

    @if($loadData)
        <div wire:poll.1s>
            <x-table.x :paginator="$leaderboard">
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
</div>
