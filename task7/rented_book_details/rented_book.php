<?php
include './book_fetch_validation.php';


if ($_SESSION['login'] == null) {
    header("location: ../user_details/user_login");
}else{
    $page = "Details";
}

if($book_copies != 0){
    $book_quantity = 1;
}else{
    $errmsg = "Out of Stock";
}


$cart_item = isset($cart_book_id_data[0]) ? $cart_book_id_data[0] :'';
if(empty($cart_item)){
    header("location: add_to_cart");
}

$low_charges= $mid_charges = $normal_charges = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Raj">
    <meta name="description" content="This is Product page">
    <link rel="icon" href="../../Image/Balloon.jpg" class=" rounded-full" type="image/jpg">
    <link rel="stylesheet" href="../../dist/output.css">
    <title>Document</title>
</head>
<body class=" bg-slate-100">
    <h2 class="w-full border text-center bg-green-50 text-slate-800 fixed top-0 shadow">
        <?php
        echo $errmsg;

        ?>
    </h2>
    
        <form method="post"  action="./rented_books?<?php echo $product_name . "=" . $item_id ?>" class="flex gap-4 h-full w-full p-4">
            <div class="p-2 flex-1 space-y-2 ">
                <h2 class="font-semibold text-xl px-2">Contact Information</h2>
                <div class=" px-4 bg-white shadow border rounded-lg">
                    
                    <div class="py-6 border-b space-y-2 pb-4">
                        <h2 class="font-semibold text-xl">Shipping Address</h2>
                        <div class="flex items-center gap-4">
                            <div class="grid space-y-1 w-full">
                                <label for="email" class="py-1">Email Address</label>
                                <input type="email" name="email" id="email" placeholder="Email address" class="border rounded-lg p-2" selected value="<?php echo $login_email ?>">
                                <span class="text-red-600 text-sm max-w-xs w-64">* <small><?php echo $err_email ?></small></span>
                            </div>
                            <div class="grid w-full gap-2 pt-2">
                                <label for="address" class="">Residential Address</label>
                                <input type="text" name="address" id="address" placeholder="Your Address" class="border rounded-lg p-2" value="<?php echo $address ?>">
                                <span class="text-red-600 text-sm max-w-xs w-64">* <small><?php echo $err_address ?></small></span>
                            </div>
                            
                        </div>
                        <div class="flex w-full gap-4 items-center justify-between">
                            <div class="w-full">
                                <div class="grid space-y-2">
                                    <label for="state" class="py-1">State</label>
                                    <input type="text" name="state" id="state" placeholder="Your state" class="border rounded-lg p-2" value="<?php echo $user_state ?>">
                                </div>
                                <span class="text-red-600 text-sm">* <small><?php echo $err_state ?></small></span>
                            </div>
                            <div class="w-full">
                                <div class="grid space-y-2">
                                    <label for="city" class="py-1">City</label>
                                    <input type="text" name="city" id="city" placeholder="Your City" class="border rounded-lg p-2" value="<?php echo $user_city ?>">
                                </div>
                                <span class="text-red-600 text-sm">* <small><?php echo $err_city ?></small></span>
                            </div>
                            <div class="w-full">
                                <div class="grid space-y-1 pt-1">
                                    <label for="postal_code" class="py-1">Pin Code</label>
                                    <input type="text" name="postal_code" id="postal_code" maxlength="6" placeholder="Postal Code" class="border rounded-lg p-2" value="<?php echo $user_postal_code ?>">
                                </div>
                                <span class="text-red-600 text-sm">* <small><?php echo $err_postal_code ?></small></span>
                            </div>
                            
                        </div>
                        
                        
                    </div>
                    <div class="py-6 space-y-2">
                        <div class="px-1 flex items-center gap-3">
                            <h2 class="font-semibold text-xl">Payment Method</h2>
                            <span class="font-semibold text-sm">(Pay half payment advance)</span>
                        </div>
                        
                        <div class="flex">
                        <div class="grid py-4 px-2">
                            <label for="name_on_card" class="py-1">Name on Card</label>
                            <input type="text" name="name_on_card" id="name_on_card" placeholder="Name on Card" class="border rounded-lg p-2" value="<?php echo $user_name_on_card ?>">
                            <span class="text-red-600 text-sm max-w-xs w-96">* <small><?php echo $err_name_on_card ?></small></span>
                        </div>
                        <div class="grid py-4 px-2">
                            <label for="card_number" class="py-1 flex items-center gap-2"><h3>Card Number</h3><small>(Enter your 16 digit card number)</small></label>
                            <input type="text" name="card_number" id="card_number" placeholder="Card Number" class="border rounded-lg p-2" maxlength="16" value="<?php echo $user_card_number ?>">
                            <span class="text-red-600 text-sm max-w-xs w-96">* <small><?php echo $err_card_number ?></small></span>
                        </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-1">
                                <div class="grid py-4 px-2">
                                    <label for="card_expiration_date" class="py-1">Expiration date (MM/YY)</label>
                                    <input type="month" name="card_expiration_date" id="card_expiration_date"  class="border rounded-lg p-2" value=" <?php ($user_card_expiration_date) ?>">
                                    <span class="text-red-600 text-sm">* <small><?php echo $err_card_expiration_date ?></small></span>
                                </div>
                            </div>
                            <div class="flex-1">
                            <div class="grid py-4">
                                <label for="cvc" class="py-1">CVC</label>
                                <input type="password" name="cvc" id="cvc" placeholder="CVC" class="border rounded-lg p-2" maxlength="3" value="<?php echo $user_card_cvc ?>">
                                <span class="text-red-600 text-sm">* <small><?php echo $err_cvc ?></small></span>
                            </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        
        <div class=" py-2 space-y-2">
            <div class="">
                <h2 class="px-4 font-semibold text-xl">Order Summary</h2>
            </div>
            <div class="grid bg-white shadow border rounded-lg py-6">
                    <?php
                    $delete = '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><path d="M7 3H9C9 2.44772 8.55228 2 8 2C7.44772 2 7 2.44772 7 3ZM6 3C6 1.89543 6.89543 1 8 1C9.10457 1 10 1.89543 10 3H14C14.2761 3 14.5 3.22386 14.5 3.5C14.5 3.77614 14.2761 4 14 4H13.4364L12.2313 12.8378C12.0624 14.0765 11.0044 15 9.75422 15H6.24578C4.99561 15 3.93762 14.0765 3.76871 12.8378L2.56355 4H2C1.72386 4 1.5 3.77614 1.5 3.5C1.5 3.22386 1.72386 3 2 3H6ZM7 6.5C7 6.22386 6.77614 6 6.5 6C6.22386 6 6 6.22386 6 6.5V11.5C6 11.7761 6.22386 12 6.5 12C6.77614 12 7 11.7761 7 11.5V6.5ZM9.5 6C9.22386 6 9 6.22386 9 6.5V11.5C9 11.7761 9.22386 12 9.5 12C9.77614 12 10 11.7761 10 11.5V6.5C10 6.22386 9.77614 6 9.5 6Z" fill="currentColor"></path></svg>';
                        foreach($cart_book_id_data as $data){ 
                        $book_id = !empty($data[0][0]) ? ucwords($data[0][0]) : '';
                        $book_name = !empty($data[0][1]) ? ucwords($data[0][1]) : '';
                        $book_author_name = !empty($data[0][2]) ? $data[0][2] : '';
                        $book_category_name = !empty($data[0][3]) ? $data[0][3] : '';
                        $book_price = !empty($data[0][5]) ? $data[0][5] : '';
                        $book_rent_charges = !empty($data[0][10]) ? $data[0][10] : '';
                        $book_image = !empty($data[0][11]) ? $data[0][11] : '';
                            
                            $book_charges = ($book_price/100);
                            
                            $one_week_charges = 7 * $book_charges;
                            $two_week_charges = 14 * $book_charges;
                            $three_week_charges = 21 * $book_charges;
                            $low_charges += $one_week_charges;
                            $mid_charges += $two_week_charges;
                            $normal_charges += $three_week_charges;
                            
                            $book_actual_charges = [[1,$low_charges],[2,$mid_charges],[3,$normal_charges]];
                            
                            
                        ?>
                <div class="px-6 border-b">
                    <article class="flex w-full py-2">
                        <div class="w-40 h-44 p-2">
                            <img src="../../Image/<?php echo $book_image ?>" alt="" class="w-full h-full object-cover  rounded-lg">
                        </div>
                        <div class="flex ">
                        <div class="px-4 flex flex-col w-full">
                            <div class="flex-1">
                                <div class=" flex justify-between items-center">
                                    <h3 class="font-semibold text-xl"><?php echo $book_name ?></h3>
                                    
                                </div>
                                <p class=" text-slate-400 text-lg"><?php echo "Author :- " . $book_author_name ?></p>
                                <p class=" text-slate-400"><?php echo "Category :- " . $book_category_name ?></p>
                            </div>
                            <div class="flex pt-4 items-baseline justify-between">
                                <span class="font-semibold"><?php echo "Price :- $" . $book_price ?></span>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <!-- <span class="font-semibold"><?php echo "Price :- $" . $book_price ?></span> -->
                                <span class="font-medium text-sm"><?php echo "Rent Charges :- $" . $book_rent_charges . "/Per Day" ?></span>
                            </div>
                        </div>
                        <?php  if($product_name != "buy_book_id"){ ?>
                        <div>
                        <a href="../rented_book_details/delete_cart?cart_id=<?php echo $book_id ?>" data-toggle="tooltip" data-placement="top" title="Delete"
                            class=" h-8 py-1 rounded-md">
                            <?php echo $delete ?>
                        </a>
                        </div>
                        <?php } ?>
                        </div>
                    </article>
                </div>
                
                <?php } ?>
                
                <div class="px-4 border-b-2">
                    <div class="grid items-center gap-1">
                            <div class="grid py-4 px-2">
                                <label for="return_date" class="py-1 flex items-center gap-2">Return Data</label>
                                <input type="date" name="return_date" id="return_date" class="border rounded-lg p-2">
                                <span class="text-red-600 text-sm max-w-xs w-96">* <small><?php echo $err_selected_date ?></small></span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <input type="submit" name="rent_now" value="Submit" class="border w-full py-2 bg-blue-600 cursor-pointer text-center text-white text-lg font-semibold rounded-lg">
                    </div>
                
            </div>
        </div>
        </form>
</body>
</html>