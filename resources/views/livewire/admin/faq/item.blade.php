<div class="rounded-lg border border-gray-800 dark:border-gray-200 overflow-hidden mt-2">
    @if($faq?->id)
        <button id="faq-{{ $faq->id }}-question" aria-controls="faq-{{ $faq->id }}-answer" :aria-expanded="selected === {{ $faq->id }}"
                class="flex items-center justify-between w-full px-4 py-4 font-medium text-lg text-left bg-accent-300 dark:bg-accent-700"
                @click="selected = selected === {{ $faq->id }} ? null : {{ $faq->id }}">
            <span>{{ $question }}</span>
            <svg class="w-6 h-6 shrink-0 transition-transform duration-500" :class="{'rotate-180': selected === {{ $faq->id }}}"
                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <div id="faq-{{ $faq->id }}-answer" aria-labelledby="faq-{{ $faq->id }}-question"
             class="max-h-0 transition-all duration-700 ease-in-out overflow-hidden"
             x-ref="content{{ $faq->id }}" x-bind:style="selected === {{ $faq->id }} ? 'max-height: ' + $refs.content{{ $faq->id }}.scrollHeight + 'px;' : ''"
             x-data="{
                 updateHeight() {
                     if (selected === {{ $faq->id }}) this.$refs.content{{ $faq->id }}.style.maxHeight = this.$refs.content{{ $faq->id }}.scrollHeight + 'px';
                 }
             }">
            <div class="m-4">
                <x-form.x type="container">
                    <x-form.input.x
                        id="question-{{ $faq->id }}" label="Frage"
                        :model="\App\Models\Components\Modeled\Model::livewire('question', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
                        updatable />

                    <x-form.input.select
                        id="after-{{ $faq->id }}" label="Nach"
                        :model="\App\Models\Components\Modeled\Model::livewire('after', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
                        :options="$options"
                        updatable />

                    <x-form.input.textarea
                        id="answer-{{ $faq->id }}" label="Antwort"
                        :model="\App\Models\Components\Modeled\Model::livewire('answer')"
                        updatable wyiswyg />

                    <x-button.big.livewire
                        id="delete-{{ $faq->id }}" action="delete"
                        prevent loading full-width>
                        Löschen
                    </x-button.big.livewire>
                </x-form.x>
            </div>
        </div>
    @endif
</div>
