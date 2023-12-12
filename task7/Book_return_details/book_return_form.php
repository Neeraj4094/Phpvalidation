<?php
include 'books_return_validation.php';

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
<h2 class="w-full border text-center bg-green-50 text-green-800 fixed top-0 shadow">
        <?php
        // echo $errmsg;

        ?>
    </h2>
    <form method="post"  action="" class="flex gap-4 h-full w-full p-4">
        <div class="p-2 flex-1 space-y-2 ">
            <h2 class="font-semibold text-xl px-2">Contact Information</h2>
            <div class=" px-4 bg-white shadow border rounded-lg">
                
                
                <div class="py-6 space-y-2">
                    <div class="px-1">
                        <h2 class="font-semibold text-xl">Payment Method</h2>
                    </div>
                    
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
                    <div class="py-4">
                           <input type="submit" name="return_now" value="Submit" class="border w-full py-2 bg-blue-600 cursor-pointer text-center text-white text-lg font-semibold rounded-lg">
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
                        <div class="w-32 h-44 p-2">
                            <img src="../../Image/<?php echo $return_book_image ?>" alt="" class="w-full h-full object-cover  rounded-lg">
                        </div>
                        <div class="px-4 flex flex-col w-full">
                            <div class="">
                                <div class=" flex justify-between items-center">
                                    <h3 class="font-semibold text-xl"><?php echo $return_book_name ?></h3>
                                    
                                </div>
                                <p class=" text-slate-600 font-medium text-lg"><?php echo "Author :- " . $return_book_author_name ?></p>
                                <p class=" text-slate-400"><?php echo "Category :- " . $return_book_category_name ?></p>
                            </div>
                            <div class="flex py-4 items-baseline justify-between">
                                <span class="font-semibold"><?php echo "Price :- $" . $return_book_price ?></span>
                            </div>
                        </div>
                    </article>
                </div>
                
                <div class="px-4 py-2 font-semibold">
                    <?php echo "Book Charges :- " . $book_charges; ?>
                </div>
            </div>
            <?php echo $success ?>
        </div>
        
    </form>
</body>
</html>