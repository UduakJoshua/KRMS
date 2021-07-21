<?php
require_once './controller/student_login_logic.php';
include_once './model/inc/header.php';


?>

<div class="container">

    <h5 class="text-center mt-4">Kindly Login with your details to access the Portal</h5>


    <div class="row">

        <div class="col-md-4 offset-md-4 form-div">

            <form action="student_login.php" method="POST">
                <?php if (count($errors) > 0) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error) : ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['fees'])) : ?>
                    <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                        <?php echo $_SESSION['fees'];
                        unset($_SESSION['fees']);
                        ?>
                    </div>
                <?php endif ?>
                <div class="form-group">
                    <label for="admin"> Admission No: </label>
                    <input type="text" name="adminNo" id=" adminNo" class="form-control form-control-lg" placeholder="Enter Admission no">
                </div>
                <div class="form-group">

                    <label for="st_password"> Password</label>
                    <input type="password" name="st_password" class="form-control form-control-lg" placeholder="Enter password" required>
                </div>

                <div class="form-group">
                    <button type="submit" name="st_login" class="form-control btn btn-primary btn-block btn-lg">Login</button>
                </div>
            </form>

        </div>

    </div>

</div>


<!-- Option 2: Separate Popper and Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>

</html>