<?php

namespace App\Services;

use App\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadService
{
    public function uploadFile($data, $path): File
    {
        $uploaded_file = $data->file;
        $str_random = Str::random(5);

        $file = new File();

        $file->name = $data->name;
        $file->original_name = $uploaded_file->getClientOriginalName();
        $file->mime_type = $uploaded_file->getMimeType();

        $file->url = config('filesystems.disks.public.url')
            . $path . '/'
            . $str_random  . '_'
            . $uploaded_file->getClientOriginalName();

        $file->path = $path . '/'
            . $str_random  . '_'
            . $uploaded_file->getClientOriginalName();

        $file->size = $uploaded_file->getSize();

        $file->save();

        Storage::putFileAs($path, $uploaded_file, $str_random . '_' .$uploaded_file->getClientOriginalName());

        return $file;
    }
}
