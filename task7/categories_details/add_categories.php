<?php
include 'book_categories_validation.php';
if (!empty($err_image) && (is_array($err_image))) {
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

<body class="bg-slate-100">
    <h2 class="w-full border text-center bg-green-50 text-slate-800 fixed top-0 shadow">
        <?php
        echo $errmsg;

        ?>
    </h2>
    <div class="flex w-full h-screen">
        <div class="flex-1 h-full">
            <img src="../../Image/book3.jpg" alt="Main Image" class="w-full h-full object-cover">
        </div>
        <form action="add_categories" method="post" class="h-full shadow flex-1 " name="registeration_form"
            enctype="multipart/form-data">
            <div class="flex items-center justify-center w-full h-full">
                <div class="space-y-3 bg-slate-50 rounded-xl shadow p-10">
                    <div class="flex gap-10">
                        <div class=" w-full border p-2 rounded-lg shadow">
                            <label for="category">Category Name</label>
                            <input type="text" name="category_name" id="category" placeholder="Category Name"
                                class="border rounded-sm w-full p-1" value="<?php echo $category_name ?>">
                            <span class="text-red-600 text-sm">* <small>
                                    <?php echo $err_category ?>
                                </small></span>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-between ">
                        <div>
                            <div class="flex items-center gap-4">
                                <label>Upload Your Image :-</label>
                                <div class="">
                                    <input type="file" name="category_image" id="category_image">
                                </div>
                            </div>
                            <span class="text-red-600 text-sm">* <small>
                                    <?php echo $err_image ?>
                                </small></span>
                        </div>
                    </div>
                    <div>
                        <input type="submit" name="add_categories"
                            class="bg-purple-600 rounded-lg text-white border border-white px-8 py-2 cursor-pointer">
                    </div>
                </div>
            </div>
        </form>

    </div>

</body>

</html>