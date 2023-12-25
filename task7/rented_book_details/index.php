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
    $category_path = '/buy_book?'.$id;
    $category_page_url = "buy_book.php";
    $rented_book_path = "/rented_books?".$id;
    $rented_book_url = "rented_book.php";
    $thanks_path = "/thankspage?".$id;
    $thanks_page_url = "thankspage.php";
    $delete_cart_path = '/delete_cart?' . $id;
    $delete_cart_url = 'delete_cart.php';
    $user_rented_book_path = '/rented_book?'. $id;
    $user_rented_book_url = 'rented_book_dashboard.php';
    $pagination_url = '/rented_book_pagination?' . $id;
    $pagination_path = 'rented_book_pagination.php';
}else{
    $update_path = $delete_cart_path = $delete_cart_url = $delete_path = $update_page_url = $delete_page_url = $category_path = $category_page_url = $rented_book_url = $rented_book_path = $thanks_page_url = $thanks_path = $user_rented_book_path = $user_rented_book_url = '';
}

include '../view/index.php';
?>