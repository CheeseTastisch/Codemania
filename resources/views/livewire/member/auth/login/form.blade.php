<x-form.x>
    <x-form.alerts.rate-limit
        message="Du hast zu viele Anmeldeversuche unternommen"
        error="rateLimit"
        poll="500ms" />

    @if(!$errors->has('rateLimit'))
        <x-form.input.x
            id="email" label="E-Mail"
            :model="\App\Models\Components\Modeled\Model::livewire('email', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)"
            type="email" />

        <x-form.input.password
            id="password" label="Passwort"
            :model="\App\Models\Components\Modeled\Model::livewire('password', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

        <div class="flex items-start">
            <x-form.input.checkbox id="remember" :model="\App\Models\Components\Modeled\Model::livewire('remember', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)">
                Daten merken
            </x-form.input.checkbox>

            <a href="{{ route('member.auth.password.request') }}"
               class="ml-auto text-sm hover:underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400">
                Passwort vergessen?
            </a>
        </div>

        <x-button.big.livewire id="login" action="login" type="submit" full-width>
            Anmelden
        </x-button.big.livewire>

        <div class="text-sm font-medium dark:text-white text-center">
            Noch keinen Account?
            <a href="{{ route('member.auth.register') }}"
               class="hover:underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400">
                Jetzt Registrieren!
            </a>
        </div>
    @endif
</x-form.x>
