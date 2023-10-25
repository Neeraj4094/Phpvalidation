<?php
include 'session.php';
require './registeration_form_with_php.php';
include 'dbconnection.php';
$select = "select * from registeration_login";
$query = mysqli_query($con, $select);
$result = mysqli_fetch_all($query);

$erremail = $errpassword = '';
$email1 = $password1 = $arr = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['loginemail']) && isset($_POST['loginpassword'])) {
        if (isset($_POST['submit'])) {
            $email1 = $_POST['loginemail'];
            $password1 = $_POST['loginpassword'];
            $login["submit"] = ["email" => $_POST['loginemail'], "password" => $_POST['loginpassword']];
            $_SESSION=$login;

            if (empty($email1)) {
                $erremail = "Invalid";
            } else {
                $email1;
            }
            $errpassword = func1($password1, $err, $passlength, $ucase, $lcase, $passnumber, $spchar); // Password
        }
    }
}
