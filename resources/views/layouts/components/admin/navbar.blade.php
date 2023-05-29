<nav
    class="bg-slate-200 dark:bg-slate-800 px-2 sm:px-4 py-2.5 fixed w-full z-20 top-0 left-0 border-b border-gray-400 dark:border-gray-600">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="{{ route('public.home') }}" class="flex items-center">
            <img src="{{ theme()?->imagePath('logo/dark-text.svg') ?? asset('storage/backup/logo/dark-text.svg') }}" class="h-6 mr-3 sm:h-9 dark:hidden" alt="Codemania">
            <img src="{{ theme()?->imagePath('logo/light-text.svg') ?? asset('storage/backup/logo/light-text.svg') }}" class="h-6 mr-3 sm:h-9 hidden dark:inline" alt="Codemania">
        </a>

        <div class="flex md:order-2">
            @include('layouts.components.base.user-menu')

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
                    <a href="{{ route('admin.dashboard') }}" class="nav-link @if(Route::is('admin.dashboard')) !text-accent-400 dark:!text-accent-600 @endif">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.faq') }}" class="nav-link @if(str(Route::currentRouteName())->startsWith('admin.faq')) !text-accent-400 dark:!text-accent-600 @endif">
                        FAQ
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.contest.contest-day.view') }}" class="nav-link @if(str(Route::currentRouteName())->startsWith('admin.contest')) !text-accent-400 dark:!text-accent-600 @endif">
                        Contests
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link @if(str(Route::currentRouteName())->startsWith('admin.user')) !text-accent-400 dark:!text-accent-600 @endif">
                        Benutzer
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.memes') }}" class="nav-link @if(str(Route::currentRouteName())->startsWith('admin.memes')) !text-accent-400 dark:!text-accent-600 @endif">
                        Memes
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
