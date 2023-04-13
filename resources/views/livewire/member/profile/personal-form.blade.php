<x-form.form :form="false">
    <div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <x-form.input.simple name="firstname" label="Vorname" wire wire-type="lazy" updatable/>
            <x-form.input.simple name="lastname" label="Nachname" wire wire-type="lazy" updatable/>
        </div>
    </div>

    <x-form.input.simple name="nickname" label="Anzeigenamen" wire wire-type="lazy" updatable/>

    <x-form.input.dropdown name="display_name" label="Anzeigename"  wire wire-type="lazy" updatable>
        <x-form.input.option value="first_name" name="Vorname"/>
        <x-form.input.option value="last_name" name="Nachname"/>
        <x-form.input.option value="full_name" name="Voller Name"/>
        <x-form.input.option value="Nickname" name="Nickname"/>
    </x-form.input.dropdown>

    <x-form.input.simple name="class" label="Klasse" wire wire-type="lazy" updatable />

    <x-form.input.dropdown name="gender" label="Geschlecht" wire wire-type="lazy" updatable>
        <x-form.input.option value="null" name="Nicht angegeben"/>
        <x-form.input.option value="m" name="Männlich"/>
        <x-form.input.option value="w" name="Weiblich"/>
        <x-form.input.option value="o" name="Divers"/>
    </x-form.input.dropdown>

    <x-form.input.date name="birthday" label="Geburtsdatum" wire updatable />

    <x-form.input.textarea name="about" label="Über dich" wire wire-type="lazy" updatable />

    <x-form.form space="space-y-2">
        <x-form.input.file name="profile_picture" label="Profilbild" wire wire-type="defer" />

        <x-form.button wire="uploadProfilePicture" name="Profilbild hochladen" />

        <x-form.button type="button" wire="removeProfilePicture" name="Profilbild entfernen" />
    </x-form.form>
</x-form.form>
