<?php
$request = $_SERVER['REQUEST_URI'];
// $path= isset(parse_url($router)['path']) ? parse_url($router)['path'] : '';
// $id= isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';


// echo $delete_cart_path;
// else{
//     $update_path = '';
//     $delete_path = '';
// }
if(empty($user_status_path)){
    $user_status_path = $user_status_url = '';
}

if(empty($update_page_url)){
    $update_page_url = $update_path = '';
}
if(empty($category_path)){
    $category_path = $category_page_url= "";
}
if(empty($user_order_page_url)){
    $user_order_page_url = $user_orders_path = '';
}
if(empty($lock_user_path)){
    $lock_user_path = $lock_user_url ='';
}
if(empty($delete_path)){
    $delete_path = $delete_page_url= '';
}
if(empty($book_return_path)){
    $book_return_path = $book_return_page_url = '';
}

$routes = [
    '/' => 'book_home.php',
    // 'user_details/'=> '../book_home.php',
    '/user_login'=> '../user_details/user_login.php',
    '/user_logout'=> '../user_details/user_logout.php',
    '/add_to_cart'=> '../rented_book_details/add_to_cart.php',
    '/users' => 'user_dashboard.php',
    '/user_review'=> 'user_reviews.php',
    '/add_users'=> 'add_users.php',
    $category_path => $category_page_url,
    $user_orders_path => $user_order_page_url,
    $book_return_path => $book_return_page_url,
    $update_path => $update_page_url,
    $lock_user_path => $lock_user_url,
    $delete_path => $delete_page_url,
    $user_status_path => $user_status_url,
];
function error_msg(){
    http_response_code(404);
    require '../not_found.php';
}

// echo "<pre>";
// print_r($router);
// print_r($routes);
// echo "</pre>";


function router_control($router,$routes){
  
if(array_key_exists($router, $routes)) {
    require $routes[$router];
}else{
    error_msg();
}
}

router_control($router,$routes)


?>