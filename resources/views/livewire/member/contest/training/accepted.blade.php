<div class="w-full flex-col flex items-center p-1">
    <p class="mb-2">Richtige abgabe!</p>

    <p class="text-2xl">{{ $level->points }}</p>
    <p class="mb-2">Punkte</p>

    <img src="{{ route('public.file', $levelSubmission->image_file_id) }}" alt="Meme" class="md:w-2/3 lg:w-1/3 3xl:w-1/4 w-full">

    <p class="mt-4">Da dies das Training ist, kannst du die Aufgabe erneut abgeben.</p>


    @livewire('member.contest.training.pending', [
            'level' => $level,
            'levelSubmission' => $team->levelSubmissions
                        ->filter(fn($levelSubmission) => $levelSubmission->status === 'pending')
                        ->sortByDesc('status_changed_at')
                        ->first(),
            'team' => $team,
        ], key(array_id([$level->id, 'pending'])))
</div>
