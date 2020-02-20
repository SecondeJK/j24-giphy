<?php

namespace App\Jobs;

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
        foreach ($this->batch['data'] as $gif) {
            $localGif = Media::firstOrCreate(['', $gif['id']]);
            $localGif->fill($gif);
            $localGif->save();
        }

        dd($this->batch['data']);
    }
}
