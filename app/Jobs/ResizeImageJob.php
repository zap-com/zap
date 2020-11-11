<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;


class ResizeImageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $path, $fileName, $width, $height;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filePath, $width, $height)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $w = $this->width;
        $h = $this->height;

        $srcPath = storage_path() . "/app" . "/" . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . "/app" . "/" . $this->path . "/crop{$w}x{$h}_" . $this->fileName;
        $paddingX = 5;
        $paddingY= 6.5;
        $height = 12.5;
        $width = 12.5;

        if($w < 500){
            $paddingX = 5.5;
            $paddingY= 12.5;
            $height = 15;
            $width = 15;
        }
        
            Image::load($srcPath)
            ->crop(Manipulations::CROP_CENTER, $w, $h)
            ->watermark(public_path('/images/zaplogo.png'))
            ->watermarkOpacity(40)
            ->watermarkHeight($height, Manipulations::UNIT_PERCENT)
            ->watermarkWidth($width, Manipulations::UNIT_PERCENT)
            ->watermarkPadding($paddingX, $paddingY, Manipulations::UNIT_PERCENT)
            ->save($destPath);
     
        
    }
}
