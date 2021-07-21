<?php
session_start();
require 'db_constants.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection error:" . $conn->connect_error);
}
