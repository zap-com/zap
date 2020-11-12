<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\AnnouncementImage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisonLabelImageJob implements ShouldQueue
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
        $res = $imageAnnotator->safeSearchDetection($image);
        $imageAnnotator->close();

        $safe = $res->getSafeSearchAnnotation();

        $adult = $safe->getAdult();
        $medical = $safe->getMedical();
        $spoof = $safe->getSpoof();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();


        // $likelihoodName = ['UNKNOWN', 'VERY_UNLIKELY', 'UNLIKELY',
        // 'POSSIBLE', 'LIKELY', 'VERY_LIKELY'];
        $likeliHoodName = ['1', '2','3','4','5','6'];

        $i->adult = $likeliHoodName[$adult];
        $i->medical = $likeliHoodName[$medical];
        $i->spoof = $likeliHoodName[$spoof];
        $i->violence = $likeliHoodName[$violence];
        $i->racy = $likeliHoodName[$racy];

        $i->save();
    }
}
