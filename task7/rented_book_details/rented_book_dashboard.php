<?php

include "../admin_details/admin_update_fetch_data.php";

if ($_SESSION['admin'] == null) {
    header("location: ../admin_details/admin_login.php");
} else {
    $page = "Details";
}

if (empty($email_list)) {
    $email_list = [];
}
$create_date = $modify_date = '';
$tablename = "books_details";

// $login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';

// $user_id_data = $fetch_data_from_db->fetch_data('user_details','user_id', $login_email, $conn, 'user_email');
// $user_id = isset($user_id_data[0][0]) ? $user_id_data[0][0] :'';

$admin_fetch_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, $tablename);

$rightjoin = "SELECT rented.*, book.book_name, book.book_category, book.book_author, user.user_name, user.user_email, user.user_phone_no, user.gender,user.user_status from books_details as book right join rented_book_details as rented on (book.book_id = rented.book_id) left join user_details as user on (rented.user_id = user.user_id) order by rented.rented_id";
$rightjoinquery = mysqli_query($conn, $rightjoin);
$fetch_right_join_data = mysqli_fetch_all($rightjoinquery);

// echo "<pre>";
// print_r($fetch_right_join_data);
// echo "</pre>";
foreach ($fetch_right_join_data as $data) {
    $id = isset($data[0]) ? $data[0] : '';
    $email = isset($data[19]) ? $data[19] : '';
    $address = isset($data[2]) ? $data[2] : '';
    $state = isset($data[3]) ? $data[3] : '';
    $city = isset($data[4]) ? $data[4] : '';
    $issue_date = isset($data[7]) ? $data[7] : '';
    $return_date = isset($data[8]) ? $data[8] : '';
    $charges = isset($data[9]) ? $data[9] : '';
    $book_name = isset($data[15]) ? $data[15] : '';
    $book_category = isset($data[16]) ? $data[16] : '';
    $book_author = isset($data[17]) ? $data[17] : '';
    $user_name = isset($data[18]) ? $data[18] : '';
    $user_phone_number = isset($data[20]) ? $data[20] : '';
    $user_gender = isset($data[21]) ? $data[21] : '';
    $status = isset($data[22]) ? $data[22] : '';


    $book_data = [$book_name, $book_category, $book_author, $issue_date, $return_date, $charges];

    if (empty($book_rented_data[$email])) {
        $book_rented_data[$email] = [$id, $user_name, $email, $user_phone_number, $user_gender, $address, $state, $city,$status, [$book_data] ];
    } else {
        $book_rented_data[$email][9][] = $book_data;
    }

    $email_list[] = $email;
}
$email_list = array_unique($email_list);

$search = $dataimage = $data_not_found = $not_found = $user_account_status = '';
// $data = [];
$found = false;

$search = isset($_POST['search']) ? strtolower($_POST['search']) : '';

$status = isset($_GET['status']) ? $_GET['status'] : '';
$user_block_data = explode(',', $status);
$user_unique_id = isset($user_block_data[0]) ? $user_block_data[0] : '';
$user_ac_status = isset($user_block_data[1]) ? $user_block_data[1] : '';


$success = '<div class="w-full h-screen flex items-center justify-center fixed  left-0 bottom-0 right-0 bg-black/40">
<form action="../user_details/lock_user?id=' . $user_unique_id . '" method="post" class="w-80 h-36 "><div class="grid font-semibold place-items-center w-full h-full border rounded-xl py-2 shadow z-20 bg-white text-black relative">
    <a href="rented_book" ><span class="  font-bold text-2xl text-slate-400 absolute right-2 top-2">
    <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2.939 12.789L10 11.729l-3.061 3.06-1.729-1.728L8.271 10l-3.06-3.061L6.94 5.21 10 8.271l3.059-3.061 1.729 1.729L11.729 10l3.06 3.061-1.728 1.728z"></path></svg>
    </span></a>
<div class="grid place-items-center gap-4 pb-2">
    <h2 class="px-6 font-semibold pt-3 text-black text-center">Are you sure u want to block this account</h2>
    <button type="submit"><span class="  font-bold rounded-md bg-blue-600 text-white px-3 border ">Yes</button>
</div></form></div>';

