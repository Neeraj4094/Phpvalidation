<?php
// include '../database_connection.php';
include '../send_fetch_data_from_db.php';
include '../admin_session.php';

if ($_SESSION['login'] == null) {
    header("location: ./user_login");
}


$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';

// $login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';
// $user_id_data = $fetch_data_from_db->fetch_data('user_details','user_id', $login_email, $conn, 'user_email');
// $user_id = isset($user_id_data[0][0]) ? $user_id_data[0][0] :'';



$fetch_category_name_query = $fetch_data_from_db->fetchiddata('rented_book_details', $user_id, $conn, 'user_id');
$fetch_category_name_data = mysqli_fetch_all($fetch_category_name_query);


foreach ($fetch_category_name_data as $data) {
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    $id = isset($data[6]) ? $data[6] : '';
    $payment_details = isset($data[14]) ? $data[14] : '';


    if ($payment_details != 'Success') {
        $fetch_id_query = $fetch_data_from_db->fetchiddata('books_details', $id, $conn, 'book_id');
        $fetch_category_id_data[] = mysqli_fetch_all($fetch_id_query);
    }
}
$fetch_id_query = '';
$login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';

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

<body class=" w-full h-full bg-slate-100">
    <header>
        <?php include '../home_page/home_header.php' ?>
    </header>

    <section class="w-full h-full px-2 py-7 mb-12 grid place-items-center space-y-6 ">
        <h2 class="font-bold text-3xl underline">Your Orders</h2>
        <div class="flex gap-40 flex-wrap items-center justify-center py-2 mb-10 h-full">
            <?php
            if (empty($fetch_category_id_data)) {
                $add_books = '<div class="flex pt-32 items-center justify-center"> <a href="./add_books.php" class=" px-8 py-2 font-semibold text-xl text-slate-600">No orders </a> </div>';
                echo $add_books;
            } else {
                foreach ($fetch_category_id_data as $id_data) {
                    $book_id = isset($id_data[0][0]) ? $id_data[0][0] : '';
                    $book_name = isset($id_data[0][1]) ? ucwords($id_data[0][1]) : '';
                    $book_author = isset($id_data[0][2]) ? $id_data[0][2] : '';
                    $book_price = isset($id_data[0][5]) ? $id_data[0][5] : '';
                    $book_image = isset($id_data[0][10]) ? $id_data[0][10] : '';
                    $rented_book_details = [$book_id, $user_id];
                    $rented_book_array = implode(',', $rented_book_details);

                    ?>
                    <article class="w-40 h-52 border text-center rounded-xl cursor-pointer relative">
                        <a href="./book_return_form?rented_book_details=<?php echo $rented_book_array ?>"
                            class=" absolute inset-0 z-10"></a>
                        <div class="w-full h-full rounded-xl relative">
                            <img src="../../Image/<?php echo $book_image ?>" alt="Books"
                                class="w-full h-full object-cover rounded-xl">
                        </div>
                        <h2 class="font-bold pt-1 text-lg">
                            <?php echo $book_name ?>
                        </h2>
                        <p class="font-medium ">
                            <?php echo $book_author ?>
                        </p>
                        <span class="font-bold text-lg">
                            <?php echo "$" . $book_price ?>
                        </span>
                    </article>
                <?php }
            } ?>

        </div>
    </section>
</body>

</html>