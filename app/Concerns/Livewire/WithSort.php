<?php

namespace App\Concerns\Livewire;

trait WithSort
{

    public string $sortField;
    public string $sortDirection;


    public function sortBy($field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }

        if (method_exists($this, 'resetPage')) $this->resetPage();
    }
}
