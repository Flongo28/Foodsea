<?php

namespace App\Http\Controllers;

use App\ChefkochAPI\DBRecepeFetcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Favourite;

require_once app_path() . '/chefkochapi/FluentRecepeFilterer.php';
use App\ChefkochAPI\FluentRecepeFilterer;

class FavouriteController extends Controller
{
    public function index(){
        $id = auth()->id();

        $favourites = DB::table("favourite")->select("recipe_id")->where("user_id", $id)->get(); // Get the favourites from the database

        // Extract the ids from the favourites
        $favourites = array_map(function($favourite){
            return $favourite->recipe_id;
        }, $favourites->toArray());
        

        // Get the recepies from the database
        $search = new FluentRecepeFilterer();
        $recepies = $search->filter_ids($favourites)->get_recipes();

        return view("favourites", ["recepies" => $recepies]);
    }

    public function create($recepe_id){
        Favourite::firstOrCreate([
            "recipe_id" => $recepe_id,
            "user_id" => auth()->id()]);

        return redirect()->back();
    }

    public function delete($recepe_id){
        $favourite = Favourite::where([
            "recipe_id" => $recepe_id,
            "user_id" => auth()->id()])->first();

        if($favourite != null){
            $favourite->delete();
        }

        return redirect()->back();
    }
}
