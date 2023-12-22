<?php
include './book_fetch_validation.php';
// include '../admin_session.php';

if (empty($book_category) && empty($book_author)) {
    $book_category = '';
    $book_author = $err_msg = '';
}
$cart_data = $cart_status= [];
$cart_book_id = $cart_user_email = [];
$fetch_data_from_db = new fetch_db_data();
$fetch_cart_query = $fetch_data_from_db->fetchiddata('cart_details', $book_id, $conn, 'book_id');
$fetch_cart_data_from_db = mysqli_fetch_all($fetch_cart_query);
foreach ($fetch_cart_data_from_db as $data) {
    $cart_data = $data;
}
$db_cart_data = $fetch_data_from_db->fetchdatafromdb($conn, 'cart_details');

$book_id = isset($_GET['book_id']) ? intval($_GET['book_id']) : '';

$show_login_data = '';

$cart = $cart_msg = '';
if (empty($cart_msg)) {
    $cart_msg = 'Add to Cart';
}


$fetch_order_data = $fetch_data_from_db->fetch_user_order_data('rented_book_details', $book_id, $user_id, $conn);


// echo "<pre>";
// print_r($fetch_order_data);
// echo "</pre>";
if(empty($fetch_user_id_data)){
    $cart_status[] = "Not Exist";
}else{
    if(!in_array($book_id, $book_id_list) && !in_array($user_id, $user_id_list)) {
        $cart_status[] = "Not Exist";
    }
    elseif(!in_array($book_id, $book_id_list) && in_array($user_id, $user_id_list)) {
        $cart_status[] = "Not Exist";
    }
    elseif(in_array($book_id, $book_id_list) && in_array($user_id, $user_id_list) && (empty($fetch_order_data))) {
        $cart_status[] = "Not Exist";
    }
    else{
        $cart_status[] = "Exist";
    }
}
// }
$compare_status = "Exist";
if(!in_array($compare_status,$cart_status)){
    $check_cart_status = true;
}else{
    $check_cart_status = false;
}

// print_r($order_book_id_list);

if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["save_to_cart"]))) {
    // if  {
    $tablename = 'cart_details';

    $column_name = ['book_id', 'user_id'];
    $row_data = [$book_id, $user_id];
    
        if ($check_cart_status) {
            if(empty($fetch_rented_book_user_data)){
                $admin_register_data = $send_data_to_db->insertindb('cart_details', $column_name, $row_data, $conn);
                header("location: ./buy_book?book_id=" . $book_id);
            }elseif(!in_array($book_id,$order_book_id_list) || (empty($fetch_order_data))){
                $admin_register_data = $send_data_to_db->insertindb('cart_details', $column_name, $row_data, $conn);
                header("location: ./buy_book?book_id=" . $book_id);
            }else{
                $err_msg = "You have already purchase this book";
            }
            
        }else{
            $err_msg = "You have already purchase this book";
            
            header("location: delete_cart?book_id=" . $book_id);
        }
        //  elseif (in_array($book_id, $book_id_list) && !in_array($user_id, $user_id_list)) {
        //     if(empty($fetch_rented_book_user_data)){
                
        //         $admin_register_data = $send_data_to_db->insertindb('cart_details', $column_name, $row_data, $conn);
        //         header("location: ./buy_book?book_id=" . $book_id);
        //     }else{
        //         $err_msg = "You have already purchase this book";
        //     }
        // } else {
        //     $err_msg = "Sorry";
        // }
    
}

foreach ($fetch_rented_book_user_data as $data) {
    $rented_book_id = isset($data[7]) ? $data[7] : '';
    $rented_book_id_list[] = $rented_book_id;
    $user_email = isset($data[1]) ? $data[1] : '';
    $user_email_list[] = $user_email;
    // if ($book_id == $rented_book_id && ($login_email == $user_email)) {
    //     $errmsg = 'You have already purchse this book';
    // }

}

// $cancel_login = '';

$fetch_id_query = $fetch_data_from_db->fetchiddata('user_details', $login_email, $conn, 'user_email');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);
$user_name = isset($fetch_id_data[0][1]) ? $fetch_id_data[0][1] : '';

$book_id = isset($_GET['book_id']) ? intval($_GET['book_id']) : '';
$fetch_id_query = $fetch_data_from_db->fetchiddata('books_details', $book_id, $conn, 'book_id');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);


foreach ($fetch_id_data as $key => $value) {
    $book_id = isset($value[0]) ? ucwords($value[0]) : '';
    $book_name = isset($value[1]) ? ucwords($value[1]) : '';
    $book_author = isset($value[2]) ? $value[2] : '';
    $book_category = isset($value[3]) ? $value[3] : '';
    $book_copies = isset($value[4]) ? $value[4] : '';
    $book_price = isset($value[5]) ? $value[5] : '';
    $book_description = isset($value[6]) ? $value[6] : '';
    $book_image = isset($value[10]) ? $value[10] : '';
    $book_charges = $book_price/100 * 1;
    
}

