<?php
// include ("./validation.php");
// include ("send_fetch_data_from_db.php");
include 'admin_login_validation.php';



$fetch_data_from_db = new fetch_data_from_db();
$updateobject = new send_data_to_db();

$id = isset($_GET['id'])? $_GET['id'] : '';

$fetch_id_query = $fetch_data_from_db->fetchiddata('admin_data', $id, $conn, 'admin_id');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);

$fetch_name_from_id = isset($fetch_id_data[0][1])? $fetch_id_data[0][1] :'';
$fetch_email_from_id = isset($fetch_id_data[0][2])? $fetch_id_data[0][2] :'';
$fetch_password_from_id = isset($fetch_id_data[0][3])? $fetch_id_data[0][3] :'';
$fetch_phone_number_from_id = isset($fetch_id_data[0][4])? $fetch_id_data[0][4] :'';
$fetch_occupation_from_id = isset($fetch_id_data[0][5])? $fetch_id_data[0][5] :'';

$tablename = "admin_data";
$fetch_data_from_db = new fetch_data_from_db ();
$admin_fetch_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, $tablename);
$check_email = $fetch_data_from_db->searchemail($admin_fetch_data_from_db,$login_email);



if(isset($_POST['update'])){
    $err_name = $admin_entered_details->name_validation($name);
    $err_email = $admin_entered_details->email_match($email);
    $err_password = $admin_entered_details->validation_password($password);
    $err_phone_number = $admin_entered_details->phone_length($phone_number,10);
    $err_occupation = $admin_entered_details->emp($occupation);

    
    if(($err_name == null && $err_email == null && $err_password == null && $err_phone_number == null && $err_occupation == null)){
        $admin_table_columns_name = ['admin_name','admin_email','admin_password','admin_phone_number','admin_occupation'];
        $admin_table_columns_data = [$name,$email,$password,$phone_number,$occupation];
        $column_id_name = 'admin_id';
        
        // header("location: ./admin_login.php");
        if(in_array($fetch_email_from_id,$_SESSION)){
            if(!in_array($email,$_SESSION) || !in_array($password,$_SESSION)){

                if(!in_array($email,$check_email) || !in_array($password,$check_email)){

                $_SESSION = ["email" => $email, "password" => $password];
                $updated_data = $updateobject->update_to_tb('admin_data',$admin_table_columns_name,$admin_table_columns_data,$column_id_name,$id,$conn);
                if(!$updated_data){
                    echo "Error: " . mysqli_error($conn);
                }
                header("location: ./admin_dashboard.php");
            }else{
                echo "This email already exists";
            }
        }else{
            $updated_data = $updateobject->update_to_tb('admin_data',$admin_table_columns_name,$admin_table_columns_data,$column_id_name,$id,$conn);
            if(!$updated_data){
                echo "Error: " . mysqli_error($conn);
            }
            header("location: ./admin_dashboard.php");
        }
        }
    }
    else{
        $errmsg = "Please complete the form";
    }
}
?>