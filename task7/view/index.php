<?php
$request = $_SERVER['REQUEST_URI'];
// $path= isset(parse_url($router)['path']) ? parse_url($router)['path'] : '';
// $id= isset(parse_url($router)['query']) ? parse_url($router)['query'] : '';
if(empty($category_path) || empty($rented_book_path) || empty($rented_book_url) || empty($category_page_url) || empty($thanks_path) || empty($thanks_page_url)) {
    $rented_book_path = "";
    $rented_book_url = "";
    $category_path = "";
    $category_page_url = "";
    $thanks_path = '';
    $thanks_page_url = '';
    $book_path = '';
    $book_page_url = '';
}
if(empty($book_page_url)){
    $book_page_url = '';
    $book_path = '';
}
// else{
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
    $category_path => $category_page_url,
    $rented_book_path => $rented_book_url,
    $thanks_path => $thanks_page_url,
    $book_path => $book_page_url,
    '/admin_registeration' => 'admin_registeration.php',
    '/books'=> 'books_dashboard.php',
    '/add_books'=> 'add_books.php',
    '/category'=> 'category_dashboard.php',
    '/users' => 'user_dashboard.php',
    '/user_login' => 'user_login.php',
    '/add_categories'=> 'add_categories.php',
    '/add_users'=> 'add_users.php',
    '/rented_book' => 'rented_book_dashboard.php',
    '/home_page' => 'book_home.php',
    '/add_to_cart'=> 'add_to_cart.php',
    '/buy_book' => 'buy_book.php',
    '/rented_books'=> 'rented_book.php',
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