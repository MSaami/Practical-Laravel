<?php

namespace App\Services\Uploader;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StorageManager
{
    public function putFileAsPrivate(string $name, UploadedFile $file,string $type)
    {
        return Storage::disk('private')->putFileAs($type, $file, $name);

    }

    public function putFileAsPublic(string $name, UploadedFile $file,string $type)
    {
        return Storage::disk('public')->putFileAs($type, $file, $name);
    }


    public function getAbsolutePathOf(string $name, string $type, bool $isPrivate)
    {

        return $this->disk($isPrivate)->path($this->directoryPrefix($type, $name));

    }

    public function isFileExists(string $name, string $type, bool $isPrivate)
    {
        return $this->disk($isPrivate)->exists($this->directoryPrefix($type, $name));
    }

    public function getFile(string $name, string $type, bool $isPrivate)
    {
        return $this->disk($isPrivate)->download($this->directoryPrefix($type, $name));
    }


    public function deleteFile(string $name, string $type, bool $isPrivate)
    {
        return $this->disk($isPrivate)->delete($this->directoryPrefix($type, $name));
    }


    private function directoryPrefix($type , $name)
    {
        return $type . DIRECTORY_SEPARATOR . $name;
    }




    private function disk(bool $isPrivate)
    {
        return $isPrivate ? Storage::disk('private') : Storage::disk('public');
    }



}
