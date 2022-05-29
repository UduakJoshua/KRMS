<?php
require_once './controller/dbase_conn.php';
require_once './controller/student_result_list_init.php';
require_once 'controller/bill_upload_logic.php';
$title = "BCA | Fees Payment";
include_once './model/inc/dashboard_header.php';
$c_arm = $_SESSION['arm'];
$c_arm = $_SESSION['arm'];
$class = $_SESSION['class'];
$term = $_SESSION['term'];
$aSession = $_SESSION['aSession'];

?>
  <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="editBill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form>

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student Billing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form content begins here-->

        <input type="hidden" class="form-control " name="id" id="id">
                    <h5>Billing Details</h5>
                    <hr>
                    <!-- student's contact information begins here -->
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student_name">Name:</label>
                                <input type="text" class="form-control "   name="student_name" id="student_name" aria-describedby="student_name">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="admission_no">Admission No: </span></label>
                                <input type="text" class="form-control " readonly  name="admission_no" id="admission_no" aria-describedby="admission_no">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student_class">Class:</span></label>
                                <input type="text" class="form-control " readonly  name="student_class" id="student_class" aria-describedby="student_class">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student_arm">Arm: </span></label>
                                <input type="text" class="form-control " readonly  name="student_arm" id="student_arm" aria-describedby="student_arm">
                            </div>
                        </div>
                    </div>

                    <hr>
                    <!--row 2-->
                    <!-- payment details -->
                    <div class=" row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="school_fees">School Fees (N)</label>
                                <input type="text" class="form-control "  name="school_fees" id="school_fees">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="discount">Discount</span></label>
                                <input type="text" class="form-control "  name="discount" id="discount">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="boarding_fees">Boarding Fees</span></label>
                                <input type="text" class="form-control "  name="boarding_fees" id="boarding_fees">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bus_fees">Bus Fare</span></label>
                                <input type="text" class="form-control "  name="bus_fees" id="bus_fees">
                            </div>
                        </div>



                    </div>
                    <hr>
                    <!--row 3-->
                    <!-- payment details -->
                    <div class=" row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="books">Books</span></label>
                                <input type="text" class="form-control "  name="books" id="books">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="wears">Wears</span></label>
                                <input type="text" class="form-control "  name="wears" id="wears" aria-describedby="amount_paid">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="arrears">Arrears</span></label>
                                <input type="text" class="form-control "  name="arrears" id="arrears" aria-describedby="amount_paid">
                            </div>
                        </div>


                    </div>


                    <hr>

                   

                       
                   
         <!-- form content ends here-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary " name="edit_bill">Update Student Bill</button>

      </div>
    <form >

    </div>
  </div>
