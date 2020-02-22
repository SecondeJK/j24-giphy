<?php

namespace App\Jobs;

use App\Image;
use App\Media;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class IndexApiPayload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var array
     */
    private $batch;

    /**
     * Create a new job instance.
     *
     * @param array $batch
     */
    public function __construct(array $batch)
    {
        $this->batch = $batch;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() : void
    {
        foreach ($this->batch as $gif) {
            // only process gifs, not metadata, bit hacky.
            if (isset($gif['type'])) {
                $localGif = Media::firstOrNew(['id' => $gif['id']]);
                $localGif->fill($gif);
                $localGif->save();

                if ($localGif->image()) {
                    $localImage = $localGif->image();
                    $localImage->image_data = json_encode($gif['images']);
                    $localImage->save();
                } else {
                    $localImage = new Image();
                    $localImage->image_data = json_encode($gif['images']);
                    // WTF Laravel why do not of your associate models work and I'm doing this manually
                    $localImage->media_id = $localGif->media_id;
                    $localImage->save();
                }
            }
        }
    }
}
