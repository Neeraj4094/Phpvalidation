<?php
include '../send_fetch_data_from_db.php';
include '../admin_session.php';

$found = $data_not_found = $search = '';
$fetch_data_from_db = new fetch_db_data();
$category_table_data = $fetch_data_from_db->fetchdatafromdb($conn, 'category_details');
foreach ($category_table_data as $data) {
    $category_name_list[] = isset($data[1]) ? $data[1] : '';
}

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
        <form action="../categories_details/book_categories" method="post" class="flex items-center gap-1 relative z-20 py-4">
            
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
    <section class="w-full h-full px-2 py-7 pt-20 grid place-items-center space-y-6 ">
        <h2 class="font-bold text-3xl underline">Books Categories</h2>
        <div class="flex gap-20 flex-wrap items-center justify-center py-2 px-20 mb-10 h-full">
            <?php foreach ($category_table_data as $key => $value) {
                $category_id = isset($value[0]) ? $value[0] : '';
                $category_name = ucwords(isset($value[1]) ? $value[1] : '');
                $category = $category_name;
                $book_image = isset($value[3]) ? $value[3] : '';
                
                if (strpos(strtolower($category_name), $search) !== false) {
                    $found = true;
                    $searchdata = "visible";
                }else{
                    $searchdata = "hidden";
                }
                    
                if (!$found) {
                    $data_not_found = '<p class="w-full h-full grid place-items-center border">Data not found</p>';
                }

                ?>
                <article
                    class="<?php echo $searchdata ?> w-40 h-56 space-y-3 text-center rounded-xl cursor-pointer relative">
                    <a href="fetch_categories_books?book_category=<?php echo $category_name ?>"
                        class=" absolute inset-0 z-10"></a>
                    <div class="w-full h-full rounded-xl relative">
                        <img src="../../Image/<?php echo $book_image ?>" alt="Book1"
                            class="w-full h-full object-cover rounded-xl">
                    </div>
                    <h2 class="font-bold text-xl">
                        <?php echo $category_name ?>
                    </h2>
                </article>
            <?php } 
            echo $data_not_found;
            ?>

        </div>
    </section>
</body>

</html>