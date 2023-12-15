<?php
// include 'database_connection.php';
include 'send_fetch_data_from_db.php';
include 'admin_session.php';

$fetch_data_from_db = new fetch_db_data();
$fetch_book_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, 'category_details');
$fetch_user_review_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, 'user_review_details');
$show_login_data = '';
$login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';

$cancel_login = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login_page"])) {
        if (empty($login_email)) {
            $show_login_data = '<div class="grid font-semibold place-items-center w-60 h-60 border rounded-xl shadow z-20 bg-black/40 fixed right-2 top-1 text-black">
        <a href="book_home.php"><span class=" text-white font-bold text-2xl absolute top-2 right-2">
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
        <a href="book_home.php"><span class=" text-white font-bold text-2xl absolute top-2 right-2">
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

// $background = '<svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M14.1996 12.3415C13.5685 12.7577 12.8125 13 12 13C9.79086 13 8 11.2091 8 9C8 6.79086 9.79086 5 12 5C14.029 5 15.7051 6.51068 15.965 8.46862C16.3297 10.2611 16.4722 12.416 15.7577 14.3665C14.9923 16.4562 13.2939 18.1714 10.2533 18.9674C9.71898 19.1073 9.17247 18.7875 9.0326 18.2533C8.89273 17.719 9.21246 17.1725 9.74674 17.0326C12.2061 16.3887 13.3577 15.1039 13.8798 13.6786C14.0354 13.2536 14.1391 12.8047 14.1996 12.3415Z" fill="currentColor"></path></svg>';

// $book_category_data = array_unique($actual_book_category_name);
// $category_array = array_values($book_category_data);

// 
// $maxCount = max(count($user), count($books));
// echo $maxCount;

// for ($row = 0; $row <= $maxCount; $row++) {
//     // echo $row;
//     echo "<pre>";
//     // print_r($image_array);
//     if (isset($image_array[$row])) {
//         echo $image_array[$row];
//     }


//     if (isset($category_array[$row])) {
//         echo $category_array[$row];
//     }
//     echo "</pre>";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Raj">
    <meta name="description" content="This is Product page">
    <link rel="stylesheet" href="../dist/output.css">
    <title>Document</title>
</head>

<body class="relative w-full h-full">
    <header class="w-full p-2 px-4 flex justify-between items-center border shadow">
        <div class="w-16 h-16 ">
            <img src="../Image/Ucodelogo.png" alt="Ucodelogo"
                class="w-full h-full object-cover border rounded-full shadow shadow-black">
        </div>
        <nav>
            <ul class="flex items-center gap-2">
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a href="#">Home</a></li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a href="#category">Categories</a>
                </li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a href="#">Books</a></li>
                <li class="hover:text-slate-400 hover:bg-black p-2 px-3 rounded-lg"><a
                        href="book_return_details/return_home_page.php?email=<?php echo $login_email ?>">User
                        Details</a></li>
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
            <a href="renting_books/add_to_cart.php" class="p-2 border rounded-lg hover:bg-slate-100">
                <svg class="w-6 h-6  " xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                    </path>
                </svg>
            </a>
            <form action="user_reviews.php" method="post">
                <button data-toggle="tooltip" data-placement="top" title="Review" class="border-2 px-4 py-1 rounded-md">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor">
                        <defs></defs>
                        <title>Review</title>
                        <rect x="18" y="26" width="8" height="2"></rect>
                        <rect x="18" y="22" width="12" height="2"></rect>
                        <rect x="18" y="18" width="12" height="2"></rect>
                        <polygon
                            points="20.549 11.217 16 2 11.451 11.217 1.28 12.695 8.64 19.87 6.902 30 14 26.269 14 24.009 9.559 26.344 10.611 20.208 10.789 19.171 10.036 18.438 5.578 14.091 11.739 13.196 12.779 13.045 13.245 12.102 16 6.519 18.755 12.102 19.221 13.045 20.261 13.196 27.715 14.281 28 12.3 20.549 11.217">
                        </polygon>
                        <rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>" class="cls-1" width="32"
                            height="32" style="fill: none"></rect>
                    </svg>
                </button>
            </form>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <?php echo $login_image ?>
            </form>

            <?php echo $show_login_data ?>
        </div>
    </header>
    <main class="w-full h-full">
        <section class="grid place-items-center text-center text-white w-full h-full py-44 relative">
            <div
                class="after:content-[''] after:absolute after:top-0 after:left-0 after:bg-[url('https://cdn.pixabay.com/photo/2023/11/06/13/17/ai-generated-8369584_1280.jpg')] after:w-full after:h-full  after:bg-cover after:bg-bottom after:z-10 after:opacity-90">
            </div>
            <div
                class="after:content-[''] after:absolute after:inset-0 after:w-full after:h-full after:bg-gradient-to-t after:from-black after:to-transparent ">
            </div>
            <div class="z-20 space-y-4">
                <h1 class="font-semibold text-2xl "><span class="text-slate-50s font-bold text-3xl p-1">UcodeSoft</span>
                    Personal Book Store</h1>
                <span>Buy any programming book on Rent.</span>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis, nobis?</p>
            </div>
            <div class="py-2 absolute bottom-20 z-20">
                <button type="button"
                    class="px-4 py-2 font-semibold border bg-indigo-600 text-blue-50 rounded-lg flex items-center gap-2 "><span>Rent
                        Now</span>
                    <div class="pt-1">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </section>
        <section class="w-full h-full px-2 py-10 grid place-items-center space-y-8" id="category">
            <h2 class="font-bold text-3xl">Books Categories</h2>
            <div class=" flex items-center justify-center flex-wrap gap-20 p-6">
                <?php foreach ($fetch_book_data_from_db as $item) {
                    $category_name = isset($item[1]) ? $item[1] : "";
                    $image = isset($item[3]) ? $item[3] : "";
                    // $more_images = '<svg class="w-20 h-20 absolute top-0 right-0 inset-0 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"></path></svg>'
                    ?>
                    <article class="w-60 h-80 text-center relative ">
                        <div class="w-full h-full rounded-xl space-y-4">
                            <a href="../fetch_categories_books?book_category=<?php echo $category_name ?>"
                                class=" absolute inset-0 z-10"></a>
                            <img src="../Image/<?php echo $image ?>" alt="Book1"
                                class="w-full h-full object-cover rounded-xl">

                            <h2 class="font-bold text-2xl">
                                <?php echo $category_name ?>
                            </h2>

                        </div>
                    </article>
                <?php } ?>

            </div>
        </section>
        <section class="w-full h-full grid place-items-center py-16 px-6 mt-12 bg-slate-50 space-y-6">
            <h2 class="font-bold text-3xl">User Reviews</h2>
            <div class=" overflow-auto w-full flex items-center justify-center gap-4 p-4 border shadow">
                <?php
                foreach ($fetch_user_review_data_from_db as $value) {
                    $user_name = isset($value[2]) ? $value[2] : '';
                    $user_review = isset($value[3]) ? $value[3] : '';
                    $user_rating = isset($value[4]) ? $value[4] : '';
                    ?>
                    <article
                        class="w-96 h-64 border rounded-xl flex items-center justify-center px-5 py-8 bg-white relative">
                        <div class=" w-full text-center">
                            <div class="grid place-items-center">
                                <div class="p-1 absolute left-6 top-6">
                                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="inline-block h-7 w-7 pr-2" viewBox="0 0 24 24">
                                        <path
                                            d="M13 14.725c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275zm-13 0c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275z" />
                                    </svg>
                                </div>
                                <div class="grid place-items-center">
                                    <div class="w-12 h-12 flex justify-center">
                                        <?php
                                        $col = '<svg class="w-full h-full object-cover text-slate-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"></path></svg>';
                                        echo "$col<br>";
                                        ?>
                                    </div>
                                    <h2 class="py-2 text-xl font-semibold">
                                        <?php echo $user_name ?>
                                    </h2>
                                </div>
                                <div class="mb-2 font-semibold text-primary dark:text-primary-500">
                                    <?php if ($user_rating == 5) { ?>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 fill-yellow-300  text-slate-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <svg class="w-4 h-4 fill-yellow-300  text-slate-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <svg class="w-4 h-4 fill-yellow-300  text-slate-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <svg class="w-4 h-4 fill-yellow-300  text-slate-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <svg class="w-4 h-4 fill-yellow-300  text-slate-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"></path>
                                            </svg>

                                        </div>
                                    <?php } elseif ($user_rating == 4) { ?>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 fill-yellow-300  text-slate-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <svg class="w-4 h-4 fill-yellow-300  text-slate-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <svg class="w-4 h-4 fill-yellow-300  text-slate-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <svg class="w-4 h-4 fill-yellow-300  text-slate-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <svg class="w-4 h-4  text-slate-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                                                </path>
                                            </svg>
                                        </div>
                                    <?php } else { ?>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 fill-yellow-300  text-slate-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <svg class="w-4 h-4 fill-yellow-300  text-slate-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <svg class="w-4 h-4 fill-yellow-300  text-slate-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <svg class="w-4 h-4  text-slate-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                                                </path>
                                            </svg>
                                            <svg class="w-4 h-4  text-slate-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z">
                                                </path>
                                            </svg>
                                        </div>
                                    <?php } ?>
                                    </div>
                                <p class="mb-4 space-y-2">
                                    
                                    <span class="pt-2"><?php echo $user_review ?></span>
                                </p>
                            </div>


                        </div>

                    </article>
                <?php } ?>

            </div>
        </section>
    </main>

    <footer class="w-full h-full px-6  bg-slate-900 text-white">
        <div class="px-2 py-16">
            <svg class="w-10 h-10 text-indigo-600" xmlns="http://www.w3.org/2000/svg" version="1.1"
                viewBox="0 0 512 512" fill="currentColor">
                <path
                    d="M128,204.6666718C145.0624084,136.2265015,187.7375946,102,256,102c102.3999939,0,115.2000122,77,166.3999939,89.8333282c34.1376038,8.5598297,64-4.2734985,89.6000061-38.5C494.9375916,221.7734985,452.2623901,256,384,256c-102.3999939,0-115.2000122-77-166.3999939-89.8333282C183.4624023,157.606842,153.6000061,170.4401703,128,204.6666718z M0,358.6666565C17.0623989,290.2265015,59.7375984,256,128,256c102.3999939,0,115.1999969,77,166.3999939,89.8333435c34.1376038,8.5598145,64-4.2734985,89.6000061-38.5C366.9375916,375.7734985,324.2623901,410,256,410c-102.3999939,0-115.1999969-77-166.3999939-89.8333435C55.4624023,311.606842,25.6000004,324.440155,0,358.6666565z">
                </path>
            </svg>
        </div>
        <ul class=" w-full flex gap-2 max-w-7xl flex-wrap">
            <li class="w-full max-w-xs">
                <span class="font-semibold py-2">Solutions</span>
                <ul class=" py-6">
                    <li class="text-slate-300 py-3"><a href="#">Marketing</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Analytics</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Commerce</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Insights</a></li>
                </ul>
            </li>
            <li class="w-full max-w-xs">
                <span class="font-semibold py-2">Support</span>
                <ul class=" py-6">
                    <li class="text-slate-300 py-3"><a href="#">Pricing</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Analytics</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Commerce</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Insights</a></li>
                </ul>
            </li>
            <li class="w-full max-w-xs">
                <span class="font-semibold py-2">Company</span>
                <ul class=" py-6">
                    <li class="text-slate-300 py-3"><a href="#">About</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Blog</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Commerce</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Insights</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Insights</a></li>
                </ul>
            </li>
            <li class="">
                <span class="font-semibold py-2">Legal</span>
                <ul class=" py-6">
                    <li class="text-slate-300 py-3"><a href="#">Claim</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Privacy</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Commerce</a></li>
                </ul>
            </li>
        </ul>
    </footer>

</body>

</html>