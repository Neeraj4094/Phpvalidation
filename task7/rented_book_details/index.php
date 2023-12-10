<?php
$request = $_SERVER['REQUEST_URI'];
$router = str_replace('/phpprogramms/task7/rented_book_details','',$request);
$path= isset(parse_url($router)['path']) ? parse_url($router)['path'] : '';
$id= isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';
if(!empty($id)){
    $update_path = "/books_update_data?".$id;
    $update_page_url = 'books_update_data.php';
    $delete_path = "/delete_books?" . $id;
    $delete_page_url = "delete_books.php";
}else{
    $update_path = '';
    $delete_path = '';
    $update_page_url = '';
    $delete_page_url = '';
}
include '../view/index.php';
?>