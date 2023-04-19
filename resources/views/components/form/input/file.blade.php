<div class="relative">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="{{ $id }}">{{ $label }}</label>
    <input id="{{ $id }}" type="file" accept="{{ $accept }}"
           class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
           @error($id) aria-describedby="{{ $name }}-error" aria-invalid="true" @enderror
            {{ $model->getAttributesAsString() }}>

    @if(count($errors->get($id)) > 1 && $multipleErrors)
        <ul id="{{ $id }}-error" class="mt-2 text-xs text-red-400 dark:text-red-600 list-disc ml-4">
            @foreach($errors->get($id) as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @elseif($errors->has($id))
        <p id="{{ $id }}-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
            {{ $errors->first($id) }}
        </p>
    @endif

    @if($updatable && session('updated') === $id)
        <svg x-data x-ref="self" aria-hidden="true" x-init="setTimeout(() => $refs.self ? $refs.self.remove() : null, 2000)"
             class="absolute right-2.5 bottom-1.5 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    @endif

    @if($model instanceof \App\Models\Components\Modeled\Livewire\Livewire)
        <div class="absolute right-1 bottom-2" wire:loading wire:target="{{ $model->model }}">
            <svg aria-hidden="true" fill="none" class="inline w-4 h-4 mr-3 animate-bounce text-amber-500" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
        </div>
    @endif
</div>
