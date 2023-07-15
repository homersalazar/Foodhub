<?php 
    require_once('../layouts/header.php');
    require_once('../services/__api.php');
    $mealDB = new MealDB();    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $mealData = $mealDB->getMealById($id);
        
    }
?>
    <div class="top-0 h-screen overflow-x-hidden">
        <div class="grid">
            <a href="../index.php" class="px-4 py-3">
                <i class="fa-solid fa-arrow-left-long fa-2xl"></i>
            </a>
        </div>
        <div class="grid place-items-center py-12">
            <div class="block max-w-sm p-1 glossy border border-gray-200 rounded-lg shadow">
                <img class="w-64 h-64  bg-no-repeat bg-contain" src="<?=$mealDB->mealThumb ?>" alt="">
            </div>
        </div>
        <div class="flex flex-wrap">
            <div class="ml-8">
                <h1 class="text-4xl max-sm:text-2xl"><?=$mealDB->mealName; ?> - <?= $mealDB->mealArea ?> &#x2022; <?=$mealDB->mealCategory ?></h1>
            </div>
        </div>
        <section class="md:ml-8 mt-10 max-sm:p-4">
            <h1 class="font-bold text-xl mb-3">Ingredients</h1>
            <div class="swipers">
                <div class="swiper-wrapper">
                    <?php 
                        foreach ($mealDB->mealIngredients as $index => $ingredient) {      
                        $measure = $mealDB->mealMeasures[$index];
                        $ingredientFormatted = str_replace(' ', '_', $ingredient);
                        $ingredientImageUrl = $ingredientFormatted ? "https://www.themealdb.com/images/ingredients/" . urlencode($ingredientFormatted) . ".png" : '';
                        ?>
                        <div class="swiper-slide">
                            <div class="block max-w-md p-12 glass bg-contain bg-no-repeat bg-center border border-gray-200 rounded-lg shadow" style="background-image: url('<?=$ingredientImageUrl; ?>');">
                                <div class="grid gap-5 absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-center">
                                    <p class="text-white font-bold"><?=$measure; ?> <?=$ingredient; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <div class="instruction-section max-sm:p-0">
    <h1 class="font-bold text-2xl mb-4 p-4 max-sm:p-2">Recipe</h1>
    <div class="bg-white rounded-lg shadow-lg p-4 mb-8 max-sm:p-4">
        <ol class="pl-6 max-sm:pl-4">
            <?php
                $steps = explode("\r\n", $mealDB->mealInstructions);
                $count = 1; // Variable to keep track of the count
                foreach ($steps as $step) {
                    if (!empty(trim($step))) {
            ?>
                <li class="mb-4 leading-relaxed">Step <?= $count ?>: <?= $step ?></li>
            <?php
                        $count++; // Increment the count
                    }
                }
            ?>
        </ol>
    </div>
</div>



    </div>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
    
        var swiper = new Swiper('.swipers', {
            slidesPerView: 3,
            spaceBetween: 10,
            breakpoints: {
                640: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 5,
                    spaceBetween: 15,
                },
            },
        });
    </script> 
<?php 
    require_once('../layouts/footer.php');
?>
