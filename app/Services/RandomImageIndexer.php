<?php


namespace App\Services;

use App\Jobs\IndexApiPayload;
use Log;
use App\Media;
use function Psy\debug;

class RandomImageIndexer
{
    private $apiCalls = 0;

    public function runIndex() : void
    {
        Log::info('[' . __CLASS__ . '] Running Indexer');
        $api = new GiphyApi();

        // @TODO some sort of defensive mechanism to stop it, why am I even using a while nobody does that anymore.
        while (self::mediaCount() < 501) {
            $batch = $api->getRandom();
            $this->apiCalls++;
            $this->dispatchBatch($batch);
        }
    }

    /**
     * @param array $batch
     */
    protected function dispatchBatch(array $batch) : void
    {
        Log::info('[' . __CLASS__ . '] Dispatching batch from API call #' . $this->apiCalls);
        IndexApiPayload::dispatch($batch);
    }

    /**
     * @return int
     *
     * Static because it's the kind of thing I'd want to use
     * in the future, and unit tests are good for the soul
     */
    static function mediaCount() : int
    {
        return Media::all()->count();
    }
}
