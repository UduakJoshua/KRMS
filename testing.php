<?php
$pass = "n/1122";
$password = password_hash($pass, PASSWORD_DEFAULT);
echo $password;
