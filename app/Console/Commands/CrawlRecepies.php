<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\ChefkochAPI\DBRecepeFetcher;
use App\Models\Recipe;

class CrawlRecepies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recepies:crawl {step=0} {lastId=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads more recipes from the chefkoch api';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $step = $this->argument('step');
        $lastRecipeId = $this->argument('lastId');
        
        $crawlers = DBRecepeFetcher::index();
        $crawl_count = count($crawlers);

        foreach ($crawlers as $c_id => $crawler) {
            if ($c_id < $step) {
                continue;
            }

            foreach ($crawler->getIds() as $id) {
                if ($id != $lastRecipeId && $lastRecipeId != 0) {
                    continue;
                } else {
                    $lastRecipeId = 0;
                }
    
                if (Recipe::where('id', '=', $id)->exists()) {
                    continue;
                }
                
                $this->printStatus($crawl_count, $c_id, $id);
                DBRecepeFetcher::make($id);
            }
        }
    } 

    private function printStatus($crawl_count, $c_id, $id)
    {
        print("\r" . $c_id . "/" . $crawl_count . ": " . $id);
    }
}
