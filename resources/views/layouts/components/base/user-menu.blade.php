<button type="button"
        class="flex mr-3 text-sm rounded-lg md:mr-0 focus:ring-4 focus:ring-accent-100 dark:focus:ring-accent-900 w-8 h-8"
        id="user-menu-button"
        aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
    <span class="sr-only">Benutzermenü öffnen</span>
    @if(($profilePicture = auth()->user()->profilePicture) != null)
        <div class="rounded-lg bg-gray-100 dark:bg-gray-600 overflow-hidden h-full w-full flex justify-center items-center">
            <img class="w-7 h-7 rounded-lg" src="{{ route('file.download', $profilePicture->id) }}" alt="Profilbild">
        </div>
    @else
        <div class="relative rounded-lg overflow-hidden w-full h-full">
            <div class="bg-gray-100 dark:bg-gray-600 w-full h-full">
                <svg class="absolute w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
            </div>
        </div>
    @endif
</button>

<div
    class="z-50 hidden my-4 text-base list-none bg-white dark:bg-gray-700 divide-y divide-gray-100 dark:divide-gray-600 rounded-lg shadow"
    id="user-dropdown">
    <div class="px-4 py-3">
        <span class="block text-sm text-accent-400 dark:text-accent-600">
            {{ auth()->user()->display_name }}
        </span>
        <span class="block text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
            {{ auth()->user()->email }}
        </span>
    </div>
    <ul class="py-2" aria-labelledby="user-menu-button">
        <li>
            <a href="{{ route('member.profile') }}"
               class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Mein Profil
            </a>
        </li>
        <li>
            <a href="#"
               class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Mein Team
            </a>
        </li>
        <li>
            <a href="#"
               class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Meine Challenge
            </a>
        </li>
        @if(auth()->user()->is_admin)
            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="block px-4 py-2 text-sm text-accent-400 dark:text-accent-600 hover:bg-gray-100 dark:hover:bg-gray-600">
                    Administration
                </a>
            </li>
        @endif
        <li>
            <a href="{{ route('member.auth.logout') }}"
               class="block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-600">
                Ausloggen
            </a>
        </li>
    </ul>
</div>
