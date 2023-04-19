<div @if($indicated) x-data="{password: '', strength: 0}"
     x-init="$watch('password', value => strength = /[A-Z]/u.test(value) + /[a-z]/u.test(value) + /[0-9]/u.test(value) + /\p{Z}|\p{S}|\p{P}/u.test(value) + ((value.length >= 12) ? 1 : 0) + ((value.length >= 8) ? 1 : 0))" @endif>
    <div class="relative">
        <input type="password" id="{{ $id }}" name="{{ $id }}" placeholder=" "
               class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600
               @error($id) !border-red-400 dark:!border-red-600 @enderror"
               @error($id) aria-describedby="{{ $id }}-error" aria-invalid="true" @enderror
               {{ $model->getAttributesAsString() }}
               @if($indicated) x-model="password" @endif>

        @if($updatable && session('updated') === $id)
            <svg x-data x-ref="self" aria-hidden="true" x-init="setTimeout(() => $refs.self ? $refs.self.remove() : null, 2000)"
                 class="absolute right-2.5 bottom-2.5 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        @endif

        <label for="{{ $id }}"
               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-slate-200 dark:bg-slate-800 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 peer-focus:text-accent-400 peer-focus:dark:text-accent-600
               @error($id) !text-red-400 dark:!text-red-600 @enderror">
            {{ $label }}
        </label>
    </div>

    @if(count($errors->get($id)) > 1 && $multipleErrors)
        <ul id="{{ $id }}-error" class="mt-2 text-xs text-red-400 dark:text-red-600 list-disc ml-4">
            @foreach($errors->get($id) as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @elseif($errors->has($id))
        <p id="{{ $id }}-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
            {{ $errors->first($id) }}
        </p>
    @endif

    <!-- TODO: Convert to popover -->
    @if($indicated)
        <div wire:ignore class="absolute z-20 inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm w-72 dark:bg-gray-900 dark:border-gray-600 dark:text-gray-400">
            <div class="p-3 space-y-2">
                <h3 class="font-semibold text-gray-900 dark:text-white">Deine Passwortstärke:</h3>
                <div class="grid grid-cols-6 gap-2">
                    <div class="rounded-md h-1" :class="
                    strength >= 6 ? 'bg-green-300 dark:bg-green-400' :
                    strength >= 5 ? 'bg-lime-300 dark:bg-lime-400' :
                    strength >= 4 ? 'bg-yellow-300 dark:bg-yellow-400' :
                    strength >= 3 ? 'bg-amber-300 dark:bg-amber-400' :
                    strength >= 2 ? 'bg-orange-300 dark:bg-orange-400' :
                    strength >= 1 ? 'bg-red-300 dark:bg-red-400' :
                    'bg-gray-200 dark:bg-gray-600'"></div>
                    <div class="rounded-md h-1" :class="
                    strength >= 6 ? 'bg-green-300 dark:bg-green-400' :
                    strength >= 5 ? 'bg-lime-300 dark:bg-lime-400' :
                    strength >= 4 ? 'bg-yellow-300 dark:bg-yellow-400' :
                    strength >= 3 ? 'bg-amber-300 dark:bg-amber-400' :
                    strength >= 2 ? 'bg-orange-300 dark:bg-orange-400' :
                    'bg-gray-200 dark:bg-gray-600'"></div>
                    <div class="rounded-md h-1" :class="
                    strength >= 6 ? 'bg-green-300 dark:bg-green-400' :
                    strength >= 5 ? 'bg-lime-300 dark:bg-lime-400' :
                    strength >= 4 ? 'bg-yellow-300 dark:bg-yellow-400' :
                    strength >= 3 ? 'bg-amber-300 dark:bg-amber-400' :
                    'bg-gray-200 dark:bg-gray-600'"></div>
                    <div class="rounded-md h-1" :class="
                    strength >= 6 ? 'bg-green-300 dark:bg-green-400' :
                    strength >= 5 ? 'bg-lime-300 dark:bg-lime-400' :
                    strength >= 4 ? 'bg-yellow-300 dark:bg-yellow-400' :
                    'bg-gray-200 dark:bg-gray-600'"></div>
                    <div class="rounded-md h-1" :class="
                    strength >= 6 ? 'bg-green-300 dark:bg-green-400' :
                    strength >= 5 ? 'bg-lime-300 dark:bg-lime-400' :
                    'bg-gray-200 dark:bg-gray-600'"></div>
                    <div class="rounded-md h-1" :class="
                    strength >= 6 ? 'bg-green-300 dark:bg-green-400' :
                    'bg-gray-200 dark:bg-gray-600'"></div>
                </div>
                <p>Dein Passwort</p>
                <ul>
                    <li class="flex items-center mb-1">
                        <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" x-show="password.length < 8" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <svg class="w-4 h-4 mr-2 text-green-400 dark:text-green-500"  x-show="password.length >= 8" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        muss mindestens 8 Zeichen lang sein
                    </li>
                    <li class="flex items-center mb-1" id="{{ $id }}-uppercase">
                        <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" x-show="!/[A-Z]/u.test(password)" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <svg class="w-4 h-4 mr-2 text-green-400 dark:text-green-500" x-show="/[A-Z]/u.test(password)"  aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        muss mindestens einen Großbuchstaben enthalten
                    </li>
                    <li class="flex items-center mb-1" id="{{ $id }}-lowercase">
                        <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" x-show="!/[a-z]/u.test(password)" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <svg class="w-4 h-4 mr-2 text-green-400 dark:text-green-500" x-show="/[a-z]/u.test(password)" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        muss mindestens einen Kleinbuchstaben enthalten
                    </li>
                    <li class="flex items-center mb-1" id="{{ $id }}-number">
                        <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" x-show="!/[0-9]/u.test(password)" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <svg class="w-4 h-4 mr-2 text-green-400 dark:text-green-500" x-show="/[0-9]/u.test(password)" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        muss mindestens eine Zahl enthalten
                    </li>
                    <li class="flex items-center mb-1" id="{{ $id }}-special">
                        <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" x-show="!/\p{Z}|\p{S}|\p{P}/u.test(password)" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <svg class="w-4 h-4 mr-2 text-green-400 dark:text-green-500" x-show="/\p{Z}|\p{S}|\p{P}/u.test(password)" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        muss mindestens ein Sonderzeichen enthalten
                    </li>
                    <li class="flex items-center mb-1">
                        <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        darf nicht komprimiert sein
                    </li>
                </ul>
            </div>
        </div>
    @endif
</div>
