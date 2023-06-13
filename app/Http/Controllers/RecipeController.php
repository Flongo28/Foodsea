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
}
