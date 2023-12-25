<?php
$request = $_SERVER['REQUEST_URI'];
$router = str_replace('/phpprogramms/task7/categories_details', '', $request);
$path = isset(parse_url($router)['path']) ? parse_url($router)['path'] : '';
$id = isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';

if (!empty($id)) {
    $update_path = "/update_categories_data?" . $id;
    $update_page_url = 'update_categories_data.php';
    $delete_path = "/delete_categories?" . $id;
    $delete_page_url = "delete_categories.php";
    $category_path = '/fetch_categories_books?' . $id;
    $category_page_url = 'fetch_categories_books.php';
} else {
    $update_path = $delete_path = $update_page_url = $delete_page_url = $category_path = $category_page_url = '';
}

include '../view/index.php';
?>