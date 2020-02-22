<?php

namespace App\Console\Commands;

use App\Services\RandomImageIndexer;
use Illuminate\Console\Command;
use Log;

class RandomImageConsumer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'index:media';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Attempts to index 500 media objects';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This is going to be couple of levels deep to keep some single responsibility
     * principals in action
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('[' . __CLASS__ . '] Fired indexer command');
        $randomImageIndexer = new RandomImageIndexer();
        $randomImageIndexer->runIndex();
    }
}
