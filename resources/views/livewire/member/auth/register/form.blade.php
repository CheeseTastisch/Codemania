<x-form.x>
    <x-form.alerts.rate-limit
        message="Du hast zu viele Registrierungsversuche unternommen"
        error="rateLimit"
        poll="500ms" />

    @if(!$errors->has('rateLimit'))
        <x-form.input.x
            id="email" label="E-Mail"
            :model="\App\Models\Components\Modeled\Model::livewire('email', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)"
            type="email" />

        <div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <x-form.input.x
                    id="firstname" label="Vorname"
                    :model="\App\Models\Components\Modeled\Model::livewire('firstname', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)"/>

                <x-form.input.x
                    id="lastname" label="Nachname"
                    :model="\App\Models\Components\Modeled\Model::livewire('lastname', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)"/>
            </div>

            <p class="text-xs mt-2">
                Du kannst deinen Anzeigenamen später in deinem Profil ändern.
            </p>
        </div>

        <x-form.input.password
            id="password" label="Passwort"
            :model="\App\Models\Components\Modeled\Model::livewire('password', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)"
            indicated />

        <x-form.input.password
            id="password_confirmation" label="Passwort bestätigen"
            :model="\App\Models\Components\Modeled\Model::livewire('password_confirmation', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

        <x-form.input.checkbox id="privacy_policy" :model="\App\Models\Components\Modeled\Model::livewire('privacy_policy', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)">
            Ich habe die
            <a href="{{ route('public.privacy_policy') }}" class="text-accent-400 dark:text-accent-600 hover:underline">Datenschutzerklärung</a>
            gelesen und akzeptiere diese.
        </x-form.input.checkbox>

        <x-button.big.livewire id="register" action="register" type="submit" full-width>
            Registrieren
        </x-button.big.livewire>
    @endif
</x-form.x>
