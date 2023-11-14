<?php
$server= "localhost";
$username= "root";
$password1= "";
$db = "student";
try {
    $con = mysqli_connect($server, $username, $password1, $db);
} catch (Exception $e) {
    echo "Connection Failed: " . $e->getMessage();
}
?>