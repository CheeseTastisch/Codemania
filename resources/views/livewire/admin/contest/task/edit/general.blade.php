<x-form.x type="container">
    <x-form.input.x
        id="name" label="Name"
        :model="\App\Models\Components\Modeled\Model::livewire('name', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        updatable />
</x-form.x>
