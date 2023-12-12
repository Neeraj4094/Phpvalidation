<?php
$request = $_SERVER['REQUEST_URI'];
$router = str_replace('/phpprogramms/task7/admin_details','',$request);
$path= isset(parse_url($router)['path']) ? parse_url($router)['path'] : '';
$id= isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';
if(!empty($id)){
    $update_path = "/admin_update_data?".$id;
    $update_page_url = 'admin_update_data.php';
    $delete_path = "/delete_admin_account?" . $id;
    $delete_page_url = "delete_admin_account.php";
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
include '../view/index.php';
?>