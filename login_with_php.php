<?php 
require 'registeration_form_with_php.php';
// session_start();
$erremail= $errpassword = '';
$email1 = $password1 = $arr= '';
if($_SERVER["REQUEST_METHOD"]=="POST"){
if(isset($_POST['loginemail']) && isset($_POST['loginpassword'])){
    $email1= $_POST['loginemail'];
    $password1 = $_POST['loginpassword'];
    $_SESSION[$_POST['submit']]= ["email" =>$_POST['loginemail'],"password"=>$_POST['loginpassword']];
    }
}

if(isset($_POST['submit'])){
    if(empty($email1)){
        $erremail = "Invalid";
    }else{
        $email1;
    }
    $errpassword = func1($password, $err, $passlength, $ucase, $lcase, $passnumber, $spchar); // Password
}

?>