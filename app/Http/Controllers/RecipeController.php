<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\NeedsIngredient;
use App\Models\RecipeHasTag;
use App\Models\Tag;

require_once app_path() . '/chefkochapi/DBRecepeFetcher.php';

use App\ChefkochAPI\DBRecepeFetcher;

class RecipeController extends Controller
{
    private $lastRecipeId = 798371183473952;

    public function show($id){
        return DBRecepeFetcher::get($id);
    }

    public function index(){
        print("Letsgo <br/>");
        $crawlers = DBRecepeFetcher::index();
        $crawl_count = count($crawlers);

        print("Crawl Count: " . $crawl_count . "<br/>");
        
        $crawler = $crawlers[0];

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
            
            print($crawl_count . ": " . $id . "<br/>");
            DBRecepeFetcher::make($id);
        }

        print("Done");
    }
}
