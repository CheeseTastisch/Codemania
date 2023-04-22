<x-form.x type="container">
    <x-form.input.x
        id="level" label="Level"
        :model="\App\Models\Components\Modeled\Model::livewire('levelNumber', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        updatable />

    <x-form.input.x
        id="points" label="Punkte"
        :model="\App\Models\Components\Modeled\Model::livewire('points', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        updatable type="number" />

    <x-form.input.checkbox
        id="instantlyRated"
        :model="\App\Models\Components\Modeled\Model::livewire('instantlyRated', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)" updatable>
        Sofort werten
    </x-form.input.checkbox>

    <x-form.input.file
        id="descriptionFile" label="Beschreibung"
        accept="application/pdf"
        :model="\App\Models\Components\Modeled\Model::livewire('descriptionFile', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        updatable />
</x-form.x>
