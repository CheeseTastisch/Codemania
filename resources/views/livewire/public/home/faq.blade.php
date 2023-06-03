<div class="mt-1" wire:init="initData" x-data="{selected: null}">
    @if($loadData)
        @foreach(\App\Models\Faq::sorted() as $faq)
            <div class="rounded-lg border border-gray-800 dark:border-gray-200 overflow-hidden mt-2">
                <button id="faq-{{ $faq->id }}-question" aria-controls="faq-{{ $faq->id }}-answer" :aria-expanded="selected === '{{ $faq->id }}'"
                        class="flex items-center justify-between w-full px-4 py-4 font-medium text-lg text-left bg-accent-300 dark:bg-accent-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-accent-600 dark:focus:ring-accent-400"
                        @click="selected = selected === '{{ $faq->id }}' ? null : '{{ $faq->id }}'">
                    <span>{{ $faq->question }}</span>
                    <svg class="w-6 h-6 shrink-0 transition-transform duration-500"
                         :class="{'rotate-180': selected === '{{ $faq->id }}'}"
                         fill="currentColor"
                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div aria-describedby="faq-{{ $faq->id }}-question" id="faq-{{ $faq->id }}-answer"
                    class="px-4 max-h-0 transition-all duration-700 ease-in-out overflow-hidden" x-data
                    x-ref="content" x-bind:style="selected === '{{ $faq->id }}' ? 'max-height: ' + $refs.content.scrollHeight + 'px' : ''">
                    <div class="text-sm py-4 font-light">
                        {!! $faq->answer !!}
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="rounded-lg border border-gray-800 dark:border-gray-200 overflow-hidden mt-2">
            <button id="faq-example1-question" aria-controls="faq-example1-answer" :aria-expanded="selected === 'example1'"
                    class="flex items-center justify-between w-full px-4 py-4 font-medium text-lg text-left bg-accent-300 dark:bg-accent-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-accent-600 dark:focus:ring-accent-400"
                    @click="selected = selected === 'example1' ? null : 'example1'">
                <span class="h-4 w-64 bg-gray-400 dark:bg-gray-600 rounded-full animate-pulse"></span>
                <svg class="w-6 h-6 shrink-0 transition-transform duration-500"
                     :class="{'rotate-180': selected === 'example1'}"
                     fill="currentColor"
                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
            <div aria-describedby="faq-example1-question" id="faq-example1-answer"
                class="px-4 max-h-0 transition-all duration-700 ease-in-out overflow-hidden" x-data
                x-ref="content" x-bind:style="selected === 'example1' ? 'max-height: ' + $refs.content.scrollHeight + 'px' : ''">
                <div class="text-sm py-4 font-light animate-pulse">
                    <div class="h-3 w-80 bg-gray-400 dark:bg-gray-600 rounded-full"></div>
                    <div class="h-3 w-96 bg-gray-400 dark:bg-gray-600 rounded-full mt-2"></div>
                    <div class="h-3 w-72 bg-gray-400 dark:bg-gray-600 rounded-full mt-2"></div>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
        <div class="rounded-lg border border-gray-800 dark:border-gray-200 overflow-hidden mt-2">
            <button id="faq-example2-question" aria-controls="faq-example2-answer" :aria-expanded="selected === 'example2'"
                    class="flex items-center justify-between w-full px-4 py-4 font-medium text-lg text-left bg-accent-300 dark:bg-accent-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-accent-600 dark:focus:ring-accent-400"
                    @click="selected = selected === 'example2' ? null : 'example2'">
                <span class="h-4 w-64 bg-gray-400 dark:bg-gray-600 rounded-full animate-pulse"></span>
                <svg class="w-6 h-6 shrink-0 transition-transform duration-500"
                     :class="{'rotate-180': selected === 'example2'}"
                     fill="currentColor"
                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
            <div aria-describedby="faq-example2-question" id="faq-example2-answer"
                class="px-4 max-h-0 transition-all duration-700 ease-in-out overflow-hidden" x-data
                x-ref="content" x-bind:style="selected === 'example2' ? 'max-height: ' + $refs.content.scrollHeight + 'px' : ''">
                <div class="text-sm py-4 font-light animate-pulse">
                    <div class="h-3 w-80 bg-gray-400 dark:bg-gray-600 rounded-full"></div>
                    <div class="h-3 w-96 bg-gray-400 dark:bg-gray-600 rounded-full mt-2"></div>
                    <div class="h-3 w-72 bg-gray-400 dark:bg-gray-600 rounded-full mt-2"></div>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    @endif
</div>
