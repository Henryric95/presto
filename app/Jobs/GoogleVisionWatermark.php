<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GoogleVisionWatermark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

 
    private $announcement_image_id;

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
        if (!$i) {
            return;
        }
        $srcPath = storage_path('/app/' . $i->file);
        $image = file_get_contents($srcPath);

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $image = Image::load($srcPath);

        $image->watermark('watermark.png')->watermarkOpacity(50)->watermarkWidth(30, Manipulations::UNIT_PERCENT)->watermarkPosition(Manipulations::POSITION_CENTER);


            $image->save($srcPath);
    }
}
}
