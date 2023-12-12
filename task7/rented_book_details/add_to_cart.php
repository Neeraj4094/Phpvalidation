<?php
// include 'database_connection.php';
// include '../send_fetch_data_from_db.php';
// include '../admin_session.php';
include 'book_fetch_validation.php';


$fetch_data_from_db = new fetch_data_from_db();

$fetch_cart_data = $fetch_data_from_db->fetchdatafromdb($conn, 'cart_details');

$fetch_id_query = '';
$show_login_data = '';
$login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';

$cancel_login = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login_page"])) {
        if (empty($login_email)) {
            $show_login_data = '<div class="grid font-semibold place-items-center w-60 h-60 border rounded-xl shadow z-20 bg-black/40 fixed right-2 top-1 text-black">
        <a href="fetch_categories_books.php?book_category=' . $category_name . '"><span class=" text-white font-bold text-2xl absolute top-2 right-2">
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
        <a href="user_details/user_login.php" class=" bg-slate-100 p-2 rounded-lg">Click to Login</a>
        </div>
        </div>';
        } else {
            $show_login_data = '<div class="grid font-semibold place-items-center w-60 h-60 border rounded-xl shadow z-20 bg-black/40 fixed right-2 top-1 text-black">
        <a href="fetch_categories_books.php?book_category=' . $category_name . '"><span class=" text-white font-bold text-2xl absolute top-2 right-2">
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
        <a href="user_details/user_logout.php" class=" bg-slate-100 p-2 rounded-lg">Click to Logout</a>
        </div>
        </div>';
        }
    }
}

$fetch_id_query = $fetch_data_from_db->fetchiddata('user_details', $login_email, $conn, 'user_email');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);
$user_name = isset($fetch_id_data[0][1]) ? $fetch_id_data[0][1] : '';

