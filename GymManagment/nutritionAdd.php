<?php
include "config.php";
include "header.php";
include "database.php";
include "Class/NutritionClass.php"; // Ensure this is the correct path
$nutrition = new Nutrition;

if (isset($_POST['submit']) && !empty($_POST['dietItem'])) {
    $dietItemName = $_POST['dietItem'];
    $status = $nutrition->insert_diet($dietItemName);
}
$diets = $nutrition->get_today_diets();
$total_caloriesConsumed = 0;
$total_carbs = 0;
$total_proteins = 0;
$total_fats = 0;

if (isset($diets->num_rows)) {
    while($diet = mysqli_fetch_assoc($diets)){
       $total_caloriesConsumed += $diet['caloriesConsumed'];
       $total_carbs += $diet['carbsConsumed'];
       $total_proteins += $diet['proteinsConsumed'];
       $total_fats += $diet['fatsConsumed'];
    }
}
?>
<section class="member-content">
    <?php include "slider.php"; ?>
    <div class="member-content-right">
        <div class="member-content-right-list">
            <h1><?php echo "Nutrition Day: " . date("l, F jS, Y"); ?></h1>
            <form action="" method="POST">
                <input type="text" name="dietItem" placeholder="Add diet item">
                <button type="submit" name="submit">Add</button>
                <p class="mt-1">
                    <?php 
                    if(isset($status)){
                        echo $status;
                    }
                    ?>
                </p>
            </form>

            <h2 class="mt-2">Today's Diets</h2>
            <h3 class="mt-1">Total Calories Consumed: <?php echo $total_caloriesConsumed;?></h3>
            <h3 class="mt-1">Total Carbs Consumed: <?php echo $total_carbs;?></h3>
            <h3 class="mt-1">Total Proteins Consumed: <?php echo $total_proteins;?></h3>
            <h3 class="mt-1">Total Fats Consumed: <?php echo $total_fats;?></h3>
        </div>
    </div>
</section>
