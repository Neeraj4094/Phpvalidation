<?php

// include 'admin_session.php';
include 'database_connection.php';
class fetch_data_from_db{
    public function fetchdatafromdb($con, $tablename, $show = null)
    {
        $select = "select * from $tablename";
        $query = mysqli_query($con, $select);
        $show = mysqli_fetch_all($query);
        return $show;
    }
    
    function searchemail($array, $email)
    {
        foreach ($array as $item) {
            if (in_array($email, $item)) {
                return $item;
            }
        }
        return $array;
    }
    public function fetchiddata($tablename, $id = null, $con, $column_id_name)
    {
        $fetchiddata = $query = '';
        $fetchiddata = "select * from $tablename where $column_id_name = '$id'";
        $query = mysqli_query($con, $fetchiddata);

        return $query;
    }
    public function fetch_data($tablename,$column_name, $id = null, $con, $column_id_name)
    {
        $fetchiddata = $query = '';
        $fetchiddata = "select $column_name from $tablename where $column_id_name = '$id'";
        $query = mysqli_query($con, $fetchiddata);
        $data = mysqli_fetch_all($query);
        return $data;
    }
}
class send_data_to_db{
    public function insertindb(mixed $tablename,mixed $column_name,mixed $row_data,mixed $con)
    {
        $result = '';
        $columns = implode(', ', $column_name);
        $values = "'" . implode("', '", $row_data) . "'";

        $insert = "insert into $tablename ($columns) values ($values)";
        $result = mysqli_query($con, $insert);
        if (!$result) {
            die("Error:" . mysqli_error($con));
        }
        return true;
    }
    public function update_to_tb($tablename,$column_name,$column_data,$col_id,$id,$con){
        $errmsg = '';
        $updatequery = '';
        $updateValues = array();
        for ($i = 0; $i < count($column_name); $i++) {
            $updateValues[] = " $column_name[$i] =  '$column_data[$i]' ";
        }
        $update = implode(', ', $updateValues);
        $updateindb = "UPDATE $tablename set $update where $col_id = '$id'";
        // print_r($updateindb);
        $updatequery = mysqli_query($con, $updateindb);
        if (!$updatequery) {
            die("Error:" . mysqli_error($con));
        }
        $errmsg = "Updated successfully";
        return $errmsg;
    }
    
}

class image{
    public function image_upload($tablename,$err_image,$book_image,$id,$sendtodb,$book_column,$book_details_array,$conn,$column_id,$location){
        if(!empty($err_image)) {
        if(is_array($err_image)){
            $ext = isset($err_image[0]) ? $err_image[0] :"";

            $book_unique_image_name = uniqid("Img-", true) . '.' . $ext;
            $upload = "../../Image/" . $book_unique_image_name;
            if (move_uploaded_file($book_image["tmp_name"], $upload)) {
                if($id == null){
                    array_push($book_details_array, $book_unique_image_name);
                    $sendtodb->insertindb($tablename, $book_column, $book_details_array, $conn); // Sending image data on db
                    
                    header("location: $location");
                }else{
                    $book_details_array[count($book_details_array)-1] = $book_unique_image_name;
                    $update =$sendtodb->update_to_tb($tablename,$book_column,$book_details_array,$column_id,$id,$conn);
                    if(!$update){
                        echo "Error: " . mysqli_error($conn);
                    }
                    header("location: $location");
                    return true;
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            return $err_image = '';
        }
        }else{
            if($id != null){
                $update =$sendtodb->update_to_tb($tablename,$book_column,$book_details_array,$column_id,$id,$conn);
                if(!$update){       
                    echo "Error: " . mysqli_error($conn);
                }
                // header("location: $location");
                return true;
            }
        }
    }
}

class delete_from_db
{
    public function deletefromdb(mixed $tablename1, mixed $con, mixed $col_id1, mixed $id, mixed $location): string
    {
        $deleteImageRecords = "DELETE FROM $tablename1 WHERE $col_id1 = '$id'";
        $queryImageRecords = mysqli_query($con, $deleteImageRecords);

        if (!$queryImageRecords) {
            echo "Error deleting image records: " . mysqli_error($con);
        }
        
        header("location: $location");
        return 0;
    }
}

class date
{
    public function date_time_in_india($datelist)
    {
        $us_date_time = '';
        $us_date_time = $datelist;
        $date_time = new DateTime($us_date_time, new DateTimeZone('UTC'));
        $date_time->setTimezone(new DateTimeZone('Asia/Kolkata'));
        $indian_date_time = $date_time->format('Y-m-d H:i:s A');
        return $indian_date_time;
    }
}

class crud{
    public function crud_operation(){
        
    }
}
$fetch_data_from_db = new fetch_data_from_db();
$send_data_to_db = new send_data_to_db();

$cancel_login = $show_login_data ='';


?>