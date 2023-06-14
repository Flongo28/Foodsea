<?php
    namespace App\ChefkochAPI\Category;

    class CategoryCrawler{
        const URL = "https://api.chefkoch.de/v2/recipes/categories";

        public function getContent() {
            $uri = self::URL;

            // Retrieve the JSON data
            $content = file_get_contents($uri);

            return json_decode($content);
        }
    }
?>