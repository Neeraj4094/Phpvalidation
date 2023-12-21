<?php
// include '../admin_session.php';
include '../validation.php';
include '../send_fetch_data_from_db.php';
include '../admin_session.php';


$rented_days_charges = 0;
$currentDate = date('Y-m-d');

$startDate = new DateTime($currentDate);
$endDate = new DateTime($book_return_date);

$interval = $startDate->diff($endDate);
$daysSpent = $interval->days;

$fetch_data_from_db = new fetch_db_data();
$err_category = $err_book = $err_author = $err_book_copies = $err_image = $err_days = $err_charges_days = $err_selected_date = $errmsg = '';
$rented_book_id = $rented_book_name = $rented_book_author = $rented_book_category = $rented_book_description = $rented_book_image = $user_email = $cart_item_array = $get_selected_cart_item = $book_status = '';
$success = $rented_book_price = [];
$book_payment_charges = 0;

$login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';

$user_id_data = $fetch_data_from_db->fetch_data('user_details','user_id', $login_email, $conn, 'user_email');
$user_id = isset($user_id_data[0][0]) ? $user_id_data[0][0] :'';

$get_selected_cart_item = isset($_SESSION['selected_cart']) ? $_SESSION['selected_cart'] : '';
$cart_item_array = explode(',', $get_selected_cart_item);

$buy_book_id = isset($_GET['buy_book_id']) ? intval($_GET['buy_book_id']) : '';

$send_data_to_db = new send_data_to_db();
$issue_date = date('Y-m-d');
$book_id = isset($_GET['book_id']) ? intval($_GET['book_id']) : '';


// buy book id & selected cart
if (empty($buy_book_id)) {
    $product_name = "selected_cart";
    $item_id = implode(",", $cart_item_array);
    foreach ($cart_item_array as $item) {
        $cart_book_id_query = $fetch_data_from_db->fetchiddata('books_details', $item, $conn, 'book_id');
        $cart_book_id_data[] = mysqli_fetch_all($cart_book_id_query);
    }
    
    
} else {
    $fetch_buy_book_id_query = $fetch_data_from_db->fetchiddata('books_details', $buy_book_id, $conn, 'book_id');
    $cart_book_id_data[] = mysqli_fetch_all($fetch_buy_book_id_query);
    $rented_book_id = isset($cart_book_id_data[0][0][0]) ? $cart_book_id_data[0][0][0] : '';
    $rented_book_copies[] = isset($cart_book_id_data[0][0][4]) ? $cart_book_id_data[0][0][4] : '';
    $rented_book_price = isset($cart_book_id_data[0][0][5]) ? $cart_book_id_data[0][0][5] : '';
    $product_name = "buy_book_id";
    $item_id = $rented_book_id;
    // if (!empty($book_return_date)) {
    //     $book_payment_charges = ($daysSpent * ($rented_book_price / 100)) + 10;
    // }
}


$fetch_rented_book_user_query = $fetch_data_from_db->fetchiddata('rented_book_details', $user_id, $conn, 'user_id');
$fetch_rented_book_user_data = mysqli_fetch_all($fetch_rented_book_user_query);

$fetch_rented_book_data = $fetch_data_from_db->fetchdatafromdb($conn, 'rented_book_details');
$user_order_book_id = $buy_book_id;
echo "<pre>";
// print_r($buy_book_id);
echo "</pre>";
if(!empty($fetch_rented_book_user_data)){
    if(!empty($buy_book_id)){
    $book_id_array[] = $buy_book_id;
    }else{
        $book_id_array = $cart_item_array;
    }
    foreach($book_id_array as $buy_book_id){
        foreach($fetch_rented_book_user_data as $order_data){
            $user_unique_id = isset( $order_data[1] ) ? $order_data[1] :"";
            $user_book_id = isset( $order_data[6] ) ? $order_data[6] :"";
            $book_status = isset( $order_data[14] ) ? $order_data[14] :"";
            
            // foreach($book_id as $buy_book_id);
            if(($user_id != $user_unique_id) && ($buy_book_id != $user_book_id)){
                $user_status[] = "Not Exist";
            }
            elseif(($user_id == $user_unique_id) && ($buy_book_id != $user_book_id)){
                $user_status[] = "Not Exist";
            }
            elseif(($user_id == $user_unique_id) && ($buy_book_id == $user_book_id) && ($book_status == "Success")){
                $user_status[] = "Not Exist";
            }elseif(($user_id == $user_unique_id) && ($buy_book_id == $user_book_id) && ($book_status == "Pending")){
                $user_status[] = "Exist";
            }else{
                $user_status[] = "Exist";
            }
        }
    }
    
    $order_status = "Exist";
    if(!in_array($order_status, $user_status)){
        $check_order_status = true;
    }else{
        $errmsg = "You have already purchase this book";
        $check_order_status = '';
    }
}else{
    $check_order_status = true;
}

