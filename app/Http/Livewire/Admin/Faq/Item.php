<?php

namespace App\Http\Livewire\Admin\Faq;

use App\Models\Faq;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Item extends Component
{

    public Faq $faq;

    public $question, $answer, $after;
    public $open;

    public function mount(): void
    {
        $this->question = $this->faq->question;
        $this->answer = $this->faq->answer;
        $this->after = $this->faq->previous?->id ?? -1;
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
            $this->emitUp('renderContainer');
        }
    }

    public function updatedAnswer(): void
    {
        $this->validateOnly('answer');

        if ($this->answer !== $this->faq->answer) $this->faq->update(['answer' => $this->answer]);
    }

    public function delete(): void
    {
        $this->faq->previous?->update(['next_id' => $this->faq->next_id]);
        $this->faq->delete();

        $this->emitUp('renderContainer');
        $this->emit('showToast', 'Die Frage wurde erfolgreich gelöscht.');
        $this->emit('accordion', 'remove', '#faq-accordion', "faq-{$this->faq->id}");
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
