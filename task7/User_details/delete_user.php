<?php
// require("../admin_details/admin_login_validation.php");
include '../admin_session.php';
include '../send_fetch_data_from_db.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';

$login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';
if (!$id) {
    header("location: ../admin_details/admin_dashboard.php");
}

$fetch_db_data = new fetch_db_data();
$querydata = $fetch_db_data->fetchiddata('user_details', $id, $conn, 'user_id');
$fetch_id_data = mysqli_fetch_all($querydata);
$delete_book_data = new delete_from_db();

$delete_from_db = $delete_book_data->deletefromdb('user_details', $conn, 'user_id', $id, 'user_dashboard.php');
if(!$delete_from_db){
    echo "Error: " . mysqli_error($conn);
}
?>
