<?php
require "./controller/subject_logic.php";
$title = "BCA | Student List";
$query = "SELECT * FROM student ";
$result = mysqli_query($conn, $query);
include_once './model/inc/sampleHeader.php';
?>

<section>
    <div class="container">
        <h3 align="center">Student List</h3>
        <br />
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Address</td>
                        <td>Gender</td>
                        <td>Designation</td>
                        <td>Age</td>
                        <th colspan="2" scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo '  
                               <tr>  
                                    <td>' . $row["firstname"] . '</td>  
                                    <td>' . $row["surname"] . '</td> 
                                    <td>' . $row["middlename"] . '</td> 
                                    <td>' . $row["class_name"] . '</td> 
                                    <td>' . $row["dob"] . '</td> 
                                     <td>

                                        <a href="./controller/student_logic.php?delete=<?php echo ' . $row['id'] . '; ?>" class=" btn btn-danger btn-sm">Del</a>

                                    </td>
                               </tr>  
                               ';
                }
                ?>
            </table>
        </div>
    </div>
</section>

</main>
</div>
</div>
<footer>
    <p class="text-center">Powered by Blessed Children Academy | Designed by KodeNet Solutions</p>
</footer>





<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/img_preview.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="dashboard.js"></script>
</body>

</html>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>