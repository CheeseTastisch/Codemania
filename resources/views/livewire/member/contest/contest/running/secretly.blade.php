<div class="w-full flex-col flex items-center p-1">
    <p>Wir haben die Abgabe bewertet.</p>
    <p class="mt-2">Um den Contest spannender zu gestalten, werden die Ergebnisse erst nach dem Ende des Contests veröffentlicht.</p>
    <p class="mt-2">Du kannst die Aufgabe erneut abgeben.</p>
    <p class="mt-1 mb-3">Beachte jedoch, sollte die jetzige Abgabe richtig sein und die neue Abgabe falsch, wird die neue Abgabe gewertet.</p>

    <div class="flex flex-col gap-4 w-full p-1">
        <div class="flex justify-center">
            <a class="flex items-center gap-2 hover:text-accent-400 dark:hover:text-accent-600 cursor-pointer" wire:click="downloadInputs">
                <svg class="h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <p>Alles downloaden</p>
            </a>
        </div>

        <div class="flex justify-center mt-3">
            <a class="flex items-center gap-2 hover:text-accent-400 dark:hover:text-accent-600" href="{{ route('public.file', $level->description_file_id) }}">
                <svg class="h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <p>Beschreibung</p>
            </a>
        </div>

        <div class="flex flex-col">
            @foreach($level->levelFiles->sortBy('id') as $levelFile)
                <div class="flex justify-between items-center p-1 rounded-md @if($loop->even) bg-accent-100 dark:bg-accent-900 @endif">
                    <div class="items-center">
                        <a class="flex items-center gap-2 hover:text-accent-400 dark:hover:text-accent-600" href="{{ route('public.file', $levelFile->input_file_id) }}">
                            <svg class="h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <p>Eingabe - {{ $loop->index + 1 }}</p>
                        </a>
                    </div>
                    <div class="flex justify-end gap-4 items-center">
                        @if(($levelFileSubmissions = $newLevelSubmission?->getFileSubmission($levelFile)) !== null)
                            <div class="hidden md:block">
                                <a class="flex items-center gap-2 hover:text-accent-400 dark:hover:text-accent-600" href="{{ route('public.file', $levelFileSubmissions->uploaded_file_id) }}">
                                    <svg class="h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <p>Abgabe - {{ $loop->index + 1 }}</p>
                                </a>
                            </div>
                        @endif
                        <div class="items-center">
                            <div class="relative">
                                <input type="file"
                                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                            file:!bg-accent-300 file:hover:!bg-accent-400 dark:file:!bg-accent-700 dark:file:hover:!bg-accent-600 file:!text-black dark:file:!text-white"
                                       wire:model="file.{{ $levelFile->id }}">

                                <div class="absolute right-1 bottom-2" wire:loading wire:target="file.{{ $levelFile->id }}">
                                    <svg aria-hidden="true" fill="none" class="inline w-4 h-4 mr-3 animate-bounce text-amber-500" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                </div>

                                @if(session('uploaded') == $levelFile->id)
                                    <svg x-data x-ref="self" aria-hidden="true" x-init="setTimeout(() => $refs.self ? $refs.self.remove() : null, 2000)"
                                         class="absolute right-2.5 bottom-1.5 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex flex-col items-center">
            <p>Source-Code</p>

            <div class="relative lg:w-1/3 w-full">
                <input type="file"
                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                     file:!bg-accent-300 file:hover:!bg-accent-400 dark:file:!bg-accent-700 dark:file:hover:!bg-accent-600 file:!text-black dark:file:!text-white"
                       wire:model="sourceFile">

                <div class="absolute right-1 bottom-2" wire:loading wire:target="sourceFile">
                    <svg aria-hidden="true" fill="none" class="inline w-4 h-4 mr-3 animate-bounce text-amber-500" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                </div>

                @if(session('uploaded') == 'sourceFile')
                    <svg x-data x-ref="self" aria-hidden="true" x-init="setTimeout(() => $refs.self ? $refs.self.remove() : null, 2000)"
                         class="absolute right-2.5 bottom-1.5 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                @endif
            </div>

            @if($newLevelSubmission?->source_file_id !== null)
                <a class="flex items-center mt-2 gap-2 hover:text-accent-400 dark:hover:text-accent-600" href="{{ route('public.file', $newLevelSubmission->source_file_id) }}">
                    <svg class="h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <p>Source-Code</p>
                </a>
            @endif
        </div>

        @if(($error = session('submissionError')) !== null)
            <x-alert.x>
                {{ $error }}
            </x-alert.x>
        @endif

        <x-button.big.livewire id="submit" action="submit">
            Abgeben & Bewerten
        </x-button.big.livewire>
    </div>


    <img src="{{ route('public.file', $levelSubmission->image_file_id) }}" alt="Meme" class="md:w-2/3 lg:w-1/3 3xl:w-1/4 w-full mt-5">
</div>
