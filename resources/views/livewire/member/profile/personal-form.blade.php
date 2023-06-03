<x-form.x type="container">
    <div class="grid md:grid-cols-2 md:gap-6">
        <x-form.input.x
            id="firstname"
            label="Vorname"
            :model="\App\Models\Components\Modeled\Model::livewire('firstname', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
            updatable />

        <x-form.input.x
            id="lastname"
            label="Nachname"
            :model="\App\Models\Components\Modeled\Model::livewire('lastname', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
            updatable />
    </div>

    <x-form.input.x
        id="nickname"
        label="Anzeigenamen"
        :model="\App\Models\Components\Modeled\Model::livewire('nickname', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        updatable />

    <x-form.input.select
        id="display_name"
        label="Anzeigename"
        :model="\App\Models\Components\Modeled\Model::livewire('display_name', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        :options="[
              ['value' => 'first_name', 'name' => 'Vorname'],
              ['value' => 'last_name', 'name' => 'Nachname'],
              ['value' => 'full_name', 'name' => 'Voller Name'],
              ['value' => 'Nickname', 'name' => 'Nickname'],
        ]"
        updatable />

    <x-form.input.x
        id="class"
        label="Klasse"
        :model="\App\Models\Components\Modeled\Model::livewire('class', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        updatable />

    <x-form.input.select
        id="gender"
        label="Geschlecht"
        :model="\App\Models\Components\Modeled\Model::livewire('gender', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        :options="[
              ['value' => 'null', 'name' => 'Keine angabe'],
              ['value' => 'm', 'name' => 'Männlich'],
              ['value' => 'f', 'name' => 'Weiblich'],
              ['value' => 'o', 'name' => 'Divers'],
        ]"
        updatable />

    <x-form.input.date
        id="birthday"
        label="Geburtsdatum"
        :model="\App\Models\Components\Modeled\Model::livewire('birthday')"
        updatable />

    <x-form.input.textarea
        id="about"
        label="Über dich"
        :model="\App\Models\Components\Modeled\Model::livewire('about', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        updatable />

    <x-form.x y-space="space-y-2">
        <x-form.input.file
            id="profile_picture"
            label="Profilbild"
            accept="image/*"
            :model="\App\Models\Components\Modeled\Model::livewire('profile_picture', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
            updatable />

        <x-button.big.livewire id="remove_profile_picture" action="removeProfilePicture" full-width>
            Profilbild entfernen
        </x-button.big.livewire>
    </x-form.x>
</x-form.x>
