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
$c = end($b) +1;
// Validation
$firstname = $image = $email = $password = $occupation = $role = $skills = $passlength = $ucase = $lcase = $passnumber = $spchar = $extension= $ext="";
$err = $errfirstname = $errimage =  $erremail = $erremail1 = $errpassword = $erroccupation = $errrole = $errskills = "";
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
        if (!empty($_FILES['image'])) {
            $image = $_FILES['image'];
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
// function image($image,$con,$c,$size,$errimage=null,$result=null){
//     if ($size > 0) {
//         $extension = ["jpg","png","jpeg"];
//         $ext = pathinfo($image["name"], PATHINFO_EXTENSION);
//         if (in_array($ext, $extension)) {
//             $errimage = '';
//             $newname = uniqid("Img-", true) . '.' . $ext;
//             $upload = "..\image/" . $newname;
//             move_uploaded_file($image["tmp_name"], $upload);

//             $user_id_query = "SELECT ID FROM registeration_login WHERE email = '$email'";
//             $user_id_result = mysqli_query($con, $user_id_query);
//             // print_r($user_id_result);
//             if ($user_id_result) {
//                 $user_id_row = mysqli_fetch_assoc($user_id_result);
//                 if(isset($user_id_row['ID'])){
//                 $user_id = $user_id_row['ID'];
//                 }else{
//                     echo "No";
//                 }
//                 // print_r($user_id_row);
//                 echo "Ok";
//                 // Inserting into record_of_image
//                 // $insert = "INSERT INTO record_of_image (user_image, user_id) VALUES ('$newname', '$user_id')";
//                 // $result = mysqli_query($con, $insert);
//                 // if (!$result) {
//                 //     echo "Error: " . mysqli_error($con);
//                 // }
//             } else {
//                 echo "Error: " . mysqli_error($con);
//             }
//         } else {
//             $errimage = "Only jpg & png files are allowed";
//         }
//     }
// }
