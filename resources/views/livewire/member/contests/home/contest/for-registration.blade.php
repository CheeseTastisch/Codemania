<a class="rounded-lg bg-gradient-to-tl from-accent-400 dark:from-accent-600 hover:to-accent-600 hover:dark:to-accent-400 p-4" style="{{ $contest->theme_variables }}"
   href="#">
    <p class="font-bold text-2xl">{{ $contest->contestDay->name }}</p>
    <p class="font-bold text-xl">{{ $contest->name }}</p>
    <div class="flex justify-between mt-1">
        <p>{{ $contest->contestDay->date->format('d.m.Y') }}</p>
        @if($contest->participants_limit !== null)
            <p>{{ $contest->participants_limit - $contest->users->count() }} freie Plätze</p>
        @endif
    </div>
    <p class="mt-1">Klicke, um dich für diesen Contest anzumelden</p>
</a>