</div>
<!--modal ends-->

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Process Fees Payment</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p><?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>
        <div class="bg-info p-2 text-white">
            <h5><strong>How to Post Payment!</strong></h5>

            <ul>
                <li>Click the Pay Now button against the student you want to post pay</li>
                <li>Enter the amount paid and the date</li>
                <li>Select the Mode of Payment</li>
                <li>Click the Make Payment button</li>
            </ul>
        </div>
        <hr>

        <?php


        if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                <li><?php echo $_SESSION['message'] ?></li>
                <?php unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="fees_payment.php" method="POST">


                    <div class="row">
                        <div class="col-md-12">

                            <h5>Fees Payment for
                                <?php
                                echo $_SESSION['class'] . " " . $_SESSION['arm'];

                                ?></h5>
                        </div>
                    </div>

                    <!-- card body begins here-->
                    <div class="row">
                        <div class="col-md-12">

                            <table class="table table-responsive ">
                                <thead class="thead-dark ">
                                    <tr style="font-size: 12px;">

                                        <th scope="col">Name</th>
                                        <th scope="col">Admission No</th>
                                        <th scope="col">Total Fees</th>
                                        <th scope="col">1st Deposit</th>
                                        <th scope="col">2nd Deposit</th>
                                        <th scope="col">3rd Deposit</th>
                                        <th scope="col">Balance</th>
                                        <th scope="col" colspan="2">Action</th>
                                        <th scope="col">Status</th>

                                    </tr>
                                </thead>
                                <tbody class="ml-1 pt-2" style="font-size: 10px;">
                                    <?php

                                    //query
                                    $sql = "SELECT * FROM fees_total WHERE term ='$term' && student_arm =  '$c_arm' && student_class = '$class'";
                                    $result = $conn->query($sql);
                                    ?>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) :
                                        $id = $row['id'];
                                    ?>
                                        <tr>
                                            <input type="hidden" name="a_session" value="<?php echo $aSession ?>" class="form-control">
                                            <input type="hidden" name="term" value="<?php echo $term ?>" class="form-control">
                                            <input type="hidden" name="student_class" value="<?php echo $class ?>" readonly class="form-control">
                                            <input type="hidden" name="student_arm" value="<?php echo $c_arm ?>" readonly class="form-control">
                                            <td><input type="text" name="student_name[]" value="<?php echo $row['student_name'] ?>" readonly class="form-control"></td>
                                            <td><input type="text" name="admin_no[]" value="<?php echo $row['admission_no']  ?>" readonly class="form-control"></td>
                                            <td><input type="text" name="school_fees" value="<?php echo $row['total_fees'] ?>" readonly class="form-control"></td>
                                            <td><input type="text" name="1st_depo" value="<?php echo $row['first_deposit'] ?>" readonly class="form-control"></td>
                                            <td><input type="text" name="2nd_depo" value="<?php echo $row['second_deposit'] ?>" readonly class="form-control"></td>
                                            <td><input type="text" name="3rd_depo" value="<?php echo $row['third_deposit'] ?>" readonly class="form-control"></td>
                                            <td><input type="text" name="balance" value="<?php echo $row['balance'] ?>" readonly class="form-control"></td>
                                            <td colspan="2">
                                                <a href="make_pay.php?pay=<?php echo $row['id']; ?>" class=" btn btn-info btn-sm mb-1" style="font-size: 11px; width:100%">Pay Now</a>
                                                <!--button  type="button"  data-toggle="modal" data-target="#editBill"   style="font-size: 11px; width:100%" class="btn btn-primary btn-sm edit-bill" name="edit" value="Edit" id="<?php echo $row['id']?>"> Edit Bill </button-->
                                                <a href="edit_bill.php?edit-bill=<?php echo $row['id']; ?>" class=" btn btn-warning btn-sm" style="font-size: 11px; width:100%"> Edit Bill </a>
                                            </td>
                                            <td>
                                            <?php if (($row['school_fees'] == ($row['discount'])) && ($row['balance'] == 0)) : ?>

                                                <button class="btn btn-success btn-sm " disabled>MGT</button>
                                           
                                            <?php elseif($row['balance'] == 0)  : ?>

                                                <button class="btn btn-success btn-sm " disabled>Cleared</button>
                                            
                                            <?php elseif ($row['balance'] < 0) : ?>

                                                <button class="btn btn-success btn-sm " disabled>Cl/Excess </button>

                                            <?php else : ?>
                                                <button class="btn btn-danger btn-sm " disabled>Indebted</button>
                                                
                                            <?php endif; ?>
                                        </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <!--card footer begins here-->
                    <div class="card-footer">

                        <div class="col-md-6">
                            <a href="fees_payment_init.php"><button style="width:30%;" type="button" class="btn btn-warning">Back </button></a>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </section>
    <hr>
    <?php
    include_once './model/inc/dashboard_footer.php';
    ?>

  


<script>
   /* $(document).on('click','.edit-bill', function(){
              console.log("Hello Joshua");
        var billing_id = $(this).attr('id');

        $.ajax({
                url:"./controller/bill_upload_logic.php",
                type:"POST",
                data: {billing_id:billing_id},
                dataType: "json",
                succes: function(data){
                    $('#student_name').val(data.student_name);
                    $('#editBill').modal('show');
                   

                }
        });
       

})*/
</script>