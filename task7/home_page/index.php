<?php
$request = $_SERVER['REQUEST_URI'];
$router = str_replace('/phpprogramms/task7/home_page','',$request);
$path= isset(parse_url($router)['path']) ? parse_url($router)['path'] : '';
$id= isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';

if(!empty($id)){
    $update_path = "/update_users_data?".$id;
    $update_page_url = 'update_users_data.php';
    $delete_path = "/lock_user?" . $id;
    $delete_page_url = "lock_user.php";
    $category_path = '/fetch_categories_books?'.$id;
    $category_page_url = '../fetch_categories_books.php';
}else{
    $update_path = '';
    $delete_path = '';
    $update_page_url = '';
    $delete_page_url = '';
    $category_path = '';
    $category_page_url = '';
    $return_path = $return_page_url = '';
}
include '../view/home_index.php';
?>