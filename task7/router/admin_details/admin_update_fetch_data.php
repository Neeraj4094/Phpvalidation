<?php

include ("../../admin_session.php");
include '../../send_admin_data_to_db.php';
// include 'index.php';

// $routes = [
//     // your routes...
// ];
$url_query = isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';

$parts = explode('=', $url_query);
if (count($parts) >= 2) {
    $id = $parts[1];
}else{
    $id = '';
}

$password = $user_password;
$send_data_to_db = new send_data_to_db();
// $fetch_data_from_db = new fetch_data_from_db();

$fetch_data_from_db = new fetch_data_from_db ();
$admin_fetch_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, 'admin_data');
$check_admin_email = $fetch_data_from_db->searchemail($admin_fetch_data_from_db,$email);
foreach($check_admin_email as $email_data) {
    $check_email_exists[] = $email_data;
}

$updateobject = new send_data_to_db();
$err_role = '';
// echo $id;
$fetch_id_query = $fetch_data_from_db->fetchiddata('admin_data', $id, $conn, 'admin_id');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);

$fetch_name_from_id = isset($fetch_id_data[0][1])? $fetch_id_data[0][1] :'';
$fetch_email_from_id = isset($fetch_id_data[0][2])? $fetch_id_data[0][2] :'';
$fetch_password_from_id = isset($fetch_id_data[0][3])? $fetch_id_data[0][3] :'';
$fetch_phone_number_from_id = isset($fetch_id_data[0][4])? $fetch_id_data[0][4] :'';
$fetch_occupation_from_id = isset($fetch_id_data[0][5])? $fetch_id_data[0][5] :'';

$tablename = "admin_data";
$fetch_data_from_db = new fetch_data_from_db ();
$admin_fetch_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, $tablename);
$check_email = $fetch_data_from_db->searchemail($admin_fetch_data_from_db,$login_email);


$session_email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$logged_in_data = $fetch_data_from_db->searchemail($admin_fetch_data_from_db, $session_email);

$admin_logged_in_id = isset($logged_in_data[0]) ? $logged_in_data[0] : '';
$admin_logged_in_name = isset($logged_in_data[1]) ? $logged_in_data[1] : '';
$admin_logged_in_email = isset($logged_in_data[2]) ? $logged_in_data[2] : '';
$admin_logged_in_password = isset($logged_in_data[3]) ? $logged_in_data[3] : '';
$admin_logged_in_phone_number = isset($logged_in_data[4]) ? $logged_in_data[4] : '';
$admin_logged_in_occupation = isset($logged_in_data[5]) ? $logged_in_data[5] : '';


$fetch_all_admin_data = $fetch_data_from_db->fetchdatafromdb($conn, $tablename);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['submit'])){
        $err_name = $admin_entered_details->name_validation($name);
        $err_email = $admin_entered_details->email_match($email);
        $err_password = $admin_entered_details->validation_password($password);
        $err_phone_number = $admin_entered_details->phone_length($phone_number,10);
        $err_role = $admin_entered_details->emp($occupation);
    
        if(($err_name == null && $err_email == null && $err_password == null && $err_phone_number == null && $err_role == null)){
            $admin_data = "admin_data";
            $column_name = ['admin_name','admin_email','admin_password','admin_phone_number','admin_occupation'];
            $row_data = [$name,$email,$password,$phone_number,$occupation];
            
            if(!in_array($email,$check_email_exists)){
                $admin_register_data = $send_data_to_db->insertindb($admin_data, $column_name, $row_data, $conn);
                header("location: ./admin_login");
            }else{
                $errmsg = "This email already exists";
            }
            
        }
        else{
            $errmsg = "Please complete the form";
        }
    }elseif(isset($_POST['update'])){
        $err_name = $admin_entered_details->name_validation($name);
        $err_email = $admin_entered_details->email_match($email);
        $err_password = $admin_entered_details->validation_password($password);
        $err_phone_number = $admin_entered_details->phone_length($phone_number,10);
        $err_roles = $admin_entered_details->emp($occupation);

        
        if(($err_name == null && $err_email == null && $err_password == null && $err_phone_number == null && $err_occupation == null)){
            $admin_table_columns_name = ['admin_name','admin_email','admin_password','admin_phone_number','admin_occupation'];
            $admin_table_columns_data = [$name,$email,$password,$phone_number,$occupation];
            $column_id_name = 'admin_id';
            
            // header("location: ./admin_login.php");
            if(in_array($fetch_email_from_id,$_SESSION)){
                if(!in_array($email,$_SESSION) || !in_array($password,$_SESSION)){

                    if(!in_array($email,$check_email_exists) || !in_array($password,$check_email_exists)){

                    $_SESSION = ["email" => $email, "password" => $password];
                    $updated_data = $send_data_to_db->update_to_tb('admin_data',$admin_table_columns_name,$admin_table_columns_data,$column_id_name,$id,$conn);
                    if(!$updated_data){
                        echo "Error: " . mysqli_error($conn);
                    }
                    header("location: ./admin");
                }else{
                    echo "This email already exists";
                }
            }else{
                $updated_data = $send_data_to_db->update_to_tb('admin_data',$admin_table_columns_name,$admin_table_columns_data,$column_id_name,$id,$conn);
                if(!$updated_data){
                    echo "Error: " . mysqli_error($conn);
                }
                header("location: ./admin");
            }
            }
        }
        else{
            $errmsg = "Please complete the form";
        }
    }else{
        if(isset($_POST['login'])) {
            $err_login_email = $admin_entered_details->email_match($login_email);
            $err_login_password = $admin_entered_details->validation_password($login_password);
            if($err_login_email == null && $err_login_password == null) {
                if(in_array($login_email, $check_email) && in_array($login_password, $check_email)) {
                    $_SESSION = ["email" => $login_email, "password" => $login_password];
                    header("location: ./admin");
                } else {
                    $errmsg = "Email & password not matched";
                }
            } else {
                $errmsg = "Please complete the form";
            }
        }
    }
}

?>