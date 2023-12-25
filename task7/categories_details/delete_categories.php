<?php
require("../admin_details/admin_form_data_handler.php");
$id = isset($_GET['id']) ? $_GET['id'] : '';
if (!$id) {
    header("location: ../admin_details/admin");
}

$fetch_db_data = new fetch_db_data();

$delete_book_data = new delete_from_db();

$category_name_array = $fetch_data_from_db->fetch_data('category_details', 'category_name', $id, $conn, 'category_id');
$category_name = isset($category_name_array[0][0]) ? trim($category_name_array[0][0]) : '';

$delete_from_db = $delete_book_data->deletefromdb('books_details', $conn,'book_category', $category_name,'category');
echo (!$delete_from_db) ?("Error: " . mysqli_error($conn)) : '';

$delete_from_db = $delete_book_data->deletefromdb('category_details', $conn, 'category_id', $id, 'category');
echo (!$delete_from_db) ? ("Error: " . mysqli_error($conn)) : '';


?>