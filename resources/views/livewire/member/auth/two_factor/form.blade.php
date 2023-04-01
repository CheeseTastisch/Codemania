<x-form.form>
    <x-form.rate-limit first-line="Du hast zu viele Anmeldeversuche unternommen"/>

    @if(!$errors->has('rateLimit'))
        <x-form.input.simple name="two_factor" label="Zwei-Faktor-Authentifizierungscode" wire/>

        <x-form.button wire="check" name="Überprüfen"/>
    @endif
</x-form.form>
