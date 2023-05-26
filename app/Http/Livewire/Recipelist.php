<?php
namespace App\Http\Livewire;

use Livewire\Component;
use InvalidArgumentException;

require_once app_path().'/chefkochapi/ChefkochAPI.php';
use App\ChefkochAPI\ChefkochAPI;
use App\ChefkochAPI\NoDataException;

class Recipelist extends Component
{
    public $categories;
    public $min_kochzeit;
    public $max_kochzeit;
    public $zutaten;
    public $error;
    public $printed = "";

    public $recepies = array();
    public $isLoading = true;

    public function render()
    {
        return view('livewire.recipelist');
    }

    public function getRecepies(){
        if (!isset($this->zutaten)) {
            $this->zutaten = array();
        }

        try {
            $this->recepies = ChefkochAPI::get_recipies($this->categories, $this->min_kochzeit, $this->max_kochzeit, $this->zutaten); 
        } catch (InvalidArgumentException $e) { 
            $this->error = $e->getMessage();
        } catch (NoDataException $e){
            $this->error = $e->getMessage();
        }

        $this->isLoading = false;   
    }
}
