<div class="mt-1" id="faq-accordion" wire:init="initData">
    @if($loadData)
        @foreach(\App\Models\Faq::sorted() as $faq)
            <div class="rounded-lg border border-gray-800 dark:border-gray-200 overflow-hidden mt-2">
                <button data-target="#faq-{{ $faq->id }}"
                        class="flex items-center justify-between w-full px-4 py-4 font-medium text-lg text-left bg-accent-300 dark:bg-accent-700">
                    <span>{{ $faq->question }}</span>
                    <svg class="w-6 h-6 shrink-0 transition-transform duration-500" fill="currentColor"
                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="px-4" id="faq-{{ $faq->id }}">
                    <div class="text-sm py-4 font-light">
                        {!! $faq->answer !!}
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
