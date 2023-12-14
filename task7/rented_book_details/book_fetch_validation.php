<?php
// include '../admin_session.php';
include '../validation.php';
include '../send_fetch_data_from_db.php';
include '../admin_session.php';

$fetch_data_from_db = new fetch_data_from_db();
$err_category = $err_book = $err_author = $err_book_copies = $err_image = $err_days = $err_charges_days = $errmsg = '';
$rented_book_id = $rented_book_name = $rented_book_author = $rented_book_category = $rented_book_description = $rented_book_image = $user_email = $cart_item_array = $get_selected_cart_item = $book_status = '';
$success = $rented_book_price = [];
$book_payment_charges = 0;

$login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';
$get_selected_cart_item = isset($_GET['selected_cart']) ? $_GET['selected_cart'] : '';
$cart_item_array = explode(',', $get_selected_cart_item);

$buy_book_id = isset($_GET['buy_book_id']) ? intval($_GET['buy_book_id']) : '';

$send_data_to_db = new send_data_to_db();
$fetch_data_from_db = new fetch_data_from_db();
$issue_date = date('Y-m-d');
$book_id = isset($_GET['book_id']) ? intval($_GET['book_id']) : '';
$fetch_id_query = $fetch_data_from_db->fetchiddata('books_details', $buy_book_id, $conn, 'book_id');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);


foreach ($fetch_id_data as $key => $value) {
    $book_id = isset($value[0]) ? ucwords($value[0]) : '';
    $book_name = isset($value[1]) ? ucwords($value[1]) : '';
    $book_author = isset($value[2]) ? $value[2] : '';
    $book_category = isset($value[3]) ? $value[3] : '';
    $book_copies = isset($value[4]) ? $value[4] : '';
    $book_price = isset($value[5]) ? $value[5] : '';
    $book_description = isset($value[6]) ? $value[6] : '';
    $book_image = isset($value[10]) ? $value[10] : '';
}


if (empty($buy_book_id)) {
    $product_name = "selected_cart";
    $item_id = implode(",", $cart_item_array);
    foreach ($cart_item_array as $item) {
        $cart_book_id_query = $fetch_data_from_db->fetchiddata('books_details', $item, $conn, 'book_id');
        $cart_book_id_data[] = mysqli_fetch_all($cart_book_id_query);
    }
    foreach ($cart_book_id_data as $data) {
        $book_charges_array[] = isset($data[0][5]) ? $data[0][5] : "";
    }
    if(!empty($book_return_date)){
    foreach ($book_charges_array as $book_price) {
        $book_payment_charges += ($book_return_date * ($book_price / 100));
    }
}
    $book_payment_charges += 10;
} else {
    $fetch_buy_book_id_query = $fetch_data_from_db->fetchiddata('books_details', $buy_book_id, $conn, 'book_id');
    $cart_book_id_data[] = mysqli_fetch_all($fetch_buy_book_id_query);
    $rented_book_id = isset($cart_book_id_data[0][0][0]) ? $cart_book_id_data[0][0][0] : '';
    $rented_book_copies[] = isset($cart_book_id_data[0][0][4]) ? $cart_book_id_data[0][0][4] : '';
    $rented_book_price = isset($cart_book_id_data[0][0][5]) ? $cart_book_id_data[0][0][5] : '';
    $product_name = "buy_book_id";
    $item_id = $rented_book_id;
    if (!empty($book_return_date)) {
        $book_payment_charges = ($book_return_date * ($book_price / 100)) + 10;
    }
}



$fetch_rented_book_user_query = $fetch_data_from_db->fetchiddata('rented_book_details', $login_email, $conn, 'user_email');
$fetch_rented_book_user_data = mysqli_fetch_all($fetch_rented_book_user_query);


$total_rented_books = count($cart_book_id_data);

if(!empty($total_rented_books)){
$shipping_charges = 10/$total_rented_books;
}
foreach($cart_book_id_data as $data){
    $book_price = !empty($data[0][5]) ? $data[0][5] : '';
    if(!empty($book_price)){
        $book_charges = ($book_price/100);
        if(!empty($book_return_date)){
        $book_actual_charges = ($book_rented_days_charges-10);
        if(empty($rented_days_charges)){
            $rented_days_charges = $book_return_date * $book_charges;
        }else{
        $rented_days_charges += $book_return_date * $book_charges;
        }
        }else{
            $book_actual_charges=  $rented_days_charges ='';
        }
    }
}

