<?php
// include "../database_connection.php";
// include "../send_fetch_data_from_db.php";
include "../admin_details/admin_login_validation.php";

if ($_SESSION == null) {
    header("location: ../admin_details/admin_login.php");
}else{
    $page = "Details";
}

$create_date = $modify_date = '';
$tablename = "user_details";
$fetch_data_from_db = new fetch_data_from_db ();
$admin_fetch_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, $tablename);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/output.css">
    <title>Document</title>
</head>

<body class="grid grid-cols-12 grid-rows-6 w-full h-full">

        <aside class=" row-span-6 col-span-2 border px-2 py-2 space-y-3 sm:hidden lg:block">
            <div class="px-2 flex items-center justify-center w-full">
                <div class="w-full h-10 px-4 py-2  bg-white">
                    <img src="../../Image/listerpros.jpg" alt="Logo" class="w-full h-full rounded-lg">
                </div>
            </div>
            <div class="flex relative gap-2 pt-1">
                <a href="#" class="absolute inset-0 z-10"></a>
                <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path
                        d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z">
                    </path>
                </svg>
                <span>Home</span>
            </div>
            <nav class="overflow-auto">
                <ul>
                    <li class="">
                        <span class="text-blue-600 font-medium">General</span>
                        <ul class="px-2 space-y-2">
                            <li>
                                <div class="flex items-center gap-2 relative pt-2">
                                    <a href="../admin_details/admin_dashboard.php" class="absolute inset-0 z-10"></a>
                                    <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z">
                                        </path>
                                    </svg>
                                    <span>Admin</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center gap-2 relative">
                                    <a href="../books_details/books_dashboard.php" class="absolute inset-0 z-10"></a>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            d="M19,4H14.82A2.98811,2.98811,0,0,0,9.18,4H5A2.00583,2.00583,0,0,0,3,6V20a2.00587,2.00587,0,0,0,2,2H19a2.00591,2.00591,0,0,0,2-2V6A2.00587,2.00587,0,0,0,19,4ZM12,4a1,1,0,1,1-1,1A1.00291,1.00291,0,0,1,12,4ZM10,9l2.79065,2.79364,2.51886-2.51886L14,8h4v4l-1.27625-1.311-3.93151,3.93463L10,11.82971l-2.58575,2.584L6,13Zm9,10H5V17H19Z">
                                        </path>
                                    </svg>
                                    <span>Books</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2 relative">
                                        <a href="../books_categories_details/category_dashboard.php" class="absolute inset-0 z-10"></a>
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                            enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <rect fill="none" height="24" width="24"></rect>
                                                <rect fill="none" height="24" width="24"></rect>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M20,6h-4V4c0-1.1-0.9-2-2-2h-4C8.9,2,8,2.9,8,4v2H4C2.9,6,2,6.9,2,8v12c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V8 C22,6.9,21.1,6,20,6z M10,4h4v2h-4V4z M15,15h-2v2c0,0.55-0.45,1-1,1s-1-0.45-1-1v-2H9c-0.55,0-1-0.45-1-1c0-0.55,0.45-1,1-1h2v-2 c0-0.55,0.45-1,1-1s1,0.45,1,1v2h2c0.55,0,1,0.45,1,1C16,14.55,15.55,15,15,15z">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                        <span>Categories</span>
                                    </div>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490 480"
                                        fill="currentColor">
                                        <title>down</title>
                                        <path d="M250 360l180-180-30-30-150 150-160-150-30 30 190 180z"></path>
                                    </svg>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center gap-2 relative">
                                    <a href="#" class="absolute inset-0 z-10"></a>
                                    <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9V160c0 70.7-57.3 128-128 128s-128-57.3-128-128V102.9L48 93.3v65.1l15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9H16c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4V86.6C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7H30.7C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z">
                                        </path>
                                    </svg>
                                    <span>Users</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2 relative">
                                        <a href="../renting_books/rented_book_dashboard.php" class="absolute inset-0 z-10"></a>
                                        <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 512">
                                            <path
                                                d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z">
                                            </path>
                                        </svg>
                                        <span>Orders</span>
                                    </div>
                                    <span class="px-2 py-1 border rounded-lg">5</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center gap-2 relative">
                                    <a href="#" class="absolute inset-0 z-10"></a>
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        stroke="none" viewBox="0 0 24 24">
                                        <path
                                            d="m20 8-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8zM9 19H7v-9h2v9zm4 0h-2v-6h2v6zm4 0h-2v-3h2v3zM14 9h-1V4l5 5h-4z">
                                        </path>
                                    </svg>
                                    <span>Returned</span>
                                </div>
                            </li>

                        </ul>
                    </li>
                    <li class="py-1 pb-2">
                        <span class="text-blue-600 font-medium">Others</span>
                        <ul class="px-2 space-y-3">
                            <li>
                                <div class="flex justify-between items-center pt-2">
                                    <div class="flex items-center gap-2 relative">
                                        <a href="#" class="absolute inset-0 z-10"></a>
                                        <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M20 2v16H.32c-.318 0-.416-.209-.216-.465l4.469-5.748a.526.526 0 0 1 .789-.062l1.419 1.334a.473.473 0 0 0 .747-.096l3.047-4.74a.466.466 0 0 1 .741-.09l2.171 2.096c.232.225.559.18.724-.1l5.133-7.785C19.51 2.062 19.75 2 20 2z">
                                            </path>
                                        </svg>
                                        <span>Pending</span>
                                    </div>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490 480"
                                        fill="currentColor">
                                        <title>down</title>
                                        <path d="M250 360l180-180-30-30-150 150-160-150-30 30 190 180z"></path>
                                    </svg>
                                </div>
                            </li>
                            <li>
                                <div class="flex justify-between items-center pt-2">
                                    <div class="flex items-center gap-2 relative">
                                        <a href="#" class="absolute inset-0 z-10"></a>
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" role="img"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <title>roadmap.sh</title>
                                            <path
                                                d="M20.693 0H3.307A3.307 3.307 0 0 0 0 3.307v17.386A3.307 3.307 0 0 0 3.307 24h17.386A3.307 3.307 0 0 0 24 20.693V3.307A3.307 3.307 0 0 0 20.693 0zm-7.706 9.18c-.349.031-.689.078-1.021.142-.333.063-.65.134-.95.214a3.64 3.64 0 0 0-.736.237v8.097a5.522 5.522 0 0 1-.76.143c-.333.047-.68.07-1.045.07a5.87 5.87 0 0 1-.95-.07 1.588 1.588 0 0 1-.688-.285 1.476 1.476 0 0 1-.452-.57c-.095-.253-.142-.578-.142-.974V9.061c0-.364.063-.673.19-.926.142-.27.34-.507.594-.713a3.93 3.93 0 0 1 .926-.546 9.133 9.133 0 0 1 2.54-.736 8.093 8.093 0 0 1 1.378-.119c.76 0 1.361.15 1.804.451.444.285.665.76.665 1.425 0 .222-.032.443-.095.665a3.075 3.075 0 0 1-.237.57c-.341 0-.682.016-1.021.047zm5.113 8.453c-.412.443-.974.665-1.686.665s-1.274-.222-1.686-.665c-.412-.443-.617-.998-.617-1.662 0-.665.205-1.22.617-1.663.412-.443.974-.664 1.686-.664s1.274.221 1.686.664c.411.444.617.998.617 1.663 0 .664-.206 1.219-.617 1.662z">
                                            </path>
                                        </svg>
                                        <span>Feedback</span>
                                    </div>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490 480"
                                        fill="currentColor">
                                        <title>down</title>
                                        <path d="M250 360l180-180-30-30-150 150-160-150-30 30 190 180z"></path>
                                    </svg>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center gap-2 relative">
                                    <a href="#" class="absolute inset-0 z-10"></a>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        stroke="none" viewBox="0 0 24 24">
                                        <path
                                            d="M20 3H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zm-9 14H5v-2h6v2zm8-4H5v-2h14v2zm0-4H5V7h14v2z">
                                        </path>
                                    </svg>
                                    <span>Details</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2 relative">
                                        <a href="#" class="absolute inset-0 z-10"></a>
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path
                                                d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z">
                                            </path>
                                        </svg>
                                        <span>Settings</span>
                                    </div>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490 480"
                                        fill="currentColor">
                                        <title>down</title>
                                        <path d="M250 360l180-180-30-30-150 150-160-150-30 30 190 180z"></path>
                                    </svg>
                                </div>
                            </li>

                        </ul>
                    </li>
                    <li class="border-t px-2 py-2">
                        <form action="../admin_details/admin_logout.php" method="post">
                            <button class="flex items-center gap-2 relative ">
                                <a href="../user_details/user_logout.php" class="absolute inset-0 z-10"></a>
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M16.8 2h-2.6C11 2 9 4 9 7.2v4.05h6.25c.41 0 .75.34.75.75s-.34.75-.75.75H9v4.05C9 20 11 22 14.2 22h2.59c3.2 0 5.2-2 5.2-5.2V7.2C22 4 20 2 16.8 2z">
                                    </path>
                                    <path
                                        d="M4.561 11.25l2.07-2.07c.15-.15.22-.34.22-.53s-.07-.39-.22-.53a.754.754 0 00-1.06 0l-3.35 3.35c-.29.29-.29.77 0 1.06l3.35 3.35c.29.29.77.29 1.06 0 .29-.29.29-.77 0-1.06l-2.07-2.07h4.44v-1.5h-4.44z">
                                    </path>
                                </svg>
                                <span>Log Out</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="row-span-6 col-span-10  sm:col-span-12 lg:col-span-10 ">
            <div class="flex justify-between items-center border-b-2 py-3 px-2 ">
                <p class="font-medium text-lg">Welcome Admin, <span class="font-bold">
                        <?php echo $admin_logged_in_name ?>
                    </span></p>
                <div class="w-10 h-10 rounded-full border">
                    <?php
                        $col = '<svg class="w-full h-full object-cover text-slate-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"></path></svg>';
                        echo "$col<br>";
                    
                    ?>
                </div>
            </div>
            <div class="p-2 ">
                <h1 class="text-2xl font-semibold py-2">Manage Customers</h1>
                <div class="flex items-center justify-between ">
                    <div class="flex items-center relative">
                        <form action="" method="post" class="flex items-center gap-1 relative">
                            <input type="search" name="search" id="search"
                                class="border shadow rounded-lg outline-none p-2 w-96" placeholder="Search...">
                            <button type="submit"
                                class="p-2 pt-3 bg-slate-50 border rounded-r-lg absolute right-0 top-0">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                                    </path>
                                </svg>
                            </button>
                        </form>
                    </div>
                    <a href="add_users.php"
                        class=" uppercase px-4 py-2 bg-blue-600 text-white rounded-lg"><span class="font-bold text-xl">+</span> Add Users</a>
                </div>
            </div>
            <div class="px-2 border-t">
                <div class="px-2 h-96 space-y-3 overflow-y-scroll">
                    
                    <form action="#" method="post">
                        
                        <?php 
                        $add_books = '<div class="flex w-full h-full items-center justify-center"> <a href="./add_users.php" class="bg-blue-600 text-white rounded-lg shadow px-8 py-2 cursor-pointer">Add Users</a> </div>';
                        ?>
                        
                    </form>
                    <?php
                    
                    if($admin_fetch_data_from_db == null){
                        echo $add_books;
                    }else{
                    $edit = '<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="none" viewBox="0 0 24 24">
                    <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                    <path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path>
                    </svg>';
                    $locked = '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 24" fill="currentColor"><path d="m3.5 6.5v3.5h-1.5c-1.105 0-2 .895-2 2v10c0 1.105.895 2 2 2h16c1.105 0 2-.895 2-2v-10c0-1.105-.895-2-2-2h-1.5v-3.5c0-3.59-2.91-6.5-6.5-6.5s-6.5 2.91-6.5 6.5zm2.5 3.5v-3.5c0-2.209 1.791-4 4-4s4 1.791 4 4v3.5zm2 5.5c0-1.105.895-2 2-2s2 .895 2 2c0 .701-.361 1.319-.908 1.676l-.008.005s.195 1.18.415 2.57v.001c0 .414-.335.749-.749.749-.001 0-.001 0-.002 0h-1.499-.001c-.414 0-.749-.335-.749-.749v-.001l.415-2.57c-.554-.361-.916-.979-.916-1.68z"></path></svg>';
                    $delete = '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><path d="M7 3H9C9 2.44772 8.55228 2 8 2C7.44772 2 7 2.44772 7 3ZM6 3C6 1.89543 6.89543 1 8 1C9.10457 1 10 1.89543 10 3H14C14.2761 3 14.5 3.22386 14.5 3.5C14.5 3.77614 14.2761 4 14 4H13.4364L12.2313 12.8378C12.0624 14.0765 11.0044 15 9.75422 15H6.24578C4.99561 15 3.93762 14.0765 3.76871 12.8378L2.56355 4H2C1.72386 4 1.5 3.77614 1.5 3.5C1.5 3.22386 1.72386 3 2 3H6ZM7 6.5C7 6.22386 6.77614 6 6.5 6C6.22386 6 6 6.22386 6 6.5V11.5C6 11.7761 6.22386 12 6.5 12C6.77614 12 7 11.7761 7 11.5V6.5ZM9.5 6C9.22386 6 9 6.22386 9 6.5V11.5C9 11.7761 9.22386 12 9.5 12C9.77614 12 10 11.7761 10 11.5V6.5C10 6.22386 9.77614 6 9.5 6Z" fill="currentColor"></path></svg>';
                    $no_delete = '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M3.93931 5L2.21966 3.28032C1.92677 2.98743 1.92678 2.51255 2.21968 2.21966C2.51257 1.92677 2.98745 1.92678 3.28034 2.21968L21.7801 20.7198C22.073 21.0127 22.073 21.4876 21.7801 21.7805C21.4872 22.0734 21.0123 22.0734 20.7194 21.7805L18.5293 19.5903C17.9867 21.0098 16.6131 22 15.0263 22H8.97369C7.04254 22 5.42715 20.5334 5.24113 18.6112L4.06908 6.5H2.75C2.33579 6.5 2 6.16421 2 5.75C2 5.33579 2.33579 5 2.75 5H3.93931ZM17.2782 18.3392L15 16.0609V17.25C15 17.6642 14.6642 18 14.25 18C13.8358 18 13.5 17.6642 13.5 17.25V14.5609L10.5 11.5608V17.25C10.5 17.6642 10.1642 18 9.75 18C9.33579 18 9 17.6642 9 17.25V10.0608L5.59074 6.65147L6.73416 18.4667C6.84577 19.62 7.815 20.5 8.97369 20.5H15.0263C16.185 20.5 17.1542 19.62 17.2658 18.4667L17.2782 18.3392ZM13.5 10.3185L15 11.8186V9.75C15 9.33579 14.6642 9 14.25 9C13.8358 9 13.5 9.33579 13.5 9.75V10.3185ZM18.4239 6.5L17.6525 14.4711L19.0265 15.8452L19.9309 6.5H21.25C21.6642 6.5 22 6.16421 22 5.75C22 5.33579 21.6642 5 21.25 5H15.5C15.5 3.067 13.933 1.5 12 1.5C10.067 1.5 8.5 3.067 8.5 5H8.18156L9.68153 6.5H18.4239ZM14 5H10C10 3.89543 10.8954 3 12 3C13.1046 3 14 3.89543 14 5Z" fill="currentColor"></path></svg>';
                    foreach ($admin_fetch_data_from_db as $item) {
                        $book_id = $item[0];
                        $user_name = ucwords($item[1]);
                        $user_email = $item[2];
                        $user_password = $item[3];
                        $user_phone_number = $item[4];
                        $user_address = $item[5];
                        $user_gender = $item[6];
                        
                        // $book_modified_date = $item[7];
                        // $book_unique_image_in_db = $item[8];
                        
                        // $date = new date();
                        // $create_date = $date->date_time_in_india($book_created_date);
                        // $modify_date = $date->date_time_in_india($book_modified_date);
                        
                        ?>
                        <div
                            class="grid gap-2 py-2 sm:block md:grid mt-2 <?php ?>  rounded-md border w-full shadow">
                            <div class=" flex justify-between items-center p-2 gap-4 w-full ">
                                <div class=" flex justify-between items-center gap-4">
                                    <div class=" w-10 h-10 flex items-center justify-center">
                                        <?php
                                        
                                            $col = '<div class= "flex items-center justify-center w-8 h-8"><svg class="w-full h-full text-slate-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"></path></svg></div>';
                                            echo "$col<br>";
                                        
                                        ?>
                                    </div>
                                    <div class=" w-full">
                                        <div class="flex gap-20 items-center">
                                            <div>
                                                <div class="flex items-center gap-4">
                                                    <h2 class="<?php echo "Color" ?> ">
                                                        <?php echo "Name: " . $user_name ?>
                                                    </h2>
                                                    <p class=" px-1 rounded-md bg-purple-600 text-white">
                                                    <?php echo $user_gender ?>
                                                </p>
                                                </div>
                                                
                                                <p>
                                                    <?php echo "Email :- " . $user_email  ?>
                                                </p>
                                                <div class="flex gap-6 items-center ">
                                                <p>Phone Number :-
                                                    <?php echo $user_phone_number ?>
                                                </p>
                                                
                                            </div>
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                                <div class="flex items-center justify-between gap-6">
                                    <p class=" bg-indigo-500 text-white px-3 py-1 rounded-md">
                                        <?php echo "Address:-" . $user_address ?>
                                    </p>
                                    <p class=" bg-purple-500 text-white px-3 py-1 rounded-md">
                                        <?php echo $user_password ?>
                                    </p>

                                    <form action="update_users_data.php?id=<?php echo $book_id ?>" method="post">
                                        <button type="submit" data-toggle="tooltip" data-placement="top" title="Edit"
                                            class="px-1 rounded-lg bg-slate-100 text-black">
                                            <?php echo $edit ?>

                                        </button>
                                    </form>
                                    <form action="delete_user.php?id=<?php echo $book_id ?>" method="post">
                                        <button data-toggle="tooltip" data-placement="top" title="Delete"
                                            class="border-2 px-4 py-1 rounded-md">
                                            <?php echo $delete ?>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } } ?>
                </div>
            </div>
        </main>
</body>

</html>