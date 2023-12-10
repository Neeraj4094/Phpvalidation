<?php
$request = $_SERVER['REQUEST_URI'];
$router = str_replace('/phpprogramms/task7/user_details','',$request);
$path= isset(parse_url($router)['path']) ? parse_url($router)['path'] : '';
$id= isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';
if(!empty($id)){
    $update_path = "/update_users_data?".$id;
    $update_page_url = 'update_users_data.php';
    $delete_path = "/lock_user?" . $id;
    $delete_page_url = "lock_user.php";
}else{
    $update_path = '';
    $delete_path = '';
    $update_page_url = '';
    $delete_page_url = '';
}
include '../view/index.php';
?>