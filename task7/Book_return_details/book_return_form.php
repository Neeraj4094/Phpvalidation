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
    <h2 class="w-full border text-center bg-green-50 z-50 text-green-800 fixed top-0 shadow">
        <?php
        echo $errmsg;

        ?>
    </h2>
    <header class="sticky z-30 top-0">
        <?php include '../home_page/home_header.php' ?>
    </header>
    <form method="post" action="" class="flex w-full p-4 py-2">
        <div class="p-2 flex-1">

            <div class=" px-4 bg-white shadow border rounded-lg">


                <div class="py-6 space-y-2">
                    <div class="px-1">
                        <h2 class="font-semibold text-xl">Payment Form</h2>
                    </div>

                    <div class="flex">
                        <div class="grid py-4 px-2">
                            <label for="name_on_card" class="py-1">Name on Card</label>
                            <input type="text" name="name_on_card" id="name_on_card" placeholder="Name on Card"
                                class="border rounded-lg p-2" value="<?php echo $user_name_on_card ?>">
                            <span class="text-red-600 text-sm max-w-xs w-96">* <small>
                                    <?php echo $err_name_on_card ?>
                                </small></span>
                        </div>
                        <div class="grid py-4 px-2">
                            <label for="card_number" class="py-1">Card Number</label>
                            <input type="text" name="card_number" id="card_number" placeholder="Card Number"
                                class="border rounded-lg p-2" maxlength="16" value="<?php echo $user_card_number ?>">
                            <span class="text-red-600 text-sm max-w-xs w-96">* <small>
                                    <?php echo $err_card_number ?>
                                </small></span>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class=" w-full">
                            <div class="grid px-2">
                                <label for="card_expiration_date" class="py-1">Expiration date (MM/YY)</label>
                                <input type="month" name="card_expiration_date" id="card_expiration_date"
                                    class="border rounded-lg p-2">
                                <span class="text-red-600 text-sm max-w-xs w-96">* <small>
                                        <?php echo $err_card_expiration_date ?>
                                    </small></span>
                            </div>
                        </div>
                        <div class="grid w-full">
                            <label for="cvc" class="py-1">CVC</label>
                            <input type="password" name="cvc" id="cvc" maxlength="3" placeholder="CVC"
                                class="border rounded-lg p-2" value="<?php echo $user_card_cvc ?>">
                            <span class="text-red-600 text-sm">* <small>
                                    <?php echo $err_cvc ?>
                                </small></span>
                        </div>
                    </div>
                    <div class="py-4">
                        <input type="submit" name="return_now" value="Submit"
                            class="border w-full py-2 bg-blue-600 cursor-pointer text-center text-white text-lg font-semibold rounded-lg">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-1 p-2">
            <div class="">

            </div>
            <div class="grid bg-white shadow border rounded-lg py-4">
                <div class="px-6 border-b">
                    <article class="flex w-full">
                        <div class="w-40 h-44 p-2">
                            <img src="../../Image/<?php echo $ordered_book_image ?>" alt=""
                                class="w-full h-full object-cover  rounded-lg">
                        </div>
                        <div class="p-2 w-full">
                            <div class="">
                                <div class=" flex justify-between items-center">
                                    <h3 class="font-semibold text-xl">
                                        <?php echo $ordered_book_name ?>
                                    </h3>

                                </div>
                                <p class=" text-slate-600 font-medium text-lg">
                                    <?php echo "Author :- " . $ordered_book_author_name ?>
                                </p>
                                <p class=" text-slate-400">
                                    <?php echo "Category :- " . $ordered_book_category ?>
                                </p>
                            </div>
                            <div class="flex py-4 items-baseline justify-between">
                                <span class="font-semibold">
                                    <?php echo "Price :- $" . $ordered_book_price ?>
                                </span>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="px-4 py-2 font-semibold space-y-2">
                    <div class=" border-b py-1 pb-2">
                        <div class="flex justify-between">
                            <h3>Issue Date</h3>
                            <span>
                                <?php echo $book_issue_date ?>
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <h3>Book returning Date</h3>
                            <span>
                                <?php echo $book_return_date ?>
                            </span>
                        </div>
                    </div>
                    <div class="border-b pt-1 pb-2 space-y-1">
                        <div class="flex justify-between">
                            <h3>Book Charges</h3>
                            <span>
                                <?php echo $rented_charges ?>
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <h3>Fine</h3>
                            <span>
                                <?php echo $fine ?>
                            </span>
                        </div>
                    </div>
                    <div class="flex justify-between pt-1">
                        <h3>Total Charges</h3>
                        <span>
                            <?php echo $total_book_charges ?>
                        </span>
                    </div>
                </div>
            </div>
            <?php echo $success ?>
        </div>

    </form>
</body>

</html>