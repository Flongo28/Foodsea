<?php
    namespace App\ChefkochAPI\Crawler\Validators;

        /*
    * Abstract recipe validator.
    * Accepts search parameters and uses them to find a list of valid recipes.
    */
    abstract class AbstractRecipeValidator {
        protected $parameters = [];
        
        /**
         * Test the given recipes against the defined parameters.
         *
         * @param array $recipe The recipes to test
         * @return boolean
         */
        public function test($recipe) {
            foreach ($this->parameters as $parameter => $values) {
                $method = 'test' . ucfirst($parameter);
                $result = $this->$method($recipe, ...$values);
                if (!$result) {
                    return false;
                }
            }

            return true;
        }

        protected function between($var, $min, $max) {
            if ($max == -1) {
                return $var >= $min;
            }
            
            return $var >= $min && $var <= $max;
        }
    }
?>