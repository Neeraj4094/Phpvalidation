<?php
$request = $_SERVER['REQUEST_URI'];

if (empty($rented_book_path) || empty($rented_book_url)) {

    $rented_book_url = $rented_book_path = '';

}
if (empty($thanks_path) || empty($thanks_page_url)) {
    $thanks_page_url = $thanks_path = '';
}
if (empty($delete_cart_url)) {
    $delete_cart_url = $delete_cart_path = '';
}

if (empty($delete_path)) {
    $delete_path = $delete_page_url = '';
}
if (empty($reset_password_path) || empty($reset_password_url)) {
    // $book_page_url = '';
    // $book_path = '';
}
if (empty($category_path)) {
    $category_path = $category_page_url = '';
}
if (empty($book_path)) {
    $book_page_url = '';
    $book_path = '';
}
if (empty($category_page_url)) {
    $category_page_url = '';
}
if (empty($update_path)) {
    $update_page_url = $update_path = '';
}
if (empty($reset_password_path)) {
    $reset_password_path = $reset_password_url = '';

}

// echo $delete_cart_path;
// else{
//     $update_path = '';
//     $delete_path = '';
// }

$routes = [
    '/' => '../admin_details/admin_dashboard.php',
    '/admin' => 'admin_dashboard.php',
    '/admin_login' => '../admin_details/admin_login.php',
    '/admin_logout' => 'admin_logout.php',
    '/services' => 'services.php',
    $update_path => $update_page_url,
    $delete_path => $delete_page_url,
    $category_path => $category_page_url,
    $rented_book_path => $rented_book_url,
    $thanks_path => $thanks_page_url,
    $book_path => $book_page_url,
    $delete_cart_path => $delete_cart_url,
    $reset_password_path => $reset_password_url,
    '/admin_registeration' => 'admin_registeration.php',
    '/books' => 'books_dashboard.php',
    '/add_books' => 'add_books.php',
    '/book_store' => 'book_store.php',
    '/category' => 'category_dashboard.php',
    // '/users' => 'user_dashboard.php',
    '/user_login' => 'user_login.php',
    '/add_categories' => 'add_categories.php',
    '/book_categories' => 'books_categories.php',
    '/not_found' => '../not_found.php',
    '/rented_book' => 'rented_book_dashboard.php',
    '/home_page' => 'book_home.php',
    '/add_to_cart' => 'add_to_cart.php',
    '/buy_book' => 'buy_book.php',
    '/rented_books' => 'rented_book.php',
    '/new_password' => 'new_password.php',
    '/recover_email' => 'recover_email.php',
];
// echo "<pre>";
// print_r($routes);
// print_r($router);
// echo "</pre>";
function error_msg()
{
    http_response_code(404);
    require '../not_found.php';
}

function router_control($router, $routes)
{

    if (array_key_exists($router, $routes)) {
        require $routes[$router];
    } else {
        error_msg();
    }
}

router_control($router, $routes)

    ?>