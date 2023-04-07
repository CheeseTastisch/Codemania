<?php

namespace App\Concerns\Livewire;

trait LoadsDataLater
{

    public bool $loadData = false;

    public function initData(): void
    {
        $this->loadData = true;
        $this->dataLoaded();
    }

    protected function dataLoaded(): void
    {
        // Override this method to load data
    }

}
