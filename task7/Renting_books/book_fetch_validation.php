<?php
include '../validation.php';
include '../send_fetch_data_from_db.php';
include '../admin_session.php';

$err_category = $err_book = $err_author = $err_book_copies = $err_image = $err_days = '';
$rented_book_id = $rented_book_name = $rented_book_author = $rented_book_category = $rented_book_price = $rented_book_description = $rented_book_image = $user_email ='';

$login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';
$send_data_to_db = new send_data_to_db();
$fetch_data_from_db = new fetch_data_from_db();
$issue_date = date('Y-m-d');
$book_id = isset( $_GET['book_id'] ) ? intval( $_GET['book_id'] ) : '';
$fetch_id_query = $fetch_data_from_db->fetchiddata('books_details', $book_id, $conn, 'book_id');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);
// print_r($fetch_id_data);
foreach($fetch_id_data as $key => $value) {
    $book_id = isset($value[0]) ? ucwords($value[0]) : '';
    $book_name = isset($value[1]) ? ucwords($value[1]) : '';
    $book_author = isset($value[2]) ? $value[2] :'';
    $book_category = isset($value[3]) ? $value[3] :'';
    $book_price = isset($value[5]) ? $value[5] :'';
    $book_description = isset($value[6]) ? $value[6] :'';
    $book_image = isset($value[10]) ? $value[10] :'';
}


$buy_book_id = isset( $_GET['buy_book_id'] ) ? intval( $_GET['buy_book_id'] ) : '';
$fetch_buy_book_id_query = $fetch_data_from_db->fetchiddata('books_details', $buy_book_id, $conn, 'book_id');
$fetch_buy_book_id_data = mysqli_fetch_all($fetch_buy_book_id_query);
// print_r($fetch_buy_book_id_data);
foreach($fetch_buy_book_id_data as $key => $value) {
    $rented_book_id = isset($value[0]) ? ucwords($value[0]) : '';
    $rented_book_name = isset($value[1]) ? ucwords($value[1]) : '';
    $rented_book_author = isset($value[2]) ? $value[2] :'';
    $rented_book_category = isset($value[3]) ? $value[3] :'';
    $rented_book_price = isset($value[5]) ? $value[5] :'';
    $rented_book_description = isset($value[6]) ? $value[6] :'';
    $rented_book_image = isset($value[10]) ? $value[10] :'';
}

$err_returned_date = $err_address = $err_state = $err_city = $err_postal_code = $err_payment_method = $err_name_on_card= $err_card_number = $err_card_expiration_date = $err_cvc = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['rent_now'])){
        
        if($email != $login_email){
            $err_email = "Email not matched with login email";
        }else{
            $user_email = $email;
            $err_email = $admin_entered_details->email_match($user_email);
        }
    // $err_name = $admin_entered_details->name_validation($name);
    $err_returned_date = $admin_entered_details->emp($book_return_date);
    $err_address = $admin_entered_details->emp($address);
    $err_state = $admin_entered_details->name_validation($user_state);
    $err_city = $admin_entered_details->name_validation($user_city);
    $err_postal_code = $admin_entered_details->phone_length($user_postal_code,6);
    $err_name_on_card = $admin_entered_details->name_validation($user_name_on_card);
    $err_card_number = $admin_entered_details->phone_length($user_card_number,16);
    $err_card_expiration_date = $admin_entered_details->emp($user_card_expiration_date);
    // $err_payment_method = $admin_entered_details->emp($user_payment_method);
    $err_cvc = $admin_entered_details->phone_length($user_card_cvc,3);
    
    echo $user_card_expiration_date;
    
    // if(!empty($buy_book_id)){
        // $selecteddays = isset($_POST["return_date"])? $_POST["return_date"] : '';
        if($err_email == null && empty($err_returned_date) && empty($err_address) && empty($err_state) && empty($err_city) && empty($err_postal_code) && empty($err_name_on_card) && empty($err_card_number) && empty($err_card_expiration_date) && empty($err_cvc)){
            $book_charges = ($rented_book_price/100);
            $book_renting_charges = ($book_return_date * $book_charges) + 10;
            $returned_date = date('Y-m-d', strtotime($issue_date . " + $book_return_date days"));
            $column_name = ['user_email', 'rented_days', 'user_address', 'user_state', 'user_city', 'user_pin_code','book_id','issue_date','returned_date','renting_charges', 'user_name_on_card', 'user_card_number', 'user_card_expiration_date', 'user_card_cvc'];
            $column_data = [$user_email,$book_return_date,$address,$user_state,$user_city,$user_postal_code,$rented_book_id,$issue_date,$returned_date,$book_renting_charges,$user_name_on_card,$user_card_number,$user_card_expiration_date,$user_card_cvc];
            $insert_rented_book_details = $send_data_to_db->insertindb('rented_book_details', $column_name, $column_data, $conn);
            if(!$insert_rented_book_details){
                echo "Error: " . mysqli_error($conn);
            }else{
            header("location: ./thankspage.php?id=$rented_book_id");
            }
        }else{
            $errmsg = "Please complete the form";
        }
    }
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
$currentDate =  date('Y-m-d');
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


// Show


//Charges
// $charges = ($book_charges * $book_return_date);

// Fine
// if($book_return_date < $daysSpent) {
//     $late_return_value = ($daysSpent - $book_return_date);
// }

// $late_book_return_charges = $books/50;
// $fine = $late_return_value * $late_book_return_charges;
// $total_charges = $charges + $fine;
// echo $fine;
?>


<!-- 
    foreach($fetch_right_join_data as $data){
    $email = isset($data[1]) ? $data[1] :'';
    
    $merge = [];
    
    foreach($admin_fetch_data_from_db as $value){
        $id = isset($value[0]) ? $value[0] :'';
        $user_email = isset($value[2]) ? $value[2] :'';
        
        if(in_array($user_email, $data)){
            $merge[] = $data;
        }

        if($email == $user_email){
            $book_rented_data[] = $value;
            if(empty($book_rented_data[$email])){
            $book_rented_data[$email][] = $data;
            }else{
                $book_rented_data[$email][] = $data;
            }
        }
    }
}

for($i=0; $i <= count($book_rented_data); $i++){
$user_name = isset($book_rented_data[$i][1]) ? $book_rented_data[$i][1] : '';
$user_email = isset($book_rented_data[$i][2]) ? $book_rented_data[$i][2] : '';
$user_phone_number = isset($book_rented_data[$i][4]) ? $book_rented_data[$i][4] : '';
echo $user_email . "<br>";
foreach($book_rented_data as $key => $value){
    $user = isset($value[$user_email]) ? $value[$user_email] : '';
    $user_address = isset($value[$user_email][$i][3]) ? $value[$user_email][$i][3] :'';
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    // foreach($value as $key2 => $value2){
    //     $user_name = $value2[1];
        
    // }
}
}
 -->