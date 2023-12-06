<?php
include 'validation.php';
include 'send_fetch_data_from_db.php';


$password = $user_password;
$send_data_to_db = new send_data_to_db();
// $fetch_data_from_db = new fetch_data_from_db();

$fetch_data_from_db = new fetch_data_from_db ();
$admin_fetch_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, 'admin_data');
$check_email = $fetch_data_from_db->searchemail($admin_fetch_data_from_db,$email);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST['submit'])){
    $err_name = $admin_entered_details->name_validation($name);
    $err_email = $admin_entered_details->email_match($email);
    $err_password = $admin_entered_details->validation_password($password);
    $err_phone_number = $admin_entered_details->phone_length($phone_number,10);
    $err_occupation = $admin_entered_details->emp($occupation);

    if(($err_name == null && $err_email == null && $err_password == null && $err_phone_number == null && $err_occupation == null)){
        $admin_data = "admin_data";
        $column_name = ['admin_name','admin_email','admin_password','admin_phone_number','admin_occupation'];
        $row_data = [$name,$email,$password,$phone_number,$occupation];

        if(!in_array($email,$check_email)){
            $admin_register_data = $send_data_to_db->insertindb($admin_data, $column_name, $row_data, $conn);
            header("location: ./admin_login.php");
        }else{
            $errmsg = "This email already exists";
        }
        
    }
    else{
        $errmsg = "Please complete the form";
    }
}
}
?>