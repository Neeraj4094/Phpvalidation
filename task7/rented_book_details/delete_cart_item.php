<?php

include './book_fetch_validation.php';
// require ("../admin_details/admin_login_validation.php");
$delete_cart_data = new delete_from_db();
$book_id = isset( $_GET['book_id'] ) ? intval( $_GET['book_id'] ) : '';
$cart_id = isset( $_GET['cart_id'] ) ?  $_GET['cart_id']  : '';
if(!empty($cart_id)){
    $delete_from_db = $delete_cart_data->deletefromdb('cart_details', $conn, 'book_id', $book_id, 'add_to_cart');
    if(!$delete_from_db){
        echo "Error: " . mysqli_error($conn);
    }
}else{
    $delete_from_db = $delete_cart_data->deletefromdb('cart_details', $conn, 'book_id', $book_id, 'buy_book?book_id=' . $book_id);
    if(!$delete_from_db){
        echo "Error: " . mysqli_error($conn);
    }
}

?>