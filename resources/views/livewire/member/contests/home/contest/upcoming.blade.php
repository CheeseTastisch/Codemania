<a class="rounded-lg bg-gradient-to-tl from-accent-400 dark:from-accent-600 hover:to-accent-600 hover:dark:to-accent-400 p-4" style="{{ $contest->theme_variables }}"
   href="#">
    <p class="font-bold text-2xl">{{ $contest->contestDay->name }}</p>
    <p class="font-bold text-xl">{{ $contest->name }}</p>
    <p class="mt-1">{{ $contest->contestDay->date->format('d.m.Y') }}</p>
    <p class="mt-1">Klicke, um deine Einstellungen und dein Team für diesen Contest zu bearbeiten</p>
</a>
