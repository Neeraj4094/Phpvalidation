<?php
include '../database_connection.php';
include '../send_fetch_data_from_db.php';

if(empty($id)){
$book_renting_amount = $book_price = 0;
$book_name = $book_author = $book_category = $book_issue_date = $book_returned_date = $user_address = $user_city = $user_state = '';
}
$buy_book_id = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : '';
$fetch_data_from_db = new fetch_data_from_db();
$fetch_buy_book_id_query = $fetch_data_from_db->fetchiddata('books_details', $buy_book_id, $conn, 'book_id');
$fetch_buy_book_id_data = mysqli_fetch_all($fetch_buy_book_id_query);

$fetch_rented_book_id_query = $fetch_data_from_db->fetchiddata('rented_book_details', $buy_book_id, $conn, 'book_id');
$fetch_rented_book_id_data = mysqli_fetch_all($fetch_rented_book_id_query);

foreach($fetch_buy_book_id_data as $key => $value) {
    // $book_id = isset($value[0]) ? ucwords($value[0]) : '';
    $book_name = isset($value[1]) ? ucwords($value[1]) : '';
    $book_author = isset($value[2]) ? $value[2] :'';
    $book_category = isset($value[3]) ? $value[3] :'';
    $book_price = isset($value[5]) ? $value[5] :'';
    // $book_description = isset($value[6]) ? $value[6] :'';
    $book_image = isset($value[10]) ? $value[10] :'';
}

foreach($fetch_rented_book_id_data as $value){
    $user_address =  isset($value[3]) ? $value[3] : '';
    $user_state =  isset($value[4]) ? $value[4] : '';
    $user_city =  isset($value[5]) ? $value[5] : '';
    $book_issue_date =  isset($value[8]) ? $value[8] : '';
    $book_returned_date =  isset($value[9]) ? $value[9] : '';
    $book_renting_amount = isset($value[10]) ? $value[10] : '';
}
$actual_book_renting_charges = ($book_renting_amount - 10);

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

<body>
    <section class="h-full w-full bg-slate-50 py-8">
        <div class="px-4 flex gap-2 ">
            <div class="px-2 w-full flex-1">
                <img src="https://tailwindui.com/img/ecommerce-images/confirmation-page-06-hero.jpg" alt="TODO" class="w-full h-full object-cover">
            </div>
            <div class="px-4 flex-1 space-y-4 ">
                <div class="py-2 space-y-2">
                    <p class="text-blue-600">Payment successful</p>
                    <h2 class="text-5xl font-bold ">Thanks for ordering</h2>
                    <p class="text-lg">We appreciate your order, we're currently processing it. So hang tight and we'll
                        send you confirmation very soon!</p>
                </div>
                <div class="py-2">
                    <p>Tracking number</p>
                    <a href="" class="text-blue-600">51547878755545848512</a>
                </div>
                <div class="py-4">
                    <article class="flex w-full border-b py-2">
                        <div class=" w-32 h-40 p-2">
                            <img src="../../Image/<?php echo $book_image ?>" alt="" class=" w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="px-4 flex flex-col w-full">
                            <div class="flex-1">
                                <div class=" flex justify-between items-center">
                                    <h3 class="font-semibold text-xl"><?php echo $book_name ?></h3>
                                    <div class="pr-1">
                                        <span><?php echo "$" . $book_price ?></span>
                                    </div>
                                </div>
                                <p class=" text-slate-600 font-semibold"><?php echo $book_author ?></p>
                                <p class=" text-slate-500"><?php echo $book_category ?></p>
                                
                            </div>

                        </div>
                    </article>
                    
                </div>
                <div class=" border-b">
                    <div class="flex justify-between px-4  py-2">
                        <p class="text-slate-400">Book Rented Charges</p>
                        <span><?php echo $actual_book_renting_charges ?></span>
                    </div>
                    <div class="flex justify-between px-4 py-3">
                        <p class="text-slate-400">Shipping</p>
                        <span>$10.00</span>
                    </div>
                    
                </div>
                <div class="flex justify-between px-4  py-2 border-b">
                    <p class="text-slate-800 font-semibold text-xl">Total</p>
                    <span><?php echo $book_renting_amount ?></span>
                </div>
                <div class="flex justify-between px-3">
                    <p class="text-slate-800 font-semibold text-xl bg-slate-100 rounded-lg px-2">Book Issue date</p>
                    <span><?php echo $book_issue_date ?></span>
                </div>
                <div class="flex justify-between px-3">
                    <p class="text-slate-800 font-semibold text-xl bg-slate-100 rounded-lg px-2">Book Returned date</p>
                    <span><?php echo $book_returned_date ?></span>
                </div>
                <div class="py-6 px-4 flex justify-between border-b">
                    <div class="px-2">
                        <h2 class="font-semibold">Shipping Address</h2>
                        <address>
                            <p><?php echo $user_address ?></p>
                            <p><?php echo $user_city . "," . $user_state ?></p>
                            
                        </address>
                    </div>
                    <div class="px-2">
                        <h2 class="font-semibold">Payment Information</h2>
                        <div class="flex items-center">
                            <p class="px-3 h-10 rounded-lg bg-blue-800 text-white  flex items-center justify-center">VISA</p>
                            <address>
                                <div class="px-1">
                                    <p>7363 Cynthia Pass</p>
                                    <p>Toronto, ON N3Y 4H8</p>
                                </div>
                            </address>
                        </div>
                    </div>
                </div>
                <div class="relative py-10 flex items-center justify-center h-10">
                <div class="absolute right-0 bottom-0 flex gap-2 items-center text-blue-800 py-12">
                    <a href="/Products.html">Continue Shopping</a>
                    <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. --><path d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z"></path></svg>
                </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>