$err_returned_date = $err_address = $err_state = $err_city = $err_postal_code = $err_payment_method = $err_name_on_card = $err_card_number = $err_card_expiration_date = $err_cvc = $err_charges = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // if($book_status){
    if (isset($_POST['rent_now'])) {
        if ($email != $login_email) {
            $err_email = "Email not matched with login email";
        } else {
            $user_email = $email;
            $err_email = $admin_entered_details->email_match($user_email);
        }
        // $err_name = $admin_entered_details->name_validation($name);
        $err_returned_date = $admin_entered_details->emp($book_return_date);
        $err_address = $admin_entered_details->emp($address);
        $err_state = $admin_entered_details->name_validation($user_state);
        $err_city = $admin_entered_details->name_validation($user_city);
        $err_postal_code = $admin_entered_details->phone_length($user_postal_code, 6);
        $err_name_on_card = $admin_entered_details->name_validation($user_name_on_card);
        $err_card_number = $admin_entered_details->phone_length($user_card_number, 16);
        $err_card_expiration_date = $admin_entered_details->card_expiry_check($user_card_expiration_date);;
        $err_charges_days = $admin_entered_details->emp($book_rented_days_charges);
        $err_cvc = $admin_entered_details->phone_length($user_card_cvc, 3);
        // $err_charges = $admin_entered_details->emp($advance_charges);


        // if(!empty($buy_book_id)){
        // $selecteddays = isset($_POST["return_date"])? $_POST["return_date"] : '';


        
        // print_r($fetch_rented_book_user_data);
        if ($err_email == null && empty($err_returned_date) && empty($err_address) && empty($err_state) && empty($err_city) && empty($err_postal_code) && empty($err_name_on_card) && empty($err_card_number) && empty($err_card_expiration_date) && empty($err_cvc) && empty($err_charges_days)) {
            if($book_actual_charges == $rented_days_charges){
                if (!empty($buy_book_id)) {
                    foreach ($fetch_rented_book_user_data as $data) {
                        $user_db_email = $data[1];
                        $book_db_id = $data[7];

                        if (($user_db_email == $user_email) && ($book_db_id == $book_id)) {
                            $success[] = 0;
                        } else {
                            $success[] = true;
                        }
                    }
                } else {
                    foreach ($cart_book_id_data as $data) {
                        $book_id = !empty($data[0][0]) ? ucwords($data[0][0]) : '';
                        // print_r($rented_book_table_email);
                        if (empty($rented_book_table_id)) {
                            $success[] = true;
                        } else {
                            if (!in_array($book_id, $rented_book_table_id) && !in_array($user_email, $rented_book_table_email)) {
                                $success[] = true;
                            } elseif (in_array($book_id, $rented_book_table_id) && !in_array($user_email, $rented_book_table_email)) {
                                $success[] = true;
                            } elseif (!in_array($book_id, $rented_book_table_id) && in_array($user_email, $rented_book_table_email)) {
                                $success[] = true;
                            } else {
                                $success[] = 0;
                            }
                        }
                    }
                }
            
            // print_r($rented_book_table_email);
            $fail = 0;
            if (!in_array($fail, $success)) {
                foreach ($cart_book_id_data as $data) {
                    $book_id = !empty($data[0][0]) ? ucwords($data[0][0]) : '';
                    $book_price = !empty($data[0][5]) ? $data[0][5] : '';
                    $payment_status = "Pending";
                    $book_charges = ($book_price / 100);
                    $book_renting_charges = ($book_return_date * $book_charges) + $shipping_charges;
                    $returned_date = date('Y-m-d', strtotime($issue_date . " + $book_return_date days"));
                    $column_name = ['user_email', 'rented_days', 'user_address', 'user_state', 'user_city', 'user_pin_code', 'book_id', 'issue_date', 'returned_date', 'renting_charges', 'user_name_on_card', 'user_card_number', 'user_card_expiration_date', 'user_card_cvc', 'payment_status'];
                    $column_data = [$user_email, $book_return_date, $address, $user_state, $user_city, $user_postal_code, $book_id, $issue_date, $returned_date, $book_renting_charges, $user_name_on_card, $user_card_number, $user_card_expiration_date, $user_card_cvc, $payment_status];

                    $insert_rented_book_details[] = $send_data_to_db->insertindb('rented_book_details', $column_name, $column_data, $conn);

                }
                if(in_array($fail,$insert_rented_book_details)){
                    echo "Error: " . mysqli_error($conn);
                }else{
                if (empty($buy_book_id)) {
                    foreach ($rented_book_copies as $copies) {
                        $book_copies_column = ['book_copies'];
                        $book_copies = $copies - 1;
                        $book_copies_data = [$book_copies];
                        $db_book_details = $send_data_to_db->update_to_tb('books_details', $book_copies_column, $book_copies_data, 'book_id', $book_id, $conn);
                    }
                } else {
                    $book_copies_column = ['book_copies'];
                    $book_copies = $book_copies - 1;
                    $book_copies_data = [$book_copies];
                    $db_book_details = $send_data_to_db->update_to_tb('books_details', $book_copies_column, $book_copies_data, 'book_id', $book_id, $conn);
                }
                if (!$db_book_details) {
                    echo "Error: " . mysqli_error($conn);
                }

                    header("location: thankspage?" . $product_name . "=" . $item_id);
                }
            } else {
                $errmsg = "This book you have already purchase";
                echo $errmsg;
            }
        }else{
            $err_returned_date = $err_charges_days = "Invalid";
            $errmsg = "Selected days and purchase days not matched";
        }
            // print_r($rented_book_table_id);
            // print_r($book_id);
        } else {
            $errmsg = "Please complete the form";
        }
    } else {
        if (isset($_POST["select_cart"])) {
            if (!empty($user_selected_cart_item)) {
                $columns = implode(', ', $user_selected_cart_item);
                // $_SESSION['selected_cart'] = $user_selected_cart_item;
                header("location: ../rented_book_details/rented_books?selected_cart=" . $columns);
            } else {
                $errmsg = "Please select any item";
            }
            // $column = "";

        }
    }
    // }
}
// }
// }
//     if(isset($_POST['rent_now'])){

// }else{
//     $errmsg = "Please complete the form";
// }



// date_default_timezone_set('Asia/Kolkata');
// $date = new date();
// $book_issued_date = $date->date_time_in_india($currentDate);
$currentDate = date('Y-m-d');
$actual_return_date = "2023-12-24";

// Create DateTime objects from the date strings
$startDate = new DateTime($currentDate);
$endDate = new DateTime($actual_return_date);

// Calculate the difference in days
$interval = $startDate->diff($endDate);
$daysSpent = $interval->days; // Add 1 to include the end date

// echo "Number of days spent at the place: $daysSpent days";

$futureDate = date('Y-m-d', strtotime($currentDate . " + $book_return_date days"));
// echo $futureDate;

// if($futureDate < $user_card_expiration_date){
//     echo "OK";
// }else{
//     echo "NO";
// }

?>