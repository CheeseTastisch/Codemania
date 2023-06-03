<x-form.x>
    <x-form.alerts.rate-limit
        message="Du hast zu viele Anmeldeversuche unternommen."
        error="rateLimit"
        poll="500ms" />

    @if(!$errors->has('rateLimit'))
        <x-form.input.x
            id="two_factor"
            label="Zwei-Faktor-Authentifizierungscode"
            :model="\App\Models\Components\Modeled\Model::livewire('two_factor')" />

        <x-button.big.livewire id="check" action="check" type="submit" full-width>
            Überprüfen
        </x-button.big.livewire>
    @endif
</x-form.x>
