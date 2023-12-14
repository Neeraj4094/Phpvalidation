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
    $fetch_category_id_data[] = mysqli_fetch_all($fetch_id_query);
    }
}
$fetch_id_query = '';
$login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST["login_page"])) {
//         if(empty($login_email)){
//         $show_login_data = '<div class="grid font-semibold place-items-center w-60 h-60 border rounded-xl shadow z-20 bg-black/40 fixed right-2 top-1 text-black">
//         <a href="return_home_page.php?email=' . $user_email . '"><span class=" text-white font-bold text-2xl absolute top-2 right-2">
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
//         <a href="../user_details/user_login.php" class=" bg-slate-100 p-2 rounded-lg">Click to Login</a>
//         </div>
//         </div>';
//         } else {
//             $show_login_data = '<div class="grid font-semibold place-items-center w-60 h-60 border rounded-xl shadow z-20 bg-black/40 fixed right-2 top-1 text-black">
//         <a href="return_home_page.php?email=' . $user_email . '"><span class=" text-white font-bold text-2xl absolute top-2 right-2">
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
//         <a href="../user_details/user_logout.php" class=" bg-slate-100 p-2 rounded-lg">Click to Logout</a>
//         </div>
//         </div>';
//         }
//     }
// }

// $fetch_query = $fetch_data_from_db->fetchiddata('user_details', $login_email, $conn, 'user_email');
// $fetch_data = mysqli_fetch_all($fetch_query);
// $user_name = isset($fetch_data[0][1]) ? $fetch_data[0][1] : '';

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

<body class=" w-full h-full bg-slate-100">
    <header><?php include '../home_page/home_header.php' ?></header>
    
    <section class="w-full h-full px-2 py-7 mb-12 grid place-items-center space-y-6 ">
        <h2 class="font-bold text-3xl">Categories Books</h2>
        <div class="flex gap-40 flex-wrap items-center justify-center py-2 mb-10 h-full">
            <?php 
            if(empty($fetch_category_id_data)){
                $add_books = '<div class="flex pt-32 items-center justify-center"> <a href="./add_books.php" class=" px-8 py-2 font-semibold text-xl text-slate-600">No orders </a> </div>';
                echo $add_books;
            }else{
            foreach($fetch_category_id_data as $id_data){
                    $book_id = isset($id_data[0][0]) ? $id_data[0][0] :'';
                    $book_name = isset($id_data[0][1]) ? ucwords($id_data[0][1]) :'';
                    $book_author = isset($id_data[0][2]) ? $id_data[0][2] :'';
                    $book_price = isset($id_data[0][5]) ? $id_data[0][5] :'';
                    $book_image = isset($id_data[0][10]) ? $id_data[0][10] :'';
                    $rented_book_details = [$book_id,$user_email];
                    $rented_book_array = implode(',',$rented_book_details);
                    
                ?>
                <article class="w-60 h-80 border text-center rounded-xl cursor-pointer relative">
                    <a href="./book_return_form.php?rented_book_details=<?php echo $rented_book_array ?>" class=" absolute inset-0 z-10"></a>
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