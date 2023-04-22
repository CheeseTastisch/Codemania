<x-form.x type="container">
    <x-form.input.x
        id="name" label="Name"
        :model="\App\Models\Components\Modeled\Model::livewire('name', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        updatable />

    <x-form.input.date
        id="date" label="Datum"
        :model="\App\Models\Components\Modeled\Model::livewire('date')"
        updatable />

    <x-form.input.date
        id="registration_deadline" label="Anmeldefrist"
        :model="\App\Models\Components\Modeled\Model::livewire('registration_deadline')"
        updatable />

    <x-form.input.date
        id="allow_training_from" label="Training erlaubt ab"
        :model="\App\Models\Components\Modeled\Model::livewire('allow_training_from')"
        updatable />

    <x-form.input.checkbox
        id="current"
        :model="\App\Models\Components\Modeled\Model::livewire('current', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        updatable>
        Aktueller Tag (wird auf der Startseite angezeigt, setzt alle anderen Tage auf nicht aktuell)
    </x-form.input.checkbox>
</x-form.x>
