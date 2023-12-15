<?php
include '../validation.php';
include '../send_fetch_data_from_db.php';

$err_name_on_card  = $err_card_number = $err_card_expiration_date  = $err_cvc = $success = '';
$return_book_id = $return_book_name = $return_book_author_name = $return_book_category_name = $return_book_price = $return_book_image = $book_charges = '';
if(empty($fetch_id_data)){
    $fetch_id_data = [];
}
$fetch_data_from_db = new fetch_db_data();
$send_data_to_db = new send_data_to_db();
$get_rented_book_array = isset($_GET['rented_book_details']) ? $_GET['rented_book_details'] :'';
$rented_book_details = explode(',', $get_rented_book_array);
$book_id = isset($rented_book_details[0]) ? $rented_book_details[0] : '';
$user_email = isset($rented_book_details[1]) ? $rented_book_details[1] : '';

$fetch_category_name_query = $fetch_data_from_db->fetchiddata('books_details', $book_id, $conn, 'book_id');
$fetch_category_name_data = mysqli_fetch_all($fetch_category_name_query);

$fetch_rented_book_query = $fetch_data_from_db->fetchiddata('rented_book_details', $book_id, $conn, 'book_id');
$fetch_rented_book_data = mysqli_fetch_all($fetch_rented_book_query);

if(!empty($fetch_category_name_data)){
    foreach($fetch_category_name_data as $book_data){
        $rented_book_id = $book_data[0];
        $return_book_name = ucwords($book_data[1]);
        $return_book_author_name = $book_data[2];
        $return_book_category_name = $book_data[3];
        $return_book_charges = $book_data[4];
        $return_book_price = $book_data[5];
        $return_book_image = $book_data[10];
    }
}

$rented_charges = isset($fetch_rented_book_data[0][10]) ? $fetch_rented_book_data[0][10] :'';

$rented_book_issue_date = isset($fetch_rented_book_data[0][8]) ? $fetch_rented_book_data[0][8] :'';
$rented_book_return_date = isset($fetch_rented_book_data[0][9]) ? $fetch_rented_book_data[0][9] :'';


$current_date = date('Y-m-d');


$currentDate = date('Y-m-d');
$actual_return_date = date('Y-m-d');

$expected_book_returned_timestamp = strtotime($rented_book_return_date);
$returned_book_timestamp = strtotime($actual_return_date);
if( $expected_book_returned_timestamp > $returned_book_timestamp ){
    $fine = 0;
}else{
    $startDate = new DateTime($rented_book_return_date);
    $endDate = new DateTime($actual_return_date);
    $interval = $startDate->diff($endDate);
    $daysSpent = $interval->days;
    $fine = $daysSpent * $return_book_price/100;
}

$total_book_charges = $rented_charges + $fine;

$payment = new book_payment();


if($_SERVER["REQUEST_METHOD"] == "POST" ){
    if(($_POST['return_now'])){

        $err_name_on_card = $admin_entered_details->name_validation($user_name_on_card);
        $err_card_number = $admin_entered_details->phone_length($user_card_number,16);
        $err_card_expiration_date = $admin_entered_details->card_expiry_check($user_card_expiration_date);
        $err_cvc = $admin_entered_details->phone_length($user_card_cvc,3);
        if(empty($err_name_on_card) && empty($err_card_number) && empty($err_card_expiration_date) && empty($err_cvc)){
            
            foreach($fetch_rented_book_data as $data){
                $column_name = ['payment_status'];
                $column_data = ['Pending'];
                $email = isset($data[1]) ? $data[1] :'';
                $id = isset($data[7]) ? $data[7] :'';
                $payment_details = isset($data[15]) ? $data[15] :'';
                

                $rented_book_array = [$id,$email];
                $rented_book_data = implode(",",$rented_book_array);
                if(($payment_details != "Success") && ($rented_book_id == $id) && ($email == $user_email)){
                    $update_user = $payment->payment($id,$conn,$user_email);
                
                        if(!$update_user){
                            echo "Error: " . mysqli_error($conn);
                        }else{
                            $success = '<div class="grid font-semibold place-items-center w-full h-40 border rounded-xl shadow z-20 bg-white text-black relative">
                            <a href="book_return_form.php?rented_book_details=' . $rented_book_data . '" ><span class="  font-bold text-2xl text-slate-400 absolute right-2 top-2">
                            <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2.939 12.789L10 11.729l-3.061 3.06-1.729-1.728L8.271 10l-3.06-3.061L6.94 5.21 10 8.271l3.059-3.061 1.729 1.729L11.729 10l3.06 3.061-1.728 1.728z"></path></svg>
                            </span></a>
                        <div class="grid place-items-center gap-4 pb-2">
                            <button type="submit" name="login_page" data-toggle="tooltip" data-placement="top" title="Login">
                            <svg class="w-10 h-10 text-blue-600" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"></rect><path d="M24 4L29.2533 7.83204L35.7557 7.81966L37.7533 14.0077L43.0211 17.8197L41 24L43.0211 30.1803L37.7533 33.9923L35.7557 40.1803L29.2533 40.168L24 44L18.7467 40.168L12.2443 40.1803L10.2467 33.9923L4.97887 30.1803L7 24L4.97887 17.8197L10.2467 14.0077L12.2443 7.81966L18.7467 7.83204L24 4Z" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17 24L22 29L32 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </button>
                            <h2 class=" text-lg font-semibold text-black text-center">Payment Successfull</h2>
                            <a href="../home_page" ><span class="  font-bold rounded-lg p-1 border bg-slate-100">Go to home page</a>
                        </div>';
                            // header("location: ../book_home.php");
                        }
                    }else{
                        $errmsg = "Payment already done";  
                    }
        }
        }else{
            $errmsg = "Please complete the form";
        }
    }
}
?>