// print_r($buy_book_id);
$total_rented_books = count($cart_book_id_data);

if (!empty($total_rented_books)) {
    $shipping_charges = 10 / $total_rented_books;
}

$fetch_user_id_query = $fetch_data_from_db->fetchiddata('cart_details', $user_id, $conn, 'user_id');
$fetch_user_id_data = mysqli_fetch_all($fetch_user_id_query);



if(!empty($fetch_user_id_data)){
foreach ($fetch_user_id_data as $data) {
    $book_id_list[] = isset($data[1]) ? $data[1] : '';
    $user_id_list[] = isset($data[2]) ? $data[2] : '';
}
}else{
    $book_id_list = $user_id_list= [];
}


if(!empty($fetch_rented_book_user_data)){
    foreach($fetch_rented_book_user_data as $order_data){
        $order_book_id_list[] = isset( $order_data[6] ) ? $order_data[6] :'';
    }
}else{
    $order_book_id_list = $fetch_rented_book_user_data =[];
}

// print_r($fetch_user_id_data);
// foreach ($cart_book_id_data as $data) {
//     $book_price = !empty($data[0][5]) ? $data[0][5] : '';
    
//     if (!empty($book_price)) {
//         $book_charges = ($book_price / 100);
//         if($rented_days_charges == 0){
//             $rented_days_charges = $daysSpent * $book_charges;
//         }else{
//             $rented_days_charges += $daysSpent * $book_charges;
//         }
//     }
// }

// if(!empty($book_actual_charges) && !empty($rented_days_charges)){
// $book_charges = round($book_actual_charges,2);
// $rented_book_charges = round($rented_days_charges,2);
// }
// echo $rented_days_charges;

