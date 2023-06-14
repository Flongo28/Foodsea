<?php
    namespace App\ChefkochAPI;

    use \Exception;
    use \TypeError;
    use \InvalidArgumentException;

    use App\ChefkochAPI\Category\CategoryCrawler;
    use App\ChefkochAPI\Crawler\RecipeCrawler;
    use App\ChefkochAPI\Crawler\Validators\RecipeValidator;
    use App\ChefkochAPI\FluentRecepeFilterer;
    use App\ChefkochAPI\DBRecepeFetcher;

    class NoDataException extends Exception {
        // Custom exception logic
    }

    class ChefkochAPI {
        private static function apply_filters($searcher, $filter_options){
            if (isset($filter_options['zutaten'])) {
                $searcher->filter_ingredients($filter_options['zutaten']);
            }
            if (isset($filter_options['tags'])) {
                $searcher->filter_tags($filter_options['tags']);
            }
            if (isset($filter_options['name'])) {
                $searcher->filter_name($filter_options['name']);
            }
            if (isset($filter_options['rating'])) {
                $searcher->filter_rating($filter_options['rating']);
            }
            if (isset($filter_options['difficulty'])) {
                $searcher->filter_difficulty($filter_options['difficulty']);
            }
            if (isset($filter_options['min_kochzeit'])) {
                $searcher->filter_min_time($filter_options['min_kochzeit']);
            }
            if (isset($filter_options['max_kochzeit'])) {
                $searcher->filter_time($filter_options['max_kochzeit']);
            }
            return $searcher;
        }

        public static function get_recipies($categories, $filter_options){
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

            // Apply filters
            $searcher = ChefkochAPI::apply_filters($searcher, $filter_options);
            $recepies = $searcher->get_recipes();

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