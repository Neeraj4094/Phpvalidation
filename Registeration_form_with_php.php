<?php
session_start();

// Validation
$firstname = $lastname = $email = $password = $occupation = $role = $skills = "";
$errfirstname =  $erremail = $errpassword = $erroccupation = $errrole = $errskills = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['submit']) {
        if (isset($_POST['first_name']) || isset($_POST['email'])) {
            $firstname = trim($_POST['first_name']);
            $email = $_POST['email'];
        }
    }
}
if (isset($_POST['password']) || isset($_POST['occupation'])) {
    $password = $_POST['password'];
    $occupation = $_POST['occupation'];
}

if (isset($_POST['role'])) {
    $role = $_POST['role'];
}

if (isset($_POST['skills'])) {
    $skills = $_POST['skills'];
}


$len = strlen($firstname);
$lengthoflastname = strlen($lastname);

// First Name
if(isset($_POST['submit'])){
if (!$len >= 3 && !$len < 20) {
    $errfirstname = "Invalid Name";
}

if (!preg_match('/^[a-zA-Z\s]+$/', $firstname)) {
    $errfirstname = "Invalid ";
}
}


// Email
if(isset($_POST['submit'])){
if (empty($email)) {
    $erremail = "Invalid";
}}

// Password
$passwordlength = strlen($password);
$ucase = preg_match('@[A-Z]@', $password);
$lcase = preg_match('@[a-z]@', $password);
$passwordnumber = preg_match('@[0-9]@', $password);
$specialchar = preg_match('@[^\w]@', $password);
if(isset($_POST['submit'])){
if ($passwordlength >= 8 && $ucase && $lcase && $passwordnumber && $specialchar && !empty($password)) {
    $password;
} else {
    $errpassword = "Invalid";
}}

// Occupation
if(isset($_POST['submit'])){
if (empty($occupation)) {
    $erroccupation = "Invalid";
}
}

// Role in Company
if(isset($_POST['submit'])){
if (empty($role)) {
    $errrole = "Invalid";
}
}

// Skills
if(isset($_POST['submit'])){
if (empty($skills)) {
    $errskills = "Invalid";
}
}



// Session in Regesteration form

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['submit']) {

        $_SESSION[$_POST['email']] = $_POST;
    }
}
