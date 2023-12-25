<?php
$request = $_SERVER['REQUEST_URI'];
$router = str_replace('/phpprogramms/task7/forget_password', '', $request);
$path = isset(parse_url($router)['path']) ? parse_url($router)['path'] : '';
$id = isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';

if (!empty($id)) {
    
    $reset_password_path = "/new_password?" . $id;
    $reset_password_url = 'new_password.php';
} else {
    $reset_password_path = $reset_password_url = '';
}
include '../view/index.php';
?>