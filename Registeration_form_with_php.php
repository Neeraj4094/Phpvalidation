<?php
session_start();

// Validation
$firstname = $lastname = $email = $password = $occupation = $role = $skills = "";
$errfirstname =  $erremail = $errpassword = $erroccupation = $errrole = $errskills = "";
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

        // First Name
        if (validation_match($firstname)) {
            $errfirstname = "Invalid Name";
        }
        if (validation_length($firstname)) {
            $errfirstname = "Invalid";
            }

        // Email
        if (validation_length($email)) {
            $erremail = "Invalid";
        }
        if(email_match($email)){
            $erremail = "Not Valid";
        }

        // Password
        $passwordlength = strlen($password);
        $ucase = preg_match('@[A-Z]@', $password);
        $lcase = preg_match('@[a-z]@', $password);
        $passwordnumber = preg_match('@[0-9]@', $password);
        $specialchar = preg_match('@[^\w]@', $password);

        if ($passwordlength >= 8 && $ucase && $lcase && $passwordnumber && $specialchar && !empty($password)) {
            $password;
        } else {
            $errpassword = "Invalid";
        }

        // Occupation
        if (empty($occupation)) {
            $erroccupation = "Invalid";
        }

        // Role in Company
        if (empty($role)) {
            $errrole = "Invalid";
        }

        // Skills
        if (empty($skills)) {
            $errskills = "Invalid";
        }
    }
}

function validation_length($value, $len = null)
        {
            $len = strlen($value);
            if ($len > 2 && $len < 40) {
                return false;
            } else {
                return true;
            }
        }
        function validation_match($value)
        {
            if (!preg_match('/^[a-zA-Z\s]+$/', $value)) {
                //  $err = "Invalid";
                return true;
            }
        }

        function email_match($value){
            $emailpattern = "^[_a-z0-9]+(\.[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
            if(!preg_match($emailpattern,$value)){
                return true;
            }
        }