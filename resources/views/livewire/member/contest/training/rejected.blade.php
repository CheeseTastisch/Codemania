<div class="w-full flex-col flex items-center p-1">
    <p>Leider falsche abgabe!</p>
    <p class="mb-4">Du kannst es jedoch nochmal versuchen:</p>

    @livewire('member.contest.training.pending', [
            'level' => $level,
            'levelSubmission' => $team->levelSubmissions
                        ->where('level_id', $level->id)
                        ->filter(fn($levelSubmission) => $levelSubmission->status === 'pending')
                        ->sortByDesc('status_changed_at')
                        ->first(),
            'team' => $team,
        ], key(array_id([$level->id, 'pending'])))

    <img src="{{ route('public.file', $levelSubmission->image_file_id) }}" alt="Meme" class="md:w-2/3 lg:w-1/3 3xl:w-1/4 w-full my-4">
</div>
