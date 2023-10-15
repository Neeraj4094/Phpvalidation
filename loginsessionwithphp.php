<?php
session_start();
$email = $password = '';
if ($_SERVER['REQUEST_METHOD']=="POST") {
if(isset($_POST['loginemail']) && isset($_POST['loginpassword'])){
$email = $_POST['loginemail'];
$password = $_POST['loginpassword'];
}
}

// $_SESSION[$_POST['loginemail']]=$_POST;
$arr = [$email => [$email,$password]];

echo "<pre>";

// foreach($arr as $i=>$j){
//     echo "<br>" . $i . " => ";
//     print_r($j);
// }


$erremail= $errpassword = '';
$email = $password = '';
if(isset($_POST['loginemail']) && isset($_POST['loginpassword'])){
    $email= $_POST['loginemail'];
    $password = $_POST['loginpassword'];
}
if(empty($email)){
    $erremail = "Invalid";
}else{
    $email;
}

// Password
$passwordlength= strlen($password);
$ucase = preg_match('@[A-Z]@', $password);
$lcase = preg_match('@[a-z]@', $password);
$passwordnumber = preg_match('@[0-9]@', $password);
$specialchar = preg_match('@[^\w]@', $password);
if($passwordlength >= 8 && $ucase && $lcase && $passwordnumber && $specialchar && !empty($password)){
    $password;
}
else{
    $errpassword = "Invalid";
}



// if(array_intersect($_SESSION[$_POST['email']],$arr)){
//     header("Location: /phpprogramms/Admin3.html");
// }else{
//     header("Location: /phpprogramms/Loginwithphp.php");
// }
//  print_r($_SESSION);

//  $array1 = array_diff($_SESSION[$_POST['email']],$_SESSION[$_POST['loginemail']]);
//  print_r($array1);
// require 'registerationwithphp1.php';
?>