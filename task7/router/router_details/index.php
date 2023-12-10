<?php
$request = $_SERVER['REQUEST_URI'];
$router = str_replace('/phpprogramms/task7/router/router_details','',$request);
$path= isset(parse_url($router)['path']) ? parse_url($router)['path'] : '';
$id= isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';
if(!empty($id)){
    $update_path = "/admin_update?".$id;
    $delete_path = "/delete_admin_account?" . $id;
}else{
    $update_path = '';
    $delete_path = '';
}

$routes = [
    '/'=> './admin_details/admin_dashboard.php',
    '/phpprogramms/task7/router/admin_details/' => './admin_dashboard.php',
    '/phpprogramms/task7/router/admin_details/admin_dashboard/' => '../admin_details/admin_dashboard.php',
    '/admin_details/admin_registeration' => './admin_details/admin_registeration.php',
    // '/admin_update' => 'admin_details/admin_update_data.php',
    $update_path => '/admin_update_data.php',
    $delete_path => '/delete_admin_account.php',
    '/phpprogramms/task7/router/admin_login'=> '/admin_login.php',
    '/admin_logout'=> '/admin_logout.php',
    '/about'=> 'books_details/books_dashboard.php',
    '/categories'=> 'books_categories_details/category_dashboard.php',
    '/users'=> 'user_details/user_dashboard.php',
    '/user_orders'=> 'renting_books/rented_book_dashboard.php'
];
print_r(parse_url($path));
echo "<pre>";
print_r($routes);
print_r($request);
echo "</pre>";

if(array_key_exists($router, $routes)) {
    echo "Ok";
}else{
    echo "NO";
}
function error_msg(){
    http_response_code(404);
    require '../not_found.php';
}

function router_control($router,$routes){
  
if(array_key_exists($router, $routes)) {
    require $routes[$router];
}else{
    error_msg();
}
}

router_control($router,$routes);

// if($router == '/home' || $router == '/'){
//     include 'home.php';
// }elseif($router == '/about'){
//     include 'about.php';

// }else
// if($router == '/admin_update' || preg_match("/product\/[0-9]/i",$router)){
//     $arr = explode("/",$router);
//     if(isset($arr[2])){
//         $id = $arr[2];
//     }
//     include 'admin_details/admin_update_data.php';
// }
// }elseif($router == '/services' ){
//     include 'services.php';
// }else{
//     include 'not_found.php';
// }


// echo "<pre>";
// print_r($_SERVER);
// echo "<pre>";
?>