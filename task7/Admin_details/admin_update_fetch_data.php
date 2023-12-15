<?php

include ("../admin_session.php");
include '../validation.php';
include '../send_fetch_data_from_db.php';

// if(!empty($user_password)){
$password = $user_password;

// }
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
// if (password_verify($password, $hashed_password)) {
//         echo "Login successful!";
// } else {
//             echo "Login failed.";
// }
$send_data_to_db = new send_data_to_db();

$admin_fetch_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, 'admin_data');

if(!empty($admin_fetch_data_from_db)){
    $check_admin_email = $fetch_data_from_db->searchemail($admin_fetch_data_from_db,$email);
}else{
    $check_admin_email = [];
}
foreach($check_admin_email as $email_data) {
    $check_email_exists[] = $email_data;
}

$updateobject = new send_data_to_db();
$err_role = '';
$id = isset($_GET['id'])? $_GET['id'] : '';

$fetch_id_query = $fetch_data_from_db->fetchiddata('admin_data', $id, $conn, 'admin_id');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);

$fetch_name_from_id = isset($fetch_id_data[0][1])? $fetch_id_data[0][1] :'';
$fetch_email_from_id = isset($fetch_id_data[0][2])? $fetch_id_data[0][2] :'';
$fetch_password_from_id = isset($fetch_id_data[0][3])? $fetch_id_data[0][3] :'';
$fetch_phone_number_from_id = isset($fetch_id_data[0][4])? $fetch_id_data[0][4] :'';
$fetch_occupation_from_id = isset($fetch_id_data[0][5])? $fetch_id_data[0][5] :'';

$tablename = "admin_data";
// $fetch_data_from_db = new fetch_data_from_db ();
$admin_fetch_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, $tablename);

if(!empty($login_email)){
$check_email = $fetch_data_from_db->searchemail($admin_fetch_data_from_db,$login_email);
}
$session_email = isset($_SESSION['admin']['email']) ? $_SESSION['admin']['email'] : '';
$login_password = isset($_SESSION['admin']['password']) ? $_SESSION['admin']['password'] : '';
if(!empty($session_email)){
$logged_in_data = $fetch_data_from_db->searchemail($admin_fetch_data_from_db, $session_email);
}
$check_login_password = isset($check_email[3]) ? $check_email[3] :'';

$admin_logged_in_id = isset($logged_in_data[0]) ? $logged_in_data[0] : '';
$admin_logged_in_name = isset($logged_in_data[1]) ? $logged_in_data[1] : '';
$admin_logged_in_email = isset($logged_in_data[2]) ? $logged_in_data[2] : '';
$admin_logged_in_password = isset($logged_in_data[3]) ? $logged_in_data[3] : '';
$admin_logged_in_phone_number = isset($logged_in_data[4]) ? $logged_in_data[4] : '';
$admin_logged_in_occupation = isset($logged_in_data[5]) ? $logged_in_data[5] : '';


