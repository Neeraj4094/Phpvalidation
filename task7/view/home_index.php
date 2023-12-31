<?php
$request = $_SERVER['REQUEST_URI'];

if (empty($user_status_path)) {
    $user_status_path = $user_status_url = '';
}

if (empty($update_page_url)) {
    $update_page_url = $update_path = '';
}
if (empty($category_path)) {
    $category_path = $category_page_url = "";
}
if (empty($user_order_page_url)) {
    $user_order_page_url = $user_orders_path = '';
}
if (empty($lock_user_path)) {
    $lock_user_path = $lock_user_url = '';
}
if (empty($delete_path)) {
    $delete_path = $delete_page_url = '';
}
if (empty($book_return_path)) {
    $book_return_path = $book_return_page_url = '';
}
if(empty($user_logout_url)){
    $user_logout_url = $user_logout_path = '';
}

$routes = [
    '/' => 'book_home.php',
    '/user_login' => '../user_details/user_login.php',
    '/user_logout' => '../user_details/user_logout.php',
    '/add_to_cart' => '../rented_book_details/add_to_cart.php',
    '/users' => 'user_dashboard.php',
    '/user_review' => 'user_reviews.php',
    '/add_users' => 'add_users.php',
    '/delete_user' => 'delete_user.php',
    '/returned_books' => 'returned_books_dashboard.php',
    '/pending_books' => 'pending_books_dashboard.php',
    $category_path => $category_page_url,
    $user_orders_path => $user_order_page_url,
    $book_return_path => $book_return_page_url,
    $update_path => $update_page_url,
    $lock_user_path => $lock_user_url,
    $delete_path => $delete_page_url,
    $user_status_path => $user_status_url,
    $user_logout_url => $user_logout_path,
];
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