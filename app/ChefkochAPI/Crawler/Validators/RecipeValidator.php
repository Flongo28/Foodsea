<?php
    namespace App\ChefkochAPI\Crawler\Validators;

    /*
    * Accepts search parameters and uses them to find a list of valid recipes
    */
    class RecipeValidator extends AbstractRecipeValidator {    
        /**
         * Set the premium parameter for the recipe test.
         *
         * @param bool $isPremium Whether only premium or non-premium recipes
         * @return $this
         */
        public function setPremium($isPremium) {
            $this->parameters['isPremium'] = [$isPremium];
            return $this;
        }
    
        protected function testIsPremium($recipe, $premium) {
            return $recipe->isPremium == $premium;
        }
    }    
    
?>
