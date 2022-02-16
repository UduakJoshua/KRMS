<?php
require "./controller/send_mail.php";


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
    <form action="bca-mail.php" method="POST">
        <button type="submit" name="sendMail">Send Mail</button>
    </form>
</body>

</html>