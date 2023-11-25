<?php
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
    public function fetchiddata($dbname, $id = null, $con, $column_id_name)
    {
        $fetchiddata = $query = '';
        $fetchiddata = "select * from $dbname where $column_id_name = '$id'";
        $query = mysqli_query($con, $fetchiddata);

        return $query;
    }
}
class send_data_to_db{
    public function insertindb(mixed $dbname,mixed $column_name,mixed $row_data,mixed $con)
    {
        $result = '';
        $columns = implode(', ', $column_name);
        $values = "'" . implode("', '", $row_data) . "'";

        $insert = "insert into $dbname ($columns) values ($values)";
        $result = mysqli_query($con, $insert);
        if (!$result) {
            die("Error:" . mysqli_error($con));
        }
        return false;
    }
}

class delete_from_db
{
    public function deletefromdb(mixed $tablename1, mixed $tablename2, mixed $con, mixed $col_id1, mixed $col_id2, mixed $id, mixed $location): string
    {
        $deleteImageRecords = "DELETE FROM $tablename1 WHERE $col_id1 = $id";
        $queryImageRecords = mysqli_query($con, $deleteImageRecords);

        if (!$queryImageRecords) {
            echo "Error deleting image records: " . mysqli_error($con);
        } else {
            if($tablename2 != null){
            $deleteRegistration = "DELETE FROM $tablename2 WHERE $col_id2 = $id";
            $queryRegistration = mysqli_query($con, $deleteRegistration);

            if (!$queryRegistration) {
                echo "Error deleting registration record: " . mysqli_error($con);
            } else {
                header("location: $location");
            }
        }
        }
        return 0;
    }
}
?>