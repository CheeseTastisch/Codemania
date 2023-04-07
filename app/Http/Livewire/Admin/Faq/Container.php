<?php

namespace App\Http\Livewire\Admin\Faq;

use App\Models\Faq;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Container extends Component
{

    protected $listeners = [
        'renderContainer' => 'render',
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

        Faq::whereNextId(null)->where('id', '!=', $faq->id)->update(['next_id' => $faq->id]);

        $this->emit('accordion', 'add', 'faq-accordion', "#faq-container-$faq->id", true);
        $this->emit('addHtmlEditor', "answer-$faq->id");
    }

}
