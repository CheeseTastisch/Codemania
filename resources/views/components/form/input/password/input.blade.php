<div>
    <div class="relative">
        <input type="password" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
               class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error($name) !border-red-400 dark:!border-red-600 @enderror"
               @error($name) aria-describedby="{{ $name }}-error" aria-invalid="true" @enderror

               @if($wire && $wireType)
                   wire:model.{{ $wireType }}="{{ $name }}"
               @elseif($wire)
                   wire:model="{{ $name }}"
               @endif

               @if($value) value="{{ $value }}" @endif

               @if($indicator) data-popover-target="popover-{{ $name }}" data-popover-placement="bottom" @endif />

        @if($updatable)
            @if(session('updated') === $name)
                <svg aria-hidden="true" class="absolute right-2.5 bottom-2.5 text-green-400 dark:text-green-600 w-7 h-7 animate-hide"
                     fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round"
                          stroke-linejoin="round"></path>
                </svg>
            @endif
        @endif

        <label for="{{ $name }}"
               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-slate-200 dark:bg-slate-800 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 peer-focus:text-accent-400 peer-focus:dark:text-accent-600 @error($name) !text-red-400 dark:!text-red-600 @enderror">
            {{ $label }}
        </label>
    </div>

    @if($multipleErrors)
        @if(count($errors->get($name)) > 1)
            <ul id="{{ $name }}-error" class="mt-2 text-xs text-red-400 dark:text-red-600 list-disc ml-4">
                @foreach($errors->get($name) as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @elseif($errors->has($name))
            <p id="{{ $name }}-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
                {{ $errors->first('password') }}
            </p>
        @endif
    @else
        @error($name)
        <p id="{{ $name }}-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
            {{ $message }}
        </p>
        @enderror
    @endif

    @if($indicator)
        <div data-popover id="popover-{{ $name }}" role="tooltip" wire:ignore
             class="absolute z-20 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-900 dark:border-gray-600 dark:text-gray-400">
            <div class="p-3 space-y-2">
                <h3 class="font-semibold text-gray-900 dark:text-white">Deine Passwortstärke:</h3>
                <div class="grid grid-cols-6 gap-2">
                    <div id="{{ $name }}-strength-1" class="rounded-md h-1 bg-gray-200 dark:bg-gray-600"></div>
                    <div id="{{ $name }}-strength-2" class="rounded-md h-1 bg-gray-200 dark:bg-gray-600"></div>
                    <div id="{{ $name }}-strength-3" class="rounded-md h-1 bg-gray-200 dark:bg-gray-600"></div>
                    <div id="{{ $name }}-strength-4" class="rounded-md h-1 bg-gray-200 dark:bg-gray-600"></div>
                    <div id="{{ $name }}-strength-5" class="rounded-md h-1 bg-gray-200 dark:bg-gray-600"></div>
                    <div id="{{ $name }}-strength-6" class="rounded-md h-1 bg-gray-200 dark:bg-gray-600"></div>
                </div>
                <p>Dein Passwort</p>
                <ul>
                    <li class="flex items-center mb-1" id="{{ $name }}-length">
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
                    <li class="flex items-center mb-1" id="{{ $name }}-uppercase">
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
                    <li class="flex items-center mb-1" id="{{ $name }}-lowercase">
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
                    <li class="flex items-center mb-1" id="{{ $name }}-number">
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
                    <li class="flex items-center mb-1" id="{{ $name }}-special">
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
    @endif
</div>
