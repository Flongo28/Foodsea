<?php
    namespace App\ChefkochAPI;

    use \Exception;
    use \TypeError;
    use \InvalidArgumentException;

    require_once 'Category/CategoryCrawler.php';
    use App\ChefkochAPI\Category\CategoryCrawler;
    require_once 'Crawler/RecipeCrawler.php';
    use App\ChefkochAPI\Crawler\RecipeCrawler;
    require_once 'Crawler/Validators/RecipeValidator.php';
    use App\ChefkochAPI\Crawler\Validators\RecipeValidator;
    require_once 'FluentRecepeFilterer.php';
    use App\ChefkochAPI\FluentRecepeFilterer;
    require_once 'DBRecepeFetcher.php';
    use App\ChefkochAPI\DBRecepeFetcher;

    class NoDataException extends Exception {
        // Custom exception logic
    }

    class ChefkochAPI {
        public static function get_recipies($categories, $min_time, $max_time, $ingredients, $rating = 0){
            // Prepare Crawler
            $validator = new RecipeValidator();
            $validator->setPremium(false);
            $crawler = new RecipeCrawler($validator);
            $crawler->useLimit(1000);

            // Prepare extended search with DB data
            $searcher = new FluentRecepeFilterer();

            try {
                $crawler->setCategorys($categories);
                $searcher->filter_ids($crawler->getIds());
            } catch (TypeError $ignore) {}

            $recepies = $searcher->filter_min_time($min_time)
            ->filter_time($max_time)
            ->filter_ingredients($ingredients)
            ->filter_rating($rating)
            ->get_recipes();

            if (empty($recepies)) {
                throw new NoDataException("No recepies found");
            }

            return $recepies;
        }

        public static function get_recipe($id){
            return DBRecepeFetcher::get($id);
        }

        public static function get_categories(){
            $crawler = new CategoryCrawler();
            return $crawler->getContent(); 
        }

        public static function get_crawler_for_categories(){
            $crawlers = [];
            $categories = ChefkochAPI::get_categories();

            foreach ($categories as $categorie) {
                for ($i = 1; $i < 10; $i++){
                    $crawlers[] = ChefkochAPI::get_maximized_crawler($categorie->id, $i);
                }
            }

            return $crawlers;
        }

        private static function get_maximized_crawler($categorie, $i){
            $validator = new RecipeValidator();
            $validator->setPremium(false);
            $crawler = new RecipeCrawler($validator);
            $crawler->useLimit(100);
            $crawler->useOffset(100 * $i);
    
            try {
                $crawler->setCategorys([$categorie]);
            } catch (TypeError $e) {
                throw new InvalidArgumentException("Please use a category");
            }
    
            return $crawler;
        }
    }
?>