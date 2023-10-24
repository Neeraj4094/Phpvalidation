<?php
$server= "localhost";
$username= "root";
$password1= "";
$db = "student";
if(isset($_POST["first_name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["occupation"])){
    $name= $_POST["first_name"];
    $email= $_POST["email"];
    $password = $_POST["password"];
    $occupation =$_POST["occupation"];
}
if(isset($_POST["role"])){
    $role = $_POST["role"];
}
if(isset($_POST["skills"])){
    $skills = $_POST["skills"]; 
}
$con = mysqli_connect($server,$username,$password1,$db);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>