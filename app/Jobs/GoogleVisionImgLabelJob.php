<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\AnnouncementImage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionImgLabelJob implements ShouldQueue
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
        $image = file_get_contents(base_path('storage/app/public/' . $i->file));

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credentials.json'));

        
        $imageAnnotator = new ImageAnnotatorClient();
        $res = $imageAnnotator->labelDetection($image);
        $labels = $res->getLabelAnnotations();
        
        if($labels){
            $result= [];
            foreach($labels as $label){
                $result[] = $label->getDescription();
            }

            $i->labels = $result;
            $i->save();
        }
       
        $imageAnnotator->close();
    }
}
