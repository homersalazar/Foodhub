<?php 
    require_once('../layouts/header.php');
    require_once('../services/__api.php');
    $mealDB = new MealDB();
    $categories = $mealDB->getAllCategories();       
    $areas = $mealDB->getAllAreas();
        
?>

<div class="grid p-5">
    <select id="underline_select" class="block py-3 px-3 text-xl px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer sm:text-base lg:text-xl">
        <?php 
           if ($categories !== null) {
            foreach ($categories as $category) {   
        ?>
            <option value="US"><?=$category['strCategory'] ?></option>
        <?php 
            }
                }   
        ?>
    </select>
    <div class="grid grid-cols-2 grid-rows-2 py-4">
        <div class="text-start">
            <h1>Filter Articles</h1>
        </div>
        <div class="text-end">
            <h1>Filter Articles</h1>
        </div>
        <div>
            <select id="underline_select" class="w-24 block py-2 px-3 text-sm px-0 w-full  bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer sm:text-sm lg:text-base">
                <?php 
                    if ($areas !== null) {
                        foreach ($areas as $area) {   
                ?>
                    <option value="US"><?=$area['strArea'] ?></option>
                <?php 
                    }
                        }   
                ?>
            </select>
        </div>
    </div>
</div>



<?php 
    require_once('../layouts/footer.php');
?>