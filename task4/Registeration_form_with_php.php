<?php

// Validation
$firstname = $lastname = $email = $password = $occupation = $role = $skills = $passlength = $ucase = $lcase = $passnumber = $spchar = "";
$err = $errfirstname = $errfirstname1 =  $erremail = $erremail1 = $errpassword = $erroccupation = $errrole = $errskills = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['submit']) {
        if (!empty($_POST['first_name']) || !empty($_POST['email']) || !empty($_POST['password']) || !empty($_POST['occupation'])) {
            $firstname = trim($_POST['first_name']);
            $email = $_POST['email'];
            $password = $_POST['password'];
            $occupation = $_POST['occupation'];
        }
        if (!empty($_POST['role'])) {
            $role = $_POST['role'];
        }
        if (!empty($_POST['skills'])) {
            $skills = $_POST['skills'];
        }
        $email1 = $email;
        $errfirstname = validation_match($firstname); // First Name
        $errfirstname1 = validation_length($firstname); // First Name
        $erremail = validation_length($email); // Email
        $erremail1 = email_match($email); // Email
        $errpassword = func1($password, $err, $passlength, $ucase, $lcase, $passnumber, $spchar); // Password
        $erroccupation = emp($occupation); // Occupation
        $errrole = emp($role); // Role in Company
        $errskills = emp($skills); // Skills
    }
}

function emp($value,$err=null){
    if(empty($value)){
        $err= "Invalid";
        return $err;
    }
}
function validation_length($value, $err = null, $len = null)
{
    $len = strlen($value);
    if ($len > 2 && $len < 40) {
        return false;
    } else {
        $err = "invalid";
        return $err;
    }
}
function validation_match($value, $err = null)
{
    if (!preg_match('/^[a-zA-Z\s]+$/', $value)) {
        $err = "Invalid";
        return $err;
    }
}

function email_match($value, $err = null)
{
    $emailpattern = "^[_a-z0-9]+(\.[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
    if (!preg_match($emailpattern, $value)) {
        $err = "Invalid";
        return $err;
    }
}

function func1($value, $err, $passlength, $ucase, $lcase, $passnumber, $spchar)
{
    $passlength = strlen($value);
    $ucase = preg_match('@[A-Z]@', $value);
    $lcase = preg_match('@[a-z]@', $value);
    $passnumber = preg_match('@[0-9]@', $value);
    $spchar = preg_match('@[^\w]@', $value);


    if (empty($value)) {
        $err = "Invalid";
    } 
    if ($passlength >= 8 && $ucase && $lcase && $passnumber && $spchar && !empty($value)) {
        $value;
    } else {
        $err = "Invalid";
        return $err;
    }
}