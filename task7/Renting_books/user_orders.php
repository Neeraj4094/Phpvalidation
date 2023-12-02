<?php
include 'book_fetch_validation.php';
// if(!empty($err_image)) {
//     if(is_array($err_image)){
//         $err_image = '';
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/output.css">
    <title>Document</title>
</head>

<body class="bg-slate-100">
    <h2 class="w-full border text-center bg-green-50 text-slate-800 fixed top-0 shadow">
        <?php
        // echo $errmsg;

        ?>
    </h2>
    <div class="flex w-full h-screen">
        <div class="flex-1 h-full">
            <img src="../../Image/book3.jpg" alt="Main Image" class="w-full h-full object-cover">
        </div>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="h-full shadow flex-1 "
            name="registeration_form" enctype="multipart/form-data">
            <div class="flex items-center justify-center w-full h-full">
                <div class="space-y-1 bg-slate-50 rounded-xl shadow py-6 w-full h-full px-10">
                    <div class=" space-y-2">
                        <div class="flex gap-2">
                            <p class="font-semibold">Book Name/Book Title :- </p>
                            <span class="font-bold"><?php echo $rented_book_name ?></span>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-semibold">Category Name :- </p>
                            <span class="font-bold"><?php echo $rented_book_category ?></span>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-semibold">Author Name :- </p>
                            <span class="font-bold"><?php echo $rented_book_author ?></span>
                        </div>
                        <div class="flex gap-2">
                            <p class="font-semibold">Issue Date :- </p>
                            <span class="font-bold"><?php echo $currentDate ?></span>
                        </div>
                    </div>
                    
                    <div class="p-2">
                        
                        <div class="flex items-center justify-center gap-4">
                            
                        </div>
                        <div class="flex items-center justify-center w-full gap-4">
                            <div class="grid items-center gap-2 w-full">
                                <label for="issue_date">Issue Date:</label>
                                <input type="text" name="issue_date" id="issue_date" 
                                    class="border rounded-sm  p-1" value="<?php echo $currentDate ?>">
                                <span class="text-red-600 text-sm">* <small><?php echo $err_book_copies ?></small></span>
                            </div>
                            <div class=" w-full">
                                <div class="grid gap-1">
                                    <label class="days">No of Days for Purchase :-</label>
                                    <select name="return_date" id="days" class="rounded-sm bg-slate-100 text-slate-500 border py-1 px-1">
                                        <option value="" class="bg-transparent p-1">Select Days</option>
                                        <option value="7" class="bg-transparent p-1">1 week</option>
                                        <option value="14" class="bg-transparent p-1">2 week</option>
                                        <option value="21" class="bg-transparent p-1">3 week</option>
                                    </select>
                                </div>
                                <span class="text-red-600 text-sm">* <small><?php echo $err_days ?></small></span>
                            </div>
                            <!-- <div class="grid items-center gap-2 w-full">
                                <label for="return_date">Last Returned Date:</label>
                                <input type="date" name="return_date" id="return_date" 
                                    class="border rounded-sm  p-1">
                                <span class="text-red-600 text-sm">* <small><?php echo $err_book_copies ?></small></span>
                            </div> -->
                        </div>
                        <div class="flex items-center justify-center gap-4 ">
                            <div class="grid w-full">
                                <label for="book_price">Book Price:</label>
                                <input type="number" name="book_price" id="book_price" step="0.01" min="0" placeholder="Enter Price" class="border rounded-sm p-1">
                                <span class="text-red-600 text-sm">* <small>
                                        <?php echo $err_category ?>
                                    </small></span>
                            </div>
                            <div class="grid w-full">
                                <label for="book_price">Total Charges for renting:</label>
                                    <input type="number" name="book_price" id="book_price" step="0.01" min="0" placeholder="Enter Price" class="border rounded-sm p-1">
                                    <span class="text-red-600 text-sm">* <small>
                                            <?php echo $err_category ?>
                                        </small></span>
                            </div>
                            
                        </div>
                    </div>
                    <div>
                        <input type="submit" name="add_books"
                            class="bg-purple-600 rounded-lg text-white border border-white px-8 py-2 cursor-pointer">
                    </div>
                </div>
            </div>
        </form>

    </div>

</body>

</html>