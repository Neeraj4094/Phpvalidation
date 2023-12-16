<?php
$request = $_SERVER['REQUEST_URI'];
$router = str_replace('/phpprogramms/task7/books_details', '', $request);
$path = isset(parse_url($router)['path']) ? parse_url($router)['path'] : '';
$id = isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';
// print_r($id);

if (isset($_GET['category_name'])) {
    $categoryName = urldecode($_GET['category_name']);
}
// echo $categoryName;

if (!empty($id)) {
    $category_path = '/add_books?category_name=' . $id;
    $category_url = "/add_books.php";
    $update_path = "/books_update_data?" . $id;
    $update_page_url = 'books_update_data.php';
    $delete_path = "/delete_books?" . $id;
    $delete_page_url = "delete_books.php";
    $book_path = '/add_books?' . $id;
    $book_page_url = 'add_books.php';
} else {
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
include '../view/index.php';
?>