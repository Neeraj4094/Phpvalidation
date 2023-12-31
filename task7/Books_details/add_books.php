<?php
include 'book_form_validation.php';
if (is_array($err_image)) {
    $err_image = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/output.css">
    <title>Document</title>
</head>

<body class="bg-slate-100 h-full">
    <h2 class="w-full border text-center bg-green-50 text-slate-800 fixed top-0 shadow">
        <?php
        // echo $errmsg;

        ?>
    </h2>
    <div class="flex w-full h-full">
        <div class="flex-1 h-screen">
            <img src="../../Image/book3.jpg" alt="Main Image" class="w-full h-full object-cover">
        </div>
        <form action="<?php echo $get_url_category_name ?>" method="post" class="h-full shadow flex-1 "
            name="registeration_form" enctype="multipart/form-data">
            <div class="flex items-center justify-center w-full h-full">
                <div class="space-y-3 bg-slate-50 rounded-lg shadow py-6 h-full px-10">
                    <div class=" gap-10">
                        <div class="grid">
                            <div class="flex gap-2 items-center w-full">
                                <label for="category">Category Name :-</label>
                                <select name="category_name" id="category"
                                    class="rounded-lg bg-slate-100 text-slate-500 border w-60 p-2 ">
                                    <option value="" class="bg-transparent p-1">Select Category</option>
                                    <?php if (!empty($fetch_category_name_array)) {
                                        foreach ($fetch_category_name_array as $category_name) {
                                            ?>
                                            <option value="<?php echo $category_name ?>" class="bg-transparent p-1">
                                                <?php echo $category_name ?>
                                            </option>
                                        <?php }
                                    } else { ?>
                                        <option value="<?php echo $get_category_name ?>" selected
                                            class="bg-transparent p-1">
                                            <?php echo $get_category_name ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <span class="text-red-600 text-sm">* <small>
                                    <?php echo $err_category ?>
                                </small></span>
                        </div>

                        <div class="flex gap-4 items-center">
                            <div class=" space-y-2">
                                <label for="book_name">Book Name/Book Title</label>
                                <input type="text" name="book_name" id="book_name" placeholder="Book Name"
                                    class="border rounded-sm w-full p-1" value="<?php echo $book_name ?>">
                                <span class="text-red-600 text-sm">* <small>
                                        <?php echo $err_book ?>
                                    </small></span>
                            </div>
                            <div class="space-y-2">
                                <label for="author_name">Author Name</label>
                                <input type="text" name="author_name" id="author_name" placeholder="Author Name"
                                    class="border rounded-sm w-full p-1" value="<?php echo $author_name ?>">
                                <span class="text-red-600 text-sm max-w-xs w-60">* <small>
                                        <?php echo $err_author ?>
                                    </small></span>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 w-full">
                            <div class="">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="4"
                                    placeholder="Description"
                                    class="border rounded-sm w-full p-1"><?php echo $book_description ?></textarea>

                                <span class="text-red-600 text-sm">* <small>
                                        <?php echo $err_book_desciption ?>
                                    </small></span>
                            </div>
                            <div class="flex-1">
                                <div class="">
                                    <label for="copies">Quantity/Copies</label>
                                    <input type="number" name="copies" id="copies" placeholder="Copies"
                                        class="border rounded-sm w-full p-1" value="<?php echo $book_copies ?>">
                                    <span class="text-red-600 text-sm">* <small>
                                            <?php echo $err_book_copies ?>
                                        </small></span>
                                </div>
                                <div class="grid">
                                    <label for="book_price">Book Price:</label>
                                    <input type="number" name="book_price" id="book_price" step="0.01" min="0"
                                        placeholder="Enter Price" class="border rounded-sm p-1"
                                        value="<?php echo $book_price ?>">
                                    <span class="text-red-600 text-sm">* <small>
                                            <?php echo $err_book_price ?>
                                        </small></span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="grid">
                            <div class=" items-center gap-2 grid">
                                <label>Upload Your Image :-</label>
                                <div class="grid">
                                    <input type="file" name="book_image" id="book_image">
                                </div>
                            </div>
                            <span class="text-red-600 text-sm">* <small>
                                    <?php echo $err_image ?>
                                </small></span>
                            </div>
                            <div class="grid space-y-2">
                                <label for="rent_price">Book Rent Price :- </label>
                                <input type="text" name="rent_price" id="rent_price" value="<?php echo $rent_price ?>" placeholder="Rent Price">
                                <span class="text-red-600 text-sm">* <small>
                                    <?php echo $err_book_rent ?>
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