$fail = '<div class="w-full h-screen flex items-center justify-center fixed  left-0 bottom-0 right-0 bg-black/40">
<form action="../user_details/lock_user?id=' . $user_unique_id . '" method="post" class="w-80 h-36 "><div class="grid font-semibold place-items-center w-full h-full border rounded-xl py-2 shadow z-20 bg-white text-black relative">
<a href="rented_book" ><span class="  font-bold text-2xl text-slate-400 absolute right-2 top-2">
<svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2.939 12.789L10 11.729l-3.061 3.06-1.729-1.728L8.271 10l-3.06-3.061L6.94 5.21 10 8.271l3.059-3.061 1.729 1.729L11.729 10l3.06 3.061-1.728 1.728z"></path></svg>
</span></a>
<div class="grid place-items-center gap-4 pb-2">
<h2 class="px-6 font-semibold pt-3 text-black text-center">Unblock this account</h2>
<button type="submit"><span class="  font-bold rounded-md bg-blue-600 text-white px-3 border ">Yes</button>
</div></form></div>';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_account_status = ($user_ac_status == 'Active') ? $success : $fail;
}
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
    
    <aside class=" row-span-6 col-span-2 border h-full sm:hidden lg:block">
        <?php include '../controller/app.php' ?>
    </aside>


    <main class="row-span-6 col-span-10  sm:col-span-12 lg:col-span-10 ">
        <div class="flex justify-between items-center border-b-2 py-2 px-2 ">
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
                    <form action="rented_book" method="post" class="flex items-center gap-1 relative">
                        <input type="search" name="search" id="search"
                            class="border shadow rounded-lg outline-none p-2 w-96" placeholder="Search...">
                        <button type="submit" class="p-2 pt-3 bg-slate-50 border rounded-r-lg absolute right-0 top-0">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                                </path>
                            </svg>
                        </button>
                    </form>
                </div>
                <a href="../home_page" class=" uppercase px-4 py-2 bg-blue-600 text-white rounded-lg"><span
                        class="font-bold text-xl">+</span> Go to home page</a>
            </div>
        </div>
        <div class="px-2 border-t">
            <div class="px-2 h-80 space-y-3 overflow-y-scroll">

                <form action="../home_page" method="post">

                    <?php
                    $add_books = '<div class="flex w-full h-full items-center justify-center"> <a href="../home_page" class="bg-blue-600 text-white rounded-lg shadow px-8 py-2 cursor-pointer">Go to home Page</a> </div>';
                    ?>

                </form>
                <?php
                if ($admin_fetch_data_from_db == null) {
                    echo $add_books;
                }
                    $edit = '<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="none" viewBox="0 0 24 24">
                    <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                    <path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path>
                    </svg>';
                    $active = '<svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M400 256H152V152.9c0-39.6 31.7-72.5 71.3-72.9 40-.4 72.7 32.1 72.7 72v16c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24v-16C376 68 307.5-.3 223.5 0 139.5.3 72 69.5 72 153.5V256H48c-26.5 0-48 21.5-48 48v160c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zM264 408c0 22.1-17.9 40-40 40s-40-17.9-40-40v-48c0-22.1 17.9-40 40-40s40 17.9 40 40v48z"></path></svg>';
                    $block = '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM4 12c0-4.42 3.58-8 8-8 1.85 0 3.55.63 4.9 1.69L5.69 16.9C4.63 15.55 4 13.85 4 12zm8 8c-1.85 0-3.55-.63-4.9-1.69L18.31 7.1C19.37 8.45 20 10.15 20 12c0 4.42-3.58 8-8 8z"></path></svg>';
                    $locked = '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 24" fill="currentColor"><path d="m3.5 6.5v3.5h-1.5c-1.105 0-2 .895-2 2v10c0 1.105.895 2 2 2h16c1.105 0 2-.895 2-2v-10c0-1.105-.895-2-2-2h-1.5v-3.5c0-3.59-2.91-6.5-6.5-6.5s-6.5 2.91-6.5 6.5zm2.5 3.5v-3.5c0-2.209 1.791-4 4-4s4 1.791 4 4v3.5zm2 5.5c0-1.105.895-2 2-2s2 .895 2 2c0 .701-.361 1.319-.908 1.676l-.008.005s.195 1.18.415 2.57v.001c0 .414-.335.749-.749.749-.001 0-.001 0-.002 0h-1.499-.001c-.414 0-.749-.335-.749-.749v-.001l.415-2.57c-.554-.361-.916-.979-.916-1.68z"></path></svg>';
                    $delete = '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><path d="M7 3H9C9 2.44772 8.55228 2 8 2C7.44772 2 7 2.44772 7 3ZM6 3C6 1.89543 6.89543 1 8 1C9.10457 1 10 1.89543 10 3H14C14.2761 3 14.5 3.22386 14.5 3.5C14.5 3.77614 14.2761 4 14 4H13.4364L12.2313 12.8378C12.0624 14.0765 11.0044 15 9.75422 15H6.24578C4.99561 15 3.93762 14.0765 3.76871 12.8378L2.56355 4H2C1.72386 4 1.5 3.77614 1.5 3.5C1.5 3.22386 1.72386 3 2 3H6ZM7 6.5C7 6.22386 6.77614 6 6.5 6C6.22386 6 6 6.22386 6 6.5V11.5C6 11.7761 6.22386 12 6.5 12C6.77614 12 7 11.7761 7 11.5V6.5ZM9.5 6C9.22386 6 9 6.22386 9 6.5V11.5C9 11.7761 9.22386 12 9.5 12C9.77614 12 10 11.7761 10 11.5V6.5C10 6.22386 9.77614 6 9.5 6Z" fill="currentColor"></path></svg>';
                    $no_delete = '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M3.93931 5L2.21966 3.28032C1.92677 2.98743 1.92678 2.51255 2.21968 2.21966C2.51257 1.92677 2.98745 1.92678 3.28034 2.21968L21.7801 20.7198C22.073 21.0127 22.073 21.4876 21.7801 21.7805C21.4872 22.0734 21.0123 22.0734 20.7194 21.7805L18.5293 19.5903C17.9867 21.0098 16.6131 22 15.0263 22H8.97369C7.04254 22 5.42715 20.5334 5.24113 18.6112L4.06908 6.5H2.75C2.33579 6.5 2 6.16421 2 5.75C2 5.33579 2.33579 5 2.75 5H3.93931ZM17.2782 18.3392L15 16.0609V17.25C15 17.6642 14.6642 18 14.25 18C13.8358 18 13.5 17.6642 13.5 17.25V14.5609L10.5 11.5608V17.25C10.5 17.6642 10.1642 18 9.75 18C9.33579 18 9 17.6642 9 17.25V10.0608L5.59074 6.65147L6.73416 18.4667C6.84577 19.62 7.815 20.5 8.97369 20.5H15.0263C16.185 20.5 17.1542 19.62 17.2658 18.4667L17.2782 18.3392ZM13.5 10.3185L15 11.8186V9.75C15 9.33579 14.6642 9 14.25 9C13.8358 9 13.5 9.33579 13.5 9.75V10.3185ZM18.4239 6.5L17.6525 14.4711L19.0265 15.8452L19.9309 6.5H21.25C21.6642 6.5 22 6.16421 22 5.75C22 5.33579 21.6642 5 21.25 5H15.5C15.5 3.067 13.933 1.5 12 1.5C10.067 1.5 8.5 3.067 8.5 5H8.18156L9.68153 6.5H18.4239ZM14 5H10C10 3.89543 10.8954 3 12 3C13.1046 3 14 3.89543 14 5Z" fill="currentColor"></path></svg>';
                    foreach ($email_list as $email) {
                        $rented_data[] = $book_rented_data[$email];
                        $book = end($rented_data);
                        // echo "<pre>";
                        // print_r($book_rented_data);
                        // echo "</pre>";
                        $user_rented_id = $book[0];
                        $user_name = $book[1];
                        $user_email = $book[2];
                        $user_gender = $book[4];
                        $user_address = $book[5];
                        $user_state = $book[6];
                        $user_city = $book[7];
                        $user_status = $book[8];
                        $status = ($user_status == 'Active') ? $active : $block;
                        
                        $user_id_data = $fetch_data_from_db->fetch_data('user_details','user_id', $user_email, $conn, 'user_email');
                        $user_id = isset($user_id_data[0][0]) ? $user_id_data[0][0] :'';
                        
                        $user_data = [$user_id, $user_status];
                        $user_lock_data = implode(',', $user_data);
                        $user_rented_book_details = $book[9];

                        foreach ($user_rented_book_details as $user_rented_book_data) {
                            $book_name = ucwords($user_rented_book_data[0]);
                            $book_category = $user_rented_book_data[1];
                            $book_author = $user_rented_book_data[2];
                            $book_issue_date = $user_rented_book_data[3];
                            $book_return_date = $user_rented_book_data[4];
                            $book_charges = $user_rented_book_data[5];
                            // if (!empty($search)) {
                            //     if (($search == strtolower($user_name)) || ($search == strtolower($user_email)) || ($search == strtolower($user_address)) || ($search == strtolower($user_gender)) || ($search == strtolower($user_state)) || ($search == strtolower($user_city)) || ($search == strtolower($book_name)) || ($search == strtolower($book_category)) || ($search == strtolower($book_author))) {
                            //         $searchdata = "visible";
                            //         $data[] = $searchdata;
                            //     } else {
                            //         $searchdata = "hidden";
                            //         $data[] = $searchdata;
                            //     }
                            // }

                            if ((strpos(strtolower($user_name), $search) !== false) || (strpos(strtolower($user_email), $search) !== false) || (strpos(strtolower($user_gender), $search) !== false) || (strpos(strtolower($user_state), $search) !== false) || (strpos(strtolower($user_city), $search) !== false) || (strpos(strtolower($book_name), $search) !== false) || (strpos(strtolower($book_category), $search) !== false) || (strpos(strtolower($book_author), $search) !== false)) {
                                $found = true;
                                $searchdata = "visible";
                            }else{
                                $searchdata = "hidden";
                            }
                                
                            $data_not_found = (!$found) ? ('<p class="w-full h-full grid place-items-center">Data not found</p>') : '';
                            
                        }

                        ?>
                        <?php // }  ?>
                        <div class="<?php echo $searchdata ?> gap-2 py-2 mt-2 <?php ?> rounded-md border shadow">
                            <div class="flex justify-between items-center p-2 gap-4 w-full">
                                <div class=" flex justify-between items-center gap-4 h-20">
                                    <div class=" w-10 h-10 flex items-center justify-center">
                                        <?php

                                        $col = '<div class= "flex items-center justify-center w-8 h-8"><svg class="w-full h-full text-slate-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"></path></svg></div>';
                                        echo "$col<br>";

                                        ?>
                                    </div>
                                    <div class=" w-full">
                                        <div class="flex gap-20 items-center">
                                            <div>
                                                <div class="flex items-center gap-2">
                                                    <h2 class="<?php echo "Color" ?> ">
                                                        <?php echo $user_name ?>
                                                    </h2>
                                                    <p class=" px-1 rounded-md bg-purple-600 text-white">
                                                        <?php echo $user_gender ?>
                                                    </p>
                                                </div>

                                                <p>
                                                    <?php echo $user_email ?>
                                                </p>
                                                <div class="flex gap-6 items-center ">

                                                    <p>
                                                        <?php echo $user_address . "," . $user_state ?>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="flex gap-10 items-center">
                                    <div class="grid text-sm gap-2">
                                        <?php
                                        foreach ($user_rented_book_details as $user_rented_book_data) {
                                            $book_name = ucwords($user_rented_book_data[0]);
                                            $book_category = $user_rented_book_data[1];
                                            $book_author = $user_rented_book_data[2];
                                            $book_issue_date = $user_rented_book_data[3];
                                            $book_return_date = $user_rented_book_data[4];
                                            $book_charges = $user_rented_book_data[5];
                                            ?>

                                            <div class="flex justify-between  gap-2">
                                                <p class="grid w-64 bg-slate-100 border shadow px-3 py-1 rounded-md">
                                                    <span>
                                                        <?php echo "Book:-" . $book_name ?>
                                                    </span>
                                                    <span>
                                                        <?php echo "Category :- " . $book_category ?>
                                                    </span>
                                                </p>
                                                <p class="grid bg-slate-50 border shadow px-3 py-1 rounded-md">
                                                    <span>
                                                        <?php echo "Issue date:-" . $book_issue_date ?>
                                                    </span>
                                                    <span>
                                                        <?php echo "Return date:- " . $book_return_date ?>
                                                    </span>
                                                </p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <form action="../user_details/lock_user?rented_id=<?php echo $user_lock_data ?>" method="post">
                                        <input type="checkbox" hidden checked name="user_account_status"
                                            id="user_account_status">
                                        <button type="submit" name="account_status" data-toggle="tooltip" data-placement="top"
                                            title="Edit" class="px-1 rounded-lg bg-slate-100 text-black">
                                            <span>
                                                <?php echo $status ?>
                                            </span>
                                        </button>
                                    </form> <?php echo $user_account_status ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                 ?>
                <span>
                    <?php
                        echo $data_not_found;
                     ?>
                </span>
            </div>
        </div>
    </main>

</body>

</html>