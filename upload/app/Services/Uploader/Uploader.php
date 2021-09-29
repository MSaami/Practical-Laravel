<?php

namespace App\Services\Uploader;

use App\Exceptions\FileHasExistsException;
use App\File;
use Illuminate\Http\Request;

class Uploader
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var StorageManager
     */
    private $storageManager;

    private $file;

    /**
     * @var FFMpegService
     */
    private $ffmpeg;


    public function __construct(Request $request, StorageManager $storageManager, FFMpegService $ffmpeg)
    {
        $this->request = $request;
        $this->storageManager = $storageManager;
        $this->file = $request->file;
        $this->ffmpeg = $ffmpeg;

    }


    public function upload()
    {

        if ($this->isFileExists()) throw new FileHasExistsException('File has already uploaded');

        $this->putFileIntoStorage();

        return $this->saveFileIntoDatabase();
    }


    private function saveFileIntoDatabase()
    {
        $file = new File([
            'name' => $this->file->getClientOriginalName(),
            'size' => $this->file->getSize(),
            'type' => $this->getType(),
            'is_private' => $this->isPrivate()
        ]);

        $file->time = $this->getTime($file);

        $file->save();
    }


    private function getTime(File $file)
    {
        if (!$file->isMedia()) return null;

        return $this->ffmpeg->durationOf($file->absolutePath());
    }





    private function putFileIntoStorage()
    {
        $method = $this->isPrivate() ? 'putFileAsPrivate' : 'putFileAsPublic';

        $this->storageManager->$method($this->file->getClientOriginalName(), $this->file,$this->getType());

    }


    private function isPrivate()
    {
        return $this->request->has('is-private');
    }

    private function getType()
    {
        return [
            'image/jpeg' => 'image',
            'video/mp4' => 'video',
            'application/zip' => 'archive'
        ][$this->file->getClientMimeType()];
    }

    private function isFileExists()
    {
       return $this->storageManager->isFileExists($this->file->getClientOriginalName(), $this->getType(), $this->isPrivate());
    }



}
