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

// $request = $_SERVER['REQUEST_URI'];
// $path= isset(parse_url($router)['path']) ? parse_url($router)['path'] : '';
// $id= isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';
// if(!empty($id)){
//     $update_path = "/admin_update?".$id;
//     $delete_path = "/delete_admin_account?" . $id;
// }else{
//     $update_path = '';
//     $delete_path = '';
// }
// if(empty($category_path)){
//     $category_path = $category_page_url= "";
// }

// $routes = [
//     '/' => 'book_home.php',
//     '/user_login'=> '../user_details/user_login.php',
//     '/user_logout'=> '../user_details/user_logout.php',
//     '/add_to_cart'=> '../rented_book_details/add_to_cart.php',
//     $category_path => $category_page_url,
//     $return_path => $return_page_url,
// ];
// function error_msg(){
//     http_response_code(404);
//     require '../not_found.php';
// }

// echo "<pre>";
// print_r($router);
// print_r($routes);
// echo "</pre>";


// function router_control($router,$routes){
  
// if(array_key_exists($router, $routes)) {
//     require $routes[$router];
// }else{
//     error_msg();
// }
// }

// router_control($router,$routes)
include '../view/home_index.php';
?>