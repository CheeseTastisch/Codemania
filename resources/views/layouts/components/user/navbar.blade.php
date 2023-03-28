<nav
    class="bg-slate-200 dark:bg-slate-800 px-2 sm:px-4 py-2.5 fixed w-full z-20 top-0 left-0 border-b border-gray-400 dark:border-gray-600">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="{{ route('public.home') }}" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo">
        </a>

        <div class="flex md:order-2">
            @auth
                <button type="button"
                        class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                    <span class="sr-only">Benutzermenü öffnen</span>
                    <div class="relative w-8 h-8 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                        <svg class="absolute w-10 h-10 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <!--                <img class="w-8 h-8 rounded-full" src="./img/user-pic.webp" alt="user photo">-->
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
                                <a href="#"
                                   class="block px-4 py-2 text-sm text-accent-400 dark:text-accent-600 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    Admin Dashboard
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
            @else
                <a type="button"
                   class="bg-accent-400 dark:bg-accent-600 hover:bg-accent-600 dark:hover:bg-accent-400 focus:ring-4 focus:outline-none focus:ring-accent-300 dark:focus:ring-accent-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0"
                   href="{{ route('member.auth.login') }}">
                    Login
                </a>
            @endauth

            <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Navigationsmenü öffnen</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-slate-200 dark:bg-gray-800 md:dark:bg-slate-800 dark:border-gray-700">
                <li>
                    <a href="{{ route('public.home') }}#home" class="nav-link">Home</a>
                </li>
                <li>
                    <a href="{{ route('public.home') }}#sponsors" class="nav-link">Sponsoren</a>
                </li>
                <li>
                    <a href="{{ route('public.home') }}#contest" class="nav-link">Der Contest</a>
                </li>
                <li>
                    <a href="{{ route('public.home') }}#faq" class="nav-link">FAQ</a>
                </li>
                <li>
                    <a href="{{ route('public.home') }}#about" class="nav-link">Über Uns</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
