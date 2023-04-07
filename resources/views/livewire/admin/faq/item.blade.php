<div class="rounded-lg border border-gray-800 dark:border-gray-200 overflow-hidden mt-2" id="faq-container-{{ $faq->id }}">
    <button data-target="#faq-{{ $faq->id }}"
            class="flex items-center justify-between w-full px-4 py-4 font-medium text-lg text-left bg-accent-300 dark:bg-accent-700">
        <span>{{ $question }}</span>
        <svg class="w-6 h-6 shrink-0 transition-transform duration-500 @if(session()->has('updated')) rotate-180 @endif" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="p-4 overflow-hidden" id="faq-{{ $faq->id }}">
        <x-form.form :form="false" margin="">
            <x-form.input.simple name="question" label="Frage" wire="question" wire-type="lazy" updatable />
            <x-form.input.dropdown name="after" label="Nach" wire="after" wire-type="lazy" updatable>
                <option value="-1">Erste Frage</option>
                @foreach(\App\Models\Faq::sorted() as $target)
                    @if($target->id !== $faq->id)
                        <option value="{{ $target->id }}">{{ $target->question }}</option>
                    @endif
                @endforeach
            </x-form.input.dropdown>

            <x-form.input.wysiwyg name="answer" label="Antwort" id="{{ $faq->id }}" wire accordion-container="faq-accordion" accordion-target="#faq-{{ $faq->id }}">
                {!! $answer !!}
            </x-form.input.wysiwyg>

            <x-form.button type="button" wire="delete" name="Löschen" />
        </x-form.form>
    </div>
</div>
