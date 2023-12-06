<?php
include 'validation.php';
include 'admin_session.php';
include 'send_fetch_data_from_db.php';

$err_name = $err_review = $err_rating = '';
$user_email_array = [];

$send_data_to_db = new send_data_to_db();
$fetch_data_from_db = new fetch_data_from_db();

$login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';
$fetch_review_data_from_db = $fetch_data_from_db->fetch_data('user_review_details','user_email', $login_email, $conn, 'user_email');
foreach($fetch_review_data_from_db as $value){
    $user_email_array[] = isset( $value[0] ) ? $value[0] :'';
}

$success = '<div class="w-full h-full absolute top-0 flex items-center justify-center bg-black/25">
    <div
        class="grid font-semibold place-items-center w-96 h-48 border rounded-xl shadow z-20 bg-white text-black relative py-4">
        <a href="user_reviews.php"><span class="  font-bold text-2xl text-slate-400 absolute right-2 top-2">
        <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path
        d="M16 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2.939 12.789L10 11.729l-3.061 3.06-1.729-1.728L8.271 10l-3.06-3.061L6.94 5.21 10 8.271l3.059-3.061 1.729 1.729L11.729 10l3.06 3.061-1.728 1.728z">
        </path>
        </svg>
        </span></a>
        <p class="flex items-center gap-1 font-semibold text-xl">
            <span>Thanks</span>
            <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 448c-110.3 0-200-89.7-200-200S137.7 56 248 56s200 89.7 200 200-89.7 200-200 200zm-80-216c17.7 0 32-14.3 32-32s-14.3-32-32-32-32 14.3-32 32 14.3 32 32 32zm160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32-32 14.3-32 32 14.3 32 32 32zm4 72.6c-20.8 25-51.5 39.4-84 39.4s-63.2-14.3-84-39.4c-8.5-10.2-23.7-11.5-33.8-3.1-10.2 8.5-11.5 23.6-3.1 33.8 30 36 74.1 56.6 120.9 56.6s90.9-20.6 120.9-56.6c8.5-10.2 7.1-25.3-3.1-33.8-10.1-8.4-25.3-7.1-33.8 3.1z"></path></svg>
        </p>
        <div class="grid place-items-center gap-2">
        <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor"><defs></defs><title>send--alt--filled</title><path d="M27.71,4.29a1,1,0,0,0-1.05-.23l-22,8a1,1,0,0,0,0,1.87l8.59,3.43L19.59,11,21,12.41l-6.37,6.37,3.44,8.59A1,1,0,0,0,19,28h0a1,1,0,0,0,.92-.66l8-22A1,1,0,0,0,27.71,4.29Z"></path><rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>
            <h2 class=" text-lg font-semibold text-black text-center">Review sent Successfully</h2>
            <a href="book_home.php" class="border p-2 rounded-lg bg-blue-600 text-white">Go to Home Page</a>
        </div>
    </div>
    </div>';


if(isset($_POST['add_reviews'])){
    $err_name = $admin_entered_details->name_validation($name);
    $err_review = $admin_entered_details->emp($user_review); //Provides best books to the students and others peoples
    $err_rating = $admin_entered_details->emp($user_rating);
    if(empty($err_name) && empty($err_review) && empty($err_rating)){
        $column_name = ['user_email','user_name','user_review','user_rating'];
        $row_data = [$login_email,$name,$user_review,$user_rating];
        
            // if(!in_array($login_email, $user_email_array)){
                $user_review_data = $send_data_to_db->insertindb('user_review_details', $column_name, $row_data, $conn);
                // if(!$user_review_data){
                //     echo "Error: " . mysqli_error($conn);
                // }else{   
                    echo $success;
                // }
            // }else{
            //     $errmsg = "You have already send the review";
            // }
        
    }
}
?>