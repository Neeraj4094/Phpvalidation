<?php
include './book_fetch_validation.php';
// include '../admin_session.php';


if (empty($book_category) && empty($book_author)) {
    $book_category = '';
    $book_author = '';
}
$cart_data = [];
$cart_book_id = $cart_user_email = [];
$fetch_data_from_db = new fetch_data_from_db(); 
$fetch_cart_query = $fetch_data_from_db->fetchiddata('cart_details', $book_id, $conn, 'book_id');
$fetch_cart_data_from_db = mysqli_fetch_all($fetch_cart_query);
foreach($fetch_cart_data_from_db as $data){
    $cart_data = $data;
}

$show_login_data = '';
$login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';

$cart = $cart_msg = '';
if (empty($cart_msg)) {
    $cart_msg = 'Add to Cart';
}
if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["save_to_cart"]))) {
    // if  {
        $tablename = 'cart_details';

        $column_name = ['book_id', 'user_email'];
        $row_data = [$book_id, $login_email];
        if (!in_array($book_id, $cart_book_id) && !in_array($login_email, $cart_user_email)) {
            $admin_register_data = $send_data_to_db->insertindb('cart_details', $column_name, $row_data, $conn);
            // $cart_msg = '<a href="delete_cart.php?book_id=' . $book_id . '">Delete from Cart</a>';
            header("location: ./buy_book?book_id=" . $book_id);
        }elseif(in_array($book_id, $cart_book_id) && !in_array($login_email, $cart_user_email)){
            $admin_register_data = $send_data_to_db->insertindb('cart_details', $column_name, $row_data, $conn);
            // $cart_msg = '<a href="delete_cart.php?book_id=' . $book_id . '">Delete from Cart</a>';
            header("location: ./buy_book?book_id=" . $book_id);
        }else{
            $errmsg = "Sorry";
        }

    // }
}

foreach($fetch_rented_book_user_data as $data){
    $rented_book_id = isset( $data[7] ) ? $data[7] :'';
    $user_email_list = isset( $data[1] ) ? $data[1] :'';
    if($book_id == $rented_book_id && ($login_email == $user_email_list)){
        $errmsg = 'This book you have already purchsed';
    }

}

$cancel_login = '';


$fetch_id_query = $fetch_data_from_db->fetchiddata('user_details', $login_email, $conn, 'user_email');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);
$user_name = isset($fetch_id_data[0][1]) ? $fetch_id_data[0][1] : '';




$book_id = isset( $_GET['book_id'] ) ? intval( $_GET['book_id'] ) : '';
$fetch_id_query = $fetch_data_from_db->fetchiddata('books_details', $book_id, $conn, 'book_id');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);


