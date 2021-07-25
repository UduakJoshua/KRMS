<?php
require "./controller/subject_logic.php";
$title = "BCA | Student List";
$query = "SELECT * FROM student ";
$result = $conn->query($query);
//include_once './model/inc/sampleHeader.php';
include_once './model/inc/dashboard_header.php';

?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Account Management / List</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>
        <div class="container">
            <div class="card-header">
                <h4>Please select a student to activate or suspend the account</h4>
            </div>
            <br />
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Select</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th scope="col">Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo '  
                               <tr>
                                    <td><input type="checkbox" name="chk[]" value="<?php echo ' . $row['id'] . ' ?>" /></td>  
                                   
                                    <td>' . $row["firstname"] . ' ' . $row["surname"] . '</td>  
                                     
                                    <td>' . $row["class_name"] . ' ' . $row["classArm"] . '</td> 
                                   
                                      <td>
                                      <?php if (' . $row['stat'] . ' == 1) : ?>

                                            <button class="btn btn-primary btn-sm " disabled>Active</button>

                                        <?php else : ?>
                                            <button class="btn btn-danger btn-sm " disabled>Suspended</button>
                                        <?php endif; ?>
                                        
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-success btn-sm" name="activate">Activate</button>
                                        <button type="submit" class="btn btn-warning btn-sm" name="suspend">Suspend</button>

                                    </td>
                                    
                               </tr>  
                               ';
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>


    <?php include_once './model/inc/dashboard_footer.php'; ?>