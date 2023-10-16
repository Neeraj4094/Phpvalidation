<?php 
include 'registeration_form_with_php.php';
// session_start();
$erremail= $errpassword = '';
$email1 = $password1 = $arr= '';
if($_SERVER["REQUEST_METHOD"]=="POST"){
if(isset($_POST['loginemail']) && isset($_POST['loginpassword'])){
    $email1= $_POST['loginemail'];
    $password1 = $_POST['loginpassword'];
}
}
if(isset($_POST['submit'])){
if(empty($email1)){
    $erremail = "Invalid";
}else{
    $email1;
}
}

// Password
$passwordlength= strlen($password1);
$ucase = preg_match('@[A-Z]@', $password1);
$lcase = preg_match('@[a-z]@', $password1);
$passwordnumber = preg_match('@[0-9]@', $password1);
$specialchar = preg_match('@[^\w]@', $password1);
if(isset($_POST['submit'])){
if($passwordlength >= 8 && $ucase && $lcase && $passwordnumber && $specialchar && !empty($password1)){
    $password1;
}
else{
    $errpassword = "Invalid";
}
}
foreach($_SESSION as $i=>$j){
    if(isset($j["email"])){
    $a[] =$j["email"];
    }}
    
foreach($_SESSION as $i=>$j){
    if(isset($j["password"])){
    $b[] =$j["password"];
    }
}

?>