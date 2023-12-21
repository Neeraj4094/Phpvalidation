<?php

// include 'admin_session.php';
include 'database_connection.php';

/**
 * class fetch_data_from_db
 *
 * This is a brief description of the create_tb class.
 * This class is used to fetch data from table of database and then perform further procedures
 */
class fetch_db_data
{
    /**
     *
     * This is a brief description of the fetchdatafromdb function.
     * This function is used to fetch data from the table of database.
     * @param mixed $con The database connection object. This is used for checking the connection
     * @param string $tablename The name of the table from which the data will be fetched.
     * @return mixed Returns array if the table is found and data is fetched successfully, string otherwise.
     */
    public function fetchdatafromdb(mixed $con, string $tablename): mixed
    {
        // $result = '';
        $select = "select * from $tablename";
        $query = mysqli_query($con, $select);
        $data = mysqli_fetch_all($query);
        if (!$data) {
            $result = [];
            return $result;
        }
        return $data;
    }

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is used for searching data from the array.
     * @param array $array This is the array from which the data will be searched
     * @param mixed $data The data that will be searched from the array
     * @return array Returns array if the data is found successfully, otherwise return the array that was passed for searching.
     */
    function searchemail(array $array, string $data): array
    {
        // print_r($array);
        foreach ($array as $item) {
            if (in_array($data, $item)) {
                return $item;
            }
        }
        return $array;
    }

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is used for fetching all the row data from the table of database where the column matches.
     * @param string $tablename The tablename from which data will be fetched
     * @param mixed $id The row data will be fetched if the column data is matched in column name of table
     * @param mixed $con The database connection object. This is used for checking the connection
     * @param mixed $column_id_name The column name from which the data will be fetched
     * @return mixed Returns array if the data is found successfully, otherwise null.
     */
    public function fetchiddata(string $tablename, mixed $id = null, mixed $con, string $column_id_name): mixed
    {
        $fetchiddata = $query = '';
        $fetchiddata = "select * from $tablename where $column_id_name = '$id'";
        $query = mysqli_query($con, $fetchiddata);

        return $query;
    }

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is used for fetching the column data from the table of database where the column matches.
     * @param string $tablename The tablename from which data will be fetched
     * @param string $column_name The column name from which data will be fetched if the $column id name is matched with column name of table
     * @param string $id This is used for fetching data where the conditon matches condition 
     * @param mixed $con The database connection object. This is used for checking the connection
     * @param mixed $column_id_name The column name from which the data will be fetched
     * @return mixed Returns array if the data is found successfully, otherwise null.
     */
    public function fetch_data(string $tablename, string $column_name, mixed $id = null, mixed $con, mixed $column_id_name) : array
    {
        $fetchiddata = $query = '';
        $fetchiddata = "select $column_name from $tablename where $column_id_name = '$id'";
        $query = mysqli_query($con, $fetchiddata);
        $data = mysqli_fetch_all($query);
        return $data;
    }

    /**
     *
     * This is a brief description of the searchemail function.
     * This function is used for fetching the column data from the table of database where the column matches.
     * @param string $tablename The tablename from which data will be fetched
     * @param string $buy_book_id This is used for fetching data where the conditon matches
     * @param string $user_id This is used for fetching data where the conditon matches
     * @param mixed $con The database connection object. This is used for checking the connection
     * @return mixed Returns array if the data is found successfully, otherwise null.
     */
    public function fetch_user_order_data(string $tablename, mixed $buy_book_id = null,mixed $user_id, mixed $con) : array
    {
        $fetchiddata = $query = '';
        $fetchiddata = "select * from rented_book_details where book_id = '$buy_book_id' AND user_id = '$user_id' AND payment_status = 'Pending'";
        
        $query = mysqli_query($con, $fetchiddata);
        $result = mysqli_fetch_all($query);
        return $result;
    }
}

/**
 * class send_data_to_db
 *
 * This is a brief description of the send_data_to_db class.
 * This class is used to send data to the table of database
 */
class send_data_to_db
{
    /**
     *
     * This is a brief description of the searchemail function.
     * This function is used for insert data in the table of database where the column name matches.
     * @param string $tablename The tablename where the data will be inserted
     * @param mixed $column_name The column name where the data will be inserted if the $column name is matched with column name of table
     * @param mixed $row_data This is the value that will be inserted in the tabe of database
     * @param mixed $con The database connection object. This is used for checking the connection
     * @return bool Returns true if the data is inserted successfully, otherwise false.
     */
    public function insertindb(string $tablename, mixed $column_name, mixed $row_data, mixed $con): bool
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
    /**
     *
     * This is a brief description of the searchemail function.
     * This function is used for updating the data in the table of database where the column name matches.
     * @param string $tablename The tablename where the data will be updated
     * @param mixed $column_name The column name where the data will be updated if the $column name is matched with column name of table
     * @param mixed $column_data The values that will be updated in the tabe of database
     * @param string $col_id TThe name of the column name in which the data will be updated in the tabe of database
     * @param mixed $id The data will be updated if the column data is matched with the conditions of the table 
     * @param mixed $con The database connection object. This is used for checking the connection
     * @return bool Returns true if the data is updated successfully, otherwise false.
     */
    public function update_to_tb(string $tablename, mixed $column_name, mixed $column_data, string $col_id, mixed $id, mixed $con): bool
    {
        $updatequery = '';
        $updateValues = array();
        for ($i = 0; $i < count($column_name); $i++) {
            $updateValues[] = " $column_name[$i] =  '$column_data[$i]' ";
        }
        $update = implode(', ', $updateValues);
        $updateindb = "UPDATE $tablename set $update where $col_id = '$id'";
        $updatequery = mysqli_query($con, $updateindb);
        if (!$updatequery) {
            die("Error:" . mysqli_error($con));
        }
        return true;
    }
}

