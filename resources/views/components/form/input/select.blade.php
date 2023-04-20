<div>
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <div class="relative">
        <select id="{{ $id }}" name="{{ $id }}"
                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent-400 focus:border-accent-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent-600 dark:focus:border-accent-600
                @error($id) !border-red-400 dark:!border-red-600 @enderror"
                @error($id) aria-describedby="{{ $id }}-error" aria-invalid="true" @enderror
                {{ $model->getAttributesAsString() }}>
            @foreach($options as $option)
                <option value="{{ $option['value'] }}" @if(array_key_exists('selected', $option) && $option['selected']) selected @endif>{{ $option['name'] }}</option>
            @endforeach
        </select>

        @if($updatable && session('updated') === $id)
            <svg x-data x-ref="self" aria-hidden="true" x-init="setTimeout(() => $refs.self ? $refs.self.remove() : null, 2000)"
                 class="absolute right-8 bottom-2 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        @endif
    </div>

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
</div>
