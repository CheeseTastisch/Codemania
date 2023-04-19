<div class="relative">
    <div class="flex">
        <div class="flex items-center @error($id) mb-4 @enderror">
            <input id="{{ $id }}" type="checkbox" name="{{ $id }}"
                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-accent-400 dark:focus:ring-accent-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-slate-800 dark:border-gray-600 checked:!bg-accent-400 dark:checked:!bg-accent-600"
                   @error($id) aria-describedby="{{ $name }}-error" aria-invalid="true" @enderror
                {{ $model->getAttributesAsString() }}>
        </div>
        <div class="ml-2 text-sm">
            <label for="{{ $id }}" class="text-sm font-medium text-gray-900 dark:text-gray-300">
                {{ $slot }}
            </label>

            @if(count($errors->get($id)) > 1 && $multipleErrors)
                <ul id="{{ $id }}-error" class="text-xs text-red-400 dark:text-red-600 list-disc ml-4">
                    @foreach($errors->get($id) as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @elseif($errors->has($id))
                <p id="{{ $id }}-error" class="text-xs text-red-400 dark:text-red-600">
                    {{ $errors->first('password') }}
                </p>
            @endif
        </div>
    </div>

    @if($updatable && session('updated') === $id)
        <svg x-data x-ref="self" x-init="setTimeout(() => $refs.self ? $refs.self.remove() : null, 2000)" aria-hidden="true"
             class="absolute right-2.5 -bottom-1 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    @endif
</div>
