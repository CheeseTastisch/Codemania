<div>
    <div class="accordion-container" id="faq-accordion">
        @foreach(\App\Models\Faq::sorted() as $faq)
            @livewire('admin.faq.item', ['faq' => $faq], key($faq->id))
        @endforeach
    </div>

    <div class="flex justify-center mt-4">
        <x-form.button wire="add" name="Frage hinzufügen" :full-width="false"/>
    </div>
</div>
