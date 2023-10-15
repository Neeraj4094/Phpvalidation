<?php 
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




// Storing values in array

// require 'loginwithphp.php';
?>