<?php
include ("../validation.php");
include ("admin_session.php");
include ("../send_fetch_data_from_db.php");

$tablename = "admin_data";
$fetch_data_from_db = new fetch_data_from_db ();
$admin_fetch_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, $tablename);
$check_email = $fetch_data_from_db->searchemail($admin_fetch_data_from_db,$admin_login_email);

if(isset($_POST['submit'])){
$err_login_email = $admin_entered_details->email_match($admin_login_email);
$err_login_password = $admin_entered_details->validation_password($admin_login_password);
if($err_login_email == null && $err_login_password == null){
    if (in_array($admin_login_email, $check_email) && in_array($admin_login_password, $check_email)) {
        $_SESSION = ["email" => $admin_login_email, "password" => $admin_login_password];
        header("location: ./admin_dashboard.php");
    } else {
        $errmsg = "Email & password not matched";
    }
}else{
    $errmsg = "Please complete the form";
}
}


$tablename = "admin_data";
$session_email = isset($_SESSION['email']) ? $_SESSION['email'] :'';
$logged_in_data = $fetch_data_from_db->searchemail($admin_fetch_data_from_db, $session_email);

$admin_logged_in_id = isset($logged_in_data[0]) ? $logged_in_data[0] : '';
$admin_logged_in_name = isset($logged_in_data[1]) ? $logged_in_data[1] : '';
$admin_logged_in_email = isset($logged_in_data[2]) ? $logged_in_data[2] : '';
$admin_logged_in_password = isset($logged_in_data[3]) ? $logged_in_data[3] : '';
$admin_logged_in_phone_number = isset($logged_in_data[4]) ? $logged_in_data[4] : '';
$admin_logged_in_occupation = isset($logged_in_data[5]) ? $logged_in_data[5] : '';

?>