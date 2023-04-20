<div x-data="{
    timestamp: @if($model instanceof \App\Models\Components\Modeled\Livewire\Livewire && $model->update === \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer) @entangle($model->model).defer
                @elseif($model instanceof \App\Models\Components\Modeled\Livewire\Livewire ) @entangle($model->model)
                @else {{ $model->value }}
                @endif,
    date: ''}"
    x-init="$watch('timestamp', value => {
        date = value ? new Date(parseInt(value)).toLocaleDateString('de-DE', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric'
        }) : '';
    });
    $refs.datepicker.addEventListener('changeDate', event => {
        if (event.detail.date) timestamp = event.detail.date.getTime();
        else timestamp = null;
    });
    setTimeout(() => {
        new Datepicker($refs.datepicker, {
            language: 'de',
            todayBtn: 'linked',
            clearBtn: true,
            todayHighlight: true,
            format: 'dd.mm.yyyy'
        });
        if (timestamp) {
            date = new Date(parseInt(timestamp)).toLocaleDateString('de-DE', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            })
        }
    }, 0);
    ">
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <div class="relative w-full">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <input type="hidden" id="{{ $id }}-backend" {{ $model->getAttributesAsString() }}>

        <input datepicker x-ref="datepicker"
               type="text" id="{{ $id }}" name="{{ $id }}"
               class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent-400 focus:border-accent-400 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent-600 dark:focus:border-accent-600
               @error($id) !border-red-400 dark:!border-red-600 @enderror"
               placeholder="Datum auswählen"
               @error($id) aria-describedby="{{ $id }}-error" @enderror
                x-model="date">

        @if($updatable && session('updated') === $id)
            <svg x-data x-ref="self" aria-hidden="true" x-init="setTimeout(() => $refs.self ? $refs.self.remove() : null, 2000)"
                 class="absolute right-2.5 bottom-2 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
