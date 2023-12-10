<?php
$request = $_SERVER['REQUEST_URI'];
// $path= isset(parse_url($router)['path']) ? parse_url($router)['path'] : '';
// $id= isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';
// if(!empty($id)){
//     $update_path = "/admin_update?".$id;
//     $delete_path = "/delete_admin_account?" . $id;
// }else{
//     $update_path = '';
//     $delete_path = '';
// }

$routes = [
    '/'=> 'admin_dashboard.php',
    '/admin' => 'admin_dashboard.php',
    '/admin_login'=> 'admin_login.php',
    '/admin_logout'=> 'admin_logout.php',
    '/services'=> 'services.php',
    $update_path => $update_page_url,
    $delete_path => $delete_page_url,
    // $category_path => $category_url,
    '/admin_registeration' => 'admin_registeration.php',
    '/books'=> 'books_dashboard.php',
    '/add_books'=> 'add_books.php',
    '/category'=> 'category_dashboard.php',
    '/users' => 'user_dashboard.php',
    '/add_categories'=> 'add_categories.php',
    '/add_users'=> 'add_users.php',
    '/rented_book' => 'rented_book_dashboard.php',
    '/home_page' => 'book_home.php',
];
// echo "<pre>";
// print_r($routes);
// print_r($router);
// echo "</pre>";
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

router_control($router,$routes)

?>