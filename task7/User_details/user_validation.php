<?php

// include '../database_connection.php';
include ("../send_fetch_data_from_db.php");
include ("../validation.php");
include ("../admin_session.php");


$tablename = "user_details";



$send_data_to_db = new send_data_to_db();
$fetch_data_from_db = new fetch_data_from_db ();
$admin_fetch_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, $tablename);
$check_email = $fetch_data_from_db->searchemail($admin_fetch_data_from_db,$email);

$check_user_email = $fetch_data_from_db->searchemail($admin_fetch_data_from_db,$login_email);


$id = isset($_GET['id']) ? intval($_GET['id']) : '';
$image_upload = new image();

$fetch_id_query = $fetch_data_from_db->fetchiddata('user_details', $id, $conn, 'user_id');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);

$fetch_user_name = isset($fetch_id_data[0][1]) ? $fetch_id_data[0][1] : '';
$fetch_user_email = isset($fetch_id_data[0][2]) ? $fetch_id_data[0][2] : '';
$fetch_user_password = isset($fetch_id_data[0][3]) ? $fetch_id_data[0][3] : '';
$fetch_user_phone_no = isset($fetch_id_data[0][4]) ? $fetch_id_data[0][4] : '';
$fetch_user_address = isset($fetch_id_data[0][5]) ? $fetch_id_data[0][5] : '';
$fetch_user_gender = isset($fetch_id_data[0][6]) ? $fetch_id_data[0][6] : '';

$err_name = $err_email = $err_password = $err_phone_number = $err_gender = $err_user_address = '';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST['add_users'])){
    $err_name = $admin_entered_details->name_validation($name);
    $err_email = $admin_entered_details->email_match($email);
    $err_password = $admin_entered_details->validation_password($password);
    $err_phone_number = $admin_entered_details->phone_length($phone_number,10);
    $err_gender = $admin_entered_details->emp($gender);
    $err_user_address = $admin_entered_details->emp($address);
    
    if(empty($err_name) && empty($err_email) && empty($err_password) && empty($err_phone_number) && empty($err_gender) && empty($err_user_address)){
        
        $column_name = ['user_name','user_email','user_password','user_phone_no','user_address','gender'];
        $column_data = [$name,$email,$password,$phone_number,$address,$gender];
        if(!empty($id)){
            if(($email == $fetch_user_email) && ($password == $fetch_user_password)){
                // echo "ok";
                $column_name = ['user_name','user_email','user_password','user_phone_no','gender','user_address',];
                $column_data = [$name,$email,$password,$phone_number,$gender,$address];
                $update_user = $send_data_to_db->update_to_tb($tablename,$column_name,$column_data,'user_id',$id,$conn);
                if(!$update_user){
                    echo "Error: " . mysqli_error($conn);
                }else{
                    header("location: ./user_dashboard.php");
                }
            }elseif((!in_array($email,$check_email)) || (!in_array($password,$check_email))){
                $column_name = ['user_name','user_email','user_password','user_phone_no','gender','user_address',];
                $column_data = [$name,$email,$password,$phone_number,$gender,$address];
                
                $session_login = isset($_SESSION['login'])?$_SESSION['login']:'';
                if(in_array($fetch_user_email,$session_login)){
                    $_SESSION['login'] = ["email" => $login_email, "password" => $login_password];
                }
                // $_SESSION['login'] = ["email" => $login_email, "password" => $login_password];
                $update_user = $send_data_to_db->update_to_tb($tablename,$column_name,$column_data,'user_id',$id,$conn);
                if(!$update_user){
                    echo "Error: " . mysqli_error($conn);
                }else{
                    header("location: ./user_dashboard.php");
                }
            }
            else{
                echo "No";
            }
        }else{
            if(!in_array($email,$check_email)){
                $column_name = ['user_name','user_email','user_password','user_phone_no','user_address','gender'];
                $row_data = [$name,$email,$password,$phone_number,$address,$gender];
                $insert_user = $send_data_to_db->insertindb($tablename, $column_name, $column_data, $conn);
                if(!$insert_user){
                    echo "Error: " . mysqli_error($conn);
                }else{
                header("location: ./user_login.php");
                }
            }else{
                $errmsg = "This email already exists";
            }
        }
    }else{
        $errmsg = "Please complete the form";
    }
}else{
    
    if(isset($_POST['user_login'])){
        $err_login_email = $admin_entered_details->email_match($login_email);
        $err_login_password = $admin_entered_details->validation_password($login_password);
        if($err_login_email == null && $err_login_password == null){
            // print_r($check_email);
            if (in_array($login_email, $check_user_email) && in_array($login_password, $check_user_email)) {
                $_SESSION['login'] = ["email" => $login_email, "password" => $login_password];
                header("location: ../book_home.php");
            } else {
                $errmsg = "Email & password not matched";
            }
        }else{
            $errmsg = "Please complete the form";
        }
    }
}
}

?>