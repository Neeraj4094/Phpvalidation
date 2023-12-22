<?php
// require("../admin_details/admin_login_validation.php");
include '../admin_session.php';
// include '../send_fetch_data_from_db.php';
// $id = isset($_GET['id']) ? $_GET['id'] : '';

$login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';
// if (!$id) {
//     header("location: ../admin_details/admin_dashboard.php");
// }
// /phpprogramms/task7/user_details/lock_user?email=' . $login_email . '
// $fetch_db_data = new fetch_db_data();
// $querydata = $fetch_db_data->fetchiddata('user_details', $id, $conn, 'user_id');
// $fetch_id_data = mysqli_fetch_all($querydata);
// $delete_book_data = new delete_from_db();

// $delete_from_db = $delete_book_data->deletefromdb('user_details', $conn, 'user_id', $id, 'user_dashboard.php');
// if(!$delete_from_db){
//     echo "Error: " . mysqli_error($conn);
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/output.css">
    <title>Document</title>
</head>
<body>
    <?php
            $delete_user = '<div class="w-full h-screen flex items-center justify-center fixed  left-0 bottom-0 right-0 bg-black/40">
            <form action="../home_page" method="post" class="w-80 h-36 "><div class="grid font-semibold place-items-center w-full h-full border rounded-xl py-2 shadow z-20 bg-white text-black relative">
                <button type="submit" ><span class="  font-bold text-2xl text-slate-400 absolute right-2 top-2">
                <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2.939 12.789L10 11.729l-3.061 3.06-1.729-1.728L8.271 10l-3.06-3.061L6.94 5.21 10 8.271l3.059-3.061 1.729 1.729L11.729 10l3.06 3.061-1.728 1.728z"></path></svg>
                </span></a>
            </form>
            <form action="../user_details/lock_user?email=' . $login_email . '" method="post"
            <div class="grid place-items-center gap-4 pb-2">
                <h2 class="px-6 font-semibold pt-3 text-black text-center">Are you sure u want to delete this account</h2>
                <button type="submit"><span class="  font-bold rounded-md bg-blue-600 text-white px-3 border ">Yes</button>
            </div></form></div>';
            
                echo $delete_user;
        // if(!empty($logout)){
            
        // }
    ?>
</body>
</html>