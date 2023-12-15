<?php
// include 'database_connection.php';
include '../send_fetch_data_from_db.php';
include '../admin_session.php';

$fetch_data_from_db = new fetch_db_data();
$fetch_book_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, 'books_details');
$fetch_user_review_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, 'user_review_details');

$fetch_category_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, 'category_details');
$show_login_data = '';

$category_name = isset($_POST['category_name']) ? $_POST['category_name'] :'';
$search = isset($_POST['search']) ? strtolower($_POST['search']) :'';
$user_searched_data = trim($search);

foreach($fetch_category_data_from_db as $data){
    $category_name_list[] = isset($data[1]) ? $data[1] :'';
}

foreach($fetch_book_data_from_db as $data){
    if(in_array($category_name,$data)){
        $searched_data[] = $data;
    }
    
}

// foreach ($fetch_book_data_from_db as $item) {
    // $book_name = isset($item[1]) ? $item[1] : "";
    // $book_author_name = isset($item[2]) ? $item[2] : "";
    // $book_category_name = isset($item[3]) ? $item[3] : "";
    // $book_image = isset($item[10]) ? $item[10] : "";

// }
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
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../../dist/output.css">
    <title>Document</title>
</head>

<body class="relative w-full h-full">
    <header class="sticky z-50 top-0"><?php include 'home_header.php' ?></header>
    <main class="w-full h-full">
        <section class="grid place-items-center text-center text-white w-full py-40 relative">
            <div
                class="after:content-[''] after:absolute after:top-0 after:left-0 after:bg-[url('https://cdn.pixabay.com/photo/2023/11/06/13/17/ai-generated-8369584_1280.jpg')] after:w-full after:h-full  after:bg-cover after:bg-bottom after:z-10 after:opacity-90">
            </div>
            <div
                class="after:content-[''] after:absolute after:inset-0 after:w-full after:h-full after:bg-gradient-to-t after:from-black after:to-slate-900 ">
            </div>
            <div class="z-20 space-y-4">
                <div class=" space-y-1 ">
                <h1 class="font-semibold text-2xl "><span class="text-slate-50 font-bold text-3xl p-1">UcodeSoft</span>
                    Personal Book Store</h1>
                <h2>Buy any programming book on Rent.</h2>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis, nobis?</p>
            </div>
            <div class="absolute right-4 top-1">
                <form action="" method="post" class="flex items-center gap-1 relative z-20 py-4">
                <select name="category_name" id="category" class="rounded-lg bg-slate-100 text-slate-500 shadow border border-slate-600 w-40 p-2 ">
                    <option value="" class="bg-transparent p-1">Select Books</option>
                    <?php if(!empty($category_name_list)){
                        foreach($category_name_list as $category_name){
                            ?>
                        <option value="<?php echo $category_name ?>" class="bg-transparent p-1"><?php echo $category_name ?></option>
                    <?php } } ?>
                </select>    
                <input type="search" name="search" id="search"
                        class="border shadow rounded-lg outline-none p-1 text-slate-600 pl-3 text-lg w-80" placeholder="Search any book...">
                    <button type="submit"
                        class="p-2 py-2 mt-[1px] bg-slate-50 text-slate-600 border rounded-r-lg absolute right-0 top-4">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                            </path>
                        </svg>
                    </button>
                </form>
            </div>
            <div class="py-2 absolute bottom-14 z-20">
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
        <section class="w-full h-full px-2 py-10 grid place-items-center space-y-8" id="books">
            <h2 class="font-bold text-3xl underline">Our Book Store</h2>
            <div class=" flex items-center justify-center flex-wrap gap-24 p-6">
                <?php foreach ($fetch_book_data_from_db as $item) {
                    $book_id = isset($item[0]) ? $item[0] : "";
                    $book_name = isset($item[1]) ? ucwords($item[1]) : "";
                    $book_author_name = isset($item[2]) ? $item[2] : "";
                    $book_category_name = isset($item[3]) ? $item[3] : "";
                    $book_image = isset($item[10]) ? $item[10] : "";
                    
                    // if(!empty($searched_data)){
                    //     foreach($searched_data as $compare){
                    //         $db_book_name = isset( $compare[1] ) ? strtolower($compare[1]) :'';
                    //         $compare_data = ($user_searched_data == $db_book_name) ? "visible" : "hidden";
                    //         $data_not_found = ($user_searched_data == $db_book_name) ? "" : "Data Not found";
                    //         // echo $compare_data;
                    //     }
                    //     }

                    if(!empty($search)){
                        if( ($search == strtolower($book_name)) ){
                            $searchdata = "visible";
                            $data[] = $searchdata;
                            $data_not_found = "";
                        }else{
                            $searchdata = "hidden";
                            $data_not_found = "Data Not found";
                            $data[] = $searchdata;
                        }
                    }
                    
                    // $more_images = '<svg class="w-20 h-20 absolute top-0 right-0 inset-0 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"></path></svg>'
                    if(empty($data_not_found)){
                    ?>
                    <article class="<?php echo $searchdata ?> w-40 h-52 text-center relative ">
                        <div class="w-full h-full rounded-xl space-y-4">
                            <!-- <a href="fetch_categories_books?book_category=<?php echo $book_name ?>"
                                class=" absolute inset-0 z-10"></a> -->
                            <a href="../rented_book_details/buy_book?book_id=<?php echo $book_id ?>"
                                class=" absolute inset-0 z-10"></a>
                            <img src="../../Image/<?php echo $book_image ?>" alt="Book1"
                                class="w-full h-full object-cover rounded-xl">

                            <h2 class="font-bold text-lg">
                                <?php echo $book_name ?>
                            </h2>

                        </div>
                    </article>
                <?php }else{ 
                     echo '<span class="text-xl">' . $data_not_found . '</span>';
                     break;
                 }} ?>

            </div>
        </section>
        <section class="w-full h-full text-center py-16 px-6 mt-12 bg-slate-50 space-y-6">
            <h2 class="font-bold text-3xl">User Reviews</h2>
            <div class=" overflow-scroll w-full grid grid-cols-3 gap-4 p-4 border shadow">
                <?php
                foreach ($fetch_user_review_data_from_db as $value) {
                    $user_name = isset($value[2]) ? $value[2] : '';
                    $user_review = isset($value[3]) ? $value[3] : '';
                    $user_rating = isset($value[4]) ? $value[4] : '';
                    ?>
                    <article
                        class="w-full max-w-xl h-64 border rounded-xl flex items-center justify-center px-5 py-8 bg-white relative">
                        <div class=" text-center">
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