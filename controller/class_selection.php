<?php
require_once 'dbase_conn.php';
include_once 'function.php';


$select_sql = "SELECT * FROM `classes` WHERE `section` = '$section' ORDER BY `className` ASC";
$sql_result = $conn->query($select_sql);
?>
<label for="class">Class:</label>
<select name="student_class" id="student_class" class="form-control ">
    // using a while loop to iterate the class table
    <?php
    while ($row = $sql_result->fetch_assoc()) : ?>
        <option value="<?php echo $row['className']; ?>"><?php echo $row['className']; ?></option>
    <?php endwhile; ?>
</select>