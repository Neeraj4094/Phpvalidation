<?php
$request = $_SERVER['REQUEST_URI'];
$router = str_replace('/phpprogramms/task7/book_return_details','',$request);
$path= isset(parse_url($router)['path']) ? parse_url($router)['path'] : '';
$id= isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';
// print_r($id);

// echo $categoryName;

if(!empty($id)){
    $return_path = '/return_home_page?' . $id;
    $return_page_url = "return_home_page.php";
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
include '../view/home_index.php';
?>