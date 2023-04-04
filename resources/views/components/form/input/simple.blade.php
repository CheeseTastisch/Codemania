@if($type === 'hidden')
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
           class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error($name) !border-red-400 dark:!border-red-600 @enderror"
           aria-describedby="{{ $label }}"
           @if($wire && $wireType) wire:model.{{ $wireType }}="{{ $name }}" @elseif($wire) wire:model="{{ $name }}" @endif
           @if($value) value="{{ $value }}" @endif />
@else
<div>
    <div class="relative">
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
               class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer focus:border-accent-400 dark:focus:border-accent-600 @error($name) !border-red-400 dark:!border-red-600 @enderror"
               @error($name) aria-describedby="{{ $name }}-error" aria-invalid="true" @enderror
               @if($wire && $wireType) wire:model.{{ $wireType }}="{{ $name }}" @elseif($wire) wire:model="{{ $name }}" @endif
               @if($value) value="{{ $value }}" @endif />
        @if($updatable)
            @if(session('updated') === $name)
                <svg aria-hidden="true" class="absolute right-2.5 bottom-2.5 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            @endif
        @endif
        <label for="{{ $name }}"
               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-slate-200 dark:bg-slate-800 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 peer-focus:text-accent-400 peer-focus:dark:text-accent-600 @error($name) !text-red-400 dark:!text-red-600 @enderror">
            {{ $label }}
        </label>
    </div>
    @if($multipleErrors)
        @if(count($errors->get($name)) > 1)
            <ul id="{{ $name }}-error" class="mt-2 text-xs text-red-400 dark:text-red-600 list-disc ml-4">
                @foreach($errors->get($name) as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @elseif($errors->has($name))
            <p id="{{ $name }}-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
                {{ $errors->first('password') }}
            </p>
        @endif
    @else
        @error($name)
        <p id="{{ $name }}-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
            {{ $message }}
        </p>
        @enderror
    @endif
</div>
@endif
