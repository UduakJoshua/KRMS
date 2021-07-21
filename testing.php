<?php
$password = "*?blessed_2021";
$st_password = password_hash($password, PASSWORD_DEFAULT);
echo $st_password;
