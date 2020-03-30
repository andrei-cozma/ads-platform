<?php

namespace App\Console\Commands;

use App\Ad;
use Elasticsearch\Client;
use Illuminate\Console\Command;

class ElasticSearchReindexCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elasticsearch:reindex';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reindex documents in Elastic Search Server';

    private $elasticsearch;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Client $elasticsearch)
    {
        parent::__construct();
        $this->elasticsearch = $elasticsearch;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Indexing all items. This might take a while...');

        foreach (Ad::cursor() as $ad)
        {
            $this->elasticsearch->index([
                'index' => $ad->getSearchIndex(),
                'id' => $ad->getKey(),
                'body' => $ad->toSearchArray()
            ]);
            $this->output->write('.');
        }

        $this->info("\nDone!");
    }
}
