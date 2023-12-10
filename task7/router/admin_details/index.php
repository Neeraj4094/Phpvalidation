<?php
$request = $_SERVER['REQUEST_URI'];
$router = str_replace('/phpprogramms/task7/router/admin_details','',$request);
include '../view/index.php';
?>