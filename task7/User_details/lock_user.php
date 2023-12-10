<?php
include ("../send_fetch_data_from_db.php");
// if(!$id){
//     header("location: ../admin_details/admin_dashboard.php");
// }

$id = isset($_GET['id']) ? intval($_GET['id']) : '';
$fetch_id_query = $fetch_data_from_db->fetchiddata('user_details', $id, $conn, 'user_id');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);

$user_email = isset($fetch_id_data[0][2]) ? $fetch_id_data[0][2] :'';
$user_actual_status = isset($fetch_id_data[0][7]) ? $fetch_id_data[0][7] :'';
if($user_actual_status == 'Active'){
    $user_status = 'Blocked';
    $column_name = ['user_status'];
    $row_data = [$user_status];
    $block_user = $send_data_to_db->update_to_tb('user_details', $column_name, $row_data,'user_email',$user_email, $conn);
    print_r($block_user);
    if(!$block_user){
        echo "Error: " . mysqli_error($conn);
    }else{
    header("location: ./users");
    }
}else{
    $user_status = 'Active';
    $column_name = ['user_status'];
    $row_data = [$user_status];
    $insert_user = $send_data_to_db->update_to_tb('user_details', $column_name, $row_data,'user_email',$user_email, $conn);
    if(!$insert_user){
        echo "Error: " . mysqli_error($conn);
    }else{
    header("location: ./users");
}
}
?>