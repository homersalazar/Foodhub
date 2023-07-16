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

        public function getAllAreas() {
            $url = $this->apiUrl . "list.php?a=list";
            $response = file_get_contents($url);
    
            if ($response !== false) {
                $data = json_decode($response, true);
                $areas = $data['meals'];

                return $areas;
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

        public function getMealsByCategory($category) {
            $url = $this->apiUrl . "filter.php?c=" . urlencode($category);
            $response = file_get_contents($url);
            
            if ($response !== false) {
                $data = json_decode($response, true);
                $meals = $data['meals'];

                return $meals;
            } else {
                return null;
            }
        }

        public function getAllMeals() {
            $url = $this->apiUrl . "search.php?s=";
            $response = file_get_contents($url);
            
            if ($response !== false) {
                $data = json_decode($response, true);
                $meals = $data['meals'];
                
                return $meals;
            } else {
                return null;
            }
        }

        public function searchMeals($query) {
            $url = $this->apiUrl . "search.php?s=" . urlencode($query);
            $response = file_get_contents($url);
        
            if ($response !== false) {
                $data = json_decode($response, true);
        
                // Check if the JSON decoding was successful and "meals" key exists
                if (is_array($data) && isset($data['meals'])) {
                    $meals = $data['meals'];
                    foreach ($meals as $meal) {
                        $this->parseMealData($meal);
                    }
                    return $meals;
                } else {
                    return null;
                }
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