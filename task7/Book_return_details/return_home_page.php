<?php
// include '../database_connection.php';
include '../send_fetch_data_from_db.php';
include '../admin_session.php';

$fetch_data_from_db = new fetch_data_from_db();
$user_email = isset($_GET['email']) ? $_GET['email'] :'';

// $admin_fetch_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, 'books_details');
$fetch_category_name_query = $fetch_data_from_db->fetchiddata('rented_book_details', $user_email, $conn, 'user_email');
$fetch_category_name_data = mysqli_fetch_all($fetch_category_name_query);
foreach($fetch_category_name_data as $data){
    $id = isset($data[7]) ? $data[7] :'';
    $payment_details = isset($data[15]) ? $data[15] :'';
    
    if($payment_details != 'Success'){
    $fetch_id_query = $fetch_data_from_db->fetchiddata('books_details', $id, $conn, 'book_id');
    $fetch_id_data[] = mysqli_fetch_all($fetch_id_query);
    }
}
$fetch_id_query = '';
$login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login_page"])) {
        if(empty($login_email)){
        $show_login_data = '<div class="grid font-semibold place-items-center w-60 h-60 border rounded-xl shadow z-20 bg-black/40 fixed right-2 top-1 text-black">
        <a href="return_home_page.php?email=' . $user_email . '"><span class=" text-white font-bold text-2xl absolute top-2 right-2">
        <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2.939 12.789L10 11.729l-3.061 3.06-1.729-1.728L8.271 10l-3.06-3.061L6.94 5.21 10 8.271l3.059-3.061 1.729 1.729L11.729 10l3.06 3.061-1.728 1.728z"></path></svg>
        </span></a>
        <div class="grid place-items-center gap-4">
        <button type="submit" name="login_page" data-toggle="tooltip" data-placement="top" title="Login" class="w-auto p-1 border rounded-full shadow">
        <svg class="w-8 h-8 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                <path
                    d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z">
                </path>
            </svg>
            </button>
            <h2 class=" text-lg font-semibold text-white">Hello User</h2>
        <a href="../user_details/user_login.php" class=" bg-slate-100 p-2 rounded-lg">Click to Login</a>
        </div>
        </div>';
        } else {
            $show_login_data = '<div class="grid font-semibold place-items-center w-60 h-60 border rounded-xl shadow z-20 bg-black/40 fixed right-2 top-1 text-black">
        <a href="return_home_page.php?email=' . $user_email . '"><span class=" text-white font-bold text-2xl absolute top-2 right-2">
        <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2.939 12.789L10 11.729l-3.061 3.06-1.729-1.728L8.271 10l-3.06-3.061L6.94 5.21 10 8.271l3.059-3.061 1.729 1.729L11.729 10l3.06 3.061-1.728 1.728z"></path></svg>
        </span></a>
        <div class="grid place-items-center gap-4">
        <button type="submit" name="login_page" data-toggle="tooltip" data-placement="top" title="Login" class="w-auto p-1 border rounded-full shadow">
        <svg class="w-8 h-8 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                <path
                    d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z">
                </path>
            </svg>
            </button>
            <h2 class=" text-lg font-semibold text-white">Hello User</h2>
        <a href="../user_details/user_logout.php" class=" bg-slate-100 p-2 rounded-lg">Click to Logout</a>
        </div>
        </div>';
        }
    }
}

$fetch_query = $fetch_data_from_db->fetchiddata('user_details', $login_email, $conn, 'user_email');
$fetch_data = mysqli_fetch_all($fetch_query);
$user_name = isset($fetch_data[0][1]) ? $fetch_data[0][1] : '';

if(!empty($_SESSION['login'])){
    $login_user_name = substr($user_name,0,1);
    $login_image = '<button type="submit" name="login_page" data-toggle="tooltip" data-placement="top" title="Login"
    class="p-1 border rounded-full shadow"><div class="w-10 h-10 rounded-full border grid place-items-center bg-slate-200 shadow font-bold text-2xl">' .
        $login_user_name .
    '</div></button>';
}else{
    $login_image = '<button type="submit" name="login_page" data-toggle="tooltip" data-placement="top" title="Login"
    class="p-1 border rounded-full shadow">
    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
        <path
            d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z">
        </path>
    </svg>
    </button>';
}
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
<header class="w-full p-2 px-4 flex justify-between items-center border">
        <div class="w-16 h-16 ">
            <img src="../../Image/Ucodelogo.png" alt="Ucodelogo"
                class="w-full h-full object-cover border rounded-full shadow shadow-black">
        </div>
        <nav>
            <ul class="flex gap-6">
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a href="#">Home</a></li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a href="#category">Categories</a>
                </li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a href="#">Books</a></li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a
                        href="#">Your Orders</a></li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a href="user_details/user_login.php">Sign Up</a></li>

            </ul>
        </nav>
        <div class="px-1 relative flex items-center gap-4">
            <form action="" method="post" class="flex items-center gap-1 relative">
                <input type="search" name="search" id="search" class="border shadow rounded-lg outline-none p-2 w-96"
                    placeholder="Search...">
                <button type="submit" class="p-2 pt-3 bg-slate-100 border rounded-r-lg absolute right-0 top-0">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                        </path>
                    </svg>
                </button>
            </form>
            <button class=" shadow rounded-lg" aria-label="Cart" data-toggle="tooltip" data-placement="left"
                title="View Cart">

                <div class="p-2 border rounded-lg hover:bg-slate-100">
                    <svg class="w-6 h-6  " xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                        </path>
                    </svg>
                </div>
            </button>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <?php echo $login_image ?>
            </form>
            <?php echo $show_login_data ?>
        </div>
    </header>
    <section class="w-full h-full px-2 py-7 mb-12 grid place-items-center space-y-6 ">
        <h2 class="font-bold text-3xl">Categories Books</h2>
        <div class="flex gap-40 flex-wrap items-center justify-center py-2 mb-10 h-full">
            <?php 
            if(empty($fetch_id_data)){
                $add_books = '<div class="flex pt-32 items-center justify-center"> <a href="./add_books.php" class=" px-8 py-2 font-semibold text-xl text-slate-600">No orders </a> </div>';
                echo $add_books;
            }else{
            foreach($fetch_id_data as $id_data){
                    $book_id = isset($id_data[0][0]) ? $id_data[0][0] :'';
                    $book_name = isset($id_data[0][1]) ? ucwords($id_data[0][1]) :'';
                    $book_author = isset($id_data[0][2]) ? $id_data[0][2] :'';
                    $book_price = isset($id_data[0][5]) ? $id_data[0][5] :'';
                    $book_image = isset($id_data[0][10]) ? $id_data[0][10] :'';
                
                ?>
                <article class="w-60 h-80 border text-center rounded-xl cursor-pointer relative">
                    <a href="./book_return_form.php?user_email=<?php echo $user_email ?>" class=" absolute inset-0 z-10"></a>
                    <div class="w-full h-full rounded-xl relative">
                        <img src="../../Image/<?php echo $book_image ?>" alt="Books"
                            class="w-full h-full object-cover rounded-xl">
                    </div>
                    <h2 class="font-bold text-2xl">
                        <?php echo $book_name ?>
                    </h2>
                    <p class="font-medium ">
                        <?php echo $book_author ?>
                    </p>
                    <span class="font-bold text-xl pb-6"><?php echo "$" . $book_price ?></span>
                </article>
            <?php } } ?>

        </div>
    </section>
</body>

</html>