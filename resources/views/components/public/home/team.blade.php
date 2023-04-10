<div class="xl:w-1/4 lg:w-1/3 sm:w-1/2 w-2/3 pr-4 pl-4 lg:mt-0 mt-3">
    <div class="relative w-full h-full">
        <div class="inset-0 z-0 bg-accent-300 dark:bg-accent-700 p-2">
            <div>
                <img class="mx-auto" src="{{ $image }}" alt="{{ $name }}">
            </div>
            <div class="text-center mt-2">
                {{ $name }}
            </div>
        </div>
        <div
            class="opacity-0 hover:opacity-100 focus:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center items-center text-center bg-accent-400 dark:bg-accent-600 !bg-opacity-70 font-bold px-5"
            tabindex="0">
            <div class="flex flex-col">
                <div class="text-2xl font-bold">
                    {{ $name }}
                </div>
                <div class="mt-2">
                    {{ $description }}
                </div>
            </div>
        </div>
    </div>
</div>
