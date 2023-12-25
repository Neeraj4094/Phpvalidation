<?php
require("admin_form_data_handler.php");
$id = isset($_GET['id']) ? $_GET['id'] : '';
if (!$id) {
    header("location: ./admin");
}
$fetch_db_data = new fetch_db_data();
$querydata = $fetch_db_data->fetchiddata('admin_data', $id, $conn, 'id');
$fetch_id_data = mysqli_fetch_all($querydata);
$delete_admin_account = new delete_from_db();
$login_email = isset($_SESSION['admin']['email']) ? $_SESSION['admin']['email'] : '';
$admin_id_email = isset($fetch_id_data[0]) ? $fetch_id_data[0]: '';

if (in_array($login_email, $admin_id_email)) {
    session_destroy();
    $delete_from_db = $delete_admin_account->deletefromdb('admin_data', $conn, 'id', $id, 'admin');
    echo (!$delete_from_db) ? ("Error: " . mysqli_error($conn)) : header("location: admin_login");
    
}
?>