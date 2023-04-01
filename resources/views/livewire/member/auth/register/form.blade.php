<x-form.form>
    <x-form.rate-limit first-line="Du hast zu viele Registrierungsversuche unternommen"/>

    @if(!$errors->has('rateLimit'))
        <x-form.input.simple name="email" label="E-Mail" wire/>

        <div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <x-form.input.simple name="firstname" label="Vorname" wire/>
                <x-form.input.simple name="lastname" label="Nachname" wire/>
            </div>

            <p class="text-xs mt-2">
                Du kannst deinen Anzeigenamen später in deinem Profil ändern.
            </p>
        </div>

        <x-form.input.password.input name="password" label="Passwort" wire indicator />

        <x-form.input.password.input name="password_confirmation" label="Passwort bestätigen" wire />

        <x-form.input.checkbox name="privacy_policy" wire>
            Ich habe die
            <a href="{{ route('public.privacy_policy') }}" class="text-accent-400 dark:text-accent-600 hover:underline">Datenschutzerklärung</a>
            gelesen und akzeptiere diese.
        </x-form.input.checkbox>

        <x-form.button wire="register" name="Registrieren"/>
    @endif
</x-form.form>
