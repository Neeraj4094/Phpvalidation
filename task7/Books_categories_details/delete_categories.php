<?php
require ("../admin_details/admin_login_validation.php");
$id = isset($_GET['id']) ? $_GET['id'] : '';
if(!$id){
    header("location: ../admin_details/admin_dashboard.php");
}

$fetch_db_data = new fetch_data_from_db();
$querydata = $fetch_db_data->fetchiddata('category_details', $id, $conn, 'category_id');
$fetch_id_data = mysqli_fetch_all($querydata);
$delete_book_data = new delete_from_db();

$delete_from_db = $delete_book_data->deletefromdb('category_details', $conn, 'category_id', $id, 'category_dashboard.php');
if(!$delete_from_db){
    echo "Error: " . mysqli_error($conn);
}
?>