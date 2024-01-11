<?php
include "config.php";
include "database.php" ;
include "Class/WorkoutClass.php";
$workout = new Workout;
$list = $workout->get_list();
include "header.php";
?>
    <section class="member-content">
    <?php include_once "slider.php";?>
        <div class="member-content-right">
            <div class="member-content-right-list">
                <h1>Workout List</h1>
                <table>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Duration</th>
                        <th>Assummed</th>
                    </tr>
                     <?php
                $no = 1; // Initialize a counter for the row numbers
                while($row = mysqli_fetch_assoc($list)) {
                ?>
                 <tr>
                <td><?php echo $row ['workoutID'] ?></td>
                 <td><?php echo $row ['name'] ?></td>
                 <td><?php echo $row ['workoutDescription'] ?></td>
                  <td><?php echo $row ['duration'] ?></td>
                   <td><?php echo $row ['caloriesBurned'] ?></td>
                </tr>
                <?php 
                    }
            
                ?>
                </table>
            </div>

        </div>

    </section>
    
</body>
</html>