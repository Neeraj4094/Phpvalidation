<?php
$request = $_SERVER['REQUEST_URI'];
$router = str_replace('/phpprogramms/task7/categories_details','',$request);
$path= isset(parse_url($router)['path']) ? parse_url($router)['path'] : '';
$id= isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';

if(!empty($id)){
    // $category_path = '/add_books?' . $id;
    // $category_page_url = '/add_books.php';
    $update_path = "/update_categories_data?".$id;
    $update_page_url = 'update_categories_data.php';
    $delete_path = "/delete_categories?" . $id;
    $delete_page_url = "delete_categories.php";
}else{
    $update_path = '';
    $delete_path = '';
    $update_page_url = '';
    $delete_page_url = '';
    $category_path = '';
    $category_page_url = '';
    $rented_book_url = '';
    $rented_book_path = '';
    $thanks_page_url = '';
    $thanks_path = '';
    $book_page_url = '';
    $book_path = '';
}
// print_r($category_path);
include '../view/index.php';
?>