// $admin_password = password_verify($admin_logged_in_password,$login_password);
// echo $admin_password;
$fetch_all_admin_data = $fetch_data_from_db->fetchdatafromdb($conn, $tablename);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['submit'])){
        $err_name = $admin_entered_details->name_validation($name);
        $err_email = $admin_entered_details->email_match($email);
        $err_password = $admin_entered_details->validation_password($password);
        $err_phone_number = $admin_entered_details->phone_length($phone_number,10);
        $err_role = $admin_entered_details->check_empty($occupation);
    
        if(($err_name == null && $err_email == null && $err_password == null && $err_phone_number == null && $err_role == null)){
            $admin_data = "admin_data";
            $column_name = ['admin_name','admin_email','admin_password','admin_phone_number','admin_occupation'];
            $row_data = [$name,$email,$hashed_password,$phone_number,$occupation];
            if(empty($admin_fetch_data_from_db)){
                $admin_register_data = $send_data_to_db->insertindb($admin_data, $column_name, $row_data, $conn);
                echo (!$admin_register_data) ? ("Error" . mysqli_error($conn)) : header("location: ./admin_login");
            }
            $compare_email_status_with_db = !in_array($email,$check_email_exists);
             $compare_email_status_with_db ?
                ($admin_register_data = $send_data_to_db->insertindb($admin_data, $column_name, $row_data, $conn) &&
                header("location: ./admin_login")) : $errmsg = "This email already exists";
            
        }
        else{
            $errmsg = "Please complete the form";
        }
    }elseif(isset($_POST['update'])){
        $err_name = $admin_entered_details->name_validation($name);
        $err_email = $admin_entered_details->email_match($email);
        $err_password = $admin_entered_details->validation_password($password);
        $err_phone_number = $admin_entered_details->phone_length($phone_number,10);
        $err_roles = $admin_entered_details->check_empty($occupation);

        if(($err_name == null && $err_email == null && $err_password == null && $err_phone_number == null && $err_occupation == null)){
            $admin_table_columns_name = ['admin_name','admin_email','admin_password','admin_phone_number','admin_occupation'];
            $admin_table_columns_data = [$name,$email,$hashed_password,$phone_number,$occupation];
            $column_id_name = 'admin_id';
            
            // header("location: ./admin_login.php");
            // print_r($fetch_email_from_id);
            // if(in_array($fetch_email_from_id,$_SESSION['admin'])){
                $check_email_password_status_with_session_data = !in_array($email, $_SESSION['admin']) || !password_verify($password, $login_password);
                $check_email_password_status_with_admintable_data = !in_array($email, $check_email_exists) || !password_verify($password, $login_password);
                
                    // if(!in_array($email,$_SESSION['admin']) || !password_verify($password,$login_password)){

                        echo $check_email_password_status_with_session_data
                            ? ( $check_email_password_status_with_admintable_data ?
                                (($_SESSION['admin'] = ["email" => $email, "password" => $password]) &&
                                ($updated_data = $send_data_to_db->update_to_tb('admin_data', $admin_table_columns_name, $admin_table_columns_data, $column_id_name, $id, $conn)) &&
                                (!$updated_data ? "Error: " . mysqli_error($conn) : header("location: ./admin"))) : "This email already exists")
                             : 
                            (($updated_data = $send_data_to_db->update_to_tb('admin_data', $admin_table_columns_name, $admin_table_columns_data, $column_id_name, $id, $conn)) &&
                                (!$updated_data ? "Error: " . mysqli_error($conn) : header("location: ./admin")));
                            
                    // }else{
                        // $updated_data = $send_data_to_db->update_to_tb('admin_data',$admin_table_columns_name,$admin_table_columns_data,$column_id_name,$id,$conn);
                        // echo (!$updated_data) ? ("Error: " . mysqli_error($conn)) : header("location: ./admin");
                    // }
                // }
            }
            else{
                $errmsg = "Please complete the form";
            }
        }else{
            if(isset($_POST['login'])) {
                $err_login_email = $admin_entered_details->email_match($login_email);
                $err_login_password = $admin_entered_details->validation_password($admin_password);
                
                $login_hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);
                // print_r($check_email);
                // if(password_hash($admin_password, $check_email)){
                //     echo "Ok";
                // }else{
                //     echo "No";
                // }

                // if($err_login_email == null && $err_login_password == null) {
                //     $errmsg = (in_array($login_email, $check_email) && password_verify($admin_password, $check_login_password))
                //     ? header("location: ./admin")
                //     : "Email & password not matched";
                //     $_SESSION['admin'] = ["email" => $login_email, "password" => $admin_password];
                // } else {
                //     $errmsg = "Please complete the form";
                // }
                $errmsg = ($err_login_email == null && $err_login_password == null)
                    ? (in_array($login_email, $check_email) && password_verify($admin_password, $check_login_password)
                        ? header("location: ./admin")
                        : "Email & password not matched")
                    : "Please complete the form";
                $_SESSION['admin'] = ($err_login_email == null && $err_login_password == null)
                    ? ["email" => $login_email, "password" => $admin_password]
                    : null;
            }
        }
}

?>