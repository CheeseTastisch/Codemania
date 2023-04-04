<x-form.form>
    <x-form.rate-limit first-line="Du hast zu viele Anmeldeversuche unternommen"/>

    @if(!$errors->has('rateLimit'))
        <x-form.input.simple name="email" label="E-Mail" wire/>

        <x-form.input.simple name="password" label="Passwort" type="password" wire/>

        <div class="flex items-start">
            <x-form.input.checkbox name="remember" wire>
                Daten merken
            </x-form.input.checkbox>

            <a href="{{ route('member.auth.password.request') }}"
               class="ml-auto text-sm hover:underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400">
                Passwort vergessen?
            </a>
        </div>

        <x-form.button wire="login" name="Anmelden"/>

        <div class="text-sm font-medium dark:text-white">
            Noch keinen Account?
            <a href="{{ route('member.auth.register') }}"
               class="hover:underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400">
                Jetzt Registrieren!
            </a>
        </div>
    @endif
</x-form.form>
