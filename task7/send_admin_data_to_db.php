<?php
include ("validation.php");
// include 'database_connection.php';
include ("send_fetch_data_from_db.php");

$send_data_to_db = new send_data_to_db();
$fetch_data_from_db = new fetch_data_from_db();


$fetch_data_from_db = new fetch_data_from_db ();
$admin_fetch_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, 'admin_data');
$check_email = $fetch_data_from_db->searchemail($admin_fetch_data_from_db,$admin_email);


if(isset($_POST['submit'])){
    $err_name = $admin_entered_details->name_validation($admin_name);
    $err_email = $admin_entered_details->email_match($admin_email);
    $err_password = $admin_entered_details->validation_password($admin_password);
    $err_phone_number = $admin_entered_details->phone_length($admin_phone_number);
    $err_occupation = $admin_entered_details->emp($admin_occupation);

    
    if(($err_name == null && $err_email == null && $err_password == null && $err_phone_number == null && $err_occupation == null)){
        $admin_data = "admin_data";
        $column_name = ['admin_name','admin_email','admin_password','admin_phone_number','admin_occupation'];
        $row_data = [$admin_name,$admin_email,$admin_password,$admin_phone_number,$admin_occupation];

        if(!in_array($admin_email,$check_email)){
            $admin_register_data = $send_data_to_db->insertindb($admin_data, $column_name, $row_data, $conn);
            header("location: ./admin_login.php");
        }else{
            $errmsg = "This email already exists";
        }
        
        // $admin = $fetch_data_from_db->fetchdatafromdb($conn, $admin_data);
        // if(empty($admin)){
            // if(!empty($admin_register_data)){
            //     // echo "Error: " . mysqli_error($conn);
            //     // Home Page
            // }else{
            //     header("location: ./admin_login.php");
            // }
        // }else{
        //     echo "Yo";
        // }
    }
    else{
        $errmsg = "Please complete the form";
    }
}
?>