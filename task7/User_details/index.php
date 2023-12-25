<?php
$request = $_SERVER['REQUEST_URI'];
$router = str_replace('/phpprogramms/task7/user_details', '', $request);
$path = isset(parse_url($router)['path']) ? parse_url($router)['path'] : '';
$id = isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';

if (!empty($id)) {
    $update_path = "/update_users_data?" . $id;
    $update_page_url = 'update_users_data.php';
    $lock_user_path = "/lock_user?" . $id;
    $lock_user_url = "lock_user.php";
    $user_status_path = "/users?" . $id;
    $user_status_url = "user_dashboard.php";
    $user_logout_url = '/user_logout?' . $id;
    $user_logout_path = 'user_logout.php';
} else {
    $update_path = $update_page_url = $lock_user_path = $delete_page_url = $lock_user_url = $user_status_path = $user_status_url = $user_logout_url = $user_logout_path = '';
    
}
include '../view/home_index.php';

?>