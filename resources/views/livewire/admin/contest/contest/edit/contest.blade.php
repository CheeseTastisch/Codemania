<x-form.x type="container">
    <x-form.input.x
        id="name" label="Name"
        :model="\App\Models\Components\Modeled\Model::livewire('name', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        updatable />

    <x-form.input.x
        id="start_time" label="Startzeit"
        :model="\App\Models\Components\Modeled\Model::livewire('start_time', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        updatable type="time" />

    <x-form.input.x
        id="end_time" label="Endzeit"
        :model="\App\Models\Components\Modeled\Model::livewire('end_time', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        updatable type="time" />

    <x-form.input.x
        id="wrong_solution_penalty" label="Strafzeit bei falscher Lösung"
        :model="\App\Models\Components\Modeled\Model::livewire('wrong_solution_penalty', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        updatable type="number" />

    <x-form.input.x
        id="freeze_leaderboard_at" label="Leaderboard einfrieren"
        :model="\App\Models\Components\Modeled\Model::livewire('freeze_leaderboard_at', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        updatable type="time" />

    <x-form.input.checkbox
        id="leaderboard_unfrozen"
        :model="\App\Models\Components\Modeled\Model::livewire('leaderboard_unfrozen', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        updatable>
        Leaderboard aktivieren
    </x-form.input.checkbox>
</x-form.x>
