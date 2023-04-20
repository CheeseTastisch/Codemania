<x-form.x>
    @if(session()->has('reset.success'))
        <x-alert.x :style="\App\Models\Components\Styled\Style::Success">
            <p>Dein Passwort wurde erfolgreich zurückgesetzt.</p>
            <p class="mt-1">Du kannst dich nun mit deinem neuen Passwort anmelden.</p>
        </x-alert.x>
    @elseif(session()->has('reset.token'))
        <x-alert.x :style="\App\Models\Components\Styled\Style::Danger">
            <p>Der Token ist ungültig oder abgelaufen.</p>
            <p class="mt-1">Bitte fordere einen neuen Link an.</p>
        </x-alert.x>
    @else
        <x-form.input.hidden
            id="email" :model="\App\Models\Components\Modeled\Model::livewire('email', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

        <x-form.input.hidden
            id="token" :model="\App\Models\Components\Modeled\Model::livewire('token', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

        <x-form.input.password
            id="password" label="Passwort"
            :model="\App\Models\Components\Modeled\Model::livewire('password', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)"
            indicated />

        <x-form.input.password
            id="password_confirmation" label="Passwort wiederholen"
            :model="\App\Models\Components\Modeled\Model::livewire('password_confirmation', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

        <x-button.big.livewire
            id="resetPassword" action="resetPassword"
            prevent loading full-width>
            Passwort zurücksetzen
        </x-button.big.livewire>
    @endif
</x-form.x>
