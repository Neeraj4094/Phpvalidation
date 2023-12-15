<?php
require ("../admin_details/admin_update_fetch_data.php");
$id = isset($_GET['id']) ? $_GET['id'] : '';
if(!$id){
    header("location: ../admin_details/admin");
}

$fetch_db_data = new fetch_db_data();
$querydata = $fetch_db_data->fetchiddata('category_details', $id, $conn, 'category_id');
$fetch_id_data = mysqli_fetch_all($querydata);
$delete_book_data = new delete_from_db();

$delete_from_db = $delete_book_data->deletefromdb('category_details', $conn, 'category_id', $id, 'category');
if(!$delete_from_db){
    echo "Error: " . mysqli_error($conn);
}
?>