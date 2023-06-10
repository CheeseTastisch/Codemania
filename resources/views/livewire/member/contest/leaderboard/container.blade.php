<div wire:init="initData">
    @if($loadData)
        <div wire:poll.10s>
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
    @else
        <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[200px]">
        </div>
    @endif
</div>
