<div x-data="{ open: false }" x-show="open" x-cloak>
    <div id="{{ $id }}" wire:ignore.self tabindex="-1" :aria-hidden="!open" role="dialog" aria-modal="true"
         x-on:modal-open="open = true" x-on:modal-close="open = false"
         x-on:modal-toggle="open = !open" @keydown.escape.window="open = false"
         class="fixed top-0 left-0 right-0 w-full overflow-x-hidden overflow-y-auto md:inset-0 h-full flex justify-center items-center z-[50]">
        <div class="relative w-full {{ $getMaxWidth }} max-h-full">
            <div class="relative bg-slate-200 dark:bg-slate-800 rounded-lg shadow-lg"
                 @click.outside="if (![...$event.target.classList].some(target => target.includes('datepicker'))) open = false">
                <!-- Modal header -->
                @if($title)
                    <div
                        class="flex items-start justify-between p-4 border-b rounded-t border-gray-300 dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            {{ $title }}
                        </h3>
                    </div>
                @endif

                @if($closeButton)
                    <button @click="open = false" type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Schließen</span>
                    </button>
                @endif

                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    {{ $slot }}
                </div>

                @if($withFooter)
                    <!-- Modal footer -->
                    <div
                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        {{ $footer }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="bg-gray-900 bg-opacity-50 fixed top-0 left-0 right-0 w-full h-full z-[40]"></div>
</div>
