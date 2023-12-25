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
    $admin_path = "/admin?" . $id;
    $admin_path_url = "admin_dashboard.php";
    $add_admin_url = "/admin_registeration?" . $id;
    $add_admin_path = "admin_registeration.php";
}else{
    $update_path = $delete_path = $update_page_url = $delete_page_url = $admin_path = $admin_path_url = '';
}
include '../view/index.php';
?>