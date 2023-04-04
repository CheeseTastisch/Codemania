<x-form.form>
    @if(session()->has('request.send'))
        <x-alert.simple type="success" sr-info="Link gesendet">
            <p>Wir haben versucht dir eine E-Mail mit einem Link zum Zurücksetzen deines Passworts zu senden.</p>
            <p class="mt-1">Bitte beachte jedoch, dass diese Meldung auch angezeigt wird, wenn die E-Mail-Adresse nicht in unserer Datenbank gefunden wurde.</p>
            <p class="mt-2">Solltest du keine E-Mail erhalten haben, überprüfe bitte auch deinen Spam-Ordner.</p>
            <p class="mt-1">Der Link ist für 30 Minuten gültig, danach musst du eine neue Anfrage stellen.</p>
        </x-alert.simple>
    @else
        <x-form.input.simple name="email" label="E-Mail" wire />

        <x-form.button wire="send" name="Link senden" />
    @endif
</x-form.form>
