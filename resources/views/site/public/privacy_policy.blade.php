@extends('layouts.app')

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        <div class="dark:text-white">
            <div class="md:text-5xl text-3xl font-bold my-8">
                <span class="text-accent-400 dark:text-accent-600">Codemania</span> Contest
            </div>

            <div class="dark:text-white md:text-3xl text-xl mt-6 mb-3 font-bold">Datenschutz</div>

            <section id="toc" class="mb-8 dark:text-white">
                <div class="md:text-2xl text-xl mb-1">Inhaltsverzeichnis</div>
                <ul class="pl-6 list-disc">
                    <li>
                        <a href="#introduction"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Einleitung und Überblick
                        </a>
                    </li>
                    <li>
                        <a href="#scope_of_application"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Anwendungsbereich
                        </a>
                    </li>
                    <li>
                        <a href="#legal_bases"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Rechtsgrundlagen
                        </a>
                    </li>
                    <li>
                        <a href="#contact"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Kontaktdaten des Verantwortlichen
                        </a>
                    </li>
                    <li>
                        <a href="#storage_duration"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Speicherdauer
                        </a>
                    </li>
                    <li>
                        <a href="#rights"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Rechte laut Datenschutz-Grundverordnung
                        </a>
                    </li>
                    <li>
                        <a href="#third_countries"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Datenübertragung in Drittländer
                        </a>
                    </li>
                    <li>
                        <a href="#security"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Sicherheit der Datenverarbeitung
                        </a>
                    </li>
                    <li>
                        <a href="#communication"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Kommunikation
                        </a>
                    </li>
                    <li>
                        <a href="#cookies"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Cookies
                        </a>
                    </li>
                    <li>
                        <a href="#webhosting"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Webhosting Einleitung
                        </a>
                    </li>
                    <li>
                        <a href="#cookie_consent_manager"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Cookie Consent Management Platform Einleitung
                        </a>
                    </li>
                    <li>
                        <a href="#pooling"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Umfrage- und Befragungssysteme Einleitung
                        </a>
                    </li>
                    <li>
                        <a href="#webdesigb"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Webdesign Einleitung
                        </a>
                    </li>
                    <li>
                        <a href="#terms"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Erklärung verwendeter Begriffe
                        </a>
                    </li>
                    <li>
                        <a href="#final"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Schlusswort
                        </a>
                    </li>
                </ul>
            </section>

            <section id="introduction" class="mb-8 dark:text-white">
                <div class="md:text-2xl text-xl mb-1">Einleitung und Überblick</div>
                <p>
                    Wir haben diese Datenschutzerklärung (Fassung 21.03.2023-112449526) verfasst, um Ihnen gemäß der
                    Vorgaben der Datenschutz-Grundverordnung (EU) 2016/679 und anwendbaren nationalen Gesetzen zu
                    erklären, welche personenbezogenen Daten (kurz Daten) wir als Verantwortliche – und die von uns
                    beauftragten Auftragsverarbeiter (z. B. Provider) – verarbeiten, zukünftig verarbeiten werden
                    und welche rechtmäßigen Möglichkeiten Sie haben. Die verwendeten Begriffe sind
                    geschlechtsneutral zu verstehen.
                </p>

                <p class="mb-3">
                    <span class="font-bold">Kurz gesagt:</span>
                    Wir informieren Sie umfassend über Daten, die wir über Sie verarbeiten.
                </p>

                <p>
                    Datenschutzerklärungen klingen für gewöhnlich sehr technisch und verwenden juristische
                    Fachbegriffe. Diese Datenschutzerklärung soll Ihnen hingegen die wichtigsten Dinge so einfach
                    und transparent wie möglich beschreiben. Soweit es der Transparenz förderlich ist, werden
                    technische Begriffe leserfreundlich erklärt, Links zu weiterführenden Informationen geboten und
                    Grafiken zum Einsatz gebracht. Wir informieren damit in klarer und einfacher Sprache, dass wir
                    im Rahmen unserer Geschäftstätigkeiten nur dann personenbezogene Daten verarbeiten, wenn eine
                    entsprechende gesetzliche Grundlage gegeben ist. Das ist sicher nicht möglich, wenn man
                    möglichst knappe, unklare und juristisch-technische Erklärungen abgibt, so wie sie im Internet
                    oft Standard sind, wenn es um Datenschutz geht. Ich hoffe, Sie finden die folgenden
                    Erläuterungen interessant und informativ und vielleicht ist die eine oder andere Information
                    dabei, die Sie noch nicht kannten.
                </p>

                <p>
                    Wenn trotzdem Fragen bleiben, möchten wir Sie bitten, sich an die unten bzw. im Impressum
                    genannte verantwortliche Stelle zu wenden, den vorhandenen Links zu folgen und sich weitere
                    Informationen auf Drittseiten anzusehen. Unsere Kontaktdaten finden Sie selbstverständlich auch
                    im Impressum.
                </p>

            </section>
            <section id="scope_of_application" class="mb-8 dark:text-white">
                <div class="md:text-2xl text-xl mb-1">Anwendungsbereich</div>
                <p class="mb-3">
                    Diese Datenschutzerklärung gilt für alle von uns im Unternehmen verarbeiteten personenbezogenen
                    Daten und für alle personenbezogenen Daten, die von uns beauftragte Firmen (Auftragsverarbeiter)
                    verarbeiten. Mit personenbezogenen Daten meinen wir Informationen im Sinne des Art. 4 Nr. 1
                    DSGVO wie zum Beispiel Name, E-Mail-Adresse und postalische Anschrift einer Person. Die
                    Verarbeitung personenbezogener Daten sorgt dafür, dass wir unsere Dienstleistungen und Produkte
                    anbieten und abrechnen können, sei es online oder offline. Der Anwendungsbereich dieser
                    Datenschutzerklärung umfasst:
                </p>

                <ul class="pl-6 list-disc mb-3">
                    <li>alle Onlineauftritte (Websites, Onlineshops), die wir betreiben</li>
                    <li>Social Media Auftritte und E-Mail-Kommunikation</li>
                    <li>mobile Apps für Smartphones und andere Geräte</li>
                </ul>

                <p>
                    <span class="font-bold">Kurz gesagt:</span>
                    Die Datenschutzerklärung gilt für alle Bereiche, in denen personenbezogene Daten im Unternehmen
                    über die genannten Kanäle strukturiert verarbeitet werden. Sollten wir außerhalb dieser Kanäle
                    mit Ihnen in Rechtsbeziehungen eintreten, werden wir Sie gegebenenfalls gesondert informieren.
                </p>
            </section>
            <section id="legal_bases" class="mb-8 dark:text-white">
                <div class="md:text-2xl text-xl mb-1">Rechtsgrundlagen</div>
                <p>
                    In der folgenden Datenschutzerklärung geben wir Ihnen transparente Informationen zu den
                    rechtlichen Grundsätzen und Vorschriften, also den Rechtsgrundlagen der
                    Datenschutz-Grundverordnung, die uns ermöglichen, personenbezogene Daten zu verarbeiten.
                </p>

                <p class="mb-3">
                    Was das EU-Recht betrifft, beziehen wir uns auf die VERORDNUNG (EU) 2016/679 DES EUROPÄISCHEN
                    PARLAMENTS UND DES RATES vom 27. April 2016. Diese Datenschutz-Grundverordnung der EU können Sie
                    selbstverständlich online auf EUR-Lex, dem Zugang zum EU-Recht, unter
                    <a class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">https://eur-lex.europa.eu/legal-content/DE/ALL/?uri=celex%3A32016R0679</a>
                    nachlesen.
                </p>

                <p>Wir verarbeiten Ihre Daten nur, wenn mindestens eine der folgenden Bedingungen zutrifft:</p>
                <ol class="pl-6 list-decimal mb-3">
                    <li>
                        <span class="font-bold">Einwilligung</span>
                        (Artikel 6 Absatz 1 lit. a DSGVO): Sie haben uns Ihre Einwilligung gegeben, Daten zu einem
                        bestimmten Zweck zu verarbeiten. Ein Beispiel wäre die Speicherung Ihrer eingegebenen Daten
                        eines Kontaktformulars.
                    </li>
                    <li>
                        <span class="font-bold">Vertrag</span>
                        (Artikel 6 Absatz 1 lit. b DSGVO): Um einen Vertrag oder vorvertragliche Verpflichtungen mit
                        Ihnen zu erfüllen, verarbeiten wir Ihre Daten. Wenn wir zum Beispiel einen Kaufvertrag mit
                        Ihnen abschließen, benötigen wir vorab personenbezogene Informationen.
                    </li>
                    <li>
                        <span class="font-bold">Rechtliche Verpflichtung</span>
                        (Artikel 6 Absatz 1 lit. c DSGVO): Wenn wir einer rechtlichen Verpflichtung unterliegen,
                        verarbeiten wir Ihre Daten. Zum Beispiel sind wir gesetzlich verpflichtet Rechnungen für die
                        Buchhaltung aufzuheben. Diese enthalten in der Regel personenbezogene Daten.
                    </li>
                    <li>
                        <span class="font-bold">Berechtigte Interessen</span>
                        (Artikel 6 Absatz 1 lit. f DSGVO): Im Falle berechtigter Interessen, die Ihre Grundrechte
                        nicht einschränken, behalten wir uns die Verarbeitung personenbezogener Daten vor. Wir
                        müssen zum Beispiel gewisse Daten verarbeiten, um unsere Website sicher und wirtschaftlich
                        effizient betreiben zu können. Diese Verarbeitung ist somit ein berechtigtes Interesse.
                    </li>
                </ol>

                <p class="mb-3">
                    Weitere Bedingungen wie die Wahrnehmung von Aufnahmen im öffentlichen Interesse und Ausübung
                    öffentlicher Gewalt sowie dem Schutz lebenswichtiger Interessen treten bei uns in der Regel
                    nicht auf. Soweit eine solche Rechtsgrundlage doch einschlägig sein sollte, wird diese an der
                    entsprechenden Stelle ausgewiesen.
                </p>

                <p class="mb-3">Zusätzlich zu der EU-Verordnung gelten auch noch nationale Gesetze:</p>

                <ul class="pl-6 list-disc mb-6">
                    <li>
                        In <span class="font-bold">Österreich</span> ist dies das Bundesgesetz zum Schutz
                        natürlicher Personen bei der Verarbeitung personenbezogener Daten
                        (<span class="font-bold">Datenschutzgesetz</span>), kurz DSG.
                    </li>
                    <li>
                        In <span class="font-bold">Deutschland</span> gilt das Bundesdatenschutzgesetz, kurz BDSG.
                    </li>
                </ul>

                <p>
                    Sofern weitere regionale oder nationale Gesetze zur Anwendung kommen, informieren wir Sie in den
                    folgenden Abschnitten darüber.
                </p>
            </section>
            <section id="contact" class="mb-8 dark:text-white">
                <div class="md:text-2xl text-xl mb-1">Kontaktdaten des Verantwortlichen</div>

                <p>
                    Sollten Sie Fragen zum Datenschutz oder zur Verarbeitung personenbezogener Daten haben, finden
                    Sie nachfolgend die Kontaktdaten der verantwortlichen Person
                </p>

                <p>Lian Hörschläger</p>
                <p>Steinhumergutstraße 30</p>
                <p class="mb-3">4050 Traun, Österreich</p>

                <p>
                    E-Mail:
                    <a href="mailto:lian.hoerschlaeger@gmail.com"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        lian.hoerschlaeger@gmail.com
                    </a>
                </p>
                <p>
                    Impressum:
                    <a href="{{ route('public.imprint') }}"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        {{ route('public.imprint') }}
                    </a>
                </p>
            </section>
            <section id="storage_duration" class="mb-8 dark:text-white">
                <div class="md:text-2xl text-xl mb-1">Speicherdauer</div>

                <p class="mb-3">
                    Dass wir personenbezogene Daten nur so lange speichern, wie es für die Bereitstellung unserer
                    Dienstleistungen und Produkte unbedingt notwendig ist, gilt als generelles Kriterium bei uns.
                    Das bedeutet, dass wir personenbezogene Daten löschen, sobald der Grund für die
                    Datenverarbeitung nicht mehr vorhanden ist. In einigen Fällen sind wir gesetzlich dazu
                    verpflichtet, bestimmte Daten auch nach Wegfall des ursprüngliches Zwecks zu speichern, zum
                    Beispiel zu Zwecken der Buchführung.
                </p>

                <p class="mb-3">
                    Sollten Sie die Löschung Ihrer Daten wünschen oder die Einwilligung zur Datenverarbeitung
                    widerrufen, werden die Daten so rasch wie möglich und soweit keine Pflicht zur Speicherung
                    besteht, gelöscht.
                </p>
                <p class="mb-3">
                    Über die konkrete Dauer der jeweiligen Datenverarbeitung informieren wir Sie weiter unten,
                    sofern wir weitere Informationen dazu haben.
                </p>
            </section>
            <section id="rights" class="mb-8 dark:text-white">
                <div class="md:text-2xl text-xl mb-1">Rechte laut Datenschutz-Grundverordnung</div>

                <p class="mb-3">
                    Gemäß Artikel 13, 14 DSGVO informieren wir Sie über die folgenden Rechte, die Ihnen zustehen,
                    damit es zu einer fairen und transparenten Verarbeitung von Daten kommt:
                </p>

                <ul class="pl-6 list-disc mb-3">
                    <li>
                        Sie haben laut Artikel 15 DSGVO ein Auskunftsrecht darüber, ob wir Daten von Ihnen
                        verarbeiten. Sollte das zutreffen, haben Sie Recht darauf eine Kopie der Daten zu erhalten
                        und die folgenden Informationen zu erfahren:
                        <ul class="pl-6 list-[circle]">
                            <li>
                                zu welchem Zweck wir die Verarbeitung durchführen;
                            </li>
                            <li>
                                die Kategorien, also die Arten von Daten, die verarbeitet werden;
                            </li>
                            <li>
                                wer diese Daten erhält und wenn die Daten an Drittländer übermittelt werden, wie die
                                Sicherheit garantiert werden kann;
                            </li>
                            <li>
                                wie lange die Daten gespeichert werden;
                            </li>
                            <li>
                                das Bestehen des Rechts auf Berichtigung, Löschung oder Einschränkung der
                                Verarbeitung und dem Widerspruchsrecht gegen die Verarbeitung;
                            </li>
                            <li>
                                dass Sie sich bei einer Aufsichtsbehörde beschweren können (Links zu diesen Behörden
                                finden Sie weiter unten);
                            </li>
                            <li>
                                die Herkunft der Daten, wenn wir sie nicht bei Ihnen erhoben haben;
                            </li>
                            <li>
                                ob Profiling durchgeführt wird, ob also Daten automatisch ausgewertet werden, um zu
                                einem persönlichen Profil von Ihnen zu gelangen.
                            </li>
                        </ul>
                    </li>
                    <li>
                        Sie haben laut Artikel 16 DSGVO ein Recht auf Berichtigung der Daten, was bedeutet, dass wir
                        Daten richtig stellen müssen, falls Sie Fehler finden.
                    </li>
                    <li>
                        Sie haben laut Artikel 17 DSGVO das Recht auf Löschung („Recht auf Vergessenwerden“), was
                        konkret bedeutet, dass Sie die Löschung Ihrer Daten verlangen dürfen.
                    </li>
                    <li>
                        Sie haben laut Artikel 18 DSGVO das Recht auf Einschränkung der Verarbeitung, was bedeutet,
                        dass wir die Daten nur mehr speichern dürfen aber nicht weiter verwenden.
                    </li>
                    <li>
                        Sie haben laut Artikel 20 DSGVO das Recht auf Datenübertragbarkeit, was bedeutet, dass wir
                        Ihnen auf Anfrage Ihre Daten in einem gängigen Format zur Verfügung stellen.
                    </li>
                    <li>
                        Sie haben laut Artikel 21 DSGVO ein Widerspruchsrecht, welches nach Durchsetzung eine
                        Änderung der Verarbeitung mit sich bringt.
                        <ul class="pl-6 list-[circle]">
                            <li>
                                Wenn die Verarbeitung Ihrer Daten auf Artikel 6 Abs. 1 lit. e (öffentliches
                                Interesse, Ausübung öffentlicher Gewalt) oder Artikel 6 Abs. 1 lit. f (berechtigtes
                                Interesse) basiert, können Sie gegen die Verarbeitung Widerspruch einlegen. Wir
                                prüfen danach so rasch wie möglich, ob wir diesem Widerspruch rechtlich nachkommen
                                können.
                            </li>
                            <li>
                                Werden Daten verwendet, um Direktwerbung zu betreiben, können Sie jederzeit gegen
                                diese Art der Datenverarbeitung widersprechen. Wir dürfen Ihre Daten danach nicht
                                mehr für Direktmarketing verwenden.
                            </li>
                            <li>
                                Werden Daten verwendet, um Profiling zu betreiben, können Sie jederzeit gegen diese
                                Art der Datenverarbeitung widersprechen. Wir dürfen Ihre Daten danach nicht mehr für
                                Profiling verwenden
                            </li>
                        </ul>
                    </li>
                    <li>
                        Sie haben laut Artikel 22 DSGVO unter Umständen das Recht, nicht einer ausschließlich auf
                        einer automatisierten Verarbeitung (zum Beispiel Profiling) beruhenden Entscheidung
                        unterworfen zu werden.
                    </li>
                    <li>
                        Sie haben laut Artikel 77 DSGVO das Recht auf Beschwerde. Das heißt, Sie können sich
                        jederzeit bei der Datenschutzbehörde beschweren, wenn Sie der Meinung sind, dass die
                        Datenverarbeitung von personenbezogenen Daten gegen die DSGVO verstößt.
                    </li>
                </ul>

                <p class="mb-3">
                    <span class="font-bold">Kurz gesagt:</span>
                    Sie haben Rechte – zögern Sie nicht, die oben gelistete verantwortliche Stelle bei uns zu
                    kontaktieren!
                </p>

                <p class="mb-4">
                    Wenn Sie glauben, dass die Verarbeitung Ihrer Daten gegen das Datenschutzrecht verstößt oder
                    Ihre datenschutzrechtlichen Ansprüche in sonst einer Weise verletzt worden sind, können Sie sich
                    bei der Aufsichtsbehörde beschweren. Diese ist für Österreich die Datenschutzbehörde, deren
                    Website Sie unter
                    <a href="https://www.dsb.gv.at/"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        https://www.dsb.gv.at/
                    </a>
                    finden. In Deutschland gibt es für jedes Bundesland einen Datenschutzbeauftragten. Für nähere
                    Informationen können Sie sich an die
                    <a href="https://www.bfdi.bund.de/DE/Home/home_node.html"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        Bundesbeauftragte für den Datenschutz und die Informationsfreiheit (BfDI)
                    </a>
                    wenden. Für unser Unternehmen ist die folgende lokale Datenschutzbehörde zuständig:
                </p>

                <p class="mb-1 text-xl font-bold">
                    Österreich Datenschutzbehörde
                </p>
                <p>
                    <span class="font-bold">Leiterin:</span> Mag. Dr. Andrea Jelinek
                </p>
                <p>
                    <span class="font-bold">Adresse:</span> Barichgasse 40-42, 1030 Wien
                </p>
                <p>
                    <span class="font-bold">Telefonnr.:</span>
                    <a href="tel:+43152152-0"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        +43 1 52 152-0
                    </a>
                </p>
                <p>
                    <span class="font-bold">E-Mail-Adresse:</span>
                    <a href="mailto:dsb@dsb.gv.at"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        dsb@dsb.gv.at
                    </a>
                </p>
                <p>
                    <span class="font-bold">Website:</span>
                    <a href="https://www.dsb.gv.at/"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        https://www.dsb.gv.at/
                    </a>
                </p>
            </section>
            <section id="third_countries" class="mb-8 dark:text-white">
                <div class="md:text-2xl text-xl mb-1">Datenübertragung in Drittländer</div>
                <p class="mb-3">
                    Wir übertragen oder verarbeiten Daten nur dann in Länder außerhalb der EU (Drittländer), wenn
                    Sie dieser Verarbeitung zustimmen, dies gesetzlich vorgeschrieben ist oder vertraglich notwendig
                    und in jedem Fall nur soweit dies generell erlaubt ist. Ihre Zustimmung ist in den meisten
                    Fällen der wichtigste Grund, dass wir Daten in Drittländern verarbeiten lassen. Die Verarbeitung
                    personenbezogener Daten in Drittländern wie den USA, wo viele Softwarehersteller
                    Dienstleistungen anbieten und Ihre Serverstandorte haben, kann bedeuten, dass personenbezogene
                    Daten auf unerwartete Weise verarbeitet und gespeichert werden.
                </p>
                <p class="mb-3">
                    Wir weisen ausdrücklich darauf hin, dass nach Meinung des Europäischen Gerichtshofs derzeit kein
                    angemessenes Schutzniveau für den Datentransfer in die USA besteht. Die Datenverarbeitung durch
                    US-Dienste (wie beispielsweise Google Analytics) kann dazu führen, dass gegebenenfalls Daten
                    nicht anonymisiert verarbeitet und gespeichert werden. Ferner können gegebenenfalls
                    US-amerikanische staatliche Behörden Zugriff auf einzelne Daten nehmen. Zudem kann es vorkommen,
                    dass erhobene Daten mit Daten aus anderen Diensten desselben Anbieters, sofern Sie ein
                    entsprechendes Nutzerkonto haben, verknüpft werden. Nach Möglichkeit versuchen wir
                    Serverstandorte innerhalb der EU zu nutzen, sofern das angeboten wird.
                </p>
                <p>
                    Wir informieren Sie an den passenden Stellen dieser Datenschutzerklärung genauer über
                    Datenübertragung in Drittländer, sofern diese zutrifft.
                </p>
            </section>
            <section id="security" class="mb-8 dark:text-white">
                <div class="md:text-2xl text-xl mb-1">Sicherheit der Datenverarbeitung</div>

                <p class="mb-3">
                    Um personenbezogene Daten zu schützen, haben wir sowohl technische als auch organisatorische
                    Maßnahmen umgesetzt. Wo es uns möglich ist, verschlüsseln oder pseudonymisieren wir
                    personenbezogene Daten. Dadurch machen wir es im Rahmen unserer Möglichkeiten so schwer wie
                    möglich, dass Dritte aus unseren Daten auf persönliche Informationen schließen können.
                </p>
                <p class="mb-4">
                    Art. 25 DSGVO spricht hier von “Datenschutz durch Technikgestaltung und durch
                    datenschutzfreundliche Voreinstellungen” und meint damit, dass man sowohl bei Software (z. B.
                    Formularen) also auch Hardware (z. B. Zugang zum Serverraum) immer an Sicherheit denkt und
                    entsprechende Maßnahmen setzt. Im Folgenden gehen wir, falls erforderlich, noch auf konkrete
                    Maßnahmen ein.
                </p>

                <p class="mb-1 text-xl font-bold">
                    TLS-Verschlüsselung mit https
                </p>

                <p>
                    TLS, Verschlüsselung und https klingen sehr technisch und sind es auch. Wir verwenden HTTPS (das
                    Hypertext Transfer Protocol Secure steht für „sicheres Hypertext-Übertragungsprotokoll“), um
                    Daten abhörsicher im Internet zu übertragen.
                </p>
                <p class="mb-3">
                    Das bedeutet, dass die komplette Übertragung aller Daten von Ihrem Browser zu unserem Webserver
                    abgesichert ist – niemand kann “mithören”.
                </p>
                <p>
                    Damit haben wir eine zusätzliche Sicherheitsschicht eingeführt und erfüllen den Datenschutz
                    durch Technikgestaltung (Artikel 25 Absatz 1 DSGVO). Durch den Einsatz von TLS (Transport Layer
                    Security), einem Verschlüsselungsprotokoll zur sicheren Datenübertragung im Internet, können wir
                    den Schutz vertraulicher Daten sicherstellen.
                </p>
                <p>
                    Sie erkennen die Benutzung dieser Absicherung der Datenübertragung am kleinen Schlosssymbol
                    links oben im Browser, links von der Internetadresse (z. B. beispielseite.de) und der Verwendung
                    des Schemas https (anstatt http) als Teil unserer Internetadresse.
                </p>
                <p class="mb-">Wenn Sie mehr zum Thema Verschlüsselung wissen möchten, empfehlen wir die Google
                    Suche nach “Hypertext Transfer
                    Protocol Secure wiki” um gute Links zu weiterführenden Informationen zu erhalten.
                </p>
            </section>
            <section id="communication" class="mb-8 dark:text-white">
                <div class="md:text-2xl text-xl mb-1">Kommunikation</div>
                <div class="border border-black dark:border-white mb-4 p-2">
                    <span class="font-bold">Kommunikation Zusammenfassung</span>
                    <p>
                        👥 Betroffene: Alle, die mit uns per Telefon, E-Mail oder Online-Formular kommunizieren
                    </p>
                    <p>
                        📓 Verarbeitete Daten: z. B. Telefonnummer, Name, E-Mail-Adresse, eingegebene Formulardaten.
                        Mehr Details dazu finden Sie bei der jeweils eingesetzten Kontaktart
                    </p>
                    <p>
                        🤝 Zweck: Abwicklung der Kommunikation mit Kunden, Geschäftspartnern usw.
                    </p>
                    <p>
                        📅 Speicherdauer: Dauer des Geschäftsfalls und der gesetzlichen Vorschriften
                    </p>
                    <p>
                        ⚖️ Rechtsgrundlagen: Art. 6 Abs. 1 lit. a DSGVO (Einwilligung), Art. 6 Abs. 1 lit. b DSGVO
                        (Vertrag), Art. 6 Abs. 1 lit. f DSGVO (Berechtigte Interessen)
                    </p>
                </div>

                <p class="mb-3">
                    Wenn Sie mit uns Kontakt aufnehmen und per Telefon, E-Mail oder Online-Formular kommunizieren,
                    kann es zur Verarbeitung personenbezogener Daten kommen.
                </p>

                <p class="mb-4">
                    Die Daten werden für die Abwicklung und Bearbeitung Ihrer Frage und des damit zusammenhängenden
                    Geschäftsvorgangs verarbeitet. Die Daten während eben solange gespeichert bzw. solange es das
                    Gesetz vorschreibt.
                </p>

                <p class="text-xl font-bold mb-1">Betroffene Personen</p>
                <p class="mb-4">
                    Von den genannten Vorgängen sind alle betroffen, die über die von uns bereit gestellten
                    Kommunikationswege den Kontakt zu uns suchen.
                </p>

                <p class="text-xl font-bold mb-1">Telefon</p>
                <p class="mb-4">
                    Wenn Sie uns anrufen, werden die Anrufdaten auf dem jeweiligen Endgerät und beim eingesetzten
                    Telekommunikationsanbieter pseudonymisiert gespeichert. Außerdem können Daten wie Name und
                    Telefonnummer im Anschluss per E-Mail versendet und zur Anfragebeantwortung gespeichert werden.
                    Die Daten werden gelöscht, sobald der Geschäftsfall beendet wurde und es gesetzliche Vorgaben
                    erlauben.
                </p>

                <p class="text-xl font-bold mb-1">E-Mail</p>
                <p class="mb-4">
                    Wenn Sie mit uns per E-Mail kommunizieren, werden Daten gegebenenfalls auf dem jeweiligen
                    Endgerät (Computer, Laptop, Smartphone,…) gespeichert und es kommt zur Speicherung von Daten auf
                    dem E-Mail-Server. Die Daten werden gelöscht, sobald der Geschäftsfall beendet wurde und es
                    gesetzliche Vorgaben erlauben.
                </p>

                <p class="text-xl font-bold mb-1">Online Formulare</p>
                <p class="mb-4">
                    Wenn Sie mit uns mittels Online-Formular kommunizieren, werden Daten auf unserem Webserver
                    gespeichert und gegebenenfalls an eine E-Mail-Adresse von uns weitergeleitet. Die Daten werden
                    gelöscht, sobald der Geschäftsfall beendet wurde und es gesetzliche Vorgaben erlauben.
                </p>

                <p class="text-xl font-bold mb-1">Rechtsgrundlagen</p>
                <p class="mb-3">Die Verarbeitung der Daten basiert auf den folgenden Rechtsgrundlagen:</p>

                <ul class="pl-6 list-disc">
                    <li>
                        Art. 6 Abs. 1 lit. a DSGVO (Einwilligung): Sie geben uns die Einwilligung Ihre Daten zu
                        speichern und weiter für den Geschäftsfall betreffende Zwecke zu verwenden;
                    </li>
                    <li>
                        Art. 6 Abs. 1 lit. b DSGVO (Vertrag): Es besteht die Notwendigkeit für die Erfüllung eines
                        Vertrags mit Ihnen oder einem Auftragsverarbeiter wie z. B. dem Telefonanbieter oder wir
                        müssen die Daten für vorvertragliche Tätigkeiten, wie z. B. die Vorbereitung eines Angebots,
                        verarbeiten;
                    </li>
                    <li>
                        Art. 6 Abs. 1 lit. f DSGVO (Berechtigte Interessen): Wir wollen Kundenanfragen und
                        geschäftliche Kommunikation in einem professionellen Rahmen betreiben. Dazu sind gewisse
                        technische Einrichtungen wie z. B. E-Mail-Programme, Exchange-Server und Mobilfunkbetreiber
                        notwendig, um die Kommunikation effizient betreiben zu können.
                    </li>
                </ul>
            </section>
            <section id="cookies" class="mb-8 dark:text-white">
                <div class="md:text-2xl text-xl mb-1">Cookies</div>
                <div class="border border-black dark:border-white mb-4 p-2">
                    <span class="font-bold">Cookies Zusammenfassung</span>
                    <p>👥 Betroffene: Besucher der Website</p>
                    <p>
                        🤝 Zweck: abhängig vom jeweiligen Cookie. Mehr Details dazu finden Sie weiter unten bzw. beim
                        Hersteller der Software, der das Cookie setzt.
                    </p>
                    <p>
                        📓 Verarbeitete Daten: Abhängig vom jeweils eingesetzten Cookie. Mehr Details dazu finden Sie
                        weiter unten bzw. beim Hersteller der Software, der das Cookie setzt.
                    </p>
                    <p>
                        📅 Speicherdauer: abhängig vom jeweiligen Cookie, kann von Stunden bis hin zu Jahren
                        variieren
                    </p>
                    <p>
                        ⚖️ Rechtsgrundlagen: Art. 6 Abs. 1 lit. a DSGVO (Einwilligung), Art. 6 Abs. 1 lit.f DSGVO
                        (Berechtigte Interessen)
                    </p>
                </div>

                <p class="text-xl font-bold mb-1">Was sind Cookies?</p>
                <p class="mb-3">Unsere Website verwendet HTTP-Cookies, um nutzerspezifische Daten zu speichern.</p>
                <p class="mb-3">
                    Im Folgenden erklären wir, was Cookies sind und warum Sie genutzt werden, damit Sie die folgende
                    Datenschutzerklärung besser verstehen.
                </p>
                <p class="mb-3">
                    Immer wenn Sie durch das Internet surfen, verwenden Sie einen Browser. Bekannte Browser sind
                    beispielsweise Chrome, Safari, Firefox, Internet Explorer und Microsoft Edge. Die meisten
                    Websites speichern kleine Text-Dateien in Ihrem Browser. Diese Dateien nennt man Cookies.
                </p>
                <p class="mb-3">
                    Eines ist nicht von der Hand zu weisen: Cookies sind echt nützliche Helferlein. Fast alle
                    Websites verwenden Cookies. Genauer gesprochen sind es HTTP-Cookies, da es auch noch andere
                    Cookies für andere Anwendungsbereiche gibt. HTTP-Cookies sind kleine Dateien, die von unserer
                    Website auf Ihrem Computer gespeichert werden. Diese Cookie-Dateien werden automatisch im
                    Cookie-Ordner, quasi dem “Hirn” Ihres Browsers, untergebracht. Ein Cookie besteht aus einem
                    Namen und einem Wert. Bei der Definition eines Cookies müssen zusätzlich ein oder mehrere
                    Attribute angegeben werden.
                </p>
                <p class="mb-3">
                    Cookies speichern gewisse Nutzerdaten von Ihnen, wie beispielsweise Sprache oder persönliche
                    Seiteneinstellungen. Wenn Sie unsere Seite wieder aufrufen, übermittelt Ihr Browser die
                    „userbezogenen“ Informationen an unsere Seite zurück. Dank der Cookies weiß unsere Website, wer
                    Sie sind und bietet Ihnen die Einstellung, die Sie gewohnt sind. In einigen Browsern hat jedes
                    Cookie eine eigene Datei, in anderen wie beispielsweise Firefox sind alle Cookies in einer
                    einzigen Datei gespeichert.
                </p>
                <p class="mb-3">
                    Die folgende Grafik zeigt eine mögliche Interaktion zwischen einem Webbrowser wie z. B. Chrome
                    und dem Webserver. Dabei fordert der Webbrowser eine Website an und erhält vom Server ein Cookie
                    zurück, welches der Browser erneut verwendet, sobald eine andere Seite angefordert wird.
                </p>

                <div class="md:w-1/2">
                    <img src="{{ asset('storage/img/privacy_policy/cookies.svg') }}" alt="Funktionsweise von Cookies">
                </div>

                <p class="mb-3">
                    Es gibt sowohl Erstanbieter Cookies als auch Drittanbieter-Cookies. Erstanbieter-Cookies werden
                    direkt von unserer Seite erstellt, Drittanbieter-Cookies werden von Partner-Websites (z.B.
                    Google Analytics) erstellt. Jedes Cookie ist individuell zu bewerten, da jedes Cookie andere
                    Daten speichert. Auch die Ablaufzeit eines Cookies variiert von ein paar Minuten bis hin zu ein
                    paar Jahren. Cookies sind keine Software-Programme und enthalten keine Viren, Trojaner oder
                    andere „Schädlinge“. Cookies können auch nicht auf Informationen Ihres PCs zugreifen.
                </p>

                <p class="mb-3">So können zum Beispiel Cookie-Daten aussehen:</p>

                <p><span class="font-bold">Name:</span> _ga</p>
                <p><span class="font-bold">Wert:</span> GA1.2.1326744211.152112449526-9</p>
                <p><span class="font-bold">Verwendungszweck:</span> Unterscheidung der Websitebesucher</p>
                <p class="mb-3"><span class="font-bold">Ablaufdatum:</span> nach 2 Jahren</p>

                <p class="mb-3">Diese Mindestgrößen sollte ein Browser unterstützen können:</p>
                <ul class="pl-6 list-disc">
                    <li>Mindestens 4096 Bytes pro Cookie</li>
                    <li>Mindestens 50 Cookies pro Domain</li>
                    <li>Mindestens 3000 Cookies insgesamt</li>
                </ul>

                <p class="mb-1 text-xl font-bold">Welche Arten von Cookies gibt es?</p>
                <p class="font-bold mb-1">Unerlässliche Cookies</p>
                <p class="mb-3">
                    Diese Cookies sind nötig, um grundlegende Funktionen der Website sicherzustellen. Zum Beispiel
                    braucht es diese Cookies, wenn ein User ein Produkt in den Warenkorb legt, dann auf anderen
                    Seiten weitersurft und später erst zur Kasse geht. Durch diese Cookies wird der Warenkorb nicht
                    gelöscht, selbst wenn der User sein Browserfenster schließt.
                </p>

                <p class="font-bold mb-1">Zweckmäßige Cookies</p>
                <p class="mb-3">
                    Diese Cookies sammeln Infos über das Userverhalten und ob der User etwaige Fehlermeldungen
                    bekommt. Zudem werden mithilfe dieser Cookies auch die Ladezeit und das Verhalten der Website
                    bei verschiedenen Browsern gemessen.
                </p>

                <p class="font-bold mb-1">Zielorientierte Cookies</p>
                <p class="mb-3">
                    Diese Cookies sorgen für eine bessere Nutzerfreundlichkeit. Beispielsweise werden eingegebene
                    Standorte, Schriftgrößen oder Formulardaten gespeichert.
                </p>

                <p class="font-bold mb-1">Werbe-Cookies</p>
                <p class="mb-3">
                    Diese Cookies werden auch Targeting-Cookies genannt. Sie dienen dazu dem User individuell
                    angepasste Werbung zu liefern. Das kann sehr praktisch, aber auch sehr nervig sein.
                </p>
                <p class="mb-3">
                    Üblicherweise werden Sie beim erstmaligen Besuch einer Website gefragt, welche dieser
                    Cookiearten Sie zulassen möchten. Und natürlich wird diese Entscheidung auch in einem Cookie
                    gespeichert.
                </p>
                <p class="mb-3">
                    Wenn Sie mehr über Cookies wissen möchten und technische Dokumentationen nicht scheuen,
                    empfehlen wir
                    <a href="https://datatracker.ietf.org/doc/html/rfc6265"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        https://datatracker.ietf.org/doc/html/rfc6265
                    </a>,
                    dem Request for Comments der Internet Engineering Task Force (IETF) namens “HTTP State
                    Management Mechanism”.
                </p>

                <p class="mb-1 text-xl font-bold">Zweck der Verarbeitung über Cookies</p>
                <p class="mb-3">
                    Der Zweck ist letztendlich abhängig vom jeweiligen Cookie. Mehr Details dazu finden Sie weiter
                    unten bzw. beim Hersteller der Software, die das Cookie setzt.
                </p>

                <p class="mb-1 text-xl font-bold">Welche Daten werden verarbeitet?</p>
                <p class="mb-3">
                    Cookies sind kleine Gehilfen für eine viele verschiedene Aufgaben. Welche Daten in Cookies
                    gespeichert werden, kann man leider nicht verallgemeinern, aber wir werden Sie im Rahmen der
                    folgenden Datenschutzerklärung über die verarbeiteten bzw. gespeicherten Daten informieren.
                </p>

                <p class="mb-1 text-xl font-bold">Speicherdauer von Cookies</p>
                <p class="mb-3">
                    Die Speicherdauer hängt vom jeweiligen Cookie ab und wird weiter unter präzisiert. Manche
                    Cookies werden nach weniger als einer Stunde gelöscht, andere können mehrere Jahre auf einem
                    Computer gespeichert bleiben.
                </p>
                <p class="mb-3">
                    Sie haben außerdem selbst Einfluss auf die Speicherdauer. Sie können über ihren Browser
                    sämtliche Cookies jederzeit manuell löschen (siehe auch unten “Widerspruchsrecht”). Ferner
                    werden Cookies, die auf einer Einwilligung beruhen, spätestens nach Widerruf Ihrer Einwilligung
                    gelöscht, wobei die Rechtmäßigkeit der Speicherung bis dahin unberührt bleibt.
                </p>

                <p class="mb-1 text-xl font-bold">Widerspruchsrecht – wie kann ich Cookies löschen?</p>
                <p class="mb-3">
                    Wie und ob Sie Cookies verwenden wollen, entscheiden Sie selbst. Unabhängig von welchem Service
                    oder welcher Website die Cookies stammen, haben Sie immer die Möglichkeit Cookies zu löschen, zu
                    deaktivieren oder nur teilweise zuzulassen. Zum Beispiel können Sie Cookies von Drittanbietern
                    blockieren, aber alle anderen Cookies zulassen.
                </p>
                <p class="mb-3">
                    Wenn Sie feststellen möchten, welche Cookies in Ihrem Browser gespeichert wurden, wenn Sie
                    Cookie-Einstellungen ändern oder löschen wollen, können Sie dies in Ihren Browser-Einstellungen
                    finden:
                </p>

                <a href="https://support.google.com/chrome/answer/95647?tid=112449526"
                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                    Chrome: Cookies in Chrome löschen, aktivieren und verwalten
                </a>
                <a href="https://support.apple.com/de-at/guide/safari/sfri11471/mac?tid=112449526"
                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                    Safari: Verwalten von Cookies und Websitedaten mit Safari
                </a>
                <a href="https://support.mozilla.org/de/kb/cookies-und-website-daten-in-firefox-loschen?tid=112449526"
                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                    Firefox: Cookies löschen, um Daten zu entfernen, die Websites auf Ihrem Computer abgelegt haben
                </a>
                <a href="https://support.microsoft.com/de-de/windows/l%C3%B6schen-und-verwalten-von-cookies-168dab11-0753-043d-7c16-ede5947fc64d?tid=112449526"
                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                    Internet Explorer: Löschen und Verwalten von Cookies
                </a>
                <a href="https://support.microsoft.com/de-de/microsoft-edge/cookies-in-microsoft-edge-l%C3%B6schen-63947406-40ac-c3b8-57b9-2a946a29ae09?tid=112449526"
                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300 mb-3">
                    Microsoft Edge: Löschen und Verwalten von Cookies
                </a>

                <p class="mb-3">
                    Falls Sie grundsätzlich keine Cookies haben wollen, können Sie Ihren Browser so einrichten, dass
                    er Sie immer informiert, wenn ein Cookie gesetzt werden soll. So können Sie bei jedem einzelnen
                    Cookie entscheiden, ob Sie das Cookie erlauben oder nicht. Die Vorgangsweise ist je nach Browser
                    verschieden. Am besten Sie suchen die Anleitung in Google mit dem Suchbegriff “Cookies löschen
                    Chrome” oder “Cookies deaktivieren Chrome” im Falle eines Chrome Browsers.
                </p>

                <p class="mb-1 text-xl font-bold">Rechtsgrundlage</p>
                <p class="mb-3">
                    Seit 2009 gibt es die sogenannten „Cookie-Richtlinien“. Darin ist festgehalten, dass das
                    Speichern von Cookies eine
                    <span class="font-bold">Einwilligung</span>
                    (Artikel 6 Abs. 1 lit. a DSGVO) von Ihnen verlangt. Innerhalb der EU-Länder gibt es allerdings
                    noch sehr unterschiedliche Reaktionen auf diese Richtlinien. In Österreich erfolgte aber die
                    Umsetzung dieser Richtlinie in § 96 Abs. 3 des Telekommunikationsgesetzes (TKG). In Deutschland
                    wurden die Cookie-Richtlinien nicht als nationales Recht umgesetzt. Stattdessen erfolgte die
                    Umsetzung dieser Richtlinie weitgehend in § 15 Abs.3 des Telemediengesetzes (TMG).
                </p>
                <p class="mb-3">
                    Für unbedingt notwendige Cookies, auch soweit keine Einwilligung vorliegt, bestehen
                    <span class="font-bold">berechtigte Interessen</span>
                    (Artikel 6 Abs. 1 lit. f DSGVO), die in den meisten Fällen wirtschaftlicher Natur sind. Wir
                    möchten den Besuchern der Website eine angenehme Benutzererfahrung bescheren und dafür sind
                    bestimmte Cookies oft unbedingt notwendig.
                </p>
                <p class="mb-3">
                    Soweit nicht unbedingt erforderliche Cookies zum Einsatz kommen, geschieht dies nur im Falle
                    Ihrer Einwilligung. Rechtsgrundlage ist insoweit Art. 6 Abs. 1 lit. a DSGVO.
                </p>
                <p>
                    In den folgenden Abschnitten werden Sie genauer über den Einsatz von Cookies informiert, sofern
                    eingesetzte Software Cookies verwendet.
                </p>
            </section>

            <section id="webhosting" class="mb-8 dark:text-white">
                <div class="md:text-2xl text-xl mb-1">Webhosting Einleitung</div>

                <div class="border border-black dark:border-white mb-4 p-2">
                    <span class="font-bold">Webhosting Zusammenfassung</span>
                    <p>👥 Betroffene: Besucher der Website</p>
                    <p>🤝 Zweck: professionelles Hosting der Website und Absicherung des Betriebs</p>
                    <p>
                        📓 Verarbeitete Daten: IP-Adresse, Zeitpunkt des Websitebesuchs, verwendeter Browser und
                        weitere
                        Daten. Mehr Details dazu finden Sie weiter unten bzw. beim jeweils eingesetzten Webhosting
                        Provider.</p>
                    <p>📅 Speicherdauer: abhängig vom jeweiligen Provider, aber in der Regel 2 Wochen</p>
                    <p>⚖️ Rechtsgrundlagen: Art. 6 Abs. 1 lit.f DSGVO (Berechtigte Interessen)</p>
                </div>

                <p class="text-xl font-bold mb-1">Was ist Webhosting?</p>
                <p class="mb-3">
                    Wenn Sie heutzutage Websites besuchen, werden gewisse Informationen – auch personenbezogene
                    Daten – automatisch erstellt und gespeichert, so auch auf dieser Website. Diese Daten sollten
                    möglichst sparsam und nur mit Begründung verarbeitet werden. Mit Website meinen wir übrigens die
                    Gesamtheit aller Webseiten auf einer Domain, d.h. alles von der Startseite (Homepage) bis hin
                    zur aller letzten Unterseite (wie dieser hier). Mit Domain meinen wir zum Beispiel beispiel.de
                    oder musterbeispiel.com.
                </p>
                <p class="mb-3">
                    Wenn Sie eine Website auf einem Computer, Tablet oder Smartphone ansehen möchten, verwenden Sie
                    dafür ein Programm, das sich Webbrowser nennt. Sie kennen vermutlich einige Webbrowser beim
                    Namen: Google Chrome, Microsoft Edge, Mozilla Firefox und Apple Safari. Wir sagen kurz Browser
                    oder Webbrowser dazu.
                </p>
                <p class="mb-3">
                    Um die Website anzuzeigen, muss sich der Browser zu einem anderen Computer verbinden, wo der
                    Code der Website gespeichert ist: dem Webserver. Der Betrieb eines Webservers ist eine
                    komplizierte und aufwendige Aufgabe, weswegen dies in der Regel von professionellen Anbietern,
                    den Providern, übernommen wird. Diese bieten Webhosting an und sorgen damit für eine
                    verlässliche und fehlerfreie Speicherung der Daten von Websites. Eine ganze Menge Fachbegriffe,
                    aber bitte bleiben Sie dran, es wird noch besser!
                </p>
                <p class="mb-3">
                    Bei der Verbindungsaufnahme des Browsers auf Ihrem Computer (Desktop, Laptop, Tablet oder
                    Smartphone) und während der Datenübertragung zu und vom Webserver kann es zu einer Verarbeitung
                    personenbezogener Daten kommen. Einerseits speichert Ihr Computer Daten, andererseits muss auch
                    der Webserver Daten eine Zeit lang speichern, um einen ordentlichen Betrieb zu gewährleisten.
                </p>
                <p class="mb-3">
                    Ein Bild sagt mehr als tausend Worte, daher zeigt folgende Grafik zur Veranschaulichung das
                    Zusammenspiel zwischen Browser, dem Internet und dem Hosting-Provider.
                </p>
                <div class="md:w-1/2 mb-4">
                    <img src="{{ asset('storage/img/privacy_policy/hosting.svg') }}" alt="Erklärung Webhosting">
                </div>

                <p class="text-xl font-bold mb-1">Warum verarbeiten wir personenbezogene Daten?</p>
                <p class="mb-3">
                    Die Zwecke der Datenverarbeitung sind:
                </p>
                <ol class="pl-6 list-disc mb-4">
                    <li>Professionelles Hosting der Website und Absicherung des Betriebs</li>
                    <li>zur Aufrechterhaltung der Betriebs- und IT-Sicherheit</li>
                    <li>
                        Anonyme Auswertung des Zugriffsverhaltens zur Verbesserung unseres Angebots und ggf. zur
                        Strafverfolgung bzw. Verfolgung von Ansprüchen
                    </li>
                </ol>

                <p class="text-xl font-bold mb-1">Welche Daten werden verarbeitet?</p>
                <p class="mb-3">
                    Auch während Sie unsere Website jetzt gerade besuchen, speichert unser Webserver, das ist der
                    Computer auf dem diese Webseite gespeichert ist, in der Regel automatisch Daten wie
                </p>
                <ul class="pl-6 list-disc">
                    <li>die komplette Internetadresse (URL) der aufgerufenen Webseite</li>
                    <li>Browser und Browserversion (z. B. Chrome 87)</li>
                    <li>das verwendete Betriebssystem (z. B. Windows 10)</li>
                    <li>
                        die Adresse (URL) der zuvor besuchten Seite (Referrer URL) (z. B.
                        https://www.beispielquellsite.de/vondabinichgekommen/)
                    </li>
                    <li>
                        den Hostnamen und die IP-Adresse des Geräts von welchem aus zugegriffen wird (z. B.
                        COMPUTERNAME und 194.23.43.121)
                    </li>
                    <li>Datum und Uhrzeit</li>
                    <li>in Dateien, den sogenannten Webserver-Logfiles</li>
                </ul>

                <p class="text-xl font-bold mb-1">Wie lange werden Daten gespeichert?</p>
                <p class="mb-3">
                    In der Regel werden die oben genannten Daten zwei Wochen gespeichert und danach automatisch
                    gelöscht. Wir geben diese Daten nicht weiter, können jedoch nicht ausschließen, dass diese Daten
                    beim Vorliegen von rechtswidrigem Verhalten von Behörden eingesehen werden.
                </p>
                <p class="mb-3">
                    <span class="font-bold">Kurz gesagt:</span> Ihr Besuch wird durch unseren Provider (Firma, die
                    unsere Website auf speziellen Computern (Servern) laufen lässt), protokolliert, aber wir geben
                    Ihre Daten nicht ohne Zustimmung weiter!
                </p>

                <p class="text-xl font-bold mb-1">Rechtsgrundlage</p>
                <p class="mb-3">
                    Die Rechtmäßigkeit der Verarbeitung personenbezogener Daten im Rahmen des Webhosting ergibt sich
                    aus Art. 6 Abs. 1 lit. f DSGVO (Wahrung der berechtigten Interessen), denn die Nutzung von
                    professionellem Hosting bei einem Provider ist notwendig, um das Unternehmen im Internet sicher
                    und nutzerfreundlich präsentieren und Angriffe und Forderungen hieraus gegebenenfalls verfolgen
                    zu können.
                </p>
                <p class="mb-3">
                    Zwischen uns und dem Hosting-Provider besteht in der Regel ein Vertrag über die
                    Auftragsverarbeitung gemäß Art. 28 f. DSGVO, der die Einhaltung von Datenschutz gewährleistet
                    und Datensicherheit garantiert.
                </p>

                <p class="text-xl font-bold mb-1">Webhosting-Provider Extern Datenschutzerklärung</p>
                <p class="mb-3">
                    Nachfolgend finden Sie die Kontaktdaten unseres externen Hosting-Providers, wo Sie, zusätzlich
                    zu den Informationen oben, mehr zur Datenverarbeitung erfahren können:
                </p>
                <p>Lennard Beljanin Einzelunternehmen</p>
                <p>– LETHOST IT SOLUTIONS –</p>
                <p>Maisweg 15</p>
                <p class="mb-3">49716 Meppen, Deutschland</p>
                <p>
                    Mehr über die Datenverarbeitung bei diesem Provider erfahren Sie in der
                    <a href="https://www.lethost.de/datenschutz/"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        Datenschutzerklärung
                    </a>.
                </p>
            </section>
            <section id="cookie_consent_manager" class="mb-8 dark:text-white">
                <div class="md:text-2xl text-xl mb-1">Cookie Consent Management Platform Einleitung</div>

                <div class="border border-black dark:border-white mb-4 p-2">
                    <span class="font-bold">Cookie Consent Management Platform Zusammenfassung</span>
                    <p>👥 Betroffene: Website Besucher</p>
                    <p>
                        🤝 Zweck: Einholung und Verwaltung der Zustimmung zu bestimmten Cookies und somit dem Einsatz
                        bestimmter Tools
                    </p>
                    <p>
                        📓 Verarbeitete Daten: Daten zur Verwaltung der eingestellten Cookie-Einstellungen wie
                        IP-Adresse, Zeitpunkt der Zustimmung, Art der Zustimmung, einzelne Zustimmungen. Mehr
                        Details dazu finden Sie beim jeweils eingesetzten Tool.
                    </p>
                    <p>
                        📅 Speicherdauer: Hängt vom eingesetzten Tool ab, man muss sich auf Zeiträume von mehreren
                        Jahren einstellen
                    </p>
                    <p>
                        ⚖️ Rechtsgrundlagen: Art. 6 Abs. 1 lit. a DSGVO (Einwilligung), Art. 6 Abs. 1 lit.f DSGVO
                        (berechtigte Interessen)
                    </p>
                </div>

                <p class="text-xl font-bold mb-1">Was ist eine Cookie Consent Manangement Platform?</p>
                <p class="mb-3">
                    Wir verwenden auf unserer Website eine Consent Management Platform (CMP) Software, die uns und
                    Ihnen den korrekten und sicheren Umgang mit verwendeten Skripten und Cookies erleichtert. Die
                    Software erstellt automatisch ein Cookie-Popup, scannt und kontrolliert alle Skripts und
                    Cookies, bietet eine datenschutzrechtlich notwendige Cookie-Einwilligung für Sie und hilft uns
                    und Ihnen den Überblick über alle Cookies zu behalten. Bei den meisten Cookie Consent Management
                    Tools werden alle vorhandenen Cookies identifiziert und kategorisiert. Sie als Websitebesucher
                    entscheiden dann selbst, ob und welche Skripte und Cookies Sie zulassen oder nicht zulassen. Die
                    folgende Grafik stellt die Beziehung zwischen Browser, Webserver und CMP dar.
                </p>
                <div class="md:w-1/2 mb-3">
                    <img src="{{ asset('storage/img/privacy_policy/ccp.svg') }}" alt="Erklärung: Cookie Consent Manager">
                </div>

                <p class="text-xl font-bold mb-1">Warum verwenden wir ein Cookie-Management-Tool?</p>
                <p class="mb-3">
                    Unser Ziel ist es, Ihnen im Bereich Datenschutz die bestmögliche Transparenz zu bieten. Zudem
                    sind wir dazu auch rechtlich verpflichtet. Wir wollen Sie über alle Tools und alle Cookies, die
                    Daten von Ihnen speichern und verarbeiten können, so gut wie möglich aufklären. Es ist auch Ihr
                    Recht, selbst zu entscheiden, welche Cookies Sie akzeptieren und welche nicht. Um Ihnen dieses
                    Recht einzuräumen, müssen wir zuerst genau wissen, welche Cookies überhaupt auf unserer Website
                    gelandet sind. Dank eines Cookie-Management-Tools, welches die Website regelmäßig nach allen
                    vorhandenen Cookies scannt, wissen wir über alle Cookies Bescheid und können Ihnen DSGVO-konform
                    Auskunft darüber geben. Über das Einwilligungssystem können Sie dann Cookies akzeptieren oder
                    ablehnen.
                </p>

                <p class="text-xl font-bold mb-1">Welche Daten werden verarbeitet?</p>
                <p class="mb-3">
                    Im Rahmen unseres Cookie-Management-Tools können Sie jedes einzelnen Cookies selbst verwalten
                    und haben die vollständige Kontrolle über die Speicherung und Verarbeitung Ihrer Daten. Die
                    Erklärung Ihrer Einwilligung wird gespeichert, damit wir Sie nicht bei jedem neuen Besuch
                    unserer Website abfragen müssen und wir Ihre Einwilligung, wenn gesetzlich nötig, auch
                    nachweisen können. Gespeichert wird dies entweder in einem Opt-in-Cookie oder auf einem Server.
                    Je nach Anbieter des Cookie-Management-Tools variiert Speicherdauer Ihrer Cookie-Einwilligung.
                    Meist werden diese Daten (etwa pseudonyme User-ID, Einwilligungs-Zeitpunkt, Detailangaben zu den
                    Cookie-Kategorien oder Tools, Browser, Gerätinformationen) bis zu zwei Jahren gespeichert.
                </p>

                <p class="text-xl font-bold mb-1">Dauer der Datenverarbeitung</p>
                <p class="mb-3">
                    Über die Dauer der Datenverarbeitung informieren wir Sie weiter unten, sofern wir weitere
                    Informationen dazu haben. Generell verarbeiten wir personenbezogene Daten nur so lange wie es
                    für die Bereitstellung unserer Dienstleistungen und Produkte unbedingt notwendig ist. Daten, die
                    in Cookies gespeichert werden, werden unterschiedlich lange gespeichert. Manche Cookies werden
                    bereits nach dem Verlassen der Website wieder gelöscht, andere können über einige Jahre in Ihrem
                    Browser gespeichert sein. Die genaue Dauer der Datenverarbeitung hängt vom verwendeten Tool ab,
                    meistens sollten Sie sich auf eine Speicherdauer von mehreren Jahren einstellen. In den
                    jeweiligen Datenschutzerklärungen der einzelnen Anbieter erhalten Sie in der Regel genaue
                    Informationen über die Dauer der Datenverarbeitung.
                </p>

                <p class="text-xl font-bold mb-1">Widerspruchsrecht</p>
                <p class="mb-3">
                    Sie haben auch jederzeit das Recht und die Möglichkeit Ihre Einwilligung zur Verwendung von
                    Cookies zu widerrufen. Das funktioniert entweder über unser Cookie-Management-Tool oder über
                    andere Opt-Out-Funktionen. Zum Bespiel können Sie auch die Datenerfassung durch Cookies
                    verhindern, indem Sie in Ihrem Browser die Cookies verwalten, deaktivieren oder löschen.
                </p>

                <p class="text-xl font-bold mb-1">Rechtsgrundlage</p>
                <p class="mb-3">
                    Wenn Sie Cookies zustimmen, werden über diese Cookies personenbezogene Daten von Ihnen
                    verarbeitet und gespeichert. Falls wir durch Ihre <span class="font-bold">Einwilligung</span>
                    (Artikel 6 Abs. 1 lit. a DSGVO) Cookies verwenden dürfen, ist diese Einwilligung auch
                    gleichzeitig die Rechtsgrundlage für die Verwendung von Cookies bzw. die Verarbeitung Ihrer
                    Daten. Um die Einwilligung zu Cookies verwalten zu können und Ihnen die Einwilligung ermöglichen
                    zu können, kommt eine Cookie-Consent-Management-Platform-Software zum Einsatz. Der Einsatz
                    dieser Software ermöglicht uns, die Website auf effiziente Weise rechtskonform zu betreiben, was
                    ein <span class="font-bold">berechtigtes Interesse</span> (Artikel 6 Abs. 1 lit. f DSGVO)
                    darstellt.
                </p>
            </section>
            <section id="pooling" class="mb-8 dark:text-white">
                <div class="md:text-2xl text-xl mb-1">Umfrage- und Befragungssysteme Einleitung</div>

                <div class="border border-black dark:border-white mb-4 p-2">
                    <span class="font-bold">Umfrage- und Befragungssysteme Datenschutzerklärung Zusammenfassung</span>

                    <p>👥 Betroffene: Besucher der Website</p>
                    <p>🤝 Zweck: Auswertung von Umfragen auf der Website</p>
                    <p>
                        📓 Verarbeitete Daten: Kontaktdaten, Gerätedaten, Zugriffsdauer und Zeitpunkt, IP-Adressen.
                        Mehr Details dazu finden Sie beim jeweils eingesetzten Umfrage- und Befragungssystem.
                    </p>
                    <p>📅 Speicherdauer: abhängig vom eingesetzten Tool</p>
                    <p>
                        ⚖️ Rechtsgrundlagen: Art. 6 Abs. 1 lit. a DSGVO (Einwilligung), Art. 6 Abs. 1 lit. f DSGVO
                        (Berechtigte Interessen)
                    </p>
                </div>

                <p class="font-bold">Was sind Umfrage- und Befragungssysteme?</p>
                <p class="mb-3">
                    Wir führen über unsere Website gerne auch diverse Umfragen und Befragungen durch. Ausgewertet
                    werden diese stets anonym. Ein Umfrage- bzw. Befragungssystem ist ein in unsere Website
                    eingebundenes Tool, das Ihnen Fragen (etwa zu unseren Produkten oder Dienstleistungen) stellt,
                    die Sie, sofern Sie teilnehmen, beantworten können. Ihre Antworten werden stets anonym
                    ausgewertet. Dabei können allerdings, nach Ihrer Einwilligung zur Datenverarbeitung, auch
                    personenbezogene Daten gespeichert und verarbeitet werden.
                </p>

                <p class="font-bold">Warum nutzen wir Umfrage- und Befragungssysteme?</p>
                <p class="mb-3">
                    Wir wollen Ihnen die besten Produkte und Dienstleistungen in unserer Branche anbietet. Mit
                    Umfragen bekommen wir von Ihnen perfektes Feedback und erfahren, was Sie von uns bzw. unseren
                    Leistungen erwarten. Anhand dieser anonymen Auswertungen können wir unsere Produkte bzw.
                    Dienstleistungen bestens an Ihre Wünsche und Vorstellungen anpassen. Weiters dienen uns die
                    Informationen auch, unsere Werbe- und Marketing-Maßnahmen zielorientierter an jene Personen zu
                    richten, die sich auch wirklich für unser Angebot interessieren.
                </p>

                <p class="font-bold">Welche Daten werden verarbeitet?</p>
                <p class="mb-3">
                    Personenbezogene Daten werden nur dann verarbeitet, wenn es für die technische Umsetzung
                    notwendig ist bzw. wenn Sie eingewilligt haben, dass personenbezogene Daten verarbeitet werden
                    dürfen. Dann wird etwa Ihre IP-Adresse gespeichert, damit beispielsweise die Umfrage in Ihrem
                    Browser dargestellt werden kann. Es können auch Cookies verwendet werden, damit Sie Ihre Umfrage
                    auch nach einem späteren Zeitpunkt problemlos fortsetzen können.
                </p>
                <p class="mb-3">
                    Wenn Sie der Datenverarbeitung eingewilligt haben, können neben Ihrer IP-Adresse auch
                    Kontaktdaten wie Ihre E-Mail-Adresse oder Ihre Telefonnummer verarbeitet werden. Auch Daten, die
                    Sie etwa in ein Online-Formular eingeben, werden gespeichert und verarbeitet. Manche Anbieter
                    speichern auch Informationen zu Ihren besuchten Webseiten (auf unserer Website), wann Sie die
                    Umfrage gestartet und beendet haben und diverse technische Informationen zu Ihrem Computer.
                </p>

                <p class="font-bold">Wie lange werden Daten gespeichert?</p>
                <p class="mb-3">
                    Wie lange die Daten verarbeitet und gespeichert werden, hängt in erster Linie von unseren
                    verwendeten Tools ab. Weiter unten erfahren Sie mehr über die Datenverarbeitung der einzelnen
                    Tools. In den Datenschutzerklärungen der Anbieter steht üblicherweise genau, welche Daten wie
                    lange gespeichert und verarbeitet werden. Grundsätzlich werden personenbezogene Daten nur so
                    lange verarbeitet, wie es für die Bereitstellung unserer Dienste nötig ist. Wenn Daten in
                    Cookies gespeichert werden, variiert die Speicherdauer stark. Die Daten können gleich nach dem
                    Verlassen einer Website wieder gelöscht werden, sie können aber auch über mehrere Jahre
                    gespeichert bleiben. Daher sollten Sie sich jedes einzelnen Cookie im Detail ansehen, wenn Sie
                    über die Datenspeicherung Genaueres wissen wollen. Meistens finden Sie in den
                    Datenschutzerklärungen der einzelnen Anbieter auch aufschlussreiche Informationen über die
                    einzelnen Cookies.
                </p>

                <p class="font-bold">Widerspruchsrecht</p>
                <p class="mb-3">
                    Sie haben auch jederzeit das Recht und die Möglichkeit Ihre Einwilligung zur Verwendung von
                    Cookies bzw. eingebetteten Befragungssystemen zu widerrufen. Das funktioniert entweder über
                    unser Cookie-Management-Tool oder über andere Opt-Out-Funktionen. Zum Bespiel können Sie auch
                    die Datenerfassung durch Cookies verhindern, indem Sie in Ihrem Browser die Cookies verwalten,
                    deaktivieren oder löschen.
                </p>
                <p class="mb-3">
                    Da bei Befragungssystemen Cookies zum Einsatz kommen können, empfehlen wir Ihnen auch unsere
                    allgemeine Datenschutzerklärung über Cookies. Um zu erfahren, welche Daten von Ihnen genau
                    gespeichert und verarbeitet werden, sollten Sie die Datenschutzerklärungen der jeweiligen Tools
                    durchlesen.
                </p>

                <p class="font-bold">Rechtsgrundlage</p>
                <p class="mb-3">
                    Der Einsatz von Befragungssystemen setzt Ihre Einwilligung voraus, welche wir mit unserem
                    Cookie-Popup eingeholt haben. Diese Einwilligung stellt laut
                    <span class="font-bold">Art. 6 Abs. 1 lit. a DSGVO (Einwilligung)</span> die Rechtsgrundlage für
                    die Verarbeitung personenbezogener Daten, wie sie bei der Erfassung durch Umfrage- und
                    Befragungssystemen vorkommen kann, dar.
                </p>
                <p class="mb-3">
                    Zusätzlich zur Einwilligung besteht von unserer Seite ein berechtigtes Interesse daran, Umfrage
                    zu unserem Thema durchzuführen. Die Rechtsgrundlage dafür ist
                    <span class="font-bold">Art. 6 Abs. 1 lit. f DSGVO (Berechtigte Interessen)</span>. Wir setzen
                    die Tools gleichwohl nur ein, soweit sie eine Einwilligung erteilt haben.
                </p>
                <p class="mb-3">
                    Da bei Befragungssystemen Cookies zum Einsatz kommen, empfehlen wir Ihnen auch das Lesen unserer
                    allgemeinen Datenschutzerklärung zu Cookies. Um zu erfahren, welche Daten von Ihnen genau
                    gespeichert und verarbeitet werden, sollten Sie die Datenschutzerklärungen der jeweiligen Tools
                    durchlesen.
                </p>
                <p class="mb-3">
                    Informationen zu den einzelnen Befragungssystemen, erhalten Sie – sofern vorhanden – in den
                    folgenden Abschnitten.
                </p>

                <p class="font-bold">Google-Formular Datenschutzerklärung</p>
                <p class="mb-3">
                    Wir nutzen für unsere Website Google-Formular, ein Service für Google-Cloud-Formulare.
                    Dienstanbieter ist das amerikanische Unternehmen Google Inc. Für den europäischen Raum ist das
                    Unternehmen Google Ireland Limited (Gordon House, Barrow Street Dublin 4, Irland) für alle
                    Google-Dienste verantwortlich.
                </p>
                <p class="mb-3">
                    Google verarbeitet Daten von Ihnen u.a. auch in den USA. Wir weisen darauf hin, dass nach
                    Meinung des Europäischen Gerichtshofs derzeit kein angemessenes Schutzniveau für den
                    Datentransfer in die USA besteht. Dies kann mit verschiedenen Risiken für die Rechtmäßigkeit und
                    Sicherheit der Datenverarbeitung einhergehen.
                </p>
                <p class="mb-3">
                    Als Grundlage der Datenverarbeitung bei Empfängern mit Sitz in Drittstaaten (außerhalb der
                    Europäischen Union, Island, Liechtenstein, Norwegen, also insbesondere in den USA) oder einer
                    Datenweitergabe dorthin verwendet Google sogenannte Standardvertragsklauseln (= Art. 46. Abs. 2
                    und 3 DSGVO). Standardvertragsklauseln (Standard Contractual Clauses – SCC) sind von der
                    EU-Kommission bereitgestellte Mustervorlagen und sollen sicherstellen, dass Ihre Daten auch dann
                    den europäischen Datenschutzstandards entsprechen, wenn diese in Drittländer (wie beispielsweise
                    in die USA) überliefert und dort gespeichert werden. Durch diese Klauseln verpflichtet sich
                    Google, bei der Verarbeitung Ihrer relevanten Daten, das europäische Datenschutzniveau
                    einzuhalten, selbst wenn die Daten in den USA gespeichert, verarbeitet und verwaltet werden.
                    Diese Klauseln basieren auf einem Durchführungsbeschluss der EU-Kommission. Sie finden den
                    Beschluss und die entsprechenden Standardvertragsklauseln u.a. hier:
                    <a href="https://eur-lex.europa.eu/eli/dec_impl/2021/914/oj?locale=de"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        https://eur-lex.europa.eu/eli/dec_impl/2021/914/oj?locale=de
                    </a>
                </p>
                <p class="mb-3">
                    Die Google Ads Datenverarbeitungsbedingungen (Google Ads Data Processing Terms), welche den
                    Standardvertragsklauseln entsprechen und auch für Google-Formular geltend sind, finden Sie unter
                    <a href="https://business.safety.google/adsprocessorterms/"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        https://business.safety.google/adsprocessorterms/
                    </a>.
                </p>
                <p class="mb-3">
                    Mehr über die Daten, die durch die Verwendung von Google verarbeitet werden, erfahren Sie in der
                    Datenschutzerklärung auf
                    <a href="https://policies.google.com/privacy"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        https://policies.google.com/privacy
                    </a>.
                </p>
            </section>
            <section id="webdesigb" class="mb-8 dark:text-white">
                <div class="md:text-2xl text-xl mb-1">Webdesign Einleitung</div>

                <div class="border border-black dark:border-white mb-4 p-2">
                    <span class="font-bold">Webdesign Datenschutzerklärung Zusammenfassung</span>
                    <p>👥 Betroffene: Besucher der Website</p>
                    <p>🤝 Zweck: Verbesserung der Nutzererfahrung</p>
                    <p>
                        📓 Verarbeitete Daten: Welche Daten verarbeitet werden, hängt stark von den verwendeten
                        Diensten ab. Meist handelt es sich etwa um IP-Adresse, technische Daten,
                        Spracheinstellungen, Browserversion, Bildschirmauflösung und Name des Browsers. Mehr Details
                        dazu finden Sie bei den jeweils eingesetzten Webdesign-Tools.
                    </p>
                    <p>📅 Speicherdauer: abhängig von den eingesetzten Tools</p>
                    <p>
                        ⚖️ Rechtsgrundlagen: Art. 6 Abs. 1 lit. a DSGVO (Einwilligung), Art. 6 Abs. 1 lit. f DSGVO
                        (Berechtigte Interessen)
                    </p>
                </div>

                <p class="text-xl font-bold mb-1">Was ist Webdesign?</p>
                <p class="mb-3">
                    Wir verwenden auf unserer Website verschiedene Tools, die unserem Webdesign dienen. Bei
                    Webdesign geht es nicht, wie oft angenommen, nur darum, dass unsere Website hübsch aussieht,
                    sondern auch um Funktionalität und Leistung. Aber natürlich ist die passende Optik einer Website
                    auch eines der großen Ziele professionellen Webdesigns. Webdesign ist ein Teilbereich des
                    Mediendesigns und beschäftigt sich sowohl mit der visuellen als auch der strukturellen und
                    funktionalen Gestaltung einer Website. Ziel ist es mit Hilfe von Webdesign Ihre Erfahrung auf
                    unserer Website zu verbessern. Im Webdesign-Jargon spricht man in diesem Zusammenhang von
                    User-Experience (UX) und Usability. Unter User Experience versteht man alle Eindrücke und
                    Erlebnisse, die der Websitebesucher auf einer Website erfährt. Ein Unterpunkt der User
                    Experience ist die Usability. Dabei geht es um die Nutzerfreundlichkeit einer Website. Wert
                    gelegt wird hier vor allem darauf, dass Inhalte, Unterseiten oder Produkte klar strukturiert
                    sind und Sie leicht und schnell finden, wonach Sie suchen. Um Ihnen die bestmögliche Erfahrung
                    auf unserer Website zu bieten, verwenden wir auch sogenannte Webdesign-Tools von Drittanbietern.
                    Unter die Kategorie „Webdesign“ fallen in dieser Datenschutzerklärung also alle Dienste, die
                    unsere Website gestalterisch verbessern. Das können beispielsweise Schriftarten, diverse Plugins
                    oder andere eingebundene Webdesign-Funktionen sein.
                </p>

                <p class="text-xl font-bold mb-1">Warum verwenden wir Webdesign-Tools?</p>
                <p class="mb-3">
                    Wie Sie Informationen auf einer Website aufnehmen, hängt sehr stark von der Struktur, der
                    Funktionalität und der visuellen Wahrnehmung der Website ab. Daher wurde auch für uns ein gutes
                    und professionelles Webdesign immer wichtiger. Wir arbeiten ständig an der Verbesserung unserer
                    Website und sehen dies auch als erweiterte Dienstleistung für Sie als Websitebesucher. Weiters
                    hat eine schöne und funktionierende Website auch wirtschaftliche Vorteile für uns. Schließlich
                    werden Sie uns nur besuchen und unsere Angebote in Anspruch nehmen, wenn Sie sich rundum wohl
                    fühlen.
                </p>

                <p class="text-xl font-bold mb-1">Welche Daten werden durch Webdesign-Tools gespeichert?</p>
                <p class="mb-3">
                    Wenn Sie unsere Website besuchen, können Webdesign-Elemente in unseren Seiten eingebunden sein,
                    die auch Daten verarbeiten können. Um welche Daten es sich genau handelt, hängt natürlich stark
                    von den verwendeten Tools ab. Weiter unter sehen Sie genau, welche Tools wir für unsere Website
                    verwenden. Wir empfehlen Ihnen für nähere Informationen über die Datenverarbeitung auch die
                    jeweilige Datenschutzerklärung der verwendeten Tools durchzulesen. Meistens erfahren Sie dort,
                    welche Daten verarbeitet werden, ob Cookies eingesetzt werden und wie lange die Daten aufbewahrt
                    werden. Durch Schriftarten wie etwa Google Fonts werden beispielsweise auch Informationen wie
                    Spracheinstellungen, IP-Adresse, Version des Browsers, Bildschirmauflösung des Browsers und Name
                    des Browsers automatisch an die Google-Server übertragen.
                </p>

                <p class="text-xl font-bold mb-1">Dauer der Datenverarbeitung</p>
                <p class="mb-3">
                    Wie lange Daten verarbeitet werden, ist sehr individuell und hängt von den eingesetzten
                    Webdesign-Elementen ab. Wenn Cookies beispielsweise zum Einsatz kommen, kann die
                    Aufbewahrungsdauer nur eine Minute, aber auch ein paar Jahre dauern. Machen Sie sich
                    diesbezüglich bitte schlau. Dazu empfehlen wir Ihnen einerseits unseren allgemeinen
                    Textabschnitt über Cookies sowie die Datenschutzerklärungen der eingesetzten Tools. Dort
                    erfahren Sie in der Regel, welche Cookies genau eingesetzt werden, und welche Informationen
                    darin gespeichert werden. Google-Font-Dateien werden zum Beispiel ein Jahr gespeichert. Damit
                    soll die Ladezeit einer Website verbessert werden. Grundsätzlich werden Daten immer nur so lange
                    aufbewahrt, wie es für die Bereitstellung des Dienstes nötig ist. Bei gesetzlichen
                    Vorschreibungen können Daten auch länger gespeichert werden.
                </p>

                <p class="text-xl font-bold mb-1">Widerspruchsrecht</p>
                <p class="mb-3">
                    Sie haben auch jederzeit das Recht und die Möglichkeit Ihre Einwilligung zur Verwendung von
                    Cookies bzw. Drittanbietern zu widerrufen. Das funktioniert entweder über unser
                    Cookie-Management-Tool oder über andere Opt-Out-Funktionen. Sie können auch die Datenerfassung
                    durch Cookies verhindern, indem Sie in Ihrem Browser die Cookies verwalten, deaktivieren oder
                    löschen. Unter Webdesign-Elementen (meistens bei Schriftarten) gibt es allerdings auch Daten,
                    die nicht ganz so einfach gelöscht werden können. Das ist dann der Fall, wenn Daten direkt bei
                    einem Seitenaufruf automatisch erhoben und an einen Drittanbieter (wie z. B. Google) übermittelt
                    werden. Wenden Sie sich dann bitte an den Support des entsprechenden Anbieters. Im Fall von
                    Google erreichen Sie den Support unter
                    <a href="https://support.google.com/?hl=de"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        https://support.google.com/?hl=de
                    </a>.
                </p>

                <p class="text-xl font-bold mb-1">Rechtsgrundlage</p>
                <p class="mb-3">
                    Wenn Sie eingewilligt haben, dass Webdesign-Tools eingesetzt werden dürfen, ist die
                    Rechtsgrundlage der entsprechenden Datenverarbeitung diese Einwilligung. Diese Einwilligung
                    stellt laut Art. 6 Abs. 1 lit. a DSGVO (Einwilligung) die Rechtsgrundlage für die Verarbeitung
                    personenbezogener Daten, wie sie bei der Erfassung durch Webdesign-Tools vorkommen kann, dar.
                    Von unserer Seite besteht zudem ein berechtigtes Interesse, das Webdesign auf unserer Website zu
                    verbessern. Schließlich können wir Ihnen nur dann ein schönes und professionelles Webangebot
                    liefern. Die dafür entsprechende Rechtsgrundlage ist Art. 6 Abs. 1 lit. f DSGVO (Berechtigte
                    Interessen). Wir setzen Webdesign-Tools gleichwohl nur ein, soweit Sie eine Einwilligung erteilt
                    haben. Das wollen wir hier auf jeden Fall nochmals betonen.
                </p>

                <p class="text-xl font-bold mb-1">Google Fonts Datenschutzerklärung</p>
                <div class="border border-black dark:border-white mb-4 p-2">
                    <span class="font-bold">Google Fonts Datenschutzerklärung Zusammenfassung</span>
                    <p>👥 Betroffene: Besucher der Website</p>
                    <p>🤝 Zweck: Optimierung unserer Serviceleistung</p>
                    <p>📓 Verarbeitete Daten: Daten wie etwa IP-Adresse und CSS- und Schrift-Anfragen</p>
                    <p>Mehr Details dazu finden Sie weiter unten in dieser Datenschutzerklärung.</p>
                    <p>📅 Speicherdauer: Font-Dateien werden bei Google ein Jahr gespeichert</p>
                    <p>
                        ⚖️ Rechtsgrundlagen: Art. 6 Abs. 1 lit. a DSGVO (Einwilligung), Art. 6 Abs. 1 lit. f DSGVO
                        (Berechtigte Interessen)
                    </p>
                </div>

                <p class="font-bold">Was sind Google Fonts?</p>
                <p class="mb-3">
                    Auf unserer Website verwenden wir Google Fonts. Das sind die “Google-Schriften” der Firma Google
                    Inc. Für den europäischen Raum ist das Unternehmen Google Ireland Limited (Gordon House, Barrow
                    Street Dublin 4, Irland) für alle Google-Dienste verantwortlich.
                </p>
                <p class="mb-3">
                    Für die Verwendung von Google-Schriftarten müssen Sie sich nicht anmelden bzw. ein Passwort
                    hinterlegen. Weiters werden auch keine Cookies in Ihrem Browser gespeichert. Die Dateien (CSS,
                    Schriftarten/Fonts) werden über die Google-Domains fonts.googleapis.com und fonts.gstatic.com
                    angefordert. Laut Google sind die Anfragen nach CSS und Schriften vollkommen getrennt von allen
                    anderen Google-Diensten. Wenn Sie ein Google-Konto haben, brauchen Sie keine Sorge haben, dass
                    Ihre Google-Kontodaten, während der Verwendung von Google Fonts, an Google übermittelt werden.
                    Google erfasst die Nutzung von CSS (Cascading Style Sheets) und der verwendeten Schriftarten und
                    speichert diese Daten sicher. Wie die Datenspeicherung genau aussieht, werden wir uns noch im
                    Detail ansehen.
                </p>
                <p class="mb-3">
                    Google Fonts (früher Google Web Fonts) ist ein Verzeichnis mit über 800 Schriftarten, die
                    <a href="https://de.wikipedia.org/wiki/Google_LLC?tid=112449526"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        Google
                    </a>
                    Ihren Nutzern kostenlos zu Verfügung stellen.
                </p>
                <p class="mb-3">
                    Viele dieser Schriftarten sind unter der SIL Open Font License veröffentlicht, während andere
                    unter der Apache-Lizenz veröffentlicht wurden. Beides sind freie Software-Lizenzen.
                </p>

                <p class="font-bold">Warum verwenden wir Google Fonts auf unserer Website?</p>
                <p class="mb-3">
                    Mit Google Fonts können wir auf der eigenen Webseite Schriften nutzen, und müssen sie nicht auf
                    unserem eigenen Server hochladen. Google Fonts ist ein wichtiger Baustein, um die Qualität
                    unserer Webseite hoch zu halten. Alle Google-Schriften sind automatisch für das Web optimiert
                    und dies spart Datenvolumen und ist speziell für die Verwendung bei mobilen Endgeräten ein
                    großer Vorteil. Wenn Sie unsere Seite besuchen, sorgt die niedrige Dateigröße für eine schnelle
                    Ladezeit. Des Weiteren sind Google Fonts sichere Web Fonts. Unterschiedliche
                    Bildsynthese-Systeme (Rendering) in verschiedenen Browsern, Betriebssystemen und mobilen
                    Endgeräten können zu Fehlern führen. Solche Fehler können teilweise Texte bzw. ganze Webseiten
                    optisch verzerren. Dank des schnellen Content Delivery Network (CDN) gibt es mit Google Fonts
                    keine plattformübergreifenden Probleme. Google Fonts unterstützt alle gängigen Browser (Google
                    Chrome, Mozilla Firefox, Apple Safari, Opera) und funktioniert zuverlässig auf den meisten
                    modernen mobilen Betriebssystemen, einschließlich Android 2.2+ und iOS 4.2+ (iPhone, iPad,
                    iPod). Wir verwenden die Google Fonts also, damit wir unser gesamtes Online-Service so schön und
                    einheitlich wie möglich darstellen können.
                </p>

                <p class="font-bold">Welche Daten werden von Google gespeichert?</p>
                <p class="mb-3">
                    Wenn Sie unsere Webseite besuchen, werden die Schriften über einen Google-Server nachgeladen.
                    Durch diesen externen Aufruf werden Daten an die Google-Server übermittelt. So erkennt Google
                    auch, dass Sie bzw. Ihre IP-Adresse unsere Webseite besucht. Die Google Fonts API wurde
                    entwickelt, um Verwendung, Speicherung und Erfassung von Endnutzerdaten auf das zu reduzieren,
                    was für eine ordentliche Bereitstellung von Schriften nötig ist. API steht übrigens für
                    „Application Programming Interface“ und dient unter anderem als Datenübermittler im
                    Softwarebereich.
                </p>
                <p class="mb-3">
                    Google Fonts speichert CSS- und Schrift-Anfragen sicher bei Google und ist somit geschützt.
                    Durch die gesammelten Nutzungszahlen kann Google feststellen, wie gut die einzelnen Schriften
                    ankommen. Die Ergebnisse veröffentlicht Google auf internen Analyseseiten, wie beispielsweise
                    Google Analytics. Zudem verwendet Google auch Daten des eigenen Web-Crawlers, um festzustellen,
                    welche Webseiten Google-Schriften verwenden. Diese Daten werden in der BigQuery-Datenbank von
                    Google Fonts veröffentlicht. Unternehmer und Entwickler nützen das Google-Webservice BigQuery,
                    um große Datenmengen untersuchen und bewegen zu können.
                </p>
                <p class="mb-3">
                    Zu bedenken gilt allerdings noch, dass durch jede Google Font Anfrage auch Informationen wie
                    Spracheinstellungen, IP-Adresse, Version des Browsers, Bildschirmauflösung des Browsers und Name
                    des Browsers automatisch an die Google-Server übertragen werden. Ob diese Daten auch gespeichert
                    werden, ist nicht klar feststellbar bzw. wird von Google nicht eindeutig kommuniziert.
                </p>

                <p class="font-bold">Wie lange und wo werden die Daten gespeichert?</p>
                <p class="mb-3">
                    Anfragen für CSS-Assets speichert Google einen Tag lang auf seinen Servern, die hauptsächlich
                    außerhalb der EU angesiedelt sind. Das ermöglicht uns, mithilfe eines Google-Stylesheets die
                    Schriftarten zu nutzen. Ein Stylesheet ist eine Formatvorlage, über die man einfach und schnell
                    z.B. das Design bzw. die Schriftart einer Webseite ändern kann.
                </p>
                <p class="mb-3">
                    Die Font-Dateien werden bei Google ein Jahr gespeichert. Google verfolgt damit das Ziel, die
                    Ladezeit von Webseiten grundsätzlich zu verbessern. Wenn Millionen von Webseiten auf die
                    gleichen Schriften verweisen, werden sie nach dem ersten Besuch zwischengespeichert und
                    erscheinen sofort auf allen anderen später besuchten Webseiten wieder. Manchmal aktualisiert
                    Google Schriftdateien, um die Dateigröße zu reduzieren, die Abdeckung von Sprache zu erhöhen und
                    das Design zu verbessern.
                </p>

                <p class="font-bold">Wie kann ich meine Daten löschen bzw. die Datenspeicherung verhindern?</p>
                <p class="mb-3">
                    Jene Daten, die Google für einen Tag bzw. ein Jahr speichert können nicht einfach gelöscht
                    werden. Die Daten werden beim Seitenaufruf automatisch an Google übermittelt. Um diese Daten
                    vorzeitig löschen zu können, müssen Sie den Google-Support auf
                    <a
                        href="https://support.google.com/?hl=de&tid=112449526"
                        class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        https://support.google.com/?hl=de&tid=112449526
                    </a>
                    kontaktieren. Datenspeicherung verhindern Sie in diesem Fall nur, wenn Sie unsere Seite nicht
                    besuchen.
                </p>
                <p class="mb-3">
                    Anders als andere Web-Schriften erlaubt uns Google uneingeschränkten Zugriff auf alle
                    Schriftarten. Wir können also unlimitiert auf ein Meer an Schriftarten zugreifen und so das
                    Optimum für unsere Webseite rausholen. Mehr zu Google Fonts und weiteren Fragen finden Sie auf
                    <a href="https://developers.google.com/fonts/faq?tid=112449526"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        https://developers.google.com/fonts/faq?tid=112449526
                    </a>. Dort geht zwar Google auf
                    datenschutzrelevante Angelegenheiten ein, doch wirklich detaillierte Informationen über
                    Datenspeicherung sind nicht enthalten. Es ist relativ schwierig, von Google wirklich präzise
                    Informationen über gespeicherten Daten zu bekommen.
                </p>

                <p class="font-bold">Rechtsgrundlage</p>
                <p class="mb-3">
                    Wenn Sie eingewilligt haben, dass Google Fonts eingesetzt werden darf, ist die Rechtsgrundlage
                    der entsprechenden Datenverarbeitung diese Einwilligung. Diese Einwilligung stellt laut
                    <span class="font-bold">Art. 6 Abs. 1 lit. a DSGVO (Einwilligung)</span> die Rechtsgrundlage für
                    die Verarbeitung personenbezogener Daten, wie sie bei der Erfassung durch Google Fonts vorkommen
                    kann, dar.
                </p>
                <p class="mb-3">
                    Von unserer Seite besteht zudem ein berechtigtes Interesse, Google Font zu verwenden, um unser
                    Online-Service zu optimieren. Die dafür entsprechende Rechtsgrundlage ist
                    <span class="font-bold">Art. 6 Abs. 1 lit. f DSGVO (Berechtigte Interessen)</span>. Wir setzen
                    Google Font gleichwohl nur ein, soweit Sie eine Einwilligung erteilt haben.
                </p>
                <p class="mb-3">
                    Google verarbeitet Daten von Ihnen u.a. auch in den USA. Wir weisen darauf hin, dass nach
                    Meinung des Europäischen Gerichtshofs derzeit kein angemessenes Schutzniveau für den
                    Datentransfer in die USA besteht. Dies kann mit verschiedenen Risiken für die Rechtmäßigkeit und
                    Sicherheit der Datenverarbeitung einhergehen.
                </p>
                <p class="mb-3">
                    Als Grundlage der Datenverarbeitung bei Empfängern mit Sitz in Drittstaaten (außerhalb der
                    Europäischen Union, Island, Liechtenstein, Norwegen, also insbesondere in den USA) oder einer
                    Datenweitergabe dorthin verwendet Google sogenannte Standardvertragsklauseln (= Art. 46. Abs. 2
                    und 3 DSGVO). Standardvertragsklauseln (Standard Contractual Clauses – SCC) sind von der
                    EU-Kommission bereitgestellte Mustervorlagen und sollen sicherstellen, dass Ihre Daten auch dann
                    den europäischen Datenschutzstandards entsprechen, wenn diese in Drittländer (wie beispielsweise
                    in die USA) überliefert und dort gespeichert werden. Durch diese Klauseln verpflichtet sich
                    Google, bei der Verarbeitung Ihrer relevanten Daten, das europäische Datenschutzniveau
                    einzuhalten, selbst wenn die Daten in den USA gespeichert, verarbeitet und verwaltet werden.
                    Diese Klauseln basieren auf einem Durchführungsbeschluss der EU-Kommission. Sie finden den
                    Beschluss und die entsprechenden Standardvertragsklauseln u.a. hier:
                    <a href="https://eur-lex.europa.eu/eli/dec_impl/2021/914/oj?locale=de"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        https://eur-lex.europa.eu/eli/dec_impl/2021/914/oj?locale=de
                    </a>
                </p>
                <p class="mb-3">
                    Die Google Ads Datenverarbeitungsbedingungen (Google Ads Data Processing Terms), welche auch den
                    Standardvertragsklauseln für Google Fonts entsprechen, finden Sie unter
                    <a href="https://business.safety.google/adsprocessorterms/"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        https://business.safety.google/adsprocessorterms/
                    </a>.
                </p>
                <p>
                    Welche Daten grundsätzlich von Google erfasst werden und wofür diese Daten verwendet werden,
                    können Sie auch auf
                    <a href="https://www.google.com/intl/de/policies/privacy/"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        https://www.google.com/intl/de/policies/privacy/
                    </a>
                    nachlesen.
                </p>
            </section>
            <section id="terms" class="mb-8 dark:text-white">
                <div class="md:text-2xl text-xl mb-1">Erklärung verwendeter Begriffe</div>
                <p class="mb-3">
                    Wir sind stets bemüht unsere Datenschutzerklärung so klar und verständlich wie möglich zu
                    verfassen. Besonders bei technischen und rechtlichen Themen ist das allerdings nicht immer ganz
                    einfach. Es macht oft Sinn juristische Begriffe (wie z. B. personenbezogene Daten) oder
                    bestimmte technische Ausdrücke (wie z. B. Cookies, IP-Adresse) zu verwenden. Wir möchte diese
                    aber nicht ohne Erklärung verwenden. Nachfolgend finden Sie nun eine alphabetische Liste von
                    wichtigen verwendeten Begriffen, auf die wir in der bisherigen Datenschutzerklärung vielleicht
                    noch nicht ausreichend eingegangen sind. Falls diese Begriffe der DSGVO entnommen wurden und es
                    sich um Begriffsbestimmungen handelt, werden wir hier auch die DSGVO-Texte anführen und
                    gegebenenfalls noch eigene Erläuterungen hinzufügen.
                </p>

                <p class="text-xl font-bold mb-1">Auftragsverarbeiter</p>
                <p class="mb-3">Begriffsbestimmung nach Artikel 4 der DSGVO</p>
                <p class="mb-3">Im Sinne dieser Verordnung bezeichnet der Ausdruck:</p>
                <p class="bg-slate-400 dark:bg-slate-500 border-l-8 p-2 ml-2 rounded-lg border-accent-500 dark:border-accent-600 mb-3">
                    „Profiling“ jede Art der automatisierten Verarbeitung personenbezogener Daten, die darin
                    besteht, dass diese personenbezogenen Daten verwendet werden, um bestimmte persönliche Aspekte,
                    die sich auf eine natürliche Person beziehen, zu bewerten, insbesondere um Aspekte bezüglich
                    Arbeitsleistung, wirtschaftliche Lage, Gesundheit, persönliche Vorlieben, Interessen,
                    Zuverlässigkeit, Verhalten, Aufenthaltsort oder Ortswechsel dieser natürlichen Person zu
                    analysieren oder vorherzusagen;
                </p>
                <p class="mb-3">
                    <span class="font-bold">Erläuterung:</span> Wir sind als Unternehmen und Websiteinhaber für alle
                    Daten, die wir von Ihnen verarbeiten verantwortlich. Neben den Verantwortlichen kann es auch
                    sogenannte Auftragsverarbeiter geben. Dazu zählt jedes Unternehmen bzw. jede Person, die in
                    unserem Auftrag personenbezogene Daten verarbeitet. Auftragsverarbeiter können folglich, neben
                    Dienstleistern wie Steuerberater, etwa auch Hosting- oder Cloudanbieter, Bezahlungs- oder
                    Newsletter-Anbieter oder große Unternehmen wie beispielsweise Google oder Microsoft sein.
                </p>

                <p class="text-xl font-bold mb-1">Einwilligung</p>
                <p class="mb-3">Begriffsbestimmung nach Artikel 4 der DSGVO</p>
                <p class="mb-3">Im Sinne dieser Verordnung bezeichnet der Ausdruck:</p>
                <p class="bg-slate-400 dark:bg-slate-500 border-l-8 p-2 ml-2 rounded-lg border-accent-500 dark:border-accent-600 mb-3">
                    „Einwilligung“ der betroffenen Person jede freiwillig für den bestimmten Fall, in informierter
                    Weise und unmissverständlich abgegebene Willensbekundung in Form einer Erklärung oder einer
                    sonstigen eindeutigen bestätigenden Handlung, mit der die betroffene Person zu verstehen gibt,
                    dass sie mit der Verarbeitung der sie betreffenden personenbezogenen Daten einverstanden ist;
                </p>
                <p class="mb-3">
                    <span class="font-bold">Erläuterung:</span> In der Regel erfolgt bei Websites eine solche
                    Einwilligung über ein Cookie-Consent-Tool. Sie kennen das bestimmt. Immer wenn Sie erstmals eine
                    Website besuchen, werden Sie meist über einen Banner gefragt, ob Sie der Datenverarbeitung
                    zustimmen bzw. einwilligen. Meist können Sie auch individuelle Einstellungen treffen und so
                    selbst entscheiden, welche Datenverarbeitung Sie erlauben und welche nicht. Wenn Sie nicht
                    einwilligen, dürfen auch keine personenbezogene Daten von Ihnen verarbeitet werden.
                    Grundsätzlich kann eine Einwilligung natürlich auch schriftlich, also nicht über ein Tool,
                    erfolgen.
                </p>

                <p class="text-xl font-bold mb-1">Personenbezogene Daten</p>
                <p class="mb-3">Begriffsbestimmung nach Artikel 4 der DSGVO</p>
                <p class="mb-3">Im Sinne dieser Verordnung bezeichnet der Ausdruck:</p>
                <p class="bg-slate-400 dark:bg-slate-500 border-l-8 p-2 ml-2 rounded-lg border-accent-500 dark:border-accent-600 mb-3">
                    „personenbezogene Daten“ alle Informationen, die sich auf eine identifizierte oder
                    identifizierbare natürliche Person (im Folgenden „betroffene Person“) beziehen; als
                    identifizierbar wird eine natürliche Person angesehen, die direkt oder indirekt, insbesondere
                    mittels Zuordnung zu einer Kennung wie einem Namen, zu einer Kennnummer, zu Standortdaten, zu
                    einer Online-Kennung oder zu einem oder mehreren besonderen Merkmalen, die Ausdruck der
                    physischen, physiologischen, genetischen, psychischen, wirtschaftlichen, kulturellen oder
                    sozialen Identität dieser natürlichen Person sind, identifiziert werden kann;
                </p>
                <p class="mb-3">
                    <span class="font-bold">Erläuterung:</span> Personenbezogene Daten sind also all jene Daten, die
                    Sie als Person identifizieren können. Das sind in der Regel Daten wie etwa:
                </p>
                <ul class="pl-6 list-disc">
                    <li>Name</li>
                    <li>Adresse</li>
                    <li>E-Mail-Adresse</li>
                    <li>Post-Anschrift</li>
                    <li>Telefonnummer</li>
                    <li>Geburtsdatum</li>
                    <li>
                        Kennnummern wie Sozialversicherungsnummer, Steueridentifikationsnummer,
                        Personalausweisnummer oder Matrikelnummer
                    </li>
                    <li>Bankdaten wie Kontonummer, Kreditinformationen, Kontostände uvm.</li>
                </ul>
                <p class="mb-3">
                    Laut Europäischem Gerichtshof (EuGH) zählt auch Ihre IP-Adresse zu den personenbezogenen Daten.
                    IT-Experten können anhand Ihrer IP-Adresse zumindest den ungefähren Standort Ihres Geräts und in
                    weiterer Folge Sie als Anschlussinhabers feststellen. Daher benötigt auch das Speichern einer
                    IP-Adresse eine Rechtsgrundlage im Sinne der DSGVO. Es gibt auch noch sogenannte „besondere
                    Kategorien“ der personenbezogenen Daten, die auch besonders schützenswert sind. Dazu zählen:
                </p>
                <ul class="pl-6 list-disc">
                    <li>rassische und ethnische Herkunft</li>
                    <li>politische Meinungen</li>
                    <li>religiöse bzw. weltanschauliche Überzeugungen</li>
                    <li>die Gewerkschaftszugehörigkeit</li>
                    <li>
                        genetische Daten wie beispielsweise Daten, die aus Blut- oder Speichelproben entnommen
                        werden
                    </li>
                    <li>
                        biometrische Daten (das sind Informationen zu psychischen, körperlichen oder
                        verhaltenstypischen Merkmalen, die eine Person identifizieren können).
                    </li>
                    <li>Gesundheitsdaten</li>
                    <li>Daten zur sexuellen Orientierung oder zum Sexualleben</li>
                </ul>

                <p class="text-xl font-bold mb-1">Profiling</p>
                <p class="mb-3">Begriffsbestimmung nach Artikel 4 der DSGVO</p>
                <p class="mb-3">Im Sinne dieser Verordnung bezeichnet der Ausdruck:</p>
                <p class="bg-slate-400 dark:bg-slate-500 border-l-8 p-2 ml-2 rounded-lg border-accent-500 dark:border-accent-600 mb-3">
                    „Profiling“ jede Art der automatisierten Verarbeitung personenbezogener Daten, die darin
                    besteht, dass diese personenbezogenen Daten verwendet werden, um bestimmte persönliche Aspekte,
                    die sich auf eine natürliche Person beziehen, zu bewerten, insbesondere um Aspekte bezüglich
                    Arbeitsleistung, wirtschaftliche Lage, Gesundheit, persönliche Vorlieben, Interessen,
                    Zuverlässigkeit, Verhalten, Aufenthaltsort oder Ortswechsel dieser natürlichen Person zu
                    analysieren oder vorherzusagen;
                </p>
                <p class="mb-3">
                    <span class="font-bold">Erläuterung:</span> Beim Profiling werden verschiedene Informationen
                    über eine Person zusammengetragen, um daraus mehr über diese Person zu erfahren. Im Webbereich
                    wird Profiling häufig für Werbezwecke oder auch für Bonitätsprüfungen angewandt. Web- bzw.
                    Werbeanalyseprogramme sammeln zum Beispiel Daten über Ihre Verhalten und Ihre Interessen auf
                    einer Website. Daraus ergibt sich ein spezielles Userprofil, mit dessen Hilfe Werbung gezielt an
                    eine Zielgruppe ausgespielt werden kann.
                </p>

                <p class="text-xl font-bold mb-1">Verantwortlicher</p>
                <p class="mb-3">Begriffsbestimmung nach Artikel 4 der DSGVO</p>
                <p class="mb-3">Im Sinne dieser Verordnung bezeichnet der Ausdruck:</p>
                <p class="bg-slate-400 dark:bg-slate-500 border-l-8 p-2 ml-2 rounded-lg border-accent-500 dark:border-accent-600 mb-3">
                    „Verantwortlicher“ die natürliche oder juristische Person, Behörde, Einrichtung oder andere
                    Stelle, die allein oder gemeinsam mit anderen über die Zwecke und Mittel der Verarbeitung von
                    personenbezogenen Daten entscheidet; sind die Zwecke und Mittel dieser Verarbeitung durch das
                    Unionsrecht oder das Recht der Mitgliedstaaten vorgegeben, so kann der Verantwortliche
                    beziehungsweise können die bestimmten Kriterien seiner Benennung nach dem Unionsrecht oder dem
                    Recht der Mitgliedstaaten vorgesehen werden;
                </p>
                <p class="mb-3">
                    <span class="font-bold">Erläuterung:</span> In unserem Fall sind wir für die Verarbeitung Ihrer
                    personenbezogenen Daten verantwortlich und folglich der “Verantwortliche”. Wenn wir erhobene
                    Daten zur Verarbeitung an andere Dienstleister weitergeben, sind diese “Auftragsverarbeiter”.
                    Dafür muss ein “Auftragsverarbeitungsvertrag (AVV)” unterzeichnet werden.
                </p>

                <p class="text-xl font-bold mb-1">Verarbeitung</p>
                <p class="mb-3">Begriffsbestimmung nach Artikel 4 der DSGVO</p>
                <p class="mb-3">Im Sinne dieser Verordnung bezeichnet der Ausdruck:</p>
                <p class="bg-slate-400 dark:bg-slate-500 border-l-8 p-2 ml-2 rounded-lg border-accent-500 dark:border-accent-600 mb-3">
                    „Verarbeitung“ jeden mit oder ohne Hilfe automatisierter Verfahren ausgeführten Vorgang oder
                    jede solche Vorgangsreihe im Zusammenhang mit personenbezogenen Daten wie das Erheben, das
                    Erfassen, die Organisation, das Ordnen, die Speicherung, die Anpassung oder Veränderung, das
                    Auslesen, das Abfragen, die Verwendung, die Offenlegung durch Übermittlung, Verbreitung oder
                    eine andere Form der Bereitstellung, den Abgleich oder die Verknüpfung, die Einschränkung, das
                    Löschen oder die Vernichtung;
                </p>
                <p class="mb-3">
                    <span class="font-bold">Anmerkung:</span> Wenn wir in unserer Datenschutzerklärung von
                    Verarbeitung sprechen, meinen wir damit jegliche Art von Datenverarbeitung. Dazu zählt, wie oben
                    in der originalen DSGVO-Erklärung erwähnt, nicht nur das Erheben sondern auch das Speichern und
                    Verarbeiten von Daten.
                </p>

            </section>
            <section id="final" class="mb-8 dark:text-white">
                <div class="md:text-2xl text-xl mb-1">Schlusswort</div>
                <p>
                    Herzlichen Glückwunsch! Wenn Sie diese Zeilen lesen, haben Sie sich wirklich durch unsere
                    gesamte Datenschutzerklärung „gekämpft“ oder zumindest bis hier hin gescrollt. Wie Sie am Umfang
                    unserer Datenschutzerklärung sehen, nehmen wir den Schutz Ihrer persönlichen Daten, alles andere
                    als auf die leichte Schulter.
                </p>
                <p>
                    Uns ist es wichtig, Sie nach bestem Wissen und Gewissen über die Verarbeitung personenbezogener
                    Daten zu informieren. Dabei wollen wir Ihnen aber nicht nur mitteilen, welche Daten verarbeitet
                    werden, sondern auch die Beweggründe für die Verwendung diverser Softwareprogramme näherbringen.
                    In der Regel klingen Datenschutzerklärung sehr technisch und juristisch. Da die meisten von
                    Ihnen aber keine Webentwickler oder Juristen sind, wollten wir auch sprachlich einen anderen Weg
                    gehen und den Sachverhalt in einfacher und klarer Sprache erklären. Immer ist dies natürlich
                    aufgrund der Thematik nicht möglich. Daher werden die wichtigsten Begriffe am Ende der
                    Datenschutzerklärung näher erläutert.
                </p>
                <p class="mb-3">
                    Bei Fragen zum Thema Datenschutz auf unserer Website zögern Sie bitte nicht, uns oder die
                    verantwortliche Stelle zu kontaktieren. Wir wünschen Ihnen noch eine schöne Zeit und hoffen, Sie
                    auf unserer Website bald wieder begrüßen zu dürfen.
                </p>

                <p class="mb-3">Alle Texte sind urheberrechtlich geschützt.</p>
                <p>
                    Quelle:
                    <a href="https://www.adsimple.at/datenschutz-generator/"
                       class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        Erstellt mit dem Datenschutz Generator von AdSimple
                    </a>
                </p>
            </section>


        </div>
    </div>
@endpush
