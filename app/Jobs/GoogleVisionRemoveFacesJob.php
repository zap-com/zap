<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use App\Models\AnnouncementImage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Spatie\Image\Manipulations;

class GoogleVisionRemoveFacesJob implements ShouldQueue
{
    
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $announcement_image_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i = AnnouncementImage::find($this->announcement_image_id);

        if(!$i){
            return;
        }
        
        $srcPath = base_path('storage/app/public/' . $i->file);
        $image = file_get_contents($srcPath);

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credentials.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $res = $imageAnnotator->faceDetection($image);
        $faces = $res->getFaceAnnotations();

        foreach($faces as $face){
            $vertices = $face->getBoundingPoly()->getVertices();

            $bounds = [];
            foreach ($vertices as  $vertex) {
               $bounds[] = [$vertex->getX() , $vertex->getY()] ;
            }
            $w = $bounds[2][0] - $bounds[0][0];
            $h = $bounds[2][0] - $bounds[0][1];

            $image = Image::load($srcPath);

            $image->watermark(public_path('/images/smile.png'))
                ->watermarkPosition('top-left')
                ->watermarkPadding($bounds[0][0], $bounds[0][1])
                ->watermarkWidth($w, Manipulations::UNIT_PIXELS)
                ->watermarkHeight($h, Manipulations::UNIT_PIXELS)
                ->watermarkFit(Manipulations::FIT_STRETCH);

                $image->save($srcPath);
            

        }
        $imageAnnotator->close();
    }
}
