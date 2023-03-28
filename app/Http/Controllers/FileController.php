<?php

namespace App\Http\Controllers;

use App\Models\UploadedFile;
use Illuminate\Http\Request;
use StorageFile;

class FileController extends Controller
{

    public function downloadFile(int $id) {
        $file = UploadedFile::findOrFail($id);
        return StorageFile::downloadFile($file);
    }

}
