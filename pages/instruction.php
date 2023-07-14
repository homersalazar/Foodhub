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
                                    <p class="text-white font-bold"><?=$measure; ?><?=$ingredient; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <div class="instruction-section max-sm:p-0">
            <h1 class="font-bold text-xl mb-3 p-8 max-sm:p-4">Recipe</h1>
            <?php
                $instructions = explode(".", $mealDB->mealInstructions); // Split instructions by period
                foreach ($instructions as $index => $instruction) {
                    // Skip empty instructions
                    if (empty(trim($instruction))) {
                        continue;
                    }
                    $stepNumber = $index + 1;
            ?>
                <div class="flex flex-wrap justify-start overflow-hidden bg-slate-900 text-white">
                    <label class="grow px-4 py-3 font-medium" for="collapse-<?php echo $stepNumber; ?>">STEP <?php echo $stepNumber; ?></label>
                    <input class="peer mx-4 my-3 h-0 w-0 appearance-none rounded border text-slate-800 accent-slate-600 opacity-0" type="checkbox" name="collapse-<?php echo $stepNumber; ?>" id="collapse-<?php echo $stepNumber; ?>" />
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-4 my-3 h-6 w-6 transition-all duration-200 peer-checked:rotate-45">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                    </svg>
                    <div class="-transparent absolute -translate-y-full scale-75 scale-y-0 px-4 py-3 opacity-0 transition-all duration-200 peer-checked:relative peer-checked:translate-y-0 peer-checked:scale-100 peer-checked:bg-slate-800 peer-checked:opacity-100" style="width: 100%;">
                        <p class="pl-8"><?php echo trim($instruction); ?>.</p>
                    </div>
                </div>
            <?php } ?>
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