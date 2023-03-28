<form class="space-y-6" action="#">
    <div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div>
                <div class="relative z-0 w-full group mb-6 md:mb-0">
                    <input type="text" id="firstname" name="firstname" placeholder=" " wire:model.lazy="firstname"
                           class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error('firstname') !border-red-400 dark:!border-red-600 @enderror"
                           @error('firstname') aria-describedby="firstname-error" @enderror>
                    @if(session('updated') === 'firstname')
                        <svg aria-hidden="true" class="absolute right-2.5 bottom-2.5 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    @endif
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
                    <input type="text" id="lastname" name="lastname" placeholder=" " wire:model.lazy="lastname"
                           class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error('lastname') !border-red-400 dark:!border-red-600 @enderror"
                           @error('lastname') aria-describedby="lastname-error" @enderror/>
                    @if(session('updated') === 'lastname')
                        <svg aria-hidden="true" class="absolute right-2.5 bottom-2.5 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    @endif
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
            <input type="text" id="nickname" name="nickname" placeholder=" " wire:model.lazy="nickname"
                   class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error('nickname') !border-red-400 dark:!border-red-600 @enderror"
                   @error('nickname') aria-describedby="nickname-error" @enderror/>
            @if(session('updated') === 'nickname')
                <svg aria-hidden="true" class="absolute right-2.5 bottom-2.5 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            @endif
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
        <label for="display_name"
               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anzeigename</label>
        <div class="relative">
            <select id="display_name" name="display_name" wire:model="display_name"
                    @error('display_name') aria-describedby="display_name-error" @enderror
                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent-400 focus:border-accent-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent-600 dark:focus:border-accent-600">
                <option value="first_name">Vorname</option>
                <option value="last_name">Nachname</option>
                <option value="full_name">Voller Name</option>
                <option value="Nickname">Nickname</option>
            </select>
            @if(session('updated') === 'display_name')
                <svg aria-hidden="true" class="absolute right-8 bottom-2 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            @endif
        </div>

        @error('display_name')
        <p id="display_name-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
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
                   class="w-full bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent-400 focus:border-accent-400 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent-600 dark:focus:border-accent-600"
                   placeholder="Datum auswählen"
                   @error('birthday') aria-describedby="birthday-error" @enderror>
            @if(session('updated') === 'birthday')
                <svg aria-hidden="true" class="absolute right-8 bottom-2 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            @endif
        </div>

        @error('birthday')
        <p id="birthday-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div>
        <div class="relative">
            <input type="text" id="class" name="class" placeholder=" " wire:model.lazy="class"
                   class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error('class') !border-red-400 dark:!border-red-600 @enderror"
                   @error('class') aria-describedby="class-error" @enderror/>
            @if(session('updated') === 'class')
                <svg aria-hidden="true" class="absolute right-2.5 bottom-2.5 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            @endif
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
        <div class="relative">
            <select id="gender" @error('gender') aria-describedby="gender-error" @enderror wire:model="gender"
                   class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent-400 focus:border-accent-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent-600 dark:focus:border-accent-600">
                <option value="null">Nicht angegeben</option>
                <option value="m">Männlich</option>
                <option value="w">Weiblich</option>
                <option value="o">Divers</option>
            </select>
            @if(session('updated') === 'gender')
                <svg aria-hidden="true" class="absolute right-8 bottom-2 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            @endif
        </div>

        @error('gender')
        <p id="gender-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div>
        <div class="relative">
            <input type="text" id="slogan" name="slogan" placeholder=" " wire:model.lazy="slogan"
                   class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error('slogan') !border-red-400 dark:!border-red-600 @enderror"
                   @error('slogan') aria-describedby="slogan-error" @enderror/>
            @if(session('updated') === 'slogan')
                <svg aria-hidden="true" class="absolute right-2.5 bottom-2.5 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            @endif
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
            id="profile_picture" type="file" wire:model="profile_picture" accept="image/*"
            @error('profile_picture') aria-describedby="profile_picture-error" @enderror>
        @if(session('updated') === 'profile_picture')
            <svg aria-hidden="true" class="absolute right-8 bottom-2 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        @endif

        @error('profile_picture')
        <p id="profile_picture-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
            {{ $message }}
        </p>
        @enderror
    </div>


    <button wire:click.prevent="uploadProfilePicture" wire:loading.attr="uploadProfilePicture" wire:target="uploadProfilePicture"
            class="w-full px-5 py-3 text-base font-medium text-center bg-accent-400 rounded-lg hover:bg-accent-600 focus:ring-4 focus:ring-accent-300 dark:bg-accent-700 dark:hover:bg-accent-800 dark:focus:ring-accent-800 disabled:cursor-not-allowed disabled:hover:bg-accent-400 disabled:dark:hover:bg-accent-600">
        <span wire:loading.remove wire:target="uploadProfilePicture">
            Profilbild hochladen
        </span>
        <span wire:loading wire:target="uploadProfilePicture">
                <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-gray-200 animate-spin dark:text-gray-600 fill-accent-600 dark:fill-accent-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="fillColor"/>
                </svg>
                Lädt...
            </span>
    </button>
</form>
