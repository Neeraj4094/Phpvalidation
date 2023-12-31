<?php

include './book_fetch_validation.php';

$cart_data = [];
$delete_cart_data = new delete_from_db();
$book_id = isset($_GET['book_id']) ? intval($_GET['book_id']) : '';
$cart_id = isset($_GET['cart_id']) ? $_GET['cart_id'] : '';
$selected_cart = isset($_SESSION['selected_cart']) ? $_SESSION['selected_cart'] : '';
$selected_cart_array = explode(',', $selected_cart);

foreach ($selected_cart_array as $value) {
    if ($value != $cart_id) {
        $cart_data[] = $value;
    }
}
$cart_remained_id = implode(",", $cart_data);
$_SESSION['selected_cart'] = $cart_remained_id;

if (!empty($cart_id)) {
    $delete_from_cart_table = $delete_cart_data->deletefromdb('cart_details', $conn, 'book_id', $cart_id, 'rented_books');
    echo (!$delete_from_cart_table) ? ("Error: " . mysqli_error($conn)) : '';
} else {
    $delete_from_cart_table = $delete_cart_data->deletefromdb('cart_details', $conn, 'book_id', $book_id, 'buy_book?book_id=' . $book_id);
    echo (!$delete_from_cart_table) ? ("Error: " . mysqli_error($conn)) : '';
}

?>