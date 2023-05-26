<?php
    namespace App\ChefkochAPI\Crawler;

    use \Exception;

    require_once 'HttpClient.php';
    use App\ChefkochAPI\Crawler\HttpClient;

    /*
    * Accepts search parameters and uses them to find a list of valid recipes
    */
    class RecipeCrawler {
        private $parameters = [];
        private $validator;

        public function __construct($validator = null) {
            $this->validator = $validator;
        }

        public function useLimit($num) {
            $this->parameters['limit'] = $num;
            return $this;
        }

        public function useOffset($num) {
            $this->parameters['offset'] = $num;
            return $this;
        }

        public function useOrder($num) {
            $this->parameters['orderBy'] = $num;
            return $this;
        }

        public function setCategorys($list) {
            $categories = implode(",", $list);
            $this->parameters['categories'] = $categories;
            return $this;
        }

        public function getIds()
        {
            $content = $this->fetchRecipes();

            if ($content === null){
                throw new Exception("Request was to fast, please try later again");
            }

            $recipes = $content->results;
        
            $recipeIds = [];
        
            if ($this->validator) {
                foreach ($recipes as $recipe) {
                    if ($this->validator->test($recipe->recipe)) {
                        $recipeIds[] = $recipe->recipe->id;
                    }
                }
            } else {
                foreach ($recipes as $recipe) {
                    $recipeIds[] = $recipe->recipe->id;
                }
            }
        
            return $recipeIds;
        }
        

        private function fetchRecipes() {
            $uri = HttpClient::URL;

            if (count($this->parameters) != 0) {
                $uri .= "?" . http_build_query($this->parameters);
            }

            $content = HttpClient::sendRequest($uri);
            return json_decode($content);
        }
    }
?>
