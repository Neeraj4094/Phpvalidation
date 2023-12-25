<?php

include("../admin_session.php");
include '../validation.php';
include '../send_fetch_data_from_db.php';

$password = $user_password;

$login_email = isset($_SESSION['admin']['email']) ? $_SESSION['admin']['email'] : '';

$admin_id_data = $fetch_data_from_db->fetch_data('user_details', 'user_id', $login_email, $conn, 'email');
$admin_id = isset($admin_id_data[0][0]) ? $admin_id_data[0][0] : '';

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$login_email = $admin_email;
$send_data_to_db = new send_data_to_db();
$fetch_admin_table_data = $fetch_data_from_db->fetchdatafromdb($conn, 'admin_data');

if (!empty($fetch_admin_table_data)) {
    $check_admin_email = $fetch_data_from_db->searchemail($fetch_admin_table_data, $email);
} else {
    $check_admin_email = [];
}
foreach ($check_admin_email as $email_data) {
    $check_email_exists[] = $email_data;
    $user_password_in_db = isset($check_email_exists[3]) ? $check_email_exists[3] : '';
}

$updateobject = new send_data_to_db();
$err_role = '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

$fetch_id_query = $fetch_data_from_db->fetchiddata('admin_data', $id, $conn, 'id');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);

$fetch_name_from_id = isset($fetch_id_data[0][1]) ? $fetch_id_data[0][1] : '';
$fetch_email_from_id = isset($fetch_id_data[0][2]) ? $fetch_id_data[0][2] : '';
$fetch_password_from_id = isset($fetch_id_data[0][3]) ? $fetch_id_data[0][3] : '';
$fetch_phone_number_from_id = isset($fetch_id_data[0][4]) ? $fetch_id_data[0][4] : '';
$fetch_occupation_from_id = isset($fetch_id_data[0][5]) ? $fetch_id_data[0][5] : '';

$tablename = "admin_data";

if (!empty($login_email)) {
    $check_email = $fetch_data_from_db->searchemail($fetch_admin_table_data, $login_email);
}
$session_email = isset($_SESSION['admin']['email']) ? $_SESSION['admin']['email'] : '';
// $login_password = isset($_SESSION['admin']['password']) ? $_SESSION['admin']['password'] : '';
if (!empty($session_email)) {
    $logged_in_data = $fetch_data_from_db->searchemail($fetch_admin_table_data, $session_email);
}
$check_login_password = isset($check_email[3]) ? $check_email[3] : '';

$admin_logged_in_id = isset($logged_in_data[0]) ? $logged_in_data[0] : '';
$admin_logged_in_name = isset($logged_in_data[1]) ? $logged_in_data[1] : '';
$admin_logged_in_email = isset($logged_in_data[2]) ? $logged_in_data[2] : '';

if ((isset($_POST['submit'])) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
    $err_name = $admin_entered_details->name_validation($name);
    $err_email = $admin_entered_details->email_match($email);
    $err_password = $admin_entered_details->validation_password($password);
    $err_phone_number = $admin_entered_details->phone_length($phone_number, 10);
    $err_role = $admin_entered_details->check_empty($occupation);

    $admin_table_name = "admin_data";
    $column_name = ['name', 'email', 'password', 'phone_number', 'occupation'];
    $row_data = [$name, $email, $hashed_password, $phone_number, $occupation];
    $errmsg = (($err_name == null && $err_email == null && $err_password == null && $err_phone_number == null && $err_role == null))
        ? (empty($fetch_admin_table_data))
        ? ($send_data_to_db->insertindb($admin_table_name, $column_name, $row_data, $conn)
            ? header("location: ./admin_login")
            : "Error" . mysqli_error($conn))
        : (($compare_email_status_with_db = !in_array($email, $check_email_exists))
            ? ($send_data_to_db->insertindb($admin_table_name, $column_name, $row_data, $conn) && header("location: ./admin_login"))
            : ($errmsg = "This email already exists"))
        : ($errmsg = "Please complete the form");

} elseif ((isset($_POST['update'])) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
    $err_name = $admin_entered_details->name_validation($name);
    $err_email = $admin_entered_details->email_match($email);
    $err_password = $admin_entered_details->validation_password($password);
    $err_phone_number = $admin_entered_details->phone_length($phone_number, 10);
    $err_roles = $admin_entered_details->check_empty($occupation);


    $admin_table_columns_name = ['name', 'email', 'password', 'phone_number', 'occupation'];
    $admin_table_columns_data = [$name, $email, $hashed_password, $phone_number, $occupation];
    $column_id_name = 'id';

    $check_admin_email_data = !in_array($email, $check_email_exists);


    $errmsg = (($err_name == null && $err_email == null && $err_password == null && $err_phone_number == null && $err_occupation == null))
        ? ($email != $admin_logged_in_email)
        ? (($check_admin_email_data)
            ? (($_SESSION['admin'] = ["email" => $email]) &&
                ($updated_data = $send_data_to_db->update_to_tb('admin_data', $admin_table_columns_name, $admin_table_columns_data, $column_id_name, $id, $conn)) &&
                ((!$updated_data)
                    ? "Error: " . mysqli_error($conn)
                    : header("location: ./admin")))
            : ($errmsg = "This email already exists"))
        : (($updated_data = $send_data_to_db->update_to_tb('admin_data', $admin_table_columns_name, $admin_table_columns_data, $column_id_name, $id, $conn)) &&
            ((!$updated_data)
                ? "Error: " . mysqli_error($conn)
                : header("location: ./admin")))
        : ("Please complete the form");

} else {
    if ((isset($_POST['login'])) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
        $err_login_email = $admin_entered_details->email_match($login_email);
        $err_login_password = $admin_entered_details->validation_password($admin_password);

        $login_hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

        $errmsg = ($err_login_email == null && $err_login_password == null)
            ? (in_array($login_email, $check_email) && password_verify($admin_password, $check_login_password)
                ? header("location: ./admin")
                : "Email & password not matched")
            : "Please complete the form";

        $_SESSION['admin'] = ($err_login_email == null)
            ? ["email" => $login_email]
            : null;
    }
}

?>