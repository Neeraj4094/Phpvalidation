<?php
require ("../admin_details/admin_login_validation.php");
$id = isset($_GET['id']) ? $_GET['id'] : '';
if(!$id){
    header("location: ./admin_dashboard.php");
}
$fetch_db_data = new fetch_data_from_db();
$querydata = $fetch_db_data->fetchiddata('admin_data', $id, $conn, 'admin_id');
$fetch_id_data = mysqli_fetch_all($querydata);
$delete_admin_account = new delete_from_db();

if (in_array($_SESSION['email'],$fetch_id_data[0])) {
    session_destroy();
    $delete_from_db = $delete_admin_account->deletefromdb('admin_data', $conn, 'admin_id', $id, 'admin_dashboard.php');
    if($delete_from_db == null){
        echo "Error: " . mysqli_error($conn);
    }
    header("location: ./admin_login.php");
}
?>