<?php

namespace App\Providers;

use App\Models\UploadedFile;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Str;

class StorageFileProvider
{

    public function uploadFile(File $file, User|null $from = null): UploadedFile {
        $name = $file->getFilename();
        $extension = $file->guessExtension() ?? $file->getExtension();
        do {
            $storage_path = Str::random();
        } while (Storage::exists("files/$storage_path.$extension"));

        $file->move(storage_path("app/files"), "$storage_path.$extension");

        return UploadedFile::create([
            'user_id' => $from?->id,
            'name' => $name,
            'extension' => $extension,
            'storage_path' => $storage_path,
        ]);
    }

    public function downloadFile(UploadedFile $file) {
        return Storage::download($this->getStoragePath($file), $this->getBaseName($file));
    }

    public function getStoragePath(UploadedFile $file): string
    {
        return "files/$file->storage_path.$file->extension";
    }

    public function getBaseName(UploadedFile $file): string
    {
        return "$file->name.$file->extension";
    }

}
