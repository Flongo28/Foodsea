<?php
namespace App\Http\Livewire;

use Livewire\Component;
use InvalidArgumentException;

use App\ChefkochAPI\ChefkochAPI;
use App\ChefkochAPI\NoDataException;

class Recipelist extends Component
{
    public $categories;
    public $filter_options;
    public $error;
    public $printed = "";

    public $recepies = array();
    public $isLoading = true;

    public function render()
    {
        // die ( var_dump($this->filter_options) );
        return view('livewire.recipelist');
    }

    public function getRecepies(){
        try {
            $this->recepies = ChefkochAPI::get_recipies($this->categories, $this->filter_options);
        } catch (InvalidArgumentException $e) { 
            $this->error = $e->getMessage();
        } catch (NoDataException $e){
            $this->error = $e->getMessage();
        }

        $this->isLoading = false;   
    }
}
