<x-form.form
    :form="false">

    <x-form.input.simple
        name="name"
        label="Name"
        wire
        wire-type="lazy"
        updatable />

    <x-form.input.date
        name="date"
        label="Datum"
        wire
        updatable />

    <x-form.input.date
        name="registration_deadline"
        label="Anmeldefrist"
        wire
        updatable />

    <x-form.input.date
        name="allow_training_from"
        label="Training erlaubt ab"
        wire
        updatable />

    <x-form.input.checkbox
        name="current"
        wire
        :wire-type="false"
        updatable>
        Aktueller Tag (wird auf der Startseite angezeigt, setzt alle anderen Tage auf nicht aktuell)
    </x-form.input.checkbox>

</x-form.form>
