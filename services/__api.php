<?php
    class MealDB {
        private $apiUrl = "https://www.themealdb.com/api/json/v1/1/";
        public $mealId;
        public $mealName;
        public $mealCategory;
        public $mealThumb;
        public $mealYoutube;
        public $mealArea;
        public $mealIngredients;
        public $mealMeasures;
        public $mealInstructions;

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

        public function getMealById($id) {
            $url = $this->apiUrl . "lookup.php?i=$id";
            $response = file_get_contents($url);
            if ($response !== false) {
                $data = json_decode($response, true);
                $mealById = $data['meals'][0];
                $this->parseMealData($mealById);

                return $mealById;
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
            $this->mealInstructions = $mealData['strInstructions'];

             // Parse ingredients and store them in an array
            $this->mealIngredients = array();
            $this->mealMeasures = array();
            for ($i = 1; $i <= 20; $i++) {
                $ingredient = $mealData['strIngredient' . $i];
                $measure = $mealData['strMeasure' . $i];
                
                // Check if the ingredient exists and is not empty
                if ($ingredient && $measure) {
                    $this->mealIngredients[] = $ingredient;
                    $this->mealMeasures[] = $measure;
                }
                
            }
        }
    }

?>