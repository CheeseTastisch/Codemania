<x-form.form>
    @if(session()->has('reset.success'))
        <x-alert.simple type="success" sr-info="Passwort zurückgesetzt">
            <p>Dein Passwort wurde erfolgreich zurückgesetzt.</p>
            <p class="mt-1">Du kannst dich nun mit deinem neuen Passwort anmelden.</p>
        </x-alert.simple>
    @elseif(session()->has('reset.token'))
        <x-alert.simple type="danger" sr-info="Ungültiger token">
            <p>Der Token ist ungültig oder abgelaufen.</p>
            <p class="mt-1">Bitte fordere einen neuen Link an.</p>
        </x-alert.simple>
    @else
        <x-form.input.simple name="email" label="E-Mail" wire type="hidden" />
        <x-form.input.simple name="token" label="Token" wire type="hidden" />

        <x-form.input.password.input name="password" label="Passwort" multiple-errors wire indicator />
        <x-form.input.password.input name="password_confirmation" label="Passwort wiederholen" wire />

        <x-form.button wire="resetPassword" name="Passwort zurücksetzen" />
    @endif
</x-form.form>
