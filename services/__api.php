<?php
    class MealDB {
        private $apiUrl = "https://www.themealdb.com/api/json/v1/1/";
        public $mealId;
        public $mealName;
        public $mealCategory;
        public $mealThumb;
        public $mealYoutube;
        public $mealArea;

        public function getRandomMeal() {
            $url = $this->apiUrl . "random.php";
            $response = file_get_contents($url);
            if ($response !== false) {
                $data = json_decode($response, true);
                $randomMeal = $data['meals'][0];

                // Parse the meal data
                $this->parseMealData($randomMeal);

                return $randomMeal;
            } else {
                return null;
            }
        }
        
        public function getAllCategories() {
            $url = $this->apiUrl . "categories.php";
            $response = file_get_contents($url);
            if ($response !== false) {
                $data = json_decode($response, true);
                $categories = $data['categories'];
    
                return $categories;
            } else {
                return null;
            }
        }
    
        private function parseMealData($mealData) {
            $this->mealId = $mealData['idMeal'];
            $this->mealName = $mealData['strMeal'];
            $this->mealCategory = $mealData['strCategory'];
            $this->mealThumb = $mealData['strMealThumb'];
            $this->mealYoutube = $mealData['strYoutube'];
            $this->mealArea = $mealData['strArea'];
        }
    }

?>