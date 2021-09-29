<?php

namespace App\Services\Uploader;

use FFMpeg\FFProbe;

class FFMpegService
{
    private $ffprobe;


    public function __construct()
    {
        $this->ffprobe = FFProbe::create([
            'ffprobe.binaries' => config('serivces.ffmpeg.ffprobe_path')
        ]);
    }



    public function durationOf(string $path)
    {
        return (int) $this->ffprobe->format($path)->get('duration');
    }
}
