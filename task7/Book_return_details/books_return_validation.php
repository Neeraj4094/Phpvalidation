<?php
include '../validation.php';
include '../send_fetch_data_from_db.php';

$err_name_on_card  = $err_card_number = $err_card_expiration_date  = $err_cvc = $success = '';
$return_book_id = $return_book_name = $return_book_author_name = $return_book_category_name = $return_book_price = $return_book_image = $book_charges = '';
if(empty($fetch_id_data)){
    $fetch_id_data = [];
}
$fetch_data_from_db = new fetch_data_from_db();
$send_data_to_db = new send_data_to_db();
$user_email = isset($_GET['user_email']) ? $_GET['user_email'] :'';

$fetch_category_name_query = $fetch_data_from_db->fetchiddata('rented_book_details', $user_email, $conn, 'user_email');
$fetch_category_name_data = mysqli_fetch_all($fetch_category_name_query);
foreach($fetch_category_name_data as $data){
    $id = isset($data[7]) ? $data[7] :'';
    $book_charges = isset($data[10]) ? $data[10] :'';
    $payment_details = isset($data[15]) ? $data[15] :'';
    $fetch_id_query = $fetch_data_from_db->fetchiddata('books_details', $id, $conn, 'book_id');
    $fetch_id_data = mysqli_fetch_all($fetch_id_query);
}
foreach($fetch_id_data as $value){
    $return_book_id = $value[0];
    $return_book_name = ucwords($value[1]);
    $return_book_author_name = $value[2];
    $return_book_category_name = $value[3];
    $return_book_price = $value[5];
    $return_book_image = $value[10];
}

class book_payment{
    public function payment($id,$con,$user_email){
        $updateindb = "UPDATE rented_book_details SET payment_record = 'Success' WHERE book_id = '$id' AND user_email = '$user_email'";

        // $updateindb = "UPDATE rented_book_details set 'payment_record' = 'Success' where 'book_id' = '$id' AND 'user_email' = '$user_email'";
        
        $updatequery = mysqli_query($con, $updateindb);
        if (!$updatequery) {
            die("Error:" . mysqli_error($con));
        }
        $errmsg = "Updated successfully";
        return $errmsg;
        }
    }

$payment = new book_payment();

if($_SERVER["REQUEST_METHOD"] == "POST" ){
    if(($_POST['return_now'])){

        $err_name_on_card = $admin_entered_details->name_validation($user_name_on_card);
        $err_card_number = $admin_entered_details->phone_length($user_card_number,16);
        $err_card_expiration_date = $admin_entered_details->emp($user_card_expiration_date);
        $err_cvc = $admin_entered_details->phone_length($user_card_cvc,3);
        if(empty($err_name_on_card) && empty($err_card_number) && empty($err_card_expiration_date) && empty($err_cvc)){
            
            foreach($fetch_category_name_data as $data){
                $column_name = ['payment_record'];
                $column_data = ['Pending'];
                $email = isset($data[1]) ? $data[1] :'';
                $id = isset($data[7]) ? $data[7] :'';
                $payment_details = isset($data[15]) ? $data[15] :'';
                // $fetch_query = $fetch_data_from_db->fetchiddata('rented_book_details', $id, $conn, 'rented_id');
                // $fetch_data = mysqli_fetch_all($fetch_query);
                // echo "<pre>";
                // echo $user_email;
                // echo "</pre>";
            if(($payment_details != "Success") && ($return_book_id == $id) && ($email == $user_email)){
                $update_user = $payment->payment($id,$conn,$user_email);
            
                if(!$update_user){
                    echo "Error: " . mysqli_error($conn);
                }else{
                    $success = '<div class="grid font-semibold place-items-center w-full h-40 border rounded-xl shadow z-20 bg-white text-black relative">
                    <a href="book_return_form.php?user_email=' . $user_email . '" ><span class="  font-bold text-2xl text-slate-400 absolute right-2 top-2">
                    <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2.939 12.789L10 11.729l-3.061 3.06-1.729-1.728L8.271 10l-3.06-3.061L6.94 5.21 10 8.271l3.059-3.061 1.729 1.729L11.729 10l3.06 3.061-1.728 1.728z"></path></svg>
                    </span></a>
                <div class="grid place-items-center gap-4">
                    <button type="submit" name="login_page" data-toggle="tooltip" data-placement="top" title="Login">
                    <svg class="w-10 h-10 text-blue-600" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"></rect><path d="M24 4L29.2533 7.83204L35.7557 7.81966L37.7533 14.0077L43.0211 17.8197L41 24L43.0211 30.1803L37.7533 33.9923L35.7557 40.1803L29.2533 40.168L24 44L18.7467 40.168L12.2443 40.1803L10.2467 33.9923L4.97887 30.1803L7 24L4.97887 17.8197L10.2467 14.0077L12.2443 7.81966L18.7467 7.83204L24 4Z" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17 24L22 29L32 19" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </button>
                    <h2 class=" text-lg font-semibold text-black text-center">Payment Successfull</h2>
                </div>';
                    // header("location: ../book_home.php");
                }
            }else{
                $errmsg = "Thanks but payment already done";  
            }
    }
        }else{
            $errmsg = "Please complete the form";
        }
    }
}
?>