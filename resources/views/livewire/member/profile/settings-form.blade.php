<x-form.x type="container">
    <x-form.input.select
        id="theme"
        label="Theme"
        :model="\App\Models\Components\Modeled\Model::livewire('theme', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        :options="[
           ['value' => 'light', 'name' => 'Hell'],
           ['value' => 'dark', 'name' => 'Dunkel'],
        ]"
        updatable />

    <x-form.input.x
        id="email"
        label="E-Mail"
        :model="\App\Models\Components\Modeled\Model::livewire('email', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
        updatable />

    <x-form.x y-space="space-y-2">
        <x-form.input.password
            id="current_password"
            label="Derzeitiges Passwort"
            :model="\App\Models\Components\Modeled\Model::livewire('current_password', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

        <x-form.input.password
            id="password"
            label="Neues Passwort"
            :model="\App\Models\Components\Modeled\Model::livewire('password', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)"
            indicated />

        <x-form.input.password
            id="password_confirmation"
            label="Neues Passwort bestätigen"
            :model="\App\Models\Components\Modeled\Model::livewire('password_confirmation', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

        <x-button.big.livewire id="changePassword" action="changePassword" type="submit" loading>
            Passwort ändern
        </x-button.big.livewire>
    </x-form.x>

    <x-form.x y-space="space-y-2">
        @if(auth()->user()->hasCompleted2Fa())
            <x-form.input.password
                id="disable_2fa_password"
                label="Derzeitiges Passwort"
                :model="\App\Models\Components\Modeled\Model::livewire('disable_2fa_password', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

            <x-form.input.x
                id="disable_2fa_code"
                label="2FA Code"
                :model="\App\Models\Components\Modeled\Model::livewire('disable_2fa_code', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

            <x-button.big.livewire id="disable2Fa" action="disable2Fa" type="submit" loading>
                Zwei-Faktor-Authentifizierung deaktivieren
            </x-button.big.livewire>
        @elseif(auth()->user()->hasEnabled2Fa())
            <div class="flex justify-center">
                {!! auth()->user()->get2FaQrCode() !!}
            </div>

            <x-form.input.x
                id="confirm_2fa_code"
                label="2FA Code"
                :model="\App\Models\Components\Modeled\Model::livewire('confirm_2fa_code', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

            <p class="text-xl">Sicherheitscodes</p>
            <p class="text-sm sm:max-w-1/2">
                Diese Codes können verwendet werden, wenn du keinen Zugriff auf deine Authentifizierungs-App hast.
                Sichere dir diese Codes und bewahre sie an einem sicheren Ort auf. Gib sie niemals an andere Personen weiter.
            </p>
            <p class="text-sm sm:max-w-1/2">
                Es sind alle Backup-Codes unscharf, bis du über sie gehst.
                Dies ist eine Sicherheitsmaßnahme, damit du sie nicht versehentlich aufzeichnest.
            </p>
            <div class="grid grid-rows-4 grid-cols-2">
                @foreach(auth()->user()->get2FaRecoveryCodes() as $code)
                    <span class="blur-sm hover:blur-none">{{ $code }}</span>
                @endforeach
            </div>

            <x-button.big.livewire id="confirm2Fa" action="confirm2Fa" type="submit" loading>
                Zwei-Faktor-Authentifizierung Aktivierung abschließen
            </x-button.big.livewire>
        @else
            <x-form.input.password
                id="enable_2fa_password"
                label="Derzeitiges Passwort"
                :model="\App\Models\Components\Modeled\Model::livewire('enable_2fa_password', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

            <x-button.big.livewire id="enable2Fa" action="enable2Fa" type="submit" loading>
                Zwei-Faktor-Authentifizierung aktivieren
            </x-button.big.livewire>
        @endif
    </x-form.x>
</x-form.x>