if (!empty($_SESSION['login'])) {
    $login_user_name = substr($user_name, 0, 1);
    $login_image = '<button type="submit" name="login_page" data-toggle="tooltip" data-placement="top" title="Login"
    class="p-1 border rounded-full shadow"><div class="w-10 h-10 rounded-full border grid place-items-center bg-slate-200 shadow font-bold text-2xl">' .
        $login_user_name .
        '</div></button>';
} else {
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
    <h2 class="w-full border text-center bg-green-50 text-slate-800 fixed top-0 z-10 shadow">
        <?php
        echo $errmsg;

        ?>
    </h2>
    <header class="w-full p-2 px-4 flex justify-between items-center border shadow bg-white">
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
                        href="book_return_details/return_home_page.php?email=<?php echo $login_email ?>">Your Orders</a>
                </li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a
                        href="user_details/user_login.php">Sign Up</a></li>

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
            <!-- <button data-toggle="tooltip" data-placement="top" title="Return" class="p-1 border rounded-full shadow">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M7 5C7 6.10457 6.10457 7 5 7C3.89543 7 3 6.10457 3 5C3 3.89543 3.89543 3 5 3C6.10457 3 7 3.89543 7 5ZM21 5C21 6.10457 20.1046 7 19 7C17.8954 7 17 6.10457 17 5C17 3.89543 17.8954 3 19 3C20.1046 3 21 3.89543 21 5ZM7 19C7 20.1046 6.10457 21 5 21C3.89543 21 3 20.1046 3 19C3 17.8954 3.89543 17 5 17C6.10457 17 7 17.8954 7 19ZM8 5C8 5.35064 7.93985 5.68722 7.82929 6H12.5C12.7761 6 13 6.22386 13 6.5V9H11.5C10.1193 9 9 10.1193 9 11.5V13H6.5C6.22386 13 6 12.7761 6 12.5V7.82929C5.68722 7.93985 5.35064 8 5 8C4.64936 8 4.31278 7.93985 4 7.82929V12.5C4 13.8807 5.11929 15 6.5 15H9V17.5C9 18.8801 10.1183 19.999 11.4982 20C11.1772 19.2304 11 18.3859 11 17.5V11.5C11 11.2239 11.2239 11 11.5 11H17.5C18.3859 11 19.2304 11.1772 20 11.4982C19.999 10.1183 18.8801 9 17.5 9H15V6.5C15 5.11929 13.8807 4 12.5 4H7.82929C7.93985 4.31278 8 4.64936 8 5ZM23 17.5C23 20.5376 20.5376 23 17.5 23C14.4624 23 12 20.5376 12 17.5C12 14.4624 14.4624 12 17.5 12C20.5376 12 23 14.4624 23 17.5ZM15.7071 16L16.3536 15.3536C16.5488 15.1583 16.5488 14.8417 16.3536 14.6464C16.1583 14.4512 15.8417 14.4512 15.6464 14.6464L14.1464 16.1464C13.9512 16.3417 13.9512 16.6583 14.1464 16.8536L15.6464 18.3536C15.8417 18.5488 16.1583 18.5488 16.3536 18.3536C16.5488 18.1583 16.5488 17.8417 16.3536 17.6464L15.7071 17H17.75C18.9926 17 20 18.0074 20 19.25V19.5C20 19.7761 20.2239 20 20.5 20C20.7761 20 21 19.7761 21 19.5V19.25C21 17.4551 19.5449 16 17.75 16H15.7071Z" fill="currentColor"></path></svg>
            </button> -->
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <?php echo $login_image ?>
            </form>
            <?php echo $show_login_data ?>
        </div>
    </header>
    <section class="w-full h-full py-7 mb-12 grid place-items-center gap-8 px-20">
        <h2 class="font-bold text-3xl">My Cart</h2>
        <div class=" w-3/5 border p-4 rounded-xl bg-white space-y-6">
        <form action="add_to_cart" method="post" class="space-y-2">
            <?php
            $edit = '<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="none" viewBox="0 0 24 24">
            <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
            <path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path>
            </svg>';
            $locked = '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 24" fill="currentColor"><path d="m3.5 6.5v3.5h-1.5c-1.105 0-2 .895-2 2v10c0 1.105.895 2 2 2h16c1.105 0 2-.895 2-2v-10c0-1.105-.895-2-2-2h-1.5v-3.5c0-3.59-2.91-6.5-6.5-6.5s-6.5 2.91-6.5 6.5zm2.5 3.5v-3.5c0-2.209 1.791-4 4-4s4 1.791 4 4v3.5zm2 5.5c0-1.105.895-2 2-2s2 .895 2 2c0 .701-.361 1.319-.908 1.676l-.008.005s.195 1.18.415 2.57v.001c0 .414-.335.749-.749.749-.001 0-.001 0-.002 0h-1.499-.001c-.414 0-.749-.335-.749-.749v-.001l.415-2.57c-.554-.361-.916-.979-.916-1.68z"></path></svg>';
            $delete = '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><path d="M7 3H9C9 2.44772 8.55228 2 8 2C7.44772 2 7 2.44772 7 3ZM6 3C6 1.89543 6.89543 1 8 1C9.10457 1 10 1.89543 10 3H14C14.2761 3 14.5 3.22386 14.5 3.5C14.5 3.77614 14.2761 4 14 4H13.4364L12.2313 12.8378C12.0624 14.0765 11.0044 15 9.75422 15H6.24578C4.99561 15 3.93762 14.0765 3.76871 12.8378L2.56355 4H2C1.72386 4 1.5 3.77614 1.5 3.5C1.5 3.22386 1.72386 3 2 3H6ZM7 6.5C7 6.22386 6.77614 6 6.5 6C6.22386 6 6 6.22386 6 6.5V11.5C6 11.7761 6.22386 12 6.5 12C6.77614 12 7 11.7761 7 11.5V6.5ZM9.5 6C9.22386 6 9 6.22386 9 6.5V11.5C9 11.7761 9.22386 12 9.5 12C9.77614 12 10 11.7761 10 11.5V6.5C10 6.22386 9.77614 6 9.5 6Z" fill="currentColor"></path></svg>';
            $no_delete = '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M3.93931 5L2.21966 3.28032C1.92677 2.98743 1.92678 2.51255 2.21968 2.21966C2.51257 1.92677 2.98745 1.92678 3.28034 2.21968L21.7801 20.7198C22.073 21.0127 22.073 21.4876 21.7801 21.7805C21.4872 22.0734 21.0123 22.0734 20.7194 21.7805L18.5293 19.5903C17.9867 21.0098 16.6131 22 15.0263 22H8.97369C7.04254 22 5.42715 20.5334 5.24113 18.6112L4.06908 6.5H2.75C2.33579 6.5 2 6.16421 2 5.75C2 5.33579 2.33579 5 2.75 5H3.93931ZM17.2782 18.3392L15 16.0609V17.25C15 17.6642 14.6642 18 14.25 18C13.8358 18 13.5 17.6642 13.5 17.25V14.5609L10.5 11.5608V17.25C10.5 17.6642 10.1642 18 9.75 18C9.33579 18 9 17.6642 9 17.25V10.0608L5.59074 6.65147L6.73416 18.4667C6.84577 19.62 7.815 20.5 8.97369 20.5H15.0263C16.185 20.5 17.1542 19.62 17.2658 18.4667L17.2782 18.3392ZM13.5 10.3185L15 11.8186V9.75C15 9.33579 14.6642 9 14.25 9C13.8358 9 13.5 9.33579 13.5 9.75V10.3185ZM18.4239 6.5L17.6525 14.4711L19.0265 15.8452L19.9309 6.5H21.25C21.6642 6.5 22 6.16421 22 5.75C22 5.33579 21.6642 5 21.25 5H15.5C15.5 3.067 13.933 1.5 12 1.5C10.067 1.5 8.5 3.067 8.5 5H8.18156L9.68153 6.5H18.4239ZM14 5H10C10 3.89543 10.8954 3 12 3C13.1046 3 14 3.89543 14 5Z" fill="currentColor"></path></svg>';
            $add_cart = '<div class="font-medium text-xl w-full text-center">You have no Cart</div>';
            if(empty($fetch_cart_data)){
                echo $add_cart; ?>
                <div class="flex w-full h-full items-center justify-center"> <a href="../books_details/add_books.php" class="bg-blue-600 text-white rounded-lg shadow px-8 py-2 cursor-pointer">Add Cart</a></div>
            
            <?php }else{
            foreach ($fetch_cart_data as $key => $value) {
                $book_id = isset($value[1]) ? $value[1] : '';
                $user_email = isset($value[2]) ? $value[2] : '';
                if ($login_email == $user_email) {
                    $fetch_cart_query = $fetch_data_from_db->fetchiddata('books_details', $book_id, $conn, 'book_id');
                    $fetch_user_cart_data = mysqli_fetch_all($fetch_cart_query);
                    foreach ($fetch_user_cart_data as $value) {

                        $book_id = isset($value[0]) ? $value[0] : "";
                        $book_name = isset($value[1]) ? ucwords($value[1]) : "";
                        $book_author = isset($value[2]) ? $value[2] : "";
                        $book_category = isset($value[3]) ? $value[3] : "";
                        $book_copies = isset($value[4]) ? $value[4] : "";
                        $book_price = isset($value[5]) ? $value[5] : "";
                        $book_image = isset($value[10]) ? $value[10] : "";

                        ?>
                        <div class="flex items-center gap-4">
                        <input type="checkbox" value="<?php echo $book_id ?>" name="select_to_cart[]" id="<?php echo $book_id ?>" class="w-4 h-4">
                        <label for="<?php echo $book_id ?>">
                            <div class=" w-full grid gap-2 py-2 sm:block md:grid mt-2 rounded-md border shadow">
                                <div class=" flex justify-between items-start p-2 gap-4 relative">
                                    <div class=" flex justify-between items-start gap-4 ">
                                        <div class=" w-28 h-40 flex items-center justify-center rounded-md">
                                            <?php
                                            if ($book_image != "") {
                                                $images = "../../Image/" . $book_image;
                                                $res = "<img src='$images' alt='Image ' class='w-full h-full rounded-md object-cover flex items-center justify-center'>";
                                                echo "$res<br>";
                                            } else {
                                                $col = '<div class= "flex items-center justify-center w-8 h-8"><svg class="w-full h-full text-slate-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"></path></svg></div>';
                                                echo "$col<br>";
                                            }
                                            ?>
                                        </div>
                                        <div class=" space-y-8">
                                            <div class="flex gap-8 items-start ">
                                                <div>
                                                    <div class="font-semibold">
                                                        <h2 class="">
                                                            <?php echo "Book: " . $book_name ?>
                                                        </h2>
                                                        <p class="">
                                                            <?php echo "Category :- " . $book_category ?>
                                                        </p>
                                                        <p>
                                                            <?php echo "Author :- " . $book_author ?>
                                                        </p>
                                                    </div>
                                                    <p class=" font-normal">
                                                        <?php echo "Available :- " . $book_copies . " copies" ?>
                                                    </p>
                                                </div>
                                                <div class="flex items-start justify-between gap-3 pt-1 ">
                                                    <p class=" bg-purple-500 text-white px-3 py-1 rounded-md">
                                                        <?php echo "Price:-" . $book_price ?>
                                                    </p>
                                                    <a href="delete_cart.php?book_id=<?php echo $book_id ?>" data-toggle="tooltip" data-placement="top" title="Delete"
                                                        class="border-2 px-4 py-1 rounded-md">
                                                        <?php echo $delete ?>
                                                    </a>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </label>
                        </div>
                    <?php }
                }
            } ?>
            
            <input type="submit" name="select_cart" value="Buy Now" class=" bg-blue-600 text-white px-3 py-1 cursor-pointer rounded-md text-center font-semibold">
            <?php } ?>
        </form>
        </div>
    </section>
</body>

</html>