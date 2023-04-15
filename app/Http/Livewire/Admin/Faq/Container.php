<?php

namespace App\Http\Livewire\Admin\Faq;

use App\Models\Faq;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Container extends Component
{

    public $selected;

    protected $listeners = [
        'deletedFaq' => 'deleted',
        'updateOrder' => '$refresh',
    ];

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.faq.container');
    }

    public function add(): void
    {
        $faq = Faq::create([
            'question' => 'Neue Frage',
            'answer' => 'Keine Antwort',
        ]);

        if (Faq::count() == 1) $faq->update(['first' => true]);
        else Faq::whereNextId(null)->where('id', '!=', $faq->id)->update(['next_id' => $faq->id]);

        $this->emit('addHtmlEditor', "answer-$faq->id");
        $this->selected = $faq->id;
    }

    public function deleted(int $id): void
    {
        if ($this->selected === $id) $this->selected = null;
    }

}
