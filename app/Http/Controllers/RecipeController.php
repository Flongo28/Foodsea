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
    public function show($id){
        DBRecepeFetcher::get($id);
    }

    public function index(){
        DBRecepeFetcher::index();
    }
}
