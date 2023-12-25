<?php

// include '../database_connection.php';
include("../send_fetch_data_from_db.php");
include("../validation.php");
include("../admin_session.php");


$tablename = "user_details";
if (empty($check_email)) {
    $check_email = [];
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$user_status = $user_actual_status = '';
$send_data_to_db = new send_data_to_db();
$fetch_data_from_db = new fetch_db_data();
$admin_fetch_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, $tablename);
$check_email = $fetch_data_from_db->searchemail($admin_fetch_data_from_db, $email);
$check_email_exist = isset($check_email[2]) ? $check_email[2]: '';

$check_user_email = $fetch_data_from_db->searchemail($admin_fetch_data_from_db, $login_email);
$user_status = isset($check_user_email[7]) ? $check_user_email[7] : '';
$user_login_password = isset($check_user_email[3]) ? $check_user_email[3] : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : '';
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';


$image_upload = new upload_image();

$fetch_id_query = $fetch_data_from_db->fetchiddata('user_details', $user_id, $conn, 'user_id');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);

$fetch_user_name = isset($fetch_id_data[0][1]) ? $fetch_id_data[0][1] : '';
$fetch_user_email = isset($fetch_id_data[0][2]) ? $fetch_id_data[0][2] : '';
$fetch_user_password = isset($fetch_id_data[0][3]) ? $fetch_id_data[0][3] : '';
$fetch_user_phone_no = isset($fetch_id_data[0][4]) ? $fetch_id_data[0][4] : '';
$fetch_user_address = isset($fetch_id_data[0][5]) ? $fetch_id_data[0][5] : '';
$fetch_user_gender = isset($fetch_id_data[0][6]) ? $fetch_id_data[0][6] : '';

$err_name = $err_email = $err_password = $err_phone_number = $err_gender = $err_user_address = '';
$lock_user = "Active";
date_default_timezone_set('UTC');
$created_date = date("Y-m-d H:i:s A"); 
$modified_date = date("Y-m-d H:i:s A");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_users'])) {
        $err_name = $admin_entered_details->name_validation($name);
        $err_email = $admin_entered_details->email_match($email);
        $err_password = $admin_entered_details->validation_password($password);
        $err_phone_number = $admin_entered_details->phone_length($phone_number, 10);
        $err_gender = $admin_entered_details->check_empty($gender);
        $err_user_address = $admin_entered_details->check_empty($address);

        if (empty($err_name) && empty($err_email) && empty($err_password) && empty($err_phone_number) && empty($err_gender) && empty($err_user_address)) {
            
            if (!empty($user_id)) {
                if (($email == $fetch_user_email)) {
                    $column_name = ['name', 'email', 'password', 'phone_no', 'gender', 'status','modified_date'];
                    $column_data = [$name, $email, $hashed_password, $phone_number, $gender, $lock_user,$modified_date];
                    
                    $update_user = $send_data_to_db->update_to_tb($tablename, $column_name, $column_data, 'user_id', $user_id, $conn);
                    echo (!$update_user) ? ("Error: " . mysqli_error($conn)) : '';
                    header("location: ../home_page");
                    
                } elseif ((!in_array($email, $check_email))) {
                    $column_name = ['name', 'email', 'password', 'phone_no', 'gender', 'status','modified_date'];
                    $column_data = [$name, $email, $hashed_password, $phone_number, $gender, $lock_user,$modified_date];
                    $session_login[] = isset($_SESSION['login']) ? $_SESSION['login'] : '';
                    
                    $_SESSION['login'] = ["email" => $email];
                    
                    $update_user = $send_data_to_db->update_to_tb($tablename, $column_name, $column_data, 'user_id', $user_id, $conn);
                    echo (!$update_user) ? ("Error: " . mysqli_error($conn)) : '';
                    header("location: ../home_page");
                    
                } else {
                    $errmsg = "This email already exists";
                }
            } else {
                if (!in_array($email, $check_email)) {
                    $column_name = ['name', 'email', 'password', 'phone_no', 'address', 'gender', 'status','created_date','modified_date'];
                    $row_data = [$name, $email, $hashed_password, $phone_number, $address, $gender, $lock_user,$created_date,$modified_date];
                    $insert_user = $send_data_to_db->insertindb($tablename, $column_name, $row_data, $conn);
                    echo (!$insert_user) ? ("Error: " . mysqli_error($conn)) : '';
                    header("location: ./user_login");
                    // if (!$insert_user) {
                    //     echo "Error: " . mysqli_error($conn);
                    // } else {
                    //
                    // }
                } else {
                    $errmsg = "This email already exists";
                }
            }
        } else {
            $errmsg = "Please complete the form";
        }
    } else {
        if (isset($_POST['user_login'])) {
            $err_login_email = $admin_entered_details->email_match($login_email);
            $err_login_password = $admin_entered_details->validation_password($login_password);

            if ($err_login_email == null && $err_login_password == null) {
                foreach ($admin_fetch_data_from_db as $data) {
                    $user_actual_status = isset($data[7]) ? $data[7] : '';
                    if ($user_status != 'Blocked') {
                        if (in_array($login_email, $check_user_email) && password_verify($login_password, $user_login_password)) {
                            $_SESSION['login'] = ["email" => $login_email];
                            header("location: ../home_page");
                        } else {
                            $errmsg = "Email & password not matched";
                        }
                    } else {
                        $errmsg = "This account is deleted";
                    }
                }
            } else {
                $errmsg = "Please complete the form";
            }
        }
    }
}

?>