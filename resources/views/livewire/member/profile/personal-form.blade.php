<form class="space-y-6" action="#">
    <div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div>
                <div class="relative z-0 w-full group">
                    <input type="text" id="firstname" name="firstname" placeholder=" " wire:model="firstname"
                           class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error('firstname') !border-red-400 dark:!border-red-600 @enderror"
                           @error('firstname') aria-describedby="firstname-error" @enderror/>
                    <label for="firstname"
                           class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 peer-focus:text-accent-400 peer-focus:dark:text-accent-600 @error('firstname') !text-red-400 dark:!text-red-600 @enderror">
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
                <div class="relative z-0 w-full group">
                    <input type="text" id="lastname" name="lastname" placeholder=" " wire:model="lastname"
                           class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error('lastname') !border-red-400 dark:!border-red-600 @enderror"
                           @error('lastname') aria-describedby="lastname-error" @enderror/>
                    <label for="lastname"
                           class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 peer-focus:text-accent-400 peer-focus:dark:text-accent-600 @error('lastname') !text-red-400 dark:!text-red-600 @enderror">
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
    </div>

    <div>
        <div class="relative">
            <input type="text" id="nickname" name="nickname" placeholder=" " wire:model="nickname"
                   class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error('nickname') !border-red-400 dark:!border-red-600 @enderror"
                   @error('nickname') aria-describedby="nickname-error" @enderror/>
            <label for="nickname"
                   class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 peer-focus:text-accent-400 peer-focus:dark:text-accent-600 @error('nickname') !text-red-400 dark:!text-red-600 @enderror">
                Nickname
            </label>
        </div>
        @error('nickname')
        <p id="nickname-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div>
        <label for="displayname"
               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anzeigenamen</label>
        <select id="displayname" name="displayname" wire:model="displayname"
                @error('displayname') aria-describedby="displayname-error" @enderror
                lass="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="first_name">Vorname</option>
            <option value="last_name">Nachname</option>
            <option value="fullname">Voller Name</option>
            <option value="nickname">Nickname</option>
        </select>

        @error('displayname')
        <p id="displayname-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div>
        <label for="birthday" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Geburtsdatum</label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                          clip-rule="evenodd"></path>
                </svg>
            </div>
            <input datepicker type="text" id="birthday" name="birthday" wire:model="birthday"
                   class="w-full bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="Datum auswählen"
                   @error('birthday') aria-describedby="birthday-error" @enderror>
        </div>

        @error('birthday')
        <p id="birthday-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div>
        <div class="relative">
            <input type="text" id="class" name="class" placeholder=" " wire:model="class"
                   class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error('class') !border-red-400 dark:!border-red-600 @enderror"
                   @error('class') aria-describedby="class-error" @enderror/>
            <label for="class"
                   class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 peer-focus:text-accent-400 peer-focus:dark:text-accent-600 @error('class') !text-red-400 dark:!text-red-600 @enderror">
                Klasse
            </label>
        </div>
        @error('class')
        <p id="class-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div>
        <label for="gender"
               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Geschlecht</label>
        <select id="gender" @error('gender') aria-describedby="gender-error" @enderror
        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="no">Nicht angegeben</option>
            <option value="m">Männlich</option>
            <option value="w">Weiblich</option>
            <option value="o">Divers</option>
        </select>

        @error('gender')
        <p id="gender-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div>
        <div class="relative">
            <input type="text" id="slogan" name="slogan" placeholder=" " wire:model="slogan"
                   class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error('slogan') !border-red-400 dark:!border-red-600 @enderror"
                   @error('slogan') aria-describedby="slogan-error" @enderror/>
            <label for="slogan"
                   class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 peer-focus:text-accent-400 peer-focus:dark:text-accent-600 @error('slogan') !text-red-400 dark:!text-red-600 @enderror">
                Slogan
            </label>
        </div>
        @error('slogan')
        <p id="slogan-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="profile_picture">
            Profilbild
        </label>
        <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            id="profile_picture" type="file"
            @error('profile_picture') aria-describedby="profile_picture-error" @enderror>

        @error('profile_picture')
        <p id="profile_picture-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
            {{ $message }}
        </p>
        @enderror
    </div>
</form>
