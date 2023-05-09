<?php

namespace App\Providers;

use App\Models\UploadedFile;
use App\Models\User;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Livewire\TemporaryUploadedFile;
use Str;

class StorageFileProvider
{

    public function uploadFile(TemporaryUploadedFile|\Illuminate\Http\UploadedFile|null $file, User|null $from = null): ?UploadedFile
    {
        if (!$file) return null;

        $name = $file->getClientOriginalName();

        $name = pathinfo($name, PATHINFO_FILENAME);
        $extension = $file->guessExtension() ?? $file->getClientOriginalExtension();
        $mimeType = $file->getMimeType();

        do {
            $storage_path = Str::random();
        } while (Storage::exists($this->getStoragePath($storage_path)));

        try {
            $content = $file->get();
        } catch (FileNotFoundException $e) {
            abort(500, 'File not found');
        }

        Storage::put($this->getStoragePath($storage_path), base64_encode($content));

        return UploadedFile::create([
            'user_id' => $from?->id,
            'name' => $name,
            'extension' => $extension,
            'mime_type' => $mimeType,
            'storage_path' => $storage_path,
        ]);
    }

    public function downloadFile(UploadedFile $file): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        return response()->streamDownload(
            fn () => print($this->getFileContent($file)),
            $this->getBaseName($file),
            ['Content-Type' => $file->mime_type]
        );
    }

    public function getFileContent(UploadedFile $file): string
    {
        $content = Storage::get($this->getStoragePath($file->storage_path));
        return base64_decode($content);
    }

    public function deleteFile(UploadedFile $file): void
    {
        Storage::delete($this->getStoragePath($file->storage_path));
        $file->delete();
    }

    public function getStoragePath(string $storageName): string
    {
        return "files/$storageName.secure";
    }

    public function getBaseName(UploadedFile $file): string
    {
        return "$file->name.$file->extension";
    }

}
