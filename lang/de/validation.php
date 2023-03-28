<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute muss akzeptiert werden.',
    'accepted_if' => ':attribute muss akzeptiert werden, wenn :other ":value" ist.',
    'active_url' => ' :attribute ist keine gültige URL.',
    'after' => ':attribute muss ein Datum nach :date sein.',
    'after_or_equal' => ':attribute muss ein Datum nach oder gleich :date sein.',
    'alpha' => ':attribute darf nur Buchstaben enthalten.',
    'alpha_dash' => ':attribute darf nur Buchstaben, Zahlen, Bindestriche und Unterstriche enthalten.',
    'alpha_num' => ':attribute darf nur Buchstaben und Zahlen enthalten.',
    'array' => ':attribute muss ein Array sein.',
    'ascii' => ':attribute darf nur ASCII-Zeichen enthalten.',
    'before' => ':attribute muss ein Datum vor :date sein.',
    'before_or_equal' => ':attribute muss ein Datum vor oder gleich :date sein.',
    'between' => [
        'array' => ':attribute muss zwischen :min und :max Elemente haben.',
        'file' => ':attribute muss zwischen :min und :max Kilobytes groß sein.',
        'numeric' => ':attribute muss zwischen :min und :max liegen.',
        'string' => ':attribute muss zwischen :min und :max Zeichen lang sein.',
    ],
    'boolean' => ':attribute muss wahr oder falsch sein.',
    'confirmed' => ':attribute stimmt nicht mit der Bestätigung überein.',
    'current_password' => 'Das Passwort ist falsch.',
    'date' => ':attribute ist kein gültiges Datum.',
    'date_equals' => ':attribute muss ein Datum gleich :date sein.',
    'date_format' => ':attribute entspricht nicht dem Format :format.',
    'decimal' => ':attribute muss :decimals Dezimalstellen haben.',
    'declined' => ':attribute muss abgelehnt sein.',
    'declined_if' => ':attribute muss abgelehnt sein, wenn :other ":value" ist.',
    'different' => ':attribute und :other müssen unterschiedlich sein.',
    'digits' => ':attribute muss :digits Stellen haben.',
    'digits_between' => ':attribute muss zwischen :min und :max Stellen haben.',
    'dimensions' => ':attribute hat ungültige Bildabmessungen.',
    'distinct' => ':attribute hat einen doppelten Wert.',
    'doesnt_end_with' => ':attribute darf nicht mit einem der folgenden Werte enden: ":values".',
    'doesnt_start_with' => ':attribute darf nicht mit einem der folgenden Werte beginnen: ":values".',
    'email' => ':attribute muss eine gültige E-Mail-Adresse sein.',
    'ends_with' => ':attribute muss mit einem der folgenden Werte enden: ":values".',
    'enum' => ':attribute ist kein gültiger Wert.',
    'exists' => ':attribute ist ungültig.',
    'file' => ':attribute muss eine Datei sein.',
    'filled' => ':attribute muss einen Wert haben.',
    'gt' => [
        'array' => ':attribute muss mehr als ":value" Elemente haben.',
        'file' => ':attribute muss größer als ":value" Kilobytes sein.',
        'numeric' => ':attribute muss größer als ":value" sein.',
        'string' => ':attribute muss länger als ":value" Zeichen sein.',
    ],
    'gte' => [
        'array' => ':attribute muss mindestens ":value" Elemente haben.',
        'file' => ':attribute muss mindestens ":value" Kilobytes groß sein.',
        'numeric' => ':attribute muss mindestens ":value" sein.',
        'string' => ':attribute muss mindestens ":value" Zeichen lang sein.',
    ],
    'image' => ':attribute muss ein Bild sein.',
    'in' => ':attribute ist ungültig.',
    'in_array' => ':attribute muss in :other enthalten sein.',
    'integer' => ':attribute muss eine ganze Zahl sein.',
    'ip' => ':attribute muss eine gültige IP-Adresse sein.',
    'ipv4' => ':attribute muss eine gültige IPv4-Adresse sein.',
    'ipv6' => ':attribute muss eine gültige IPv6-Adresse sein.',
    'json' => ':attribute muss ein gültiger JSON-String sein.',
    'lowercase' => ':attribute darf nur Kleinbuchstaben enthalten.',
    'lt' => [
        'array' => ':attribute muss weniger als ":value" Elemente haben.',
        'file' => ':attribute muss kleiner als ":value" Kilobytes sein.',
        'numeric' => ':attribute muss kleiner als ":value" sein.',
        'string' => ':attribute muss kürzer als ":value" Zeichen sein.',
    ],
    'lte' => [
        'array' => ':attribute darf nicht mehr als ":value" Elemente haben.',
        'file' => ':attribute darf maximal ":value" Kilobytes haben.',
        'numeric' => ':attribute dar maximal ":value" sein.',
        'string' => ':attribute darf maximal ":value" Zeichen haben.',
    ],
    'mac_address' => ':attribute muss eine gültige MAC-Adresse sein.',
    'max' => [
        'array' => ':attribute darf nicht mehr als :max Elemente haben.',
        'file' => ':attribute darf maximal :max Kilobytes haben.',
        'numeric' => ':attribute darf maximal :max sein.',
        'string' => ':attribute darf maximal :max Zeichen haben.',
    ],
    'max_digits' => ':attribute darf maximal :max Stellen haben.',
    'mimes' => ':attribute muss eine Datei vom Typ ":values" sein.',
    'mimetypes' => ':attribute muss eine Datei vom Typ ":values" sein.',
    'min' => [
        'array' => ':attribute muss mindestens :min Elemente haben.',
        'file' => ':attribute muss mindestens :min Kilobytes groß sein.',
        'numeric' => ':attribute muss mindestens :min sein.',
        'string' => ':attribute muss mindestens :min Zeichen lang sein.',
    ],
    'min_digits' => ':attribute muss mindestens :min Stellen haben.',
    'missing' => ':attribute muss fehlen.',
    'missing_if' => ':attribute muss fehlen, wenn :other ":value" ist.',
    'missing_unless' => ':attribute muss fehlen, wenn :other nicht ":values" ist.',
    'missing_with' => ':attribute muss fehlen, wenn ":values" vorhanden ist.',
    'missing_with_all' => ':attribute muss fehlen, wenn ":values" vorhanden sind.',
    'multiple_of' => ':attribute muss ein Vielfaches von ":value" sein.',
    'not_in' => ':attribute ist ungültig.',
    'not_regex' => ':attribute ist ungültig.',
    'numeric' => ':attribute muss eine Zahl sein.',
    'password' => [
        'letters' => ':attribute muss mindestens einen Buchstaben enthalten.',
        'mixed' => ':attribute muss mindestens einen Buchstaben und eine Zahl enthalten.',
        'numbers' => ':attribute muss mindestens eine Zahl enthalten.',
        'symbols' => ':attribute muss mindestens ein Symbol enthalten.',
        'uncompromised' => ':attribute wurde in einem Sicherheitsleck gefunden.',
    ],
    'present' => ':attribute muss vorhanden sein.',
    'prohibited' => ':attribute ist nicht erlaubt.',
    'prohibited_if' => ':attribute ist nicht erlaubt, wenn :other ":value" ist.',
    'prohibited_unless' => ':attribute ist nicht erlaubt, wenn :other nicht ":values" ist.',
    'prohibits' => ':attribute ist nicht erlaubt, wenn :other vorhanden ist.',
    'regex' => ':attribute ist ungültig.',
    'required' => ':attribute ist erforderlich.',
    'required_array_keys' => ':attribute muss mindestens einen der folgenden Schlüssel enthalten: :keys.',
    'required_if' => ':attribute ist erforderlich, wenn :other ":value" ist.',
    'required_if_accepted' => ':attribute ist erforderlich, wenn :other akzeptiert wird.',
    'required_unless' => ':attribute ist erforderlich, wenn :other nicht ":values" ist.',
    'required_with' => ':attribute ist erforderlich, wenn ":values" vorhanden ist.',
    'required_with_all' => ':attribute ist erforderlich, wenn ":values" vorhanden sind.',
    'required_without' => ':attribute ist erforderlich, wenn ":values" nicht vorhanden ist.',
    'required_without_all' => ':attribute ist erforderlich, wenn keine der folgenden Werte vorhanden sind: ":values".',
    'same' => ':attribute und :other müssen übereinstimmen.',
    'size' => [
        'array' => ':attribute muss :size Elemente enthalten.',
        'file' => ':attribute muss :size Kilobytes groß sein.',
        'numeric' => ':attribute muss :size sein.',
        'string' => ':attribute muss :size Zeichen lang sein.',
    ],
    'starts_with' => ':attribute muss mit einem der folgenden Werte beginnen: ":values".',
    'string' => ':attribute muss ein String sein.',
    'timezone' => ':attribute muss eine gültige Zeitzone sein.',
    'unique' => ':attribute ist bereits vergeben.',
    'uploaded' => ':attribute konnte nicht hochgeladen werden.',
    'uppercase' => ':attribute darf nur Großbuchstaben enthalten.',
    'url' => ':attribute ist ungültig.',
    'ulid' => ':attribute muss eine gültige ULID sein.',
    'uuid' => ':attribute muss eine gültige UUID sein.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */
    'custom' => [
        'profile_picture' => [
            'required' => 'Profilbild ist erforderlich. Solltest du bereits ein Profilbild hochgeladen haben, warte bitte kurz, bis es verarbeitet wurde und versuche es erneut.',
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'email' => 'E-Mail',
        'password' => 'Passwort',
        'password_confirmation' => 'Passwortbestätigung',
        'firstname' => 'Vorname',
        'lastname' => 'Nachname',
        'privacy_policy' => 'Datenschutzerklärung',
        'two_factor' => '2FA Schlüssel',
        'nickname' => 'Nickname',
        'display_name' => 'Anzeigename',
        'birthday' => 'Geburtstag',
        'class' => 'Klasse',
        'gender' => 'Geschlecht',
        'slogan' => 'Slogan',
        'profile_picture' => 'Profilbild',
    ],

];
