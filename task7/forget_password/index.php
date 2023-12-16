<?php
$request = $_SERVER['REQUEST_URI'];
$router = str_replace('/phpprogramms/task7/forget_password', '', $request);
$path = isset(parse_url($router)['path']) ? parse_url($router)['path'] : '';
$id = isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';
// echo $id;
if (!empty($id)) {
    // $category_path = '/add_books?' . $id;
    // $category_page_url = '/add_books.php';
    $reset_password_path = "/new_password?" . $id;
    $reset_password_url = 'new_password.php';
} else {
    $update_path = $delete_path = $update_page_url = $delete_page_url = $category_path = $category_page_url = $rented_book_url = '';
    $rented_book_path = $thanks_page_url = $thanks_path = $book_page_url = $book_path = $reset_password_path = $reset_password_url = '';
}
// print_r($reset_password_path);
include '../view/index.php';
?>