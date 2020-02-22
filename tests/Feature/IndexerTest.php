<?php

namespace Tests\Feature;

use App\Jobs\IndexApiPayload;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;

class IndexerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexerClass()
    {
        $indexer = new RandomImageIndexer();
        $this->assertInstanceOf(ReandomImageIndexer::class, $indexer);
    }

    public function testIndexerCounter()
    {
        $indexer = new RandomImageIndexer();
        $this->assertCount($indexer::countMedia(), DB::query('SELECT count(*) FROM media'));
    }

    public function testIndexJobDispatch()
    {
        Bus::fake();
        $indexer = new RandomImageIndexer();
        $this->expectsJobs(IndexApiPayload::class);
        $indexer->dispatchBatch(new IndexApiPayload(['some_mocked_data']));
        Bus::assertDispatched(IndexApiPayload::class);
    }
}
