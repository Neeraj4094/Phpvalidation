<?php
require ("admin_update_fetch_data.php");
$id = isset($_GET['id']) ? $_GET['id'] : '';
if(!$id){
    header("location: ./admin");
}
$fetch_db_data = new fetch_db_data();
$querydata = $fetch_db_data->fetchiddata('admin_data', $id, $conn, 'admin_id');
$fetch_id_data = mysqli_fetch_all($querydata);
$delete_admin_account = new delete_from_db();
$login_email = isset($_SESSION['admin']['email']) ? $_SESSION['admin']['email'] :'';

if (in_array($login_email,$fetch_id_data[0])) {
    session_destroy();
    $delete_from_db = $delete_admin_account->deletefromdb('admin_data', $conn, 'admin_id', $id, 'admin');
    echo (!$delete_from_db) ? ("Error: " . mysqli_error($conn)) : header("location: admin_login");
    // if($delete_from_db == null){
    //     echo "Error: " . mysqli_error($conn);
    // }
    // header("location: ./admin_login");
}
?>