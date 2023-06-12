<footer class="flex-shrink-0 mt-8 m-4 bg-accent-300 dark:bg-accent-800 rounded-lg shadow">
    <div class="w-full container mx-auto p-4 md:px-6 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a class="flex items-center mb-4 sm:mb-0 cursor-pointer" x-data @click="setTheme(document.cookie.includes('theme=party') || document.cookie.includes('theme=dark-party') ? '{{ auth()->user()?->theme ?? 'light' }}' : '{{ auth()->user()?->theme === 'dark' ? 'dark-party' : 'party' }}')">
                <img src="{{ theme()?->imagePath('logo/dark-text.svg') ?? asset('storage/backup/logo/dark-text.svg') }}" class="h-6 mr-3 dark:hidden" alt="Codemania">
                <img src="{{ theme()?->imagePath('logo/light-text.svg') ?? asset('storage/backup/logo/light-text.svg') }}" class="h-6 mr-3 hidden dark:inline" alt="Codemania">

                <span class="self-center text-2xl font-semibold whitespace-nowrap">Codemania Contest</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm sm:mb-0">
                <li>
                    <a href="{{ route('public.imprint') }}" class="mr-4 hover:underline md:mr-6">Impressum</a>
                </li>
                <li>
                    <a href="{{ route('public.privacy_policy') }}" class="hover:underline">Datenschutz</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-black dark:border-white sm:mx-auto"/>
        <span class="block text-sm sm:text-center">
            Codemania &copy; {{ now()->year }} Alle Rechte vorbehalten.
        </span>
    </div>
</footer>
