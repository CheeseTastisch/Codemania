<x-overlay.x classes="xl:w-1/4 lg:w-1/3 sm:w-1/2 w-2/3 pr-4 pl-4 mt-3">
    <x-slot name="overlay">
        <div class="flex justify-center items-center bg-accent-400 dark:bg-accent-600 bg-opacity-70 font-bold px-5 h-full w-full">
            <div class="flex flex-col text-center">
                <div class="text-2xl font-bold">{{ $name }}</div>
                <div class="mt-2">{{ $description }}</div>
            </div>
        </div>
    </x-slot>

    <div class="bg-accent-300 dark:bg-accent-700 p-2">
        <div>
            <img class="mx-auto" src="{{ $image }}" alt="{{ $name }}">
        </div>
        <div class="text-center mt-2">{{ $name }}</div>
    </div>
</x-overlay.x>
