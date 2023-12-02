<?php
include './book_fetch_validation.php';

if(!empty($rented_book_price)){
$book_charges = ($rented_book_price/100);

$one_week_charges = 7 * $book_charges;
$two_week_charges = 14 * $book_charges;
$three_week_charges = 21 * $book_charges;
}else{
    $one_week_charges = $two_week_charges = $three_week_charges = 0;
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
<h2 class="w-full border text-center text-slate-800 fixed top-0 shadow">
        <?php
        // echo $errmsg;

        ?>
    </h2>
    <form method="post"  action="./rented_book_details.php?buy_book_id=<?php echo $rented_book_id ?>" class="flex gap-4 h-full w-full p-4">
        <div class="p-2 flex-1 space-y-2 ">
            <h2 class="font-semibold text-xl px-2">Contact Information</h2>
            <div class=" px-4 bg-white shadow border rounded-lg">
                
                <div class="py-6 border-b space-y-2 pb-4">
                    <h2 class="font-semibold text-xl">Shipping Address</h2>
                    <div class="flex items-center justify-between">
                        <div class="grid  space-y-1">
                            <label for="email" class="py-1">Email Address</label>
                            <input type="email" name="email" id="email" placeholder="Email address" class="border rounded-lg p-2">
                            <span class="text-red-600 text-sm max-w-xs w-64">* <small><?php echo $err_email ?></small></span>
                        </div>
                        <div class="grid pt-2 space-y-2">
                            <label for="return_date" class="">No of Days for Purchase</label>
                            <select name="return_date" id="days" class=" text-slate-500 border py-2 px-1 rounded-lg">
                                <option value="" class="bg-transparent p-1">Select Days</option>
                                <option value="7" class="bg-transparent p-1">1 week</option>
                                <option value="14" class="bg-transparent p-1">2 week</option>
                                <option value="21" class="bg-transparent p-1">3 week</option>
                            </select>
                            <span class="text-red-600 text-sm max-w-xs w-40">* <small><?php echo $err_returned_date ?></small></span>
                            
                        </div>
                        <div class="">
                            <div class="grid space-y-1">
                                <label for="postal_code" class="py-1">Pin Code</label>
                                <input type="text" name="postal_code" id="postal_code" placeholder="Postal Code" class="border rounded-lg p-2">
                            </div>
                            <span class="text-red-600 text-sm max-w-xs w-60">* <small><?php echo $err_postal_code ?></small></span>
                        </div>
                    </div>
                    <div class="flex w-full justify-between">
                        <div class="grid py-1 space-y-1">
                            <label for="address" class="py-1">Residential Address</label>
                            <input type="text" name="address" id="address" placeholder="Your Address" class="border rounded-lg p-2">
                            <span class="text-red-600 text-sm max-w-xs w-64">* <small><?php echo $err_address ?></small></span>
                        </div>
                        <div class="">
                            <div class="grid py-4 space-y-2">
                                <label for="state" class="py-1">State</label>
                                <input type="text" name="state" id="state" placeholder="Your state" class="border rounded-lg p-2">
                            </div>
                            <span class="text-red-600 text-sm max-w-xs">* <small><?php echo $err_state ?></small></span>
                        </div>
                        <div class="">
                            <div class="grid py-4 space-y-2">
                                <label for="city" class="py-1">City</label>
                                <input type="text" name="city" id="city" placeholder="Your City" class="border rounded-lg p-2">
                            </div>
                            <span class="text-red-600 text-sm max-w-xs">* <small><?php echo $err_city ?></small></span>
                        </div>
                    </div>
                    
                    <div class="flex gap-4">
                        
                        
                        <!-- <div class="flex-1">
                            <div class="grid py-4 space-y-2">
                                <label for="postal_code" class="py-1">Pin Code</label>
                                <input type="text" name="postal_code" id="postal_code" placeholder="Postal Code" class="border rounded-lg p-2">
                            </div>
                            <span class="text-red-600 text-sm max-w-xs w-96">* <small><?php echo $err_postal_code ?></small></span>
                        </div> -->
                    </div>
                </div>
                <div class="py-6 space-y-2">
                    <div class="px-1">
                        <h2 class="font-semibold text-xl">Payment Method</h2>
                    </div>
                    <!-- <div class="flex justify-between px-2">
                        <div class="flex gap-2 py-4">
                            <input type="radio" name="payment" id="credit" value="credit card" class="border rounded-lg py-2">
                            <label for="credit" class="py-1">Credit/Debit Card</label>
                        </div>
                        <div class="flex gap-2 py-4">
                            <input type="radio" name="payment" id="wallet" value="wallet" class="border rounded-lg py-2">
                            <label for="wallet" class="py-1">Wallet</label>
                        </div>
                        <div class="flex gap-2 py-4">
                            <input type="radio" name="payment" id="Net_Banking" value="net banking" class="border rounded-lg py-2">
                            <label for="Net_Banking" class="py-1">Net Banking</label>
                        </div>
                        <div class="flex gap-2 py-4">
                            <input type="radio" name="payment" id="Cash_on_Delivery" value="cash on delivery" class="border rounded-lg py-2">
                            <label for="Cash_on_Delivery" class="py-1">Cash on Delivery</label>
                        </div>
                    </div> -->
                    <!-- <span class="text-red-600 text-sm max-w-xs w-96">* <small><?php echo $err_payment_method ?></small></span> -->
                    <div class="flex">
                    <div class="grid py-4 px-2">
                        <label for="name_on_card" class="py-1">Name on Card</label>
                        <input type="text" name="name_on_card" id="name_on_card" placeholder="Name on Card" class="border rounded-lg p-2">
                        <span class="text-red-600 text-sm max-w-xs w-96">* <small><?php echo $err_name_on_card ?></small></span>
                    </div>
                    <div class="grid py-4 px-2">
                        <label for="card_number" class="py-1">Card Number</label>
                        <input type="text" name="card_number" id="card_number" placeholder="Card Number" class="border rounded-lg p-2">
                        <span class="text-red-600 text-sm max-w-xs w-96">* <small><?php echo $err_card_number ?></small></span>
                    </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <div class="grid py-4 px-2">
                                <label for="card_expiration_date" class="py-1">Expiration date (MM/YY)</label>
                                <input type="month" name="card_expiration_date" id="card_expiration_date"  class="border rounded-lg p-2">
                                <span class="text-red-600 text-sm max-w-xs w-96">* <small><?php echo $err_card_expiration_date ?></small></span>
                            </div>
                        </div>
                        <div class="grid py-4">
                            <label for="cvc" class="py-1">CVC</label>
                            <input type="text" name="cvc" id="cvc" placeholder="CVC" class="border rounded-lg p-2">
                            <span class="text-red-600 text-sm max-w-xs w-96">* <small><?php echo $err_cvc ?></small></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-1 p-2 space-y-2">
            <div class="">
                <h2 class="px-4 font-semibold text-xl">Order Summary</h2>
            </div>
            <div class="grid bg-white shadow border rounded-lg py-6">
                <div class="px-6 border-b">
                    <article class="flex w-full py-2">
                        <div class="w-44 h-60 p-2">
                            <img src="../../Image/<?php echo $rented_book_image ?>" alt="" class="w-full h-full object-cover  rounded-lg">
                        </div>
                        <div class="px-4 flex flex-col w-full">
                            <div class="flex-1">
                                <div class=" flex justify-between items-center">
                                    <h3 class="font-semibold text-xl"><?php echo $rented_book_name ?></h3>
                                    
                                </div>
                                <p class=" text-slate-400 text-lg"><?php echo "Author :- " . $rented_book_author ?></p>
                                <p class=" text-slate-400"><?php echo "Category :- " . $rented_book_category ?></p>
                            </div>
                            <div class="flex py-4 items-baseline justify-between">
                                <span class="font-semibold"><?php echo "Price :- $" . $rented_book_price ?></span>
                            </div>
                        </div>
                    </article>
                </div>
                
                <div class="px-4 py-2">
                    <h3 class="text-lg font-semibold py-2">Ordinary Summary</h3>
                    <dl class="rounded-lg px-1 space-y-2">
                        <div class="flex justify-between py-3 border-b">
                            <dt class=" text-base">Book Charges + Shipping <small>(For 1 week)</small></dt>
                            <dd class=""><?php echo "$" . $one_week_charges . "+ $10 = " ?><span class="font-semibold"><?php echo "$" .($one_week_charges + 10) ?></span></dd>
                        </div>
                        <div class="flex justify-between py-3 border-b">
                            <dt class=" text-base">Book Charges + Shipping <small>(For 2 weeks)</small></dt>
                            <dd class="flex"><?php echo "$" . $two_week_charges ."+ $10 = "  ?><span class="font-semibold"><?php echo "$" .($two_week_charges + 10) ?></span></dd>
                        </div>
                        <div class="flex justify-between py-3 border-b">
                            <dt class=" text-base">Book Charges + Shipping <small>(For 3 weeks)</small></dt>
                            <dd class="flex"><?php echo "$" . $three_week_charges . "+ $10 = "  ?><span class="font-semibold"><?php echo "$" .($three_week_charges + 10) ?></span></dd>
                        </div>
                    </dl>
                    <div class="py-4">
                           <input type="submit" name="rent_now" value="Submit" class="border w-full py-2 bg-blue-600 cursor-pointer text-center text-white text-lg font-semibold rounded-lg">
                    </div>
                </div>
            </div>
        </div>
        
    </form>
</body>
</html>