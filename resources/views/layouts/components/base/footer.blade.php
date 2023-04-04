<footer class="flex-shrink-0 mt-8 m-4 bg-accent-400 dark:bg-accent-600 rounded-lg shadow">
    <div class="w-full container mx-auto p-4 md:px-6 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="{{ route('public.home') }}" class="flex items-center mb-4 sm:mb-0">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo"/>
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
