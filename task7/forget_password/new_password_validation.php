<?php
include '../validation.php';
include '../send_fetch_data_from_db.php';
$err_new_password = $err_confirm_password = '';

$user_email = isset($_GET['user_email']) ? $_GET['user_email'] : '';
$hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
$hashed_confirm_password = password_hash($confirm_password, PASSWORD_DEFAULT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["reset_password"])) {
        $err_new_password = $admin_entered_details->validation_password($new_password);
        $err_confirm_password = $admin_entered_details->validation_password($confirm_password);
        if (empty($err_new_password) && empty($err_confirm_password)) {
            if ($new_password == $confirm_password) {
                $column_name = ['user_password'];
                $column_data = [$hashed_new_password];
                $update_password = $send_data_to_db->update_to_tb('user_details', $column_name, $column_data, 'user_email', $user_email, $conn);
                if (!$update_password) {
                    echo 'Error: ' . mysqli_error($conn);
                } else {
                    header('location: ../user_details/user_login');
                }
            } else {
                $errmsg = "Password not matched";
            }
        }
    }
}