$err_returned_date = $err_address = $err_state = $err_city = $err_postal_code = $err_payment_method = $err_name_on_card = $err_card_number = $err_card_expiration_date = $err_cvc = $err_charges = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // if($book_status){
        if (isset($_POST['rent_now'])) {
        // echo "<pre>";
        // print_r($cart_book_id_data);
        // echo "</pre>";
        if ($email != $login_email) {
            $err_email = "Email not matched with login email";
        } else {
            $user_email = $email;
            $err_email = $admin_entered_details->email_match($user_email);
        }
        // $err_returned_date = $admin_entered_details->check_empty($book_return_date);
        $err_address = $admin_entered_details->check_empty($address);
        $err_state = $admin_entered_details->name_validation($user_state);
        $err_city = $admin_entered_details->name_validation($user_city);
        $err_postal_code = $admin_entered_details->phone_length($user_postal_code, 6);
        $err_name_on_card = $admin_entered_details->name_validation($user_name_on_card);
        $err_card_number = $admin_entered_details->phone_length($user_card_number, 16);
        $err_card_expiration_date = $admin_entered_details->card_expiry_check($user_card_expiration_date);
        $err_selected_date = $admin_entered_details->book_return_handler($book_return_date);
        $err_charges_days = $admin_entered_details->card_expiry_check($book_rented_days_charges);
        $err_cvc = $admin_entered_details->phone_length($user_card_cvc, 3);
        
        if (empty($err_email) && empty($err_address) && empty($err_state) && empty($err_city) && empty($err_postal_code) && empty($err_name_on_card) && empty($err_card_number) && empty($err_card_expiration_date) && empty($err_cvc) && empty($err_selected_date)) {
            // if ($book_charges == $rented_book_charges) {
                
                if($check_order_status){
                    echo "Ok";
                    foreach ($cart_book_id_data as $data) {
                        $book_id = !empty($data[0][0]) ? ucwords($data[0][0]) : '';
                        $book_price = !empty($data[0][5]) ? $data[0][5] : '';
                        $payment_status = "Pending";
                        $book_charges = ($book_price / 100);

                        $book_renting_charges = ($daysSpent * $book_charges) + $shipping_charges;
                        $returned_date = date('Y-m-d', strtotime($issue_date . " + $book_return_date days"));
                        
                        $column_name = ['user_id', 'user_address', 'user_state', 'user_city', 'user_pin_code', 'book_id', 'issue_date', 'returned_date', 'renting_charges', 'user_name_on_card', 'user_card_number', 'user_card_expiration_date', 'user_card_cvc', 'payment_status'];
                        $column_data = [$user_id, $address, $user_state, $user_city, $user_postal_code, $book_id, $issue_date, $book_return_date, $book_renting_charges, $user_name_on_card, $user_card_number, $user_card_expiration_date, $user_card_cvc, $payment_status];
                        // echo "<pre>";
                        // print_r($column_data);
                        // echo "</pre>";
                        if(empty($fetch_rented_book_data)){
                            $insert_rented_book_details[] = $send_data_to_db->insertindb('rented_book_details', $column_name, $column_data, $conn);
                        }else{
                            
                                $insert_rented_book_details[] = $send_data_to_db->insertindb('rented_book_details', $column_name, $column_data, $conn);
                            
                        }

                    }
                // if (!empty($buy_book_id)) {
                //     foreach ($fetch_rented_book_user_data as $data) {
                //         $user_db_email = $data[1];
                //         $book_db_id = $data[7];

                //         if (($user_db_email == $user_email) && ($book_db_id == $book_id)) {
                //             $success[] = 0;
                //         } else {
                //             $success[] = true;
                //         }
                //     }
                // } else {
                //     foreach ($cart_book_id_data as $data) {
                //         $book_id = !empty($data[0][0]) ? ucwords($data[0][0]) : '';
                //         // print_r($rented_book_table_email);
                //         if (empty($rented_book_table_id)) {
                //             $success[] = true;
                //         } else {
                //             if (!in_array($book_id, $rented_book_table_id) && !in_array($user_email, $rented_book_table_email)) {
                //                 $success[] = true;
                //             } elseif (in_array($book_id, $rented_book_table_id) && !in_array($user_email, $rented_book_table_email)) {
                //                 $success[] = true;
                //             } elseif (!in_array($book_id, $rented_book_table_id) && in_array($user_email, $rented_book_table_email)) {
                //                 $success[] = true;
                //             } else {
                //                 $success[] = 0;
                //             }
                //         }
                //     }
                // }

                
                // print_r($rented_book_table_email);
                $fail = 0;
                // if (!in_array($fail, $success)) {
                //     foreach ($cart_book_id_data as $data) {
                //         $book_id = !empty($data[0][0]) ? ucwords($data[0][0]) : '';
                //         $book_price = !empty($data[0][5]) ? $data[0][5] : '';
                //         $payment_status = "Pending";
                //         $book_charges = ($book_price / 100);
                //         $book_renting_charges = ($book_return_date * $book_charges) + $shipping_charges;
                //         $returned_date = date('Y-m-d', strtotime($issue_date . " + $book_return_date days"));
                //         $column_name = ['user_email', 'rented_days', 'user_address', 'user_state', 'user_city', 'user_pin_code', 'book_id', 'issue_date', 'returned_date', 'renting_charges', 'user_name_on_card', 'user_card_number', 'user_card_expiration_date', 'user_card_cvc', 'payment_status'];
                //         $column_data = [$user_email, $book_return_date, $address, $user_state, $user_city, $user_postal_code, $book_id, $issue_date, $returned_date, $book_renting_charges, $user_name_on_card, $user_card_number, $user_card_expiration_date, $user_card_cvc, $payment_status];

                        // $insert_rented_book_details[] = $send_data_to_db->insertindb('rented_book_details', $column_name, $column_data, $conn);

                    // }
                    if (in_array($fail, $insert_rented_book_details)) {
                        echo "Error: " . mysqli_error($conn);
                    } else {
                    //     if (empty($buy_book_id)) {
                    //         foreach ($rented_book_copies as $copies) {
                    //             $book_copies_column = ['book_copies'];
                    //             $book_copies = $copies - 1;
                    //             $book_copies_data = [$book_copies];
                    //             $db_book_details = $send_data_to_db->update_to_tb('books_details', $book_copies_column, $book_copies_data, 'book_id', $book_id, $conn);
                    //         }
                    //     } else {
                    //         $book_copies_column = ['book_copies'];
                    //         $book_copies = $book_copies - 1;
                    //         $book_copies_data = [$book_copies];
                    //         $db_book_details = $send_data_to_db->update_to_tb('books_details', $book_copies_column, $book_copies_data, 'book_id', $book_id, $conn);
                    //     }
                    //     if (!$db_book_details) {
                    //         echo "Error: " . mysqli_error($conn);
                    //     }

                        header("location: thankspage?" . $product_name . "=" . $item_id);
                    }
                
                } else {
                    $errmsg = "You have already purchase this book";
                }
            // } else {
            //     $err_returned_date = $err_charges_days = "Invalid";
            //     $errmsg = "Selected days and purchase days not matched";
            // }
            // print_r($rented_book_table_id);
            // print_r($book_id);
        } else {
            $errmsg = "Please complete the form";
        }
    // } else {
    //     if (isset($_POST["select_cart"])) {
            // if (!empty($user_selected_cart_item)) {
            // $columns = implode(', ', $user_selected_cart_item);
            // $_SESSION['selected_cart'] = $user_selected_cart_item;
            // header("location: ../rented_book_details/rented_books?selected_cart=" . $columns);
            // } else {
            //     $errmsg = "Please select any item";
            // }
        // }
    }

}


$currentDate = date('Y-m-d');
$actual_return_date = "2023-12-24";

$startDate = new DateTime($currentDate);
$endDate = new DateTime($actual_return_date);

$interval = $startDate->diff($endDate);
$daysSpent = $interval->days;

$futureDate = date('Y-m-d', strtotime($currentDate . " + $book_return_date days"));

?>