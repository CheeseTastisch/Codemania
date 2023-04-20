<x-form.x>
    @if(session()->has('request.send'))
        <x-alert.x :style="\App\Models\Components\Styled\Style::Success">
            <p>Wir haben versucht dir eine E-Mail mit einem Link zum Zurücksetzen deines Passworts zu senden.</p>
            <p class="mt-1">Bitte beachte jedoch, dass diese Meldung auch angezeigt wird, wenn die E-Mail-Adresse nicht in unserer Datenbank gefunden wurde.</p>
            <p class="mt-2">Solltest du keine E-Mail erhalten haben, überprüfe bitte auch deinen Spam-Ordner.</p>
            <p class="mt-1">Der Link ist für 30 Minuten gültig, danach musst du eine neue Anfrage stellen.</p>
        </x-alert.x>
    @else
        <x-form.input.x
            id="email" label="E-Mail"
            :model="\App\Models\Components\Modeled\Model::livewire('email', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

        <x-button.big.livewire
            id="send" action="send"
            prevent loading full-width>
            Link senden
        </x-button.big.livewire>
    @endif
</x-form.x>
