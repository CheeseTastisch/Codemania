<div>
    <div class="relative">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="{{ $id }}">
            {{ $label }}
        </label>

        @if($wyiswyg)
            <div x-data="{editor: null}" x-init="editor = new wyiswyg.FroalaEditor(`#{{ $id }}-editor`, {
                language: 'de',
                height: 220,
                events: {
                    contentChanged: function () {
                        $refs.textarea.value = this.html.get();
                        $refs.textarea.dispatchEvent(new Event('input'));
                    }
                }
            }, function () {
                this.html.set($refs.textarea.value)
            });">
                <div wire:ignore id="{{ $id }}-editor"></div>

                @if($model instanceof \App\Models\Components\Modeled\Livewire\Livewire)
                    <textarea title="Textarea" x-ref="textarea" class="hidden" {{ $model->getAttributesAsString() }}></textarea>
                @endif
            </div>
        @else
            <textarea id="{{ $id }}" rows="{{ $rows }}"
                      class="block p-2.5 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 dark:text-white dark:border-gray-600 focus:ring-accent-200 focus:border-accent-400 dark:focus:ring-accent-800 dark:focus:border-accent-600
                      @error($id) !border-red-400 dark:!border-red-600 @enderror"
                      @error($id) aria-describedby="{{ $id }}-error" aria-invalid="true" @enderror
                      {{ $model->getAttributesAsString() }}>
            </textarea>
        @endif

        @if($updatable && session('updated') === $id)
            <svg x-data x-ref="self" aria-hidden="true" x-init="setTimeout(() => $refs.self ? $refs.self.remove() : null, 2000)"
                 class="absolute @if($wyiswyg) right-1.5 bottom-1.5 @else right-2.5 bottom-2.5 @endif text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
