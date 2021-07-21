<?php
require_once 'dbase_conn.php';
include_once 'function.php';

$record_per_page = 20;
$page = '';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start_from = ($page - 1) * $record_per_page;

$sql = "SELECT * FROM student ORDER BY class_name ASC LIMIT $start_from, $record_per_page";
$result = $conn->query($sql);
