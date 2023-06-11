<?php

namespace App\Http\Livewire\Public\Contest;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FileScanner extends Component
{
    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.public.contest.file-scanner');
    }

    public function downloadDescription(): BinaryFileResponse
    {
        return response()->download(storage_path('app/public/filescanner/Description.pdf'));
    }

    public function downloadScanner(): BinaryFileResponse
    {
        return response()->download(storage_path('app/public/filescanner/FileScanner.java'));
    }

}