foreach($fetch_id_data as $key => $value) {
    $book_id = isset($value[0]) ? ucwords($value[0]) : '';
    $book_name = isset($value[1]) ? ucwords($value[1]) : '';
    $book_author = isset($value[2]) ? $value[2] :'';
    $book_category = isset($value[3]) ? $value[3] :'';
    $book_copies = isset($value[4]) ? $value[4] :'';
    $book_price = isset($value[5]) ? $value[5] :'';
    $book_description = isset($value[6]) ? $value[6] :'';
    $book_image = isset($value[10]) ? $value[10] :'';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Raj">
    <meta name="description" content="This is Product page">
    <link rel="icon" href="/Image/Balloon.jpg" class=" rounded-full" type="image/jpg">
    <link rel="stylesheet" href="../../dist/output.css">
    <title>Document</title>
</head>

<body class=" w-full h-full text-slate-700">
<h2 class="w-full border text-center bg-green-50 text-slate-800 z-10 py-1 shadow">
                    <?php
                    echo $errmsg;
                    ?>
                </h2>
    <header><?php include '../home_page/home_header.php' ?></header>
    <main class="flex w-full gap-4 py-1">
        <div class="flex-1 w-full h-full bg-slate-50 py-10 relative">
            <div class="grid place-items-center ">
                <div class="w-60 h-80 border rounded-xl ">
                    <img src="../../Image/<?php echo $book_image ?>" alt="Book1"
                        class="w-full h-full object-cover rounded-xl">
                </div>
                <?php 
                 if (!in_array($book_id, $cart_data) && !in_array($login_email, $cart_data)) { ?>
                    <form action="buy_book?book_id=<?php echo $book_id ?>" method="post"
                        class="absolute right-2 top-2 ">
                        <button type="submit" name="save_to_cart"><svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12.89 5.88H5.11A3.12 3.12 0 002 8.99v11.36c0 1.45 1.04 2.07 2.31 1.36l3.93-2.19c.42-.23 1.1-.23 1.51 0l3.93 2.19c1.27.71 2.31.09 2.31-1.36V8.99a3.105 3.105 0 00-3.1-3.11z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M16 8.99v11.36c0 1.45-1.04 2.06-2.31 1.36l-3.93-2.19c-.42-.23-1.1-.23-1.52 0l-3.93 2.19c-1.27.7-2.31.09-2.31-1.36V8.99c0-1.71 1.4-3.11 3.11-3.11h7.78c1.71 0 3.11 1.4 3.11 3.11z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M22 5.11v11.36c0 1.45-1.04 2.06-2.31 1.36L16 15.77V8.99c0-1.71-1.4-3.11-3.11-3.11H8v-.77C8 3.4 9.4 2 11.11 2h7.78C20.6 2 22 3.4 22 5.11z">
                                </path>
                            </svg></button>
                    </form>
                <?php } else { 
                    if (in_array($book_id, $cart_data) && !in_array($login_email, $cart_data)) { ?>
                    <form action="buy_book?book_id=<?php echo $book_id ?>" method="post"
                        class="absolute right-2 top-2 ">
                        <button type="submit" name="save_to_cart"><svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12.89 5.88H5.11A3.12 3.12 0 002 8.99v11.36c0 1.45 1.04 2.07 2.31 1.36l3.93-2.19c.42-.23 1.1-.23 1.51 0l3.93 2.19c1.27.71 2.31.09 2.31-1.36V8.99a3.105 3.105 0 00-3.1-3.11z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M16 8.99v11.36c0 1.45-1.04 2.06-2.31 1.36l-3.93-2.19c-.42-.23-1.1-.23-1.52 0l-3.93 2.19c-1.27.7-2.31.09-2.31-1.36V8.99c0-1.71 1.4-3.11 3.11-3.11h7.78c1.71 0 3.11 1.4 3.11 3.11z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M22 5.11v11.36c0 1.45-1.04 2.06-2.31 1.36L16 15.77V8.99c0-1.71-1.4-3.11-3.11-3.11H8v-.77C8 3.4 9.4 2 11.11 2h7.78C20.6 2 22 3.4 22 5.11z">
                                </path>
                            </svg></button>
                    </form>
                    <?php }else{ 
                        if (!in_array($book_id, $cart_data) && in_array($login_email, $cart_data)) { ?>
                        <form action="buy_book.php?book_id=<?php echo $book_id ?>" method="post"
                        class="absolute right-2 top-2 ">
                        <button type="submit" name="save_to_cart"><svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12.89 5.88H5.11A3.12 3.12 0 002 8.99v11.36c0 1.45 1.04 2.07 2.31 1.36l3.93-2.19c.42-.23 1.1-.23 1.51 0l3.93 2.19c1.27.71 2.31.09 2.31-1.36V8.99a3.105 3.105 0 00-3.1-3.11z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M16 8.99v11.36c0 1.45-1.04 2.06-2.31 1.36l-3.93-2.19c-.42-.23-1.1-.23-1.52 0l-3.93 2.19c-1.27.7-2.31.09-2.31-1.36V8.99c0-1.71 1.4-3.11 3.11-3.11h7.78c1.71 0 3.11 1.4 3.11 3.11z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M22 5.11v11.36c0 1.45-1.04 2.06-2.31 1.36L16 15.77V8.99c0-1.71-1.4-3.11-3.11-3.11H8v-.77C8 3.4 9.4 2 11.11 2h7.78C20.6 2 22 3.4 22 5.11z">
                                </path>
                            </svg></button>
                    </form>
                        <?php }else{ ?>
                    <form action="delete_cart.php?book_id=<?php echo $book_id ?>" method="post"
                        class="absolute right-2 top-2 ">
                        <button type="submit" name="delete_from_cart">
                            <svg class="w-10 h-10 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" aria-hidden="true">
                                <path
                                    d="M12.89 5.879H5.11A3.12 3.12 0 002 8.989v11.36c0 1.45 1.04 2.07 2.31 1.36l3.93-2.19c.42-.23 1.1-.23 1.51 0l3.93 2.19c1.28.7 2.32.09 2.32-1.36V8.989c0-1.71-1.4-3.11-3.11-3.11z">
                                </path>
                                <path
                                    d="M22 5.11v11.36c0 1.45-1.04 2.06-2.31 1.36l-1.93-1.08a.509.509 0 01-.26-.44V8.99c0-2.54-2.07-4.61-4.61-4.61H8.82c-.37 0-.63-.39-.46-.71C8.88 2.68 9.92 2 11.11 2h7.78C20.6 2 22 3.4 22 5.11z">
                                </path>
                            </svg>
                        </button>

                    </form>
                <?php } } } ?>
            </div>
            
        </div>
        </div>

        <div class="w-full flex-1 py-10 px-6">
            <div class="px-4 space-y-1">
                <div class="flex justify-between  gap-6">
                    <h1 class="text-2xl font-semibold ">Book Name/ Title :- <span class=" underline">
                            <?php echo $book_name ?>
                        </span></h1>
                    <span class="font-bold text-black text-xl pt-1">
                        <?php echo "$" . $book_price ?>
                    </span>
                    <!-- <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post"
                        class="">
                        <button type="submit" name="save_to_cart" class=" border flex items-center justify-center bg-blue-600 p-2 hover:bg-blue-700 text-white rounded-lg"><?php echo $cart_msg ?></button>
                    </form> -->
                </div>


                <div class="flex gap-2">
                    <span>3.9</span>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 fill-yellow-300  text-slate-600" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-4 h-4 fill-yellow-300  text-slate-600" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-4 h-4 fill-yellow-300  text-slate-600" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-4 h-4 fill-yellow-300  text-slate-600" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="w-4 h-4  text-slate-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="py-1">
                    <div class=" gap-2">

                        <div class="flex gap-2 justify-between w-full">
                            <div class="flex ">
                                <p class="font-semibold">Category :- </p>
                                <span class="font-bold">
                                    <?php echo $book_category ?>
                                </span>
                            </div>

                        </div>
                        <div class="flex gap-2">
                            <p class="font-semibold">Author :- </p>
                            <span class="font-bold">
                                <?php echo $book_author ?>
                            </span>
                        </div>
                        <div class=" py-3 border-b">
                            <details class="text-xl">
                                <summary
                                    class="font-semibold cursor-pointer list-none text-2xl flex items-center justify-between pr-2 pb-2">
                                    <span>Description</span>
                                    <span>+</span>
                                </summary>
                                <ul class="list-disc px-4 list-inside text-base py-2 max-w-lg">
                                    <li>
                                        <?php echo $book_description ?>
                                    </li>
                                </ul>
                            </details>
                        </div>
                    </div>
                    <!-- <form class="flex flex-col space-y-6 py-6"> -->

                        <a href="rented_books?buy_book_id=<?php echo $book_id ?>"
                            class="py-3 border flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Buy
                            Now</a>
                    <!-- </form> -->
                </div>
            </div>
    </main>
</body>

</html>