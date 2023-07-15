<?php     
    require_once('../layouts/header.php');
    require_once('../services/__api.php');
    $mealDB = new MealDB();

    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        $meals = $mealDB->getMealsByCategory($category);
    }
?>
    <div class="grid px-5 py-5">
        <a href="../index.php">
            <i class="fa-solid fa-arrow-left-long fa-2xl"></i> 
            <span class="text-3xl font-bold px-4 text-center"><?= $category; ?> </span>
        </a>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 p-5">
        <?php 
            if (isset($meals)) {
                foreach ($meals as $meal) {
        ?>
            <div class="w-full max-w-sm bg-black border border-gray-200 rounded-lg shadow">
                <a href="#">
                    <img class="p-1 rounded-t-lg" src="<?= $meal['strMealThumb']; ?>" alt="product image" />
                </a>
                <div class="px-5 py-5">
                    <a href="#">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            <?= $meal['strMeal']; ?>
                        </h5>
                    </a>
                    <div class="flex items-center justify-between pt-2 md:gap-4">
                        <a href="../pages/instruction.php?id=<?= $meal['idMeal']; ?>" class="focus:outline-none rounded-lg text-sm px-5 py-2.5 text-center bg-[var(--accent)] font-semibold">Read</a>
                    </div>
                </div>
            </div>
        <?php } } ?>
    </div>
 
<?php 
    require_once('../layouts/footer.php');
?>
