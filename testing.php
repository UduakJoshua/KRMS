<?php
$pass = "h/0455";
$password = password_hash($pass, PASSWORD_DEFAULT);
echo $password;
?>

<div>
    <p>
        <a href="https://api.whatsapp.com/send?phone=+2348179484262&text=Welcome 
        to BCA, how may we help?" target="_blank"><i class="fa fa-whatsapp"></i></a>
    </p>
</div>

<div>
    <form action="testing.php" method="POST">
        <div class="row">
            <div class="col">
                <label for="number">Phone No</label>
                <input type="text" placeholder="Enter Phone Number">
            </div>
            <div class="col">
                <label for="number">Message</label>
                <input type="text" placeholder="Message">
            </div>
            <div class="col">
                <input type="submit" value="Send Message">
            </div>
        </div>
    </form>
</div>