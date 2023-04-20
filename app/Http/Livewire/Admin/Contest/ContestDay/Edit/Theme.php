<?php

namespace App\Http\Livewire\Admin\Contest\ContestDay\Edit;

use App\Helper\Color\Color;
use App\Http\Controllers\FileController;
use App\Models\ContestDay;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Theme extends Component
{

    public ContestDay $contestDay;

    public string|null $color;

    public function mount(): void
    {
        $this->color = $this->contestDay->theme->five_hundred->getHex();
    }

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

        $this->color = $this->contestDay->theme->five_hundred->getHex();
        session()->flash('updated', 'color');
    }

    public function download(): BinaryFileResponse
    {
        $zipArchive = $this->contestDay->theme->generateZipArchive(true);
        return response()->download($zipArchive, 'theme.zip');
    }

    protected function getRules(): array
    {
        return [
            'color' => 'required|string',
        ];
    }

}
