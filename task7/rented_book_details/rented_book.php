<?php
include './book_fetch_validation.php';

if($book_copies != 0){
    $book_quantity = 1;
    
    }else{
        $errmsg = "Out of Stock";
    }
// Check if the form is submitted
// $selectedColor = '';
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $id = $_GET["buy_book_id"];
//     $selecteddays = isset($_POST["return_date"])? $_POST["return_date"] : '';
//     // header("location: ./rented_book_details.php?book_id= $id");
// }
// onchange="this.form.submit()"

// $charges = ($rented_book_price * $selectedColor);
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
                    <div class="flex items-center justify-between">
                        <div class="grid  space-y-1">
                            <label for="email" class="py-1">Email Address</label>
                            <input type="email" name="email" id="email" placeholder="Email address" class="border rounded-lg p-2" value="<?php echo $user_email ?>">
                            <span class="text-red-600 text-sm max-w-xs w-64">* <small><?php echo $err_email ?></small></span>
                        </div>
                        <div class="grid pt-2 space-y-2">
                            <label for="days" class="">No of Days for Purchase</label>
                            <select name="return_date" id="days" class=" text-slate-500 border py-2 px-1 rounded-lg">
                                <option value="" class="bg-transparent p-1">Select Days</option>
                                <option value="7" <?php ($book_return_date == "7")? 'selected' : '' ?> class="bg-transparent p-1">1 week</option>
                                <option value="14" <?php ($book_return_date == "14")? 'selected' : '' ?> class="bg-transparent p-1">2 week</option>
                                <option value="21" <?php ($book_return_date == "21")? 'selected' : '' ?> class="bg-transparent p-1">3 week</option>
                            </select>
                            <span class="text-red-600 text-sm max-w-xs w-40">* <small><?php echo $err_returned_date ?></small></span>
                            
                        </div>
                        <div class="">
                            <div class="grid space-y-1">
                                <label for="postal_code" class="py-1">Pin Code</label>
                                <input type="text" name="postal_code" id="postal_code" placeholder="Postal Code" class="border rounded-lg p-2" value="<?php echo $user_postal_code ?>">
                            </div>
                            <span class="text-red-600 text-sm max-w-xs w-60">* <small><?php echo $err_postal_code ?></small></span>
                        </div>
                    </div>
                    <div class="flex w-full justify-between">
                        <div class="grid pt-2">
                            <label for="address" class="">Residential Address</label>
                            <input type="text" name="address" id="address" placeholder="Your Address" class="border rounded-lg px-2" value="<?php echo $address ?>">
                            <span class="text-red-600 text-sm max-w-xs w-64">* <small><?php echo $err_address ?></small></span>
                        </div>
                        <div class="">
                            <div class="grid py-4 space-y-2">
                                <label for="state" class="py-1">State</label>
                                <input type="text" name="state" id="state" placeholder="Your state" class="border rounded-lg p-2" value="<?php echo $user_state ?>">
                            </div>
                            <span class="text-red-600 text-sm max-w-xs">* <small><?php echo $err_state ?></small></span>
                        </div>
                        <div class="">
                            <div class="grid py-4 space-y-2">
                                <label for="city" class="py-1">City</label>
                                <input type="text" name="city" id="city" placeholder="Your City" class="border rounded-lg p-2" value="<?php echo $user_city ?>">
                            </div>
                            <span class="text-red-600 text-sm max-w-xs">* <small><?php echo $err_city ?></small></span>
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
                        <input type="text" name="card_number" id="card_number" placeholder="Card Number" class="border rounded-lg p-2" value="<?php echo $user_card_number ?>">
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
                            <input type="password" name="cvc" id="cvc" placeholder="CVC" class="border rounded-lg p-2" value="<?php echo $user_card_cvc ?>">
                            <span class="text-red-600 text-sm">* <small><?php echo $err_cvc ?></small></span>
                        </div>
                        </div>
                        <!-- <div class="grid py-4">
                            <label for="charges" class="py-1">Pay Charges</label>
                            <input type="number" name="charges" id="charges" placeholder="Charges" class="border rounded-lg p-2" value="<?php echo $user_card_cvc ?>">
                            <span class="text-red-600 text-sm ">* <small><?php echo $err_charges ?></small></span>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-1 p-2 space-y-2">
            <div class="">
                <h2 class="px-4 font-semibold text-xl">Order Summary</h2>
            </div>
            <div class="grid bg-white shadow border rounded-lg py-6">
                    <?php foreach($cart_book_id_data as $data){ 
                        $book_id = !empty($data[0][0]) ? ucwords($data[0][0]) : '';
                        $book_name = !empty($data[0][1]) ? ucwords($data[0][1]) : '';
                        $book_author_name = !empty($data[0][2]) ? $data[0][2] : '';
                        $book_category_name = !empty($data[0][3]) ? $data[0][3] : '';
                        $book_price = !empty($data[0][5]) ? $data[0][5] : '';
                        $book_image = !empty($data[0][10]) ? $data[0][10] : '';
                        // if(!empty($rented_book_price)){
                            $book_charges = ($book_price/100);
                            
                            $one_week_charges = 7 * $book_charges;
                            $two_week_charges = 14 * $book_charges;
                            $three_week_charges = 21 * $book_charges;
                            $low_charges += $one_week_charges;
                            $mid_charges += $two_week_charges;
                            $normal_charges += $three_week_charges;
                            // echo $low_term_charges; 
                            $book_actual_charges = [[1,$low_charges],[2,$mid_charges],[3,$normal_charges]];
                            
                            // }else{
                            //     $one_week_charges = $two_week_charges = $three_week_charges = 0;
                            // }
                        ?>
                <div class="px-6 border-b">
                    <article class="flex w-full py-2">
                        <div class="w-40 h-44 p-2">
                            <img src="../../Image/<?php echo $book_image ?>" alt="" class="w-full h-full object-cover  rounded-lg">
                        </div>
                        <div class="px-4 flex flex-col w-full">
                            <div class="flex-1">
                                <div class=" flex justify-between items-center">
                                    <h3 class="font-semibold text-xl"><?php echo $book_name ?></h3>
                                    
                                </div>
                                <p class=" text-slate-400 text-lg"><?php echo "Author :- " . $book_author_name ?></p>
                                <p class=" text-slate-400"><?php echo "Category :- " . $book_category_name ?></p>
                            </div>
                            <div class="flex py-4 items-baseline justify-between">
                                <span class="font-semibold"><?php echo "Price :- $" . $book_price ?></span>
                            </div>
                        </div>
                    </article>
                </div>
                
                <?php } ?>
                
                <div class="px-4 py-2 border-b-2">
                <div class="grid items-center gap-1">
                            <h2 for="role" class="w-auto font-semibold">Days for Purchase</h2>
                            <!-- <select name="occupation" id="role" class="rounded-lg bg-slate-100 text-slate-500 border w-full p-2 ">
                            <option value="" class="bg-transparent p-1">Select Your Role</option> -->
                            <?php foreach($book_actual_charges as $charges){
                                
                                $week = isset($charges[0]) ? $charges[0] : '';
                                $book_without_shipping_charges = isset($charges[1]) ? $charges[1] : '';
                                $book_charges_with_shipping = $book_without_shipping_charges + 10;
                                ?>
                                <div class="flex items-center gap-2">
                                    <input type="radio" name="days_charges"  value="<?php echo $book_charges_with_shipping ?>" id="<?php echo $book_charges_with_shipping ?>">
                                    <label for="<?php echo $book_charges_with_shipping ?>">
                                        <div class="flex justify-between gap-4 py-3 border-b">
                                            <dt class="grid text-sm "><span>Book Charges + Shipping</span> <small>(For <?php echo $week ?> week)</small></dt>
                                            <dd class=""><?php echo "$" . $book_without_shipping_charges . "+ $10 = " ?><span class="font-semibold flex"><?php echo "$" .($book_without_shipping_charges + 10) ?></span></dd>
                                        </div>
                                    </label>
                                </div>
                            <?php } ?>
                            <!-- </select> -->
                            <span class="text-red-600 text-sm max-w-xs w-96">* <small><?php echo $err_charges_days ?></small></span>
                        </div>
                    <!-- <h3 class="text-lg font-semibold py-2"></h3>
                    <dl class="rounded-lg px-1 space-y-2"> -->
                        <!-- <div class="flex justify-between py-3 border-b">
                            <dt class=" text-sm grid place-items-center"><span>Book Charges</span> + <span>Shipping</span> <small>(For <?php echo $week ?> week)</small></dt>
                            <dd class="flex"><?php echo "$" . $book_without_shipping_charges . "+ $10 = " ?><span class="font-semibold"><?php echo "$" .($book_without_shipping_charges + 10) ?></span></dd>
                        </div> -->
                        <!-- <div class="flex justify-between py-3 border-b">
                            <dt class=" text-base">Book Charges + Shipping <small>(For 2 weeks)</small></dt>
                            <dd class="flex"><?php echo "$" . $two_week_charges ."+ $10 = "  ?><span class="font-semibold"><?php echo "$" .($two_week_charges + 10) ?></span></dd>
                        </div>
                        <div class="flex justify-between py-3">
                            <dt class=" text-base">Book Charges + Shipping <small>(For 3 weeks)</small></dt>
                            <dd class="flex"><?php echo "$" . $three_week_charges . "+ $10 = "  ?><span class="font-semibold"><?php echo "$" .($three_week_charges + 10) ?></span></dd>
                        </div> -->
                    <!-- </dl> -->
                </div>
                <div class="p-4">
                       <input type="submit" name="rent_now" value="Submit" class="border w-full py-2 bg-blue-600 cursor-pointer text-center text-white text-lg font-semibold rounded-lg">
                </div>
            </div>
        </div>
        
    </form>
</body>
</html>