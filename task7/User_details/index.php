<?php
$request = $_SERVER['REQUEST_URI'];
$router = str_replace('/phpprogramms/task7/user_details', '', $request);
$path = isset(parse_url($router)['path']) ? parse_url($router)['path'] : '';
$id = isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';
// echo $id;
if (!empty($id)) {
    $update_path = "/update_users_data?" . $id;
    $update_page_url = 'update_users_data.php';
    $lock_user_path = "/lock_user?" . $id;
    $lock_user_url = "lock_user.php";
    $user_status_path = "/users?" . $id;
    $user_status_url = "user_dashboard.php";
    $user_logout_url = '/user_logout?' . $id;
    $user_logout_path = 'user_logout.php';
    // $delete_path = "/delete_user"
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
    $book_path = $reset_password_path = $reset_password_url = '';
}
// if(!empty($update_path)){
// }
// echo $update_page_url;
include '../view/home_index.php';
// include '../view/index.php';
?>