/**
 * class insert_image
 *
 * This is a brief description of the upload_image class.
 * This class is used to insert image and data in the table of database
 */
class upload_image
{
    /**
     *
     * This is a brief description of the searchemail function.
     * This function is used for updating the data in the table of database where the column name matches.
     * @param string $tablename The tablename where the data will be inserted
     * @param mixed $err_image Tells the error is empty or not
     * @param array $book_image The is used to get data of image from the array in the tabe of database
     * @param string $col_id TThe name of the column name in which the data will be updated in the tabe of database
     * @param mixed $id The is used for updating imge where the column name is $id 
     * @param mixed $sendtodb The is used to send data to table of db 
     * @param mixed $book_column The column names where the data will be inserted or updated 
     * @param mixed $book_details_array The column data that will be inserted or updated 
     * @param mixed $conn The database connection object. This is used for checking the connection
     * @param string $column_id The name of the column where the data will be inserted if the condition matched
     * @param mixed $location The location where the page will be redirected after the insertion and updation of data
     * @return bool Returns true if the data is updated successfully, otherwise false.
     */
    public function image_upload(string $tablename, mixed $err_image, array $book_image, mixed $id, mixed $sendtodb, mixed $book_column, mixed $book_details_array, mixed $conn, string $column_id, mixed $location): bool
    {
        if (!empty($err_image)) {
            if (is_array($err_image)) {
                $ext = isset($err_image[0]) ? $err_image[0] : "";

                $book_unique_image_name = uniqid("Img-", true) . '.' . $ext;
                $upload = "../../Image/" . $book_unique_image_name;
                if (move_uploaded_file($book_image["tmp_name"], $upload)) {
                    if ($id == null) {
                        array_push($book_details_array, $book_unique_image_name);

                        $sendtodb->insertindb($tablename, $book_column, $book_details_array, $conn); // Sending image data on db

                        header("location: $location");
                    } else {
                        $book_details_array[count($book_details_array) - 1] = $book_unique_image_name;
                        $update = $sendtodb->update_to_tb($tablename, $book_column, $book_details_array, $column_id, $id, $conn);
                        if (!$update) {
                            echo "Error: " . mysqli_error($conn);
                        }
                        header("location: $location");
                        return true;
                    }
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
                return true;
            }
        } else {
            if ($id != null) {
                $update = $sendtodb->update_to_tb($tablename, $book_column, $book_details_array, $column_id, $id, $conn);
                if (!$update) {
                    echo "Error: " . mysqli_error($conn);
                }
                // header("location: $location");
                return true;
            }
        }
        return true;
    }
}


/**
 * class delete_from_db
 *
 * This is a brief description of the delete_from_db class.
 * This class is used to delete data from the table of database
 */
class delete_from_db
{
    /**
     *
     * This is a brief description of the searchemail function.
     * This function is used for deleting the data from the table of database where the column name matches.
     * @param string $tablename The tablename from where the data will be deleted
     * @param mixed $con The database connection object. This is used for checking the connection
     * @param mixed $id The is used for deleting the data where the $id match with the columnname data of the table of db 
     * @param mixed $location The location where the page will be redirected after the deletion of data
     * @return bool Returns true if the data is updated successfully, otherwise false.
     */
    public function deletefromdb(mixed $tablename, mixed $con, mixed $col_id, mixed $id, mixed $location): bool
    {
        $deleteImageRecords = "DELETE FROM $tablename WHERE $col_id = '$id'";
        $queryImageRecords = mysqli_query($con, $deleteImageRecords);

        if (!$queryImageRecords) {
            echo "Error deleting image records: " . mysqli_error($con);
        }

        header("location: $location");
        return true;
    }
}


/**
 * class date
 *
 * This is a brief description of the date class.
 * This class is used to show date according to Asia time
 */
class date
{
    /**
     *
     * This is a brief description of the searchemail function.
     * This function is used for show date according to asia time.
     * @param string $datelist This is used to show date according to asia time
     * @return string Returns true if the data is updated successfully, otherwise false.
     */
    public function date_time_in_india(string $datelist): string
    {
        $us_date_time = "";
        $us_date_time = $datelist;
        $date_time = new DateTime($us_date_time, new DateTimeZone('UTC'));
        $date_time->setTimezone(new DateTimeZone('Asia/Kolkata'));
        $indian_date_time = $date_time->format('Y-m-d H:i:s A');
        return $indian_date_time;
    }
}


/**
 * class book_payment
 *
 * This is a brief description of the book_payment class.
 * This class is used to for book payment after the order is done
 */
class book_payment
{
    /**
     *
     * This is a brief description of the searchemail function.
     * This function is used for show date according to asia time.
     * @param mixed $id The is used for paying payments of the book where the $id match with the columnname data of the table of db 
     * @param mixed $con The database connection object. This is used for checking the connection
     * @param int $user_id The is used for paying payments of the book where the $user_email match with the columnname data of the table of db 
     * @return string Returns true if the data is updated successfully, otherwise false.
     */
    public function payment(mixed $id, mixed $con, int $user_id): bool
    {
        $updateindb = "UPDATE rented_book_details SET payment_status = 'Success' WHERE book_id = '$id' AND user_id = '$user_id'";

        // $updateindb = "UPDATE rented_book_details set 'payment_record' = 'Success' where 'book_id' = '$id' AND 'user_email' = '$user_email'";

        $updatequery = mysqli_query($con, $updateindb);
        if (!$updatequery) {
            die("Error:" . mysqli_error($con));
        }
        return true;
    }
}
$fetch_data_from_db = new fetch_db_data();
$send_data_to_db = new send_data_to_db();

$cancel_login = $show_login_data = '';


?>