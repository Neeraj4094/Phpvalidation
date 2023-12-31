<?php
include("../send_fetch_data_from_db.php");
include '../admin_session.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : '';
$logged_in_user_email = isset($_GET['email']) ? trim($_GET['email']) : '';
$user_rented_id = isset($_GET['rented_id']) ? trim($_GET['rented_id']) : '';
$user_rented_data = explode(',', $user_rented_id);

$user_id = isset($user_rented_data[0]) ? $user_rented_data[0] : '';
$user_rented_status = isset($user_rented_data[1]) ? $user_rented_data[1] : '';

$fetch_id_query = $fetch_data_from_db->fetchiddata('user_details', $id, $conn, 'user_id');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);

$user_email = isset($fetch_id_data[0][2]) ? $fetch_id_data[0][2] : '';
$user_actual_status = isset($fetch_id_data[0][7]) ? $fetch_id_data[0][7] : '';

if (!empty($user_rented_id)) {

    if (($user_rented_status == 'Active')) {
        $user_status = 'Blocked';
        $column_name = ['status'];
        $row_data = [$user_status];
        $block_user = $send_data_to_db->update_to_tb('user_details', $column_name, $row_data, 'user_id', $user_id, $conn);
        if (!$block_user) {
            echo "Error: " . mysqli_error($conn);
        } else {
            unset($_SESSION['login']);
            header("location: ../rented_book_details/rented_book");
        }

    } else {
        $user_status = 'Active';
        $column_name = ['status'];
        $row_data = [$user_status];

        $block_user = $send_data_to_db->update_to_tb('user_details', $column_name, $row_data, 'user_id', $user_id, $conn);
        if (!$block_user) {
            echo "Error: " . mysqli_error($conn);
        } else {
            unset($_SESSION['login']);
            header("location: ../rented_book_details/rented_book");
        }

    }
} elseif (empty($fetch_id_data)) {
    $user_status = 'Blocked';
    $column_name = ['status'];
    $row_data = [$user_status];
    $insert_user = $send_data_to_db->update_to_tb('user_details', $column_name, $row_data, 'email', $logged_in_user_email, $conn);
    if (!$insert_user) {
        echo "Error: " . mysqli_error($conn);
    } else {
        unset($_SESSION['login']);
        header("location: ../home_page");
    }
} else {
    if (($user_actual_status == 'Active')) {
        $user_status = 'Blocked';
        $column_name = ['status'];
        $row_data = [$user_status];
        $block_user = $send_data_to_db->update_to_tb('user_details', $column_name, $row_data, 'email', $user_email, $conn);
        echo (!$block_user) ? ("Error: " . mysqli_error($conn)) : header("location: ./users");

    } else {
        $user_status = 'Active';
        $column_name = ['status'];
        $row_data = [$user_status];

        $block_user = $send_data_to_db->update_to_tb('user_details', $column_name, $row_data, 'email', $user_email, $conn);
        echo (!$block_user) ? ("Error: " . mysqli_error($conn)) : header("location: ./users");
    }
}
?>