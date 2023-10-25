<?php
$server= "localhost";
$username= "root";
$password1= "";
$db = "student";

try {
    $con = mysqli_connect($server, $username, $password1, $db);
    // if (!$con) {
    //     throw new Exception("Connection failed: " . mysqli_connect_error());
    // }
} catch (Exception $e) {
    echo "Connection Failed: " . $e->getMessage();
}
?>