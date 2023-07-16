<?php 
    require_once('../layouts/header.php');
    require_once('../layouts/navbar.php');
    require_once('../services/__api.php');
    $mealDB = new MealDB();
    $meals = array(); // Initialize the $meals array

    if(isset($_GET['search'])){
        $query = $_GET['search'];
        $meals = $mealDB->searchMeals($query);

        if (empty($meals)) {
            // Display an alert message to the user
            echo '<script>alert("No meals found. Redirecting to index page.");</script>';
            // Redirect to index page using JavaScript
            echo '<script>window.location.href = "../index.php";</script>';
            exit(); // Ensure the script stops here after the JavaScript redirection
        }
    }
?>

<div class="grid grid-cols-4 max-sm:grid-cols-2 gap-5 p-5">
    <?php foreach ($meals as $meal) { ?>
        <div class="relative rounded-lg overflow-hidden p-4 bg-[var(--background)] hover:bg-[var(--accent)]">
            <a href="../pages/instruction.php?id=<?= $meal['idMeal'] ?>">
                <img class="h-auto w-full" src="<?= $meal['strMealThumb'] ?>" alt="">
            </a>
            <!-- Add the black overlay with the meal name -->
            <div class="absolute bottom-0 left-0 w-full bg-black bg-opacity-70 text-white py-2 px-4 text-center">
                <?= $meal['strMeal'] ?>
            </div>
        </div>
    <?php } ?>
</div>

<?php 
    require_once('../layouts/footer.php');
?>
