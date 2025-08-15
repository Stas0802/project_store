<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class FileUploadService
{
    /**
     * Uploaded file
     * @param UploadedFile $file
     * @param string $folder
     * @return string
     */
    public function uploadFile(UploadedFile $file, string $folder): string
    {

        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->storeAs("public/{$folder}" , $fileName);
        return $fileName;
    }

    /**
     * Delete file
     * @param string $folder
     * @param string $fileName
     * @return void
     */
    public function deleteFile(string $folder, string $fileName): void
    {

        $path = public_path("storage/{$folder}/{$fileName}");
        if(file_exists($path)){
            unlink($path);
        }
    }
}
