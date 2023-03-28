<form class="mt-8 space-y-6" action="#">
    @error('rateLimit')
    <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert" wire:poll.500ms>
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" fill-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Stop!</span>
        <div>
            <p class="font-semibold">Du hast zu viele Anmeldeversuche unternommen.</p>
            <p class="mt-1">Bitte versuche es in {{  $message }} Sekunden erneut.</p>
        </div>
    </div>
    @enderror

    @if(!$errors->has('rateLimit'))
        <div>
            <div class="relative">
                <input type="text" id="two_factor" name="two_factor" placeholder=" " wire:model.defer="two_factor"
                       class="invalid:text-red-600 block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error('two_factor') !border-red-400 dark:!border-red-600 @enderror"
                       @error('two_factor') aria-describedby="two_factor-error" @enderror/>
                <label for="two_factor"
                       class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-slate-200 dark:bg-slate-800 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 peer-focus:text-accent-400 peer-focus:dark:text-accent-600 @error('two_factor') !text-red-400 dark:!text-red-600 @enderror">
                    2FA Schlüssel
                </label>
            </div>
            @error('two_factor')
            <p id="two_factor-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
                {{ $message }}
            </p>
            @enderror
        </div>

        <button type="submit" wire:click.prevent="check" wire:loading.attr="disabled" wire:target="check"
                class="w-full px-5 py-3 text-base font-medium text-center bg-accent-400 rounded-lg hover:bg-accent-600 focus:ring-4 focus:ring-accent-300 dark:bg-accent-700 dark:hover:bg-accent-800 dark:focus:ring-accent-800 disabled:cursor-not-allowed disabled:hover:bg-accent-400 disabled:dark:hover:bg-accent-600">
            <span wire:loading.remove wire:target="check">Überprüfen</span>
            <span wire:loading wire:target="check">
                <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-gray-200 animate-spin dark:text-gray-600 fill-accent-600 dark:fill-accent-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="fillColor"/>
                </svg>
                Lädt...
            </span>
        </button>
    @endif
</form>
