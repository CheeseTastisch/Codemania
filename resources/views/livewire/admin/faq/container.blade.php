<div>
    <div class="accordion-container" x-data="{selected: @entangle('selected').defer }">
        @foreach(\App\Models\Faq::sorted() as $faq)
            @livewire('admin.faq.item', ['faq' => $faq], key($faq->id))
        @endforeach
    </div>

    <div class="flex justify-center mt-4">
        <x-form.button wire="add" name="Frage hinzufügen" :full-width="false"/>
    </div>
</div>
