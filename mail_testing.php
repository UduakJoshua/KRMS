<?php
require_once 'controller/send_mail.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="mail_testing.php" method="$_POST">
        <button type="submit" class="btn btn-primary" name="sendMail">Send Mail</button>
    </form>
</body>

</html>