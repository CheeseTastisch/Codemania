<div class="container mx-auto h-screen flex flex-col gap-5 justify-center items-center" wire:poll.10s>
    <p class="text-8xl font-bold">{{ $target->name }}</p>

    <table class="w-full text-left rounded-3xl overflow-hidden">
        <thead class="text-5xl uppercase bg-accent-700">
        <tr>
            <th class="px-6 py-3">Platz</th>
            <th class="px-6 py-3">Team</th>
            <th class="px-6 py-3">Punkte</th>
            <th class="px-6 py-3">Zeit</th>
        </tr>
        </thead>
        <tbody class="text-3xl">
        @foreach($leaderboard as $team)
            <tr class="@if(!$loop->last) border-b border-accent-600 @endif @if($loop->even) bg-accent-900 @endif">
                <th class="px-6 py-3 font-bold">{{ $team->get('place') }}</th>
                <td class="px-6 py-3">{{ $team->get('name') }}</td>
                <td class="px-6 py-3">{{ $team->get('points') }}</td>
                <td class="px-6 py-3">{{ $team->get('human_friendly_total_resolution_time') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
