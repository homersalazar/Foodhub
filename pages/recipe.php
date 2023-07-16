<?php 
    require_once('../layouts/header.php');
    require_once('../layouts/navbar.php');
    require_once('../services/__api.php');
    $mealDB = new MealDB();
    $allMeals = $mealDB->getAllMeals();
?>
    <div class="grid p-5">
        <select id="category_select" class="block py-3 px-3 text-xl px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer sm:text-base lg:text-xl">
            <option class="text-[var(--background)]" value="">Select Category</option>
            <?php 
                $displayedCategories = array();
                foreach ($allMeals as $allMeal) {
                $category = $allMeal['strCategory'];
                if (!in_array($category, $displayedCategories)) {
                $displayedCategories[] = $category;
            ?>
                <option class="text-[var(--background)]" value="<?=$category ?>"><?=$category ?></option>
            <?php 
                }
            }
            ?>
        </select>
    </div>
    <section class="p-5">
        <div class="grid grid-cols">
            <table class="table meal-table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th class="max-sm:hidden"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allMeals as $meal) { ?>
                        <tr class="cursor-pointer hover:bg-[var(--accent)] rounded-lg" data-category="<?=$meal['strCategory'] ?>" onclick="Recipes('<?=$meal['idMeal'] ?>')">
                            <td>
                                <img class="w-48 h-48 max-sm:w-full max-sm:h-24 text-center" src="<?php echo $meal['strMealThumb']; ?>" />
                            </td>
                            <td>
                                <?php echo $meal['strMeal']; ?>
                            </td>
                            <td class="max-sm:hidden">
                                <?php echo $meal['strArea']; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>

<script>
    const Recipes = mealId => {
        window.location.href = "instruction.php?id=" + mealId;
    }

    $(document).ready(function () {
        var table = $('.meal-table').DataTable({
            searching: false,
            lengthChange: false
        });

        function filterTable() {
            var selectedCategory = $('#category_select').val();

            table.rows().every(function () {
                var categoryCellValue = $(this.node()).data('category');
                var categoryMatch = selectedCategory === '' || selectedCategory === categoryCellValue;

                if (categoryMatch) {
                    this.nodes().to$().show();
                } else {
                    this.nodes().to$().hide();
                }
            });
        }

        $('#category_select').on('change', function () {
            filterTable();
        });
        // Initial filtering on page load
        filterTable();
    });
</script>

<?php 
    require_once('../layouts/footer.php');
?>
