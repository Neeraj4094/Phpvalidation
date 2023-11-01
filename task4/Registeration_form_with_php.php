<?php
include 'dbconnection.php';
//Database
$select = "select * from registeration_login";
$query = mysqli_query($con, $select);
$show = mysqli_fetch_all($query);

//Image
$selectimage = "select * from record_of_image";
$queryimage = mysqli_query($con,$selectimage);
$showimage = mysqli_fetch_all($queryimage);
// print_r($showimage);

foreach ($show as $item) {
    $b[] = $item[0];
}

// Validation
$firstname = $image = $imagename = $email = $password = $occupation = $role = $skills = $passlength = $ucase = $lcase = $passnumber = $spchar = $extension= $ext="";
$err = $errfirstname = $errimage =  $erremail = $erremail1 = $errpassword = $erroccupation = $errrole = $errskills = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {
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
        if (!empty($_FILES['image'])) {
            $image = $_FILES['image'];
            $imagename = $_FILES['image']['name'];
        }
        if(isset($image["size"])){
            $size = $image["size"];
            // print_r($_FILES);
            }
        $email1 = $email;
        $errfirstname = validation_match($firstname); // First Name
        // $errimage = image($image,$con,$c,$size); //Image
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
