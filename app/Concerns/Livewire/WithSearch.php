<?php

namespace App\Concerns\Livewire;

trait WithSearch
{

    public string $search = '';

    public function updatedSearch(): void
    {
        if (method_exists($this, 'resetPage')) $this->resetPage();
    }

    public function clearSearch(): void
    {
        if (method_exists($this, 'resetPage')) $this->resetPage();

        $this->search = '';
    }

}
