<?php
// include 'database_connection.php';
include 'send_fetch_data_from_db.php';
include 'admin_session.php';

// $fetch_data_from_db = new fetch_data_from_db();
$category_name = isset($_GET['book_category']) ? $_GET['book_category'] :'';

$fetch_category_name_query = $fetch_data_from_db->fetchiddata('books_details', $category_name, $conn, 'book_category');
$fetch_category_name_data = mysqli_fetch_all($fetch_category_name_query);

$fetch_id_query = '';
$show_login_data = '';
$login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';

$cancel_login = '';

if(isset($_POST['search'])){
    $search = strtolower($_POST['search']);
}
// echo "<pre>";
// // print_r($fetch_category_name_data);
// echo "</pre>";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST["login_page"])) {
//         if(empty($login_email)){
//         $show_login_data = '<div class="grid font-semibold place-items-center w-60 h-60 border rounded-xl shadow z-20 bg-black/40 fixed right-2 top-1 text-black">
//         <a href="fetch_categories_books.php?book_category=' . $category_name . '"><span class=" text-white font-bold text-2xl absolute top-2 right-2">
//         <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2.939 12.789L10 11.729l-3.061 3.06-1.729-1.728L8.271 10l-3.06-3.061L6.94 5.21 10 8.271l3.059-3.061 1.729 1.729L11.729 10l3.06 3.061-1.728 1.728z"></path></svg>
//         </span></a>
//         <div class="grid place-items-center gap-4">
//         <button type="submit" name="login_page" data-toggle="tooltip" data-placement="top" title="Login" class="w-auto p-1 border rounded-full shadow">
//         <svg class="w-8 h-8 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
//                 <path
//                     d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z">
//                 </path>
//             </svg>
//             </button>
//             <h2 class=" text-lg font-semibold text-white">Hello User</h2>
//         <a href="user_details/user_login.php" class=" bg-slate-100 p-2 rounded-lg">Click to Login</a>
//         </div>
//         </div>';
//         } else {
//             $show_login_data = '<div class="grid font-semibold place-items-center w-60 h-60 border rounded-xl shadow z-20 bg-black/40 fixed right-2 top-1 text-black">
//         <a href="fetch_categories_books.php?book_category=' . $category_name . '"><span class=" text-white font-bold text-2xl absolute top-2 right-2">
//         <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2.939 12.789L10 11.729l-3.061 3.06-1.729-1.728L8.271 10l-3.06-3.061L6.94 5.21 10 8.271l3.059-3.061 1.729 1.729L11.729 10l3.06 3.061-1.728 1.728z"></path></svg>
//         </span></a>
//         <div class="grid place-items-center gap-4">
//         <button type="submit" name="login_page" data-toggle="tooltip" data-placement="top" title="Login" class="w-auto p-1 border rounded-full shadow">
//         <svg class="w-8 h-8 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
//                 <path
//                     d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z">
//                 </path>
//             </svg>
//             </button>
//             <h2 class=" text-lg font-semibold text-white">Hello User</h2>
//         <a href="user_details/user_logout.php" class=" bg-slate-100 p-2 rounded-lg">Click to Logout</a>
//         </div>
//         </div>';
//         }
//     }
// }

$fetch_id_query = $fetch_data_from_db->fetchiddata('user_details', $login_email, $conn, 'user_email');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);
$user_name = isset($fetch_id_data[0][1]) ? $fetch_id_data[0][1] : '';

// if(!empty($_SESSION['login'])){
//     $login_user_name = substr($user_name,0,1);
//     $login_image = '<button type="submit" name="login_page" data-toggle="tooltip" data-placement="top" title="Login"
//     class="p-1 border rounded-full shadow"><div class="w-10 h-10 rounded-full border grid place-items-center bg-slate-200 shadow font-bold text-2xl">' .
//         $login_user_name .
//     '</div></button>';
// }else{
//     $login_image = '<button type="submit" name="login_page" data-toggle="tooltip" data-placement="top" title="Login"
//     class="p-1 border rounded-full shadow">
//     <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
//         <path
//             d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z">
//         </path>
//     </svg>
//     </button>';
// }

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
    <header class="sticky z-50 top-0"><?php include 'home_header.php' ?></header>
    <div class="absolute right-4 top-16">
                <form action="" method="post" class="flex items-center gap-1 relative z-20 py-4">
                    <input type="search" name="search" id="search"
                        class="border shadow rounded-lg outline-none p-1 pl-3 text-lg w-80" placeholder="Search any book...">
                    <button type="submit"
                        class="p-2 py-2 bg-slate-50 text-slate-600 border rounded-r-lg absolute right-0 top-4">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                            </path>
                        </svg>
                    </button>
                </form>
            </div>
    <section class="w-full h-full px-2 py-7 pt-16 grid place-items-center space-y-6 ">
        <h2 class="font-bold text-3xl">Books</h2>
        <div class="flex gap-40 flex-wrap items-center justify-center py-2 mb-10 h-full">
            <?php foreach ($fetch_category_name_data as $key => $value) {
                $category_id = isset($value[0]) ? $value[0] : '';
                $actual_book_name = ucwords(isset($value[1]) ? $value[1] : '');
                $actual_author_name = ucwords(isset($value[2]) ? $value[2] : '');
                $actual_book_image = isset($value[10]) ? $value[10] : '';
                $book_price = isset($value[5]) ? $value[5] :'';
                
                if(!empty($search)){
                    if( ($search == strtolower($actual_book_name))){
                        $searchdata = "visible";
                        $data[] = $searchdata;
                    }else{
                        $searchdata = "hidden";
                        $data[] = $searchdata;
                    }
                }
                ?>
                <article class="<?php echo $searchdata ?> w-60 h-80 border text-center rounded-xl cursor-pointer relative">
                    <a href="../rented_book_details/buy_book?book_id=<?php echo $category_id ?>" class=" absolute inset-0 z-10"></a>
                    <div class="w-full h-full rounded-xl relative">
                        <img src="../../Image/<?php echo $actual_book_image ?>" alt="Book1"
                            class="w-full h-full object-cover rounded-xl">
                    </div>
                    <h2 class="font-bold text-2xl">
                        <?php echo $actual_book_name ?>
                    </h2>
                    <p class="font-medium ">
                        <?php echo $actual_author_name ?>
                    </p>
                    <span class="font-bold text-xl pb-6"><?php echo "$" . $book_price ?></span>
                </article>
            <?php } ?>

        </div>
    </section>
</body>

</html>