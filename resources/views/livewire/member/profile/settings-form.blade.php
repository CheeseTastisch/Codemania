<x-form.form :form="false">
    <x-form.input.dropdown name="theme" label="Theme" wire wire-type="lazy" updatable>
        <x-form.input.option value="light" name="Hell"/>
        <x-form.input.option value="dark" name="Dunkel"/>
    </x-form.input.dropdown>

    <x-form.input.simple name="email" label="E-Mail" wire wire-type="lazy" updatable />

    <x-form.form space="space-y-2">
        <x-form.input.password.input name="current_password" label="Derzeitiges Passwort" wire wire-type="lazy" />
        <x-form.input.password.input name="password" label="Neues Passwort" wire wire-type="lazy" indicator />
        <x-form.input.password.input name="password_confirmation" label="Neues Passwort bestätigen" wire wire-type="lazy" />

        <x-form.button wire="changePassword" name="Passwort ändern" />
    </x-form.form>

    <x-form.form space="space-y-2">
        @if(auth()->user()->hasCompleted2Fa())
            <x-form.input.password.input name="disable_2fa_password" label="Derzeitiges Passwort" wire wire-type="lazy" />
            <x-form.input.simple name="disable_2fa_code" label="2FA Code" wire wire-type="lazy" />

            <x-form.button wire="disable2Fa" name="Zwei-Faktor-Authentifizierung deaktivieren" />
        @elseif(auth()->user()->hasEnabled2Fa())
            <div class="flex justify-center">
                {!! auth()->user()->get2FaQrCode() !!}
            </div>

            <x-form.input.simple name="confirm_2fa_code" label="2FA Code" wire wire-type="lazy" />

            <p class="text-xl">Sicherheitscodes</p>
            <p class="text-sm sm:max-w-1/2">
                Diese Codes können verwendet werden, wenn du keinen Zugriff auf deine Authentifizierungs-App hast.
                Sichere dir diese Codes und bewahre sie an einem sicheren Ort auf.
            </p>
            <div class="grid grid-rows-4 grid-cols-2">
                @foreach(auth()->user()->get2FaRecoveryCodes() as $code)
                    <span>{{ $code }}</span>
                @endforeach
            </div>

            <x-form.button wire="confirm2Fa" name="Zwei-Faktor-Authentifizierung Aktivierung abschließen" />
        @else
            <x-form.input.password.input name="enable_2fa_password" label="Derzeitiges Passwort" wire wire-type="lazy" />

            <x-form.button wire="enable2Fa" name="Zwei-Faktor-Authentifizierung aktivieren" />
        @endif
    </x-form.form>
</x-form.form>
