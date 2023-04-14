<?php

namespace App\Http\Livewire\Admin\Contest\ContestDay\Edit;

use App\Helper\Color\Color;
use App\Models\ContestDay;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Theme extends Component
{

    public ContestDay $contestDay;

    public string|null $color;
    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.contest-day.edit.theme');
    }

    public function updatedColor(): void
    {
        $this->validateOnly('color');

        try {
            $this->contestDay->theme->generatePalette(Color::parseRgb($this->color));
        } catch (Exception $e) {
            $this->addError('color', 'Die Farbe ist keine gültige Farbe.');
            return;
        }

        $this->color = null;
        session()->flash('updated', 'color');
    }

    protected function getRules(): array
    {
        return [
            'color' => 'required|string',
        ];
    }

}
