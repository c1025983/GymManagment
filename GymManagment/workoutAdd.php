<?php
include "config.php";
include "header.php";
include "Class/WorkoutClass.php";
include "database.php";
$workout = new Workout;

if (isset($_POST['submit']) && !empty($_POST['exercise'])) {
    $exerciseName = $_POST['exercise'];
    $status = $workout->insert_workout($exerciseName);
}
$exercises = $workout->get_today_exercises();
$total_caloriesBurned = 0;
$total_duration = 0;
  if (isset($excercies->num_rows)) {
                    while($exercise = mysqli_fetch_assoc($exercises)){
                       $total_duration += $exercise['duration'];
                        $total_caloriesBurned += $exercise['caloriesBurned'];
                    }
                }
?>
    <section class="member-content">
<?php include "slider.php";?>
<div class="member-content-right">
    <div class="member-content-right-list">
        <h1><?php echo "Workout Day: " . date("l, F jS, Y"); ?></h1>
        <form action="" method="POST">
            <input type="text" name="exercise" placeholder="Add exercise">
            <button type="submit" name="submit">Add</button>
            <p class="mt-1">
                <?php 
                if(isset($status)){
                echo $status;
            }
                ?>
            </p>
        </form>

              <h2 class="mt-2">Today's Exercises</h2>
              <h3 class="mt-1">Total Duration : <?php echo $total_duration;?></h3>
              <h3 class="mt-1">Total Calories Burned : <?php echo $total_caloriesBurned;?></h3>
        
    </div>
</div>
        <

    </div>

</div>