// foreach($fetch_user_id_data as $data){
//     $book_id = isset($data[1]) ? $data[1] : '';
//     if(in_array($book_id,$order_book_id_list)){
//         header('location: delete_cart.php?book_id=' . $book_id);
//     }
// }
// echo "<pre>";
// print_r($fetch_user_id_data);
// print_r($order_book_id_list);
// echo "</pre>";
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
    <h2 class="w-full border text-center bg-green-50 text-slate-800 z-10 shadow">
        <?php
            echo $err_msg;
        ?>
    </h2>
    <header>
        <?php include '../home_page/home_header.php' ?>
    </header>
    <main class="flex w-full gap-4 py-1">
        <div class="flex-1 w-full h-full bg-slate-50 py-10 relative">
            <div class="grid place-items-center ">
                <div class="w-60 h-80 border rounded-xl ">
                    <img src="../../Image/<?php echo $book_image ?>" alt="Book1"
                        class="w-full h-full object-cover rounded-xl">
                </div>
                <?php
                if(empty($db_cart_data)){ ?>
                    <form action="buy_book?book_id=<?php echo $book_id ?>" method="post" class="absolute right-2 top-2 ">
                    <button type="submit" name="save_to_cart">
                        <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none"><path d="M2.99707 3.49609C2.99707 3.21995 3.22093 2.99609 3.49707 2.99609H3.93543C4.66237 2.99609 5.07976 3.46917 5.32152 3.94075C5.4872 4.2639 5.6065 4.65813 5.70508 4.99951H15.9999C16.6634 4.99951 17.1429 5.63392 16.9619 6.27229L15.4664 11.5468C15.2225 12.4073 14.4368 13.0012 13.5423 13.0012H8.46306C7.56125 13.0012 6.77099 12.3977 6.5336 11.5277L5.89118 9.17338C5.88723 9.16268 5.88361 9.15177 5.88034 9.14067L4.851 5.6429C4.81568 5.52686 4.78318 5.41439 4.7518 5.3058C4.65195 4.96027 4.56346 4.65406 4.43165 4.39696C4.2723 4.08613 4.12597 3.99609 3.93543 3.99609H3.49707C3.22093 3.99609 2.99707 3.77224 2.99707 3.49609ZM6.84471 8.86872L7.49833 11.2645C7.61702 11.6995 8.01215 12.0012 8.46306 12.0012H13.5423C13.9895 12.0012 14.3824 11.7043 14.5044 11.274L15.9999 5.99951H6.00063L6.84471 8.86872ZM10 15.4995C10 16.3279 9.32843 16.9995 8.5 16.9995C7.67157 16.9995 7 16.3279 7 15.4995C7 14.6711 7.67157 13.9995 8.5 13.9995C9.32843 13.9995 10 14.6711 10 15.4995ZM9 15.4995C9 15.2234 8.77614 14.9995 8.5 14.9995C8.22386 14.9995 8 15.2234 8 15.4995C8 15.7757 8.22386 15.9995 8.5 15.9995C8.77614 15.9995 9 15.7757 9 15.4995ZM15 15.4995C15 16.3279 14.3284 16.9995 13.5 16.9995C12.6716 16.9995 12 16.3279 12 15.4995C12 14.6711 12.6716 13.9995 13.5 13.9995C14.3284 13.9995 15 14.6711 15 15.4995ZM14 15.4995C14 15.2234 13.7761 14.9995 13.5 14.9995C13.2239 14.9995 13 15.2234 13 15.4995C13 15.7757 13.2239 15.9995 13.5 15.9995C13.7761 15.9995 14 15.7757 14 15.4995Z" fill="currentColor"></path></svg>
                    </button>
                        </form>
                <?php }
                foreach($db_cart_data as $cart_data){
                    $book_id_in_cart = isset( $cart_data[1] ) ? $cart_data[1] :'';
                    $user_email_in_cart = isset( $cart_data[2] ) ? $cart_data[2] :'';
                    if (($book_id == $book_id_in_cart) && ($user_id == $user_email_in_cart)) {
                    ?>
                        <form action="delete_cart.php?book_id=<?php echo $book_id ?>" method="post"
                                    class="absolute right-2 top-2 ">
                            <button type="submit" name="delete_from_cart">
                                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.61132 13C9.24662 13 8.91085 13.1985 8.7351 13.5181C8.36855 14.1845 8.85071 15 9.61131 15H18.92C19.4723 15 19.92 15.4477 19.92 16C19.92 16.5523 19.4723 17 18.92 17H17.93H7.92999H7.92004C6.40004 17 5.44004 15.37 6.17004 14.03L7.02318 12.488C7.33509 11.9243 7.35632 11.2448 7.08022 10.6627L4.25211 4.70011C4.04931 4.27254 3.6184 4 3.14518 4H2.92004C2.36776 4 1.92004 3.55228 1.92004 3C1.92004 2.44772 2.36776 2 2.92004 2H3.92398C4.69708 2 5.40095 2.44557 5.7317 3.14435L5.90228 3.50471C5.93443 3.5016 5.96703 3.5 6 3.5H21C21.5523 3.5 22 3.94772 22 4.5C22 4.77321 21.8904 5.02082 21.7129 5.20131C21.7448 5.41025 21.7106 5.63097 21.6008 5.83041L18.22 11.97C17.88 12.59 17.22 13 16.47 13H9.61132ZM7.92999 17C9.03456 17 9.92999 17.8954 9.92999 19C9.92999 20.1046 9.03456 21 7.92999 21C6.82542 21 5.92999 20.1046 5.92999 19C5.92999 17.8954 6.82542 17 7.92999 17ZM17.93 17C16.8254 17 15.93 17.8954 15.93 19C15.93 20.1046 16.8254 21 17.93 21C19.0346 21 19.93 20.1046 19.93 19C19.93 17.8954 19.0346 17 17.93 17Z" fill="currentColor"></path><path d="M7.92999 20C8.48228 20 8.92999 19.5523 8.92999 19C8.92999 18.4477 8.48228 18 7.92999 18C7.37771 18 6.92999 18.4477 6.92999 19C6.92999 19.5523 7.37771 20 7.92999 20Z" fill="currentColor"></path><path d="M18.93 19C18.93 19.5523 18.4823 20 17.93 20C17.3777 20 16.93 19.5523 16.93 19C16.93 18.4477 17.3777 18 17.93 18C18.4823 18 18.93 18.4477 18.93 19Z" fill="currentColor"></path><path d="M15.99 6.79166L15.4025 6.2L12.6567 8.94583L11.5817 7.875L10.99 8.4625L12.6567 10.125L15.99 6.79166Z" fill="white"></path></svg>
                            </button>

                        </form>
                    
                
                    <?php } else {
                        
                        // if (inarra($book_id, $rented_book_id_list) && ($login_email == $user_email)) {
                        ?>
                        <form action="buy_book?book_id=<?php echo $book_id ?>" method="post" class="absolute right-2 top-2 ">
                        <button type="submit" name="save_to_cart">
                            <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none"><path d="M2.99707 3.49609C2.99707 3.21995 3.22093 2.99609 3.49707 2.99609H3.93543C4.66237 2.99609 5.07976 3.46917 5.32152 3.94075C5.4872 4.2639 5.6065 4.65813 5.70508 4.99951H15.9999C16.6634 4.99951 17.1429 5.63392 16.9619 6.27229L15.4664 11.5468C15.2225 12.4073 14.4368 13.0012 13.5423 13.0012H8.46306C7.56125 13.0012 6.77099 12.3977 6.5336 11.5277L5.89118 9.17338C5.88723 9.16268 5.88361 9.15177 5.88034 9.14067L4.851 5.6429C4.81568 5.52686 4.78318 5.41439 4.7518 5.3058C4.65195 4.96027 4.56346 4.65406 4.43165 4.39696C4.2723 4.08613 4.12597 3.99609 3.93543 3.99609H3.49707C3.22093 3.99609 2.99707 3.77224 2.99707 3.49609ZM6.84471 8.86872L7.49833 11.2645C7.61702 11.6995 8.01215 12.0012 8.46306 12.0012H13.5423C13.9895 12.0012 14.3824 11.7043 14.5044 11.274L15.9999 5.99951H6.00063L6.84471 8.86872ZM10 15.4995C10 16.3279 9.32843 16.9995 8.5 16.9995C7.67157 16.9995 7 16.3279 7 15.4995C7 14.6711 7.67157 13.9995 8.5 13.9995C9.32843 13.9995 10 14.6711 10 15.4995ZM9 15.4995C9 15.2234 8.77614 14.9995 8.5 14.9995C8.22386 14.9995 8 15.2234 8 15.4995C8 15.7757 8.22386 15.9995 8.5 15.9995C8.77614 15.9995 9 15.7757 9 15.4995ZM15 15.4995C15 16.3279 14.3284 16.9995 13.5 16.9995C12.6716 16.9995 12 16.3279 12 15.4995C12 14.6711 12.6716 13.9995 13.5 13.9995C14.3284 13.9995 15 14.6711 15 15.4995ZM14 15.4995C14 15.2234 13.7761 14.9995 13.5 14.9995C13.2239 14.9995 13 15.2234 13 15.4995C13 15.7757 13.2239 15.9995 13.5 15.9995C13.7761 15.9995 14 15.7757 14 15.4995Z" fill="currentColor"></path></svg>
                        </button>
                        </form>
                    <?php }
                    }
                    // }
                ?>
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
                        <div class="flex items-center gap-2">
                            <p class="font-semibold">Charges :- </p>
                            <span class="font-bold">
                                <?php echo $book_charges . "/Per day" ?>
                            </span>
                            <small class="font-semibold">(You have to take book on rent atleast for 1 days)</small>
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

                    <a href="rented_books?buy_book_id=<?php echo $book_id ?>"
                        class="py-3 border flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Buy
                        Now</a>
                </div>
            </div>
    </main>
</body>

</html>