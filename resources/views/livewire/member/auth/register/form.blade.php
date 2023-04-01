<form class="mt-8 space-y-6" action="#">
    @error('rateLimit')
    <div
        class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
        role="alert" wire:poll.500ms>
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
             xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd"
                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                  fill-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Stop!</span>
        <div>
            <p class="font-semibold">Du hast zu viele Registrierungsversuche unternommen.</p>
            <p class="mt-1">Bitte versuche es in {{ $message }} Sekunden erneut.</p>
        </div>
    </div>
    @enderror

    @if(!$errors->has('rateLimit'))
        <div>
            <div class="relative">
                <input type="text" id="email" name="email" placeholder=" " wire:model.defer="email"
                       class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error('email') !border-red-400 dark:!border-red-600 @enderror"
                       @error('email') aria-describedby="email-error" @enderror/>
                <label for="email"
                       class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-slate-200 dark:bg-slate-800 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 peer-focus:text-accent-400 peer-focus:dark:text-accent-600 @error('email') !text-red-400 dark:!text-red-600 @enderror">
                    E-Mail
                </label>
            </div>
            @error('email')
            <p id="email-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div>
                    <div class="relative z-0 w-full md:mb-2 mb-6 group">
                        <input type="text" id="firstname" name="firstname" placeholder=" " wire:model.defer="firstname"
                               class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error('firstname') !border-red-400 dark:!border-red-600 @enderror"
                               @error('firstname') aria-describedby="firstname-error" @enderror/>
                        <label for="firstname"
                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-slate-200 dark:bg-slate-800 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 peer-focus:text-accent-400 peer-focus:dark:text-accent-600 @error('firstname') !text-red-400 dark:!text-red-600 @enderror">
                            Vorname
                        </label>
                    </div>
                    @error('firstname')
                    <p id="firstname-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div>
                    <div class="relative z-0 w-full mb-2 group">
                        <input type="text" id="lastname" name="lastname" placeholder=" " wire:model.defer="lastname"
                               class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error('lastname') !border-red-400 dark:!border-red-600 @enderror"
                               @error('lastname') aria-describedby="lastname-error" @enderror/>
                        <label for="lastname"
                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-slate-200 dark:bg-slate-800 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 peer-focus:text-accent-400 peer-focus:dark:text-accent-600 @error('lastname') !text-red-400 dark:!text-red-600 @enderror">
                            Nachname
                        </label>
                    </div>
                    @error('lastname')
                    <p id="lastname-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>

            <p class="text-xs">
                Du kannst deinen Anzeigenamen später in deinem Profil ändern.
            </p>
        </div>

        <div>
            <div class="relative">
                <input data-popover-target="popover-password" data-popover-placement="bottom"
                       type="password" id="password" name="password" placeholder=" " wire:model.defer="password"
                       class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error('password') !border-red-400 dark:!border-red-600 @enderror"
                       @error('password') aria-describedby="password-error" @enderror/>
                <label for="password"
                       class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-slate-200 dark:bg-slate-800 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 peer-focus:text-accent-400 peer-focus:dark:text-accent-600 @error('password') !text-red-400 dark:!text-red-600 @enderror">
                    Passwort
                </label>
            </div>
            @if(count($errors->get('password')) > 1)
                <ul id="password-error" class="mt-2 text-xs text-red-400 dark:text-red-600 list-disc ml-4">
                    @foreach($errors->get('password') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @elseif($errors->has('password'))
                <p id="password-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
                    {{ $errors->first('password') }}
                </p>
            @endif

            <div data-popover id="popover-password" role="tooltip"
                 class="absolute z-20 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-900 dark:border-gray-600 dark:text-gray-400"
                 wire:ignore>
                <div class="p-3 space-y-2">
                    <h3 class="font-semibold text-gray-900 dark:text-white">Deine Passwortstärke:</h3>
                    <div class="grid grid-cols-6 gap-2">
                        <div id="password-strength-1" class="rounded-md h-1 bg-gray-200 dark:bg-gray-600"></div>
                        <div id="password-strength-2" class="rounded-md h-1 bg-gray-200 dark:bg-gray-600"></div>
                        <div id="password-strength-3" class="rounded-md h-1 bg-gray-200 dark:bg-gray-600"></div>
                        <div id="password-strength-4" class="rounded-md h-1 bg-gray-200 dark:bg-gray-600"></div>
                        <div id="password-strength-5" class="rounded-md h-1 bg-gray-200 dark:bg-gray-600"></div>
                        <div id="password-strength-6" class="rounded-md h-1 bg-gray-200 dark:bg-gray-600"></div>
                    </div>
                    <p>Dein Passwort</p>
                    <ul>
                        <li class="flex items-center mb-1" id="password-length">
                            <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" aria-hidden="true"
                                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <svg class="w-4 h-4 mr-2 text-green-400 dark:text-green-500 hidden" aria-hidden="true"
                                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            muss mindestens 8 Zeichen lang sein
                        </li>
                        <li class="flex items-center mb-1" id="password-uppercase">
                            <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" aria-hidden="true"
                                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <svg class="w-4 h-4 mr-2 text-green-400 dark:text-green-500 hidden" aria-hidden="true"
                                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            muss mindestens einen Großbuchstaben enthalten
                        </li>
                        <li class="flex items-center mb-1" id="password-lowercase">
                            <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" aria-hidden="true"
                                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <svg class="w-4 h-4 mr-2 text-green-400 dark:text-green-500 hidden" aria-hidden="true"
                                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            muss mindestens einen Kleinbuchstaben enthalten
                        </li>
                        <li class="flex items-center mb-1" id="password-number">
                            <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" aria-hidden="true"
                                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <svg class="w-4 h-4 mr-2 text-green-400 dark:text-green-500 hidden" aria-hidden="true"
                                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            muss mindestens eine Zahl enthalten
                        </li>
                        <li class="flex items-center mb-1" id="password-special">
                            <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" aria-hidden="true"
                                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <svg class="w-4 h-4 mr-2 text-green-400 dark:text-green-500 hidden" aria-hidden="true"
                                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            muss mindestens ein Sonderzeichen enthalten
                        </li>
                        <li class="flex items-center mb-1">
                            <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" aria-hidden="true" fill="none"
                                 stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            darf nicht komprimiert sein
                        </li>
                    </ul>
                </div>
                <div data-popper-arrow></div>
            </div>
        </div>

        <div>
            <div class="relative">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder=" "
                       wire:model.defer="password_confirmation"
                       class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error('password_confirmation') !border-red-400 dark:!border-red-600 @enderror"
                       @error('password_confirmation') aria-describedby="password-error" @enderror/>
                <label for="password_confirmation"
                       class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-slate-200 dark:bg-slate-800 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 peer-focus:text-accent-400 peer-focus:dark:text-accent-600 @error('password_confirmation') !text-red-400 dark:!text-red-600 @enderror">
                    Passwort bestätigen
                </label>
            </div>
            @error('password_confirmation')
            <p id="password_confirmation-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="flex">
            <div class="flex items-center @error('privacy_policy') mb-4 @enderror">
                <input id="privacy_policy" type="checkbox" name="privacy_policy" wire:model.defer="privacy_policy"
                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-accent-400 dark:focus:ring-accent-600 dark:ring-offset-gray-800 focus:ring-2 bg-slate-200 dark:bg-slate-800 dark:border-gray-600 checked:!bg-accent-400 dark:checked:!bg-accent-600">
            </div>
            <div class="ml-2 text-sm">
                <label for="privacy_policy" class="text-sm font-medium text-gray-900 dark:text-gray-300">
                    Ich habe die
                    <a href="{{ route('public.privacy_policy') }}" class="text-accent-400 dark:text-accent-600 hover:underline">Datenschutzerklärung</a>
                    gelesen und akzeptiere diese.
                </label>

                @error('privacy_policy')
                    <p id="privacy_policy-error" class="text-xs font-normal text-red-400 dark:text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        <button type="submit" wire:click.prevent="register" wire:loading.attr="disabled" wire:target="register"
                class="w-full px-5 py-3 text-base font-medium text-center bg-accent-400 rounded-lg hover:bg-accent-600 focus:ring-4 focus:ring-accent-300 dark:bg-accent-700 dark:hover:bg-accent-800 dark:focus:ring-accent-800 disabled:cursor-not-allowed disabled:hover:bg-accent-400 disabled:dark:hover:bg-accent-600">
            <span wire:loading.remove wire:target="register">Registrieren</span>
            <span wire:loading wire:target="register">
                <svg aria-hidden="true" role="status"
                     class="inline w-4 h-4 mr-3 text-gray-200 animate-spin dark:text-gray-600 fill-accent-600 dark:fill-accent-400"
                     viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor"/>
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="fillColor"/>
                </svg>
                Lädt...
            </span>
        </button>

        <div class="text-sm font-medium dark:text-white">
            Bereits registriert?
            <a href="{{ route('member.auth.login') }}"
               class="hover:underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400">
                Jetzt Anmelden!
            </a>
        </div>
    @endif
</form>
