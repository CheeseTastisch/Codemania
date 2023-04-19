<div>
    <div class="flex space-x-2 items-center">
        <label for="{{ $id }}" class="block text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
        <div class="relative">
            <div class="absolute inset-y-0 -left-1.5 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd"
                          d="M12.1 3.667a3.502 3.502 0 116.782 1.738 3.487 3.487 0 01-.907 1.57 3.495 3.495 0 01-1.617.919L16 7.99V10a.75.75 0 01-.22.53l-.25.25a.75.75 0 01-1.06 0l-.845-.844L7.22 16.34A2.25 2.25 0 015.629 17H5.12a.75.75 0 00-.53.22l-1.56 1.56a.75.75 0 01-1.061 0l-.75-.75a.75.75 0 010-1.06l1.56-1.561a.75.75 0 00.22-.53v-.508c0-.596.237-1.169.659-1.59l6.405-6.406-.844-.845a.75.75 0 010-1.06l.25-.25A.75.75 0 0110 4h2.01l.09-.333zM4.72 13.84l6.405-6.405 1.44 1.439-6.406 6.405a.75.75 0 01-.53.22H5.12c-.258 0-.511.044-.75.129a2.25 2.25 0 00.129-.75v-.508a.75.75 0 01.22-.53z"
                          fill-rule="evenodd"></path>
                </svg>
            </div>

            <div x-data="{color:
            @if($model instanceof \App\Models\Components\Modeled\Livewire\Livewire && $model->update === \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer) @entangle($model->model).defer
            @elseif($model instanceof \App\Models\Components\Modeled\Livewire\Livewire ) @entangle($model->model)
            @else {{ $model->value }}
            @endif}" x-ref="container" wire:ignore.self>

                <div id="{{ $id }}" class="w-8 h-8 rounded-lg" tabindex="0" :style="'background-color: ' + color"
                     x-ref="button" x-init="
                pickr = Pickr.create({
                    el: $refs.button,
                    container: $refs.container,
                    theme: '{{ $theme }}',
                    useAsButton: true,
                    autoReposition: true,
                    lockOpacity: {{ !$opacity }},
                    default: color,
                    closeWithKey: 'Escape',
                    components: {
                        preview: true,
                        hue: true,
                        opacity: true,

                        interaction: {
                            hex: true,

                            input: true,
                            save: true,
                            cancel: true
                        }
                    },
                    i18n: {
                        'ui:dialog': 'Color Picker',
                        'btn:toggle': 'Farbdarstellung umschalten',
                        'btn:swatch': 'Farbe auswählen',
                        'btn:last-color': 'Letzte Farbe verwenden',
                        'btn:save': 'Speichern',
                        'btn:cancel': 'Abbrechen',
                        'btn:clear': 'Farbe entfernen',

                        'aria:btn:save': 'Speichern',
                        'aria:btn:cancel': 'Abbrechen',
                        'aria:btn:clear': 'Farbe entfernen',
                        'aria:input': 'Farbeingabe',
                        'aria:palette': 'Farbpalette',
                        'aria:hue': 'Farbton',
                        'aria:opacity': 'Deckkraft'
                    }
                });
                pickr.on('save', (newColor) => {
                    color = newColor.toHEXA().toString();
                });
            "></div>
            </div>

            @if($updatable && session('updated') === $id)
                <svg x-data x-ref="self" aria-hidden="true" x-init="setTimeout(() => $refs.self ? $refs.self.remove() : null, 2000)"
                     class="absolute bottom-0.5 -right-8 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            @endif
        </div>
    </div>

    @if(count($errors->get($id)) > 1 && $multipleErrors)
        <ul id="{{ $id }}-error" class="text-xs text-red-400 dark:text-red-600 list-disc ml-6">
            @foreach($errors->get($id) as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @elseif($errors->has($id))
        <p id="{{ $id }}-error" class="ml-2 text-xs text-red-400 dark:text-red-600">
            {{ $errors->first('password') }}
        </p>
    @endif
</div>
