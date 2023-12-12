<?php
// include 'database_connection.php';
include 'send_fetch_data_from_db.php';
include 'admin_session.php';

$fetch_data_from_db = new fetch_data_from_db();
$category_name = isset($_GET['book_category']) ? $_GET['book_category'] :'';

$fetch_category_name_query = $fetch_data_from_db->fetchiddata('books_details', $category_name, $conn, 'book_category');
$fetch_category_name_data = mysqli_fetch_all($fetch_category_name_query);

$fetch_id_query = '';
$show_login_data = '';
$login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';

$cancel_login = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login_page"])) {
        if(empty($login_email)){
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
<header class="w-full p-2 px-4 flex justify-between items-center border shadow">
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
                        href="book_return_details/return_home_page.php?email=<?php echo $login_email ?>">Your Orders</a></li>
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
            <!-- <button data-toggle="tooltip" data-placement="top" title="Return" class="p-1 border rounded-full shadow">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M7 5C7 6.10457 6.10457 7 5 7C3.89543 7 3 6.10457 3 5C3 3.89543 3.89543 3 5 3C6.10457 3 7 3.89543 7 5ZM21 5C21 6.10457 20.1046 7 19 7C17.8954 7 17 6.10457 17 5C17 3.89543 17.8954 3 19 3C20.1046 3 21 3.89543 21 5ZM7 19C7 20.1046 6.10457 21 5 21C3.89543 21 3 20.1046 3 19C3 17.8954 3.89543 17 5 17C6.10457 17 7 17.8954 7 19ZM8 5C8 5.35064 7.93985 5.68722 7.82929 6H12.5C12.7761 6 13 6.22386 13 6.5V9H11.5C10.1193 9 9 10.1193 9 11.5V13H6.5C6.22386 13 6 12.7761 6 12.5V7.82929C5.68722 7.93985 5.35064 8 5 8C4.64936 8 4.31278 7.93985 4 7.82929V12.5C4 13.8807 5.11929 15 6.5 15H9V17.5C9 18.8801 10.1183 19.999 11.4982 20C11.1772 19.2304 11 18.3859 11 17.5V11.5C11 11.2239 11.2239 11 11.5 11H17.5C18.3859 11 19.2304 11.1772 20 11.4982C19.999 10.1183 18.8801 9 17.5 9H15V6.5C15 5.11929 13.8807 4 12.5 4H7.82929C7.93985 4.31278 8 4.64936 8 5ZM23 17.5C23 20.5376 20.5376 23 17.5 23C14.4624 23 12 20.5376 12 17.5C12 14.4624 14.4624 12 17.5 12C20.5376 12 23 14.4624 23 17.5ZM15.7071 16L16.3536 15.3536C16.5488 15.1583 16.5488 14.8417 16.3536 14.6464C16.1583 14.4512 15.8417 14.4512 15.6464 14.6464L14.1464 16.1464C13.9512 16.3417 13.9512 16.6583 14.1464 16.8536L15.6464 18.3536C15.8417 18.5488 16.1583 18.5488 16.3536 18.3536C16.5488 18.1583 16.5488 17.8417 16.3536 17.6464L15.7071 17H17.75C18.9926 17 20 18.0074 20 19.25V19.5C20 19.7761 20.2239 20 20.5 20C20.7761 20 21 19.7761 21 19.5V19.25C21 17.4551 19.5449 16 17.75 16H15.7071Z" fill="currentColor"></path></svg>
            </button> -->
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <?php echo $login_image ?>
            </form>
            <?php echo $show_login_data ?>
        </div>
    </header>
    <section class="w-full h-full px-2 py-7 mb-12 grid place-items-center space-y-6 ">
        <h2 class="font-bold text-3xl">Categories Books</h2>
        <div class="flex gap-40 flex-wrap items-center justify-center py-2 mb-10 h-full">
            <?php foreach ($fetch_category_name_data as $key => $value) {
                $category_id = isset($value[0]) ? $value[0] : '';
                $actual_book_name = ucwords(isset($value[1]) ? $value[1] : '');
                $actual_author_name = ucwords(isset($value[2]) ? $value[2] : '');
                $actual_book_image = isset($value[10]) ? $value[10] : '';
                $book_price = isset($value[5]) ? $value[5] :'';
                
                ?>
                <article class="w-60 h-80 border text-center rounded-xl cursor-pointer relative">
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