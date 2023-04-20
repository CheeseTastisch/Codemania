<?php

namespace App\Http\Livewire\Admin\Faq;

use App\Models\Faq;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Item extends Component
{

    public Faq $faq;

    public $faqId;
    public $options = [
        ['value' => -1, 'name' => 'Erste Frage'],
    ];

    public $question, $answer, $after;
    public $open;

    protected $listeners = [
        'deletedFaq' => 'deleted',
        'updateOrder' => 'updateAfter',
    ];

    public function mount(): void
    {
        $this->question = $this->faq->question;
        $this->answer = $this->faq->answer;
        $this->after = $this->faq->previous?->id ?? -1;

        collect(Faq::sorted())
            ->filter(fn ($faq) => $faq->id !== $this->faq->id)
            ->map(fn ($faq) => ['value' => $faq->id, 'name' => $faq->question])
            ->each(fn ($option) => $this->options[] = $option);
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.faq.item');
    }

    public function updatedQuestion(): void
    {
        $this->validateOnly('question');

        if ($this->question !== $this->faq->question) {
            $this->faq->update(['question' => $this->question]);
            session()->flash('updated', 'question');
        }
    }

    public function updatedAfter(): void
    {
        $this->validateOnly('after');

        if ($this->after !== $this->faq->previous?->id && ($this->after !== -1 || $this->faq->first)) {
            $this->faq->moveAfter($this->after === -1 ? null : Faq::find($this->after));
            session()->flash('updated', 'after');

            $this->emit('updateOrder');
        }
    }

    public function updatedAnswer(): void
    {
        $this->validateOnly('answer');

        if ($this->answer !== $this->faq->answer) {
            $this->faq->update(['answer' => $this->answer]);
            session()->flash('updated', 'answer');
        }
    }

    public function delete(): void
    {
        $this->faq->previous?->update(['next_id' => $this->faq->next_id]);
        if ($this->faq->first) $this->faq->next?->update(['first' => true]);

        $this->faq->delete();

        $this->emit('deletedFaq', $this->faq->id);
        $this->emit('showToast', 'Die Frage wurde erfolgreich gelöscht.');
    }

    public function deleted(int $id): void
    {
        if ($this->faq->id !== $id) {
            $this->options = collect($this->options)
                ->filter(fn ($option) => $option['value'] !== $id)
                ->toArray();
            $this->render();
        }
    }

    public function updateAfter(): void
    {
        $this->after = $this->faq->previous?->id ?? -1;
    }

    protected function getRules(): array
    {
        return [
            'question' => 'required|string',
            'answer' => 'required|string',
            'after' => 'required|numeric',
        ];
    }

}
