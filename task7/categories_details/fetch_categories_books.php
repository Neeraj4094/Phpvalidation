<?php
// include 'database_connection.php';
include '../send_fetch_data_from_db.php';
include '../admin_session.php';

$fetch_data_from_db = new fetch_db_data();
$category_name = isset($_GET['book_category']) ? $_GET['book_category'] : '';

$fetch_category_name_query = $fetch_data_from_db->fetchiddata('books_details', $category_name, $conn, 'book_category');
$fetch_category_name_data = mysqli_fetch_all($fetch_category_name_query);
// print_r($fetch_category_name_data);
$cancel_login = '';

if (isset($_POST['search'])) {
    $search = strtolower($_POST['search']);
}
// echo "<pre>";
// // print_r($fetch_category_name_data);
// echo "</pre>";

// $fetch_id_query = $fetch_data_from_db->fetchiddata('user_details', $login_email, $conn, 'user_email');
// $fetch_id_data = mysqli_fetch_all($fetch_id_query);
// $user_name = isset($fetch_id_data[0][1]) ? $fetch_id_data[0][1] : '';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class=" w-full h-full bg-slate-100 relative">
    <header class="sticky z-50 top-0">
        <?php include '../home_page/home_header.php' ?>
    </header>
    <div class="absolute right-4 top-16">
        <form action="fetch_categories_books" method="post" class="flex items-center gap-1 relative z-20 py-4">
            <input type="search" name="search" id="search"
                class="border shadow rounded-lg outline-none p-1 pl-3 text-lg w-80" placeholder="Search any book...">
            <button type="submit"
                class="p-2 py-2 bg-slate-50 text-slate-600 border rounded-r-lg absolute right-0 top-4">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                    </path>
                </svg>
            </button>
        </form>
    </div>
    <section class="w-full h-full px-2 py-7 pt-16 grid place-items-center space-y-6 ">
        <h2 class="font-bold text-3xl underline">Categories Books</h2>
        <div class="flex gap-40 flex-wrap items-center justify-center py-2 mb-10 h-full">
            <?php foreach ($fetch_category_name_data as $key => $value) {
                $category_id = isset($value[0]) ? $value[0] : '';
                $actual_book_name = ucwords(isset($value[1]) ? $value[1] : '');
                $actual_author_name = ucwords(isset($value[2]) ? $value[2] : '');
                $actual_book_image = isset($value[10]) ? $value[10] : '';
                $book_price = isset($value[5]) ? $value[5] : '';

                if (!empty($search)) {
                    if (($search == strtolower($actual_book_name))) {
                        $searchdata = "visible";
                        $data[] = $searchdata;
                    } else {
                        $searchdata = "hidden";
                        $data[] = $searchdata;
                    }
                }
                ?>
                <article class="<?php echo $searchdata ?> w-40 h-52 border text-center rounded-xl cursor-pointer relative">
                    <a href="../rented_book_details/buy_book?book_id=<?php echo $category_id ?>"
                        class=" absolute inset-0 z-10"></a>
                    <div class="w-full h-full rounded-xl relative">
                        <img src="../../Image/<?php echo $actual_book_image ?>" alt="Book1"
                            class="w-full h-full object-cover rounded-xl">
                    </div>
                    <h2 class="font-bold text-lg">
                        <?php echo $actual_book_name ?>
                    </h2>
                    <p class="font-medium ">
                        <?php echo $actual_author_name ?>
                    </p>
                    <!-- <span class="font-bold text-xl pb-6"><?php echo "$" . $book_price ?></span> -->
                </article>
            <?php } ?>

        </div>
    </section>
</body>

</html>