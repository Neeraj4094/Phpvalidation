<?php
include '../send_fetch_data_from_db.php';
include '../admin_session.php';

$fetch_data_from_db = new fetch_db_data();

$exist = [];
$data_not_found = $search = $category = $errmsg = '';
$searchdata = "visible";

$fetch_book_table_data = $fetch_data_from_db->fetchdatafromdb($conn, 'books_details');
if (empty($fetch_book_table_data)) {
    header('location: ../admin_details/admin_registeration');
}
$user_db_data = $fetch_data_from_db->fetchdatafromdb($conn, 'user_details');
foreach($user_db_data as $user_data){
    $user_id_data_list[] = isset($user_data[0]) ? $user_data[0] : '';
}


$fetch_user_review_table_data = $fetch_data_from_db->fetchdatafromdb($conn, 'user_review_details');
foreach ($fetch_user_review_table_data as $data) {
    $user_id = isset($data[1]) ? $data[1] : '';
    $user_review = isset($data[2]) ? $data[2] : '';
    $user_rating = isset($data[3]) ? $data[3] : '';
    if(in_array($user_id,$user_id_data_list)){
        $review_table_query = $fetch_data_from_db->fetchiddata('user_details', $user_id, $conn, 'user_id');
        $review_table_data = mysqli_fetch_all($review_table_query);
        $user_name = isset($review_table_data[0][1]) ? $review_table_data[0][1] : '';
        $user_email = isset($review_table_data[0][2]) ? $review_table_data[0][2] : '';
        $user_review_table_data[] = [$user_name, $user_email, $user_review, $user_rating];
    }
}

$fetch_category_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, 'category_details');
$show_login_data = $err_search = '';

if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    $category = !empty($_POST['category_name']) ? $_POST['category_name'] : '';
    $search = isset($_POST['search']) ? strtolower($_POST['search']) : '';
    if(empty($search)){
        $err_search = "* Content missing";
        $errmsg = "Search content missing";
    }else{
        $searchdata = "hidden";
    }
}


$user_searched_data = trim($search);

if (!empty($fetch_category_data_from_db)) {

    foreach ($fetch_category_data_from_db as $data) {
        $category_name_list[] = isset($data[1]) ? $data[1] : '';
    }
}

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
    <header class="sticky z-30 top-0">
        <?php include 'home_header.php' ?>
    </header>
    <?php echo $logout ?>
    <main class="w-full h-full">
    <h2 class="w-full border text-center bg-green-50 text-slate-800 fixed top-0 z-50 shadow">
        <?php // echo $errmsg; ?>
    </h2>
        <section class="grid place-items-center text-center text-white w-full py-40 relative <?php echo $searchdata ?>">
            <div
                class="after:content-[''] after:absolute after:top-0 after:left-0 after:bg-[url('https://cdn.pixabay.com/photo/2023/11/06/13/17/ai-generated-8369584_1280.jpg')] after:w-full after:h-full  after:bg-cover after:bg-bottom after:z-10 after:opacity-90">
            </div>
            <div
                class="after:content-[''] after:absolute after:inset-0 after:w-full after:h-full after:bg-gradient-to-t after:from-black after:to-slate-900 ">
            </div>
            <div class="z-20 space-y-4">
                <div class=" space-y-1 ">
                    <h1 class="font-semibold text-2xl "><span
                            class="text-slate-50 font-bold text-3xl p-1">UcodeSoft</span>
                        Personal Book Store</h1>
                    <h2>Buy any programming book on Rent.</h2>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis, nobis?</p>
            </div>
           
            <form action="../books_details/book_store" method="post" class="py-2 absolute bottom-14 z-20">
                <button type="submit"
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
            </form>
        </section>
        <section class="w-full h-full px-2 py-10 grid place-items-center space-y-8" id="books">
        <div class="absolute right-2 top-16 z-20">
                <form action="" method="post" class="flex items-center gap-2 relative z-20 py-4">
                    <select name="category_name" id="category"
                        class="rounded-lg border-2 border-slate-500 text-slate-600 w-40 p-2 py-1 ">
                        <option value="" class="bg-transparent p-1">Select Category</option>
                        <?php if (!empty($category_name_list)) {
                            foreach ($category_name_list as $category_name) {
                                ?>
                                <option value="<?php echo $category_name ?>" class="bg-transparent p-1">
                                    <?php echo $category_name ?>
                                </option>
                            <?php }
                        } ?>
                    </select>
                    <input type="search" name="search" id="search"
                        class="border-2 border-slate-500 rounded-lg p-1 text-slate-600 pl-3 text-lg w-64"
                        placeholder="Search any book...">
                    <button type="submit"
                        class="p-2 py-[7px] border-l-2 mt-[3px] z-30 text-slate-600 bg-white rounded-r-lg absolute right-[3px] top-4">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                            </path>
                        </svg>
                    </button>
                        <small class="text-white font-semibold absolute left-44 top-16"><?php echo $err_search ?></small>
                    </form>
            </div>
            <h2 class="font-bold text-3xl underline">Our Book Store</h2>
            
            <div class=" flex items-center justify-center flex-wrap gap-28 p-6 px-20">
                <?php foreach ($fetch_book_table_data as $item) {
                    $book_id = isset($item[0]) ? $item[0] : "";
                    $book_name = isset($item[1]) ? ucwords($item[1]) : "";
                    $book_author_name = isset($item[2]) ? $item[2] : "";
                    $book_category_name = isset($item[3]) ? $item[3] : "";
                    $book_image = isset($item[10]) ? $item[10] : "";

                    $content_data = [$book_category_name,$book_name];
                    $searched_data = [$category,$search];
                    
                    if(empty($err_search)){
                        $search_result = $search_data->search_content_data( $searched_data, $content_data);
                        $exist[] = isset($search_result[0][0]) ? $search_result[0][0] : '';
                        $searchdata = isset($search_result[1][0]) ? $search_result[1][0] : '';
                        
                        $not_exist = 1;
                        
                        if(!empty($search)){
                            $data_not_found = (!in_array($not_exist,$exist)) ? ('<p class="w-full h-full grid place-items-center">Data not found</p>') : '';
                        }else{
                            $searchdata = "visible";
                        }
                    }else{
                        echo "Data not found";
                        break;
                    }
                    
                    ?>
                    <article class="<?php echo $searchdata ?> w-40 h-52 text-center relative ">
                        <div class="w-full h-full rounded-xl space-y-4">
                            <a href="../rented_book_details/buy_book?book_id=<?php echo $book_id ?>"
                                class=" absolute inset-0 z-10"></a>
                            <img src="../../Image/<?php echo $book_image ?>" alt="Book1"
                                class="w-full h-full object-cover rounded-xl">

                            <h2 class="font-bold text-lg">
                                <?php echo $book_name ?>
                            </h2>
                        </div>
                    </article>
                <?php }
                    echo $data_not_found;
                ?>

            </div>
        </section>
        <section class="w-full h-full text-center py-16 px-6 mt-20 bg-slate-50 space-y-6" id="reviews">
            <h2 class="font-bold text-3xl">User Reviews</h2>
            <div class=" overflow-scroll w-full grid grid-cols-3 gap-4 p-4 border shadow">
                <?php
                foreach ($user_review_table_data as $value) {
                    $user_name = isset($value[0]) ? $value[0] : '';
                    $user_email = isset($value[1]) ? $value[1] : '';
                    $user_review = isset($value[2]) ? $value[2] : '';
                    $user_rating = isset($value[3]) ? $value[3] : '';
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
                                    <div class="grid">
                                        <h2 class=" text-lg font-semibold">
                                            <?php echo $user_name ?>
                                        </h2>
                                        <span class="font-medium text-sm">
                                            <?php echo $user_email ?>
                                        </span>
                                    </div>
                                    <i class="">
                                        <?php echo $user_review ?>
                                    </i>
                                </div>
                                <div class=" font-semibold text-primary dark:text-primary-500">
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
                                    <?php } elseif ($user_review == 4) { ?>
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

                            </div>


                        </div>

                    </article>
                <?php } ?>

            </div>
        </section>
    </main>

    <footer class="w-full h-full px-6  bg-slate-900 text-white" id="footer">
        <div class="px-2 py-8">
            <div class="w-12 h-12 ">
                <img src="../../Image/Ucodelogo.png" alt="Ucodelogo"
                    class="w-full h-full object-cover border rounded-full shadow shadow-black">
            </div>
        </div>
        <ul class=" w-full flex gap-2 max-w-7xl flex-wrap">
            <li class="w-full max-w-xs">
                <span class="font-semibold py-2">Home</span>
                <ul class=" py-6">
                    <li class="text-slate-300 py-3"><a href="../home_page">Home Page</a></li>
                    <li class="text-slate-300 py-3"><a href="#books">Book Store</a></li>
                    <li class="text-slate-300 py-3"><a href="#reviews">User Reviews</a></li>
                    <li class="text-slate-300 py-3"><a href="#footer">Home Details</a></li>
                </ul>
            </li>
            <li class="w-full max-w-xs">
                <span class="font-semibold py-2">Categories Details</span>
                <ul class=" py-6">
                    <li class="text-slate-300 py-3"><a href="../categories_details/book_categories">Categories</a></li>
                    <li class="text-slate-300 py-3"><a href="../books_details/book_store">Books</a></li>
                </ul>
            </li>
            <li class="w-full max-w-xs">
                <span class="font-semibold py-2">Books Store</span>
                <ul class=" py-6">
                    <li class="text-slate-300 py-3"><a href="../books_details/book_store">Book</a></li>
                    <li class="text-slate-300 py-3"><a href="../categories_details/book_categories">Categories List</a></li>
                </ul>
            </li>
            <li class="">
                <span class="font-semibold py-2">User details</span>
                <ul class=" py-6">
                    <li class="text-slate-300 py-3"><a href="../book_return_details/return_home_page?user_id=<?php echo $user_id ?>">Your Details</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Privacy</a></li>
                    <li class="text-slate-300 py-3"><a href="#">Commerce</a></li>
                </ul>
            </li>
        </ul>
    </footer>

</body>

</html>