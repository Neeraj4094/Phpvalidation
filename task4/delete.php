<?php
include 'dbconnection.php';
$id = $_GET["id"];
$delete= "delete from registeration_login where id = $id";
$query = mysqli_query($con,$delete);
header("location: admin3.php");
?>