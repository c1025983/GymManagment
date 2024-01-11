<?php
include "config.php";
include "database.php";
include "Class\NutritionClass.php";
$nutrition = new Nutrition;
$list = $nutrition->get_list();
include "header.php";
?>
<style>
    .nutrition-table th, .nutrition-table td {
        text-align: right;
    }
</style>
<section class="member-content">
    <?php include "slider.php";?>
    <div class="member-content-right">
        <div class="member-content-right-list">
            <h1>Nutrition Plan List</h1>
            <table>
                <tr>
                    <th>No.</th>
                    <th>Food Item</th>
                    <th>Description</th>
                    <th>Calories</th>
                    <th>Carbs</th>
                    <th>Proteins</th>
                    <th>Fats</th>
                </tr>
                <?php
                $no = 1; // Initialize a counter for the row numbers
                while($row = mysqli_fetch_assoc($list)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['dietDescription']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['calories']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['carbs']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['proteins']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['fats']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</section>
</body>
</html>
