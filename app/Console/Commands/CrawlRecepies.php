<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

require_once app_path() . '/chefkochapi/DBRecepeFetcher.php';
use App\ChefkochAPI\DBRecepeFetcher;
use App\Models\Recipe;

class CrawlRecepies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:crawl-recepies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads more commands from the chefkoch api';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        print("Letsgo \n");
        $crawlers = DBRecepeFetcher::index();
        $crawl_count = count($crawlers);
        print("Crawl Count: " . $crawl_count . "\n");

        $crawler = $crawlers[0];

        foreach ($crawlers as $crawler) {
            foreach ($crawler->getIds() as $id) {
                /*if (isset($this->lastRecipeId)) {
                    if ($id != $this->lastRecipeId) {
                        continue;
                    } else {
                        print("Stop Skipping\n");
                        unset($this->lastRecipeId);
                    }
                }*/
    
                if (Recipe::where('id', '=', $id)->exists()) {
                    continue;
                }
                
                print($crawl_count . ": " . $id . "\n");
                DBRecepeFetcher::make($id);
            }
        }
    } 
}
