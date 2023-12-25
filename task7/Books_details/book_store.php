<?php
include '../send_fetch_data_from_db.php';
include '../admin_session.php';

$fetch_data_from_db = new fetch_db_data();
$fetch_db_book_data = $fetch_data_from_db->fetchdatafromdb($conn, 'books_details');

$found = false;

$search = (isset($_POST['search'])) ? strtolower($_POST['search']) : '';
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
    <div class="absolute right-4 top-20">
        <form action="../books_details/book_store" method="post" class="flex items-center gap-1 relative z-20 py-4">
            <input type="search" name="search" id="search"
                class="border shadow rounded-lg outline-none p-1 pl-3 text-lg w-80"
                placeholder="Search any category...">
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
    <section class="w-full h-full px-2 py-10 grid place-items-center space-y-8" id="books">
        <h2 class="font-bold text-3xl underline">Our Book Store</h2>
        <div class=" flex items-center justify-center flex-wrap gap-24 p-6">
            <?php foreach ($fetch_db_book_data as $item) {
                $book_id = isset($item[0]) ? $item[0] : "";
                $book_name = isset($item[1]) ? ucwords($item[1]) : "";
                $book_author_name = isset($item[2]) ? $item[2] : "";
                $book_category_name = isset($item[3]) ? $item[3] : "";
                $book_image = isset($item[10]) ? $item[10] : "";

                if ((strpos(strtolower($book_name), $search) !== false) || (strpos(strtolower($book_author_name), $search) !== false) || (strpos(strtolower($book_category_name), $search) !== false)) {
                    $found = true;
                    $searchdata = "visible";
                } else {
                    $searchdata = "hidden";
                }


                $data_not_found = (!$found) ? ('<p class="w-full h-full grid place-items-center">Data not found</p>') : '';

                ?>
                <article class="<?php echo $searchdata ?> w-40 h-52 text-center relative ">
                    <div class="w-full h-full rounded-xl space-y-4">

                        <a href="../rented_book_details/buy_book?book_id=<?php echo $book_id ?>"
                            class=" absolute inset-0 z-10"></a>
                        <img src="../../Image/<?php echo $book_image ?>" alt="Book1"
                            class="w-full h-full object-cover rounded-xl">

                        <h2 class="font-bold text-lg">
                            <?php echo $book_name ?>
                        </h2>

                    </div>
                </article>
            <?php }
            echo $data_not_found;
            ?>

        </div>
    </section>
</body>

</html>