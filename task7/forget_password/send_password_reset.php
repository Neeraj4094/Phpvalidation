<?php
// if(!empty($_POST['email'])){
// $email = $_POST['email'];
// }

// $token = bin2hex(random_bytes(16));

// $token_hash = hash('sha256', $token);
// $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

// $mysqli = require "../database_connection.php";

// $sql = "UPDATE forget_password SET reset_token_hash = ?, reset_token_expires_at = ? where email = ?";
// $stmt = mysqli_prepare($conn, $sql);

// // Check if the prepare statement was successful
// if ($stmt) {
//     mysqli_stmt_bind_param($stmt, "sss", $token_hash, $expiry, $email);
//     $result = mysqli_stmt_execute($stmt);
//     if(!$result){
//         echo "Error" . mysqli_error($conn);
//     }
// }

// if(mysqli_affected_rows($conn) > 0){

// }


// include '../database_connection.php';
// include '../admin_session.php';

// if(isset($_POST['reset_password'])){
//     $user_email = isset($_POST['email']) ? $_POST['email'] :'';
//     $_SESSION['reset_password'] = $user_email;
//     header("location: ../phpmailer_smtp/test.php");
// }

    // $reset_query = "SELECT * FROM user_details where user_email='$user_email'";
    // $reset_result = mysqli_query($conn, $reset_query);
    // if($reset_query){
    //     $emailcount = mysqli_num_rows($reset_result);
        
    //     // $userarray = mysqli_fetch_array($emailcount);
    // }else{
    //     echo "Error: " . mysqli_error($conn);
    // }

    // if($emailcount){

    //     $user_email = '4094.neeraj@gmail.com';
    //     $subject = "Reset Password";
    //     $body = "Click to reset password http://localhost/task7/forget_password/new_password.php?user_email=$user_email";
    //     $sender_email = "From: 4094.neeraj@gmail.com";


    //     // ini_set("SMTP", "mail.yourdomain.com");
    //     // ini_set("smtp_port", 587);

    //     if(mail($email, $subject, $body, $sender_email)){
    //         $_SESSION['msg'] = "Check your email to reset your password $email";
    //         header("location: login.php");
    //     }else{
    //         echo "Something went wrong";
    //     }
    // }