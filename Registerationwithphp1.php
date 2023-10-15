<?php 
session_start();

// Validation
$firstname = $lastname = $email = $password = $occupation = $role = $skills = "";
$errfirstname =  $erremail= $errpassword= $erroccupation = $errrole = $errskills = "";

if(isset($_POST['first_name']) || isset($_POST['email']) ){
    $firstname= trim($_POST['first_name']);
    // $lastname= trim($_POST['last_name']);
    $email = $_POST['email'];
}

if(isset($_POST['password']) || isset($_POST['occupation'])){
    $password = $_POST['password'];
    $occupation= $_POST['occupation'];
}

if( isset($_POST['role']) || isset($_POST['skills'])){
    $role = $_POST['role'];
    $skills = $_POST['skills'];
}


$len= strlen($firstname);
$lengthoflastname= strlen($lastname);

// First Name
if($len>=3 && $len<20){
    $firstname;
}else{
    $errfirstname= "Invalid Name";
}

if(!preg_match('/^[a-zA-Z\s]+$/', $firstname)){
    $errfirstname= "Invalid ";
}


// Email
if(empty($email)){
    $erremail= "Invalid";
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

// Occupation
if(empty($occupation)){
    $erroccupation = "Invalid";
}

// Role in Company
if(empty($role)){
    $errrole = "Invalid";
}
// Skills
if(empty($skills)){
    $errskills = "Invalid";
}




// Session in Regesteration form

if ($_SERVER['REQUEST_METHOD']=="POST") {
    if($_POST['submit']){

        $_SESSION[$_POST['email']] = $_POST;
    }
}
    

include 'registerationwithphp.php';

?>