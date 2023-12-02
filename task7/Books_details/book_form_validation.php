<?php
include "../send_admin_data_to_db.php";

$err_category = $err_book = $err_author = $err_book_copies = $err_image = $err_book_price = $err_book_desciption = "";
$total_book_copies = 0;
$book_name_array = [];

$fetch_books_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, 'books_details');
foreach ($fetch_books_data_from_db as $row) {
    $book_name_array_list = strtolower($row[1]);
    $book_name_array[] = ucfirst($book_name_array_list);
    $fetch_all_book_categories[] = $row[3];   
}

$fetch_book_copies = $fetch_data_from_db->fetch_data('books_details','book_copies', $category_name, $conn, 'book_category');
$total = count($fetch_book_copies);
$total_book_copies = array_sum(array_map('array_sum', $fetch_book_copies));
// $copies = array_sum(array_map('array_sum', $fetch_book_copies));
// $total_book_copies = ($total_book_copies + $book_copies); 

$id = isset($_GET['id']) ? intval($_GET['id']) : '';
$image_upload = new image();

$fetch_id_query = $fetch_data_from_db->fetchiddata('books_details', $id, $conn, 'book_id');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);

$fetch_category_name = isset($fetch_id_data[0][3]) ? $fetch_id_data[0][3] : '';
$fetch_book_name = strtolower(isset($fetch_id_data[0][1]) ? $fetch_id_data[0][1] : '');
$fetch_book_name = ucfirst($fetch_book_name);
$fetch_author_name = isset($fetch_id_data[0][2]) ? $fetch_id_data[0][2] : '';
$fetch_copies = isset($fetch_id_data[0][4]) ? $fetch_id_data[0][4] : '';
$fetch_book_price = isset($fetch_id_data[0][5]) ? $fetch_id_data[0][5] : '';
$fetch_book_description = isset($fetch_id_data[0][6]) ? $fetch_id_data[0][6] : '';
$fetch_book_image_name = isset($fetch_id_data[0][7]) ? $fetch_id_data[0][7] : '';
$fetch_unique_image = isset($fetch_id_data[0][10]) ? $fetch_id_data[0][10] : '';

$actual_book_name = ucfirst($book_name);

if (empty($book_image_name)) {
    if (!empty($id)) {
        $book_image_name = $fetch_book_image_name;
    }
}

if (isset($_POST["add_books"])) {
    date_default_timezone_set('UTC');
    $created_date = date("Y-m-d H:i:s A");  //Created Date
    $modified_date = date("Y-m-d H:i:s A");  // Modified Date


    $err_category = $admin_entered_details->emp($category_name);
    $err_book = $admin_entered_details->emp($book_name);
    $err_author = $admin_entered_details->name_validation($author_name);
    $err_book_copies = $admin_entered_details->emp($book_copies);
    $err_image = $admin_entered_details->image_validation($book_image, $id);
    $err_book_price = $admin_entered_details->emp($book_price);
    $err_book_desciption = $admin_entered_details->emp($book_description);

    if ($err_category == null && $err_book == null && $err_author == null && $err_book_copies == null &&$err_book_price == null && $err_book_desciption == null) {
        $dbname = 'books_details';
        $location = './books_dashboard.php';
        if (empty($book_name_array)) {
            $book_column = ['book_name', 'book_author', 'book_category', 'book_copies','book_price','book_description', 'book_image_name', 'created_date', 'modified_Date', 'book_unique_image_name'];
            $book_details_array = [$book_name, $author_name, $category_name, $book_copies,$book_price,$book_description, $book_image_name, $created_date, $modified_date];
            $image_upload->image_upload($dbname, $err_image, $book_image, $id, $send_data_to_db, $book_column, $book_details_array, $conn, 'book_id', $location);

        } else {
            if (!empty($id)) {
                if (($actual_book_name == $fetch_book_name)) {

                    $update_book_column = ['book_name', 'book_author', 'book_category', 'book_copies','book_price','book_description', 'book_image_name', 'modified_Date', 'book_unique_image_name'];
                    $update_book_column_data = [$book_name, $author_name, $category_name,$book_copies,$book_price,$book_description, $book_image_name, $modified_date, $fetch_unique_image];
                    $image_upload->image_upload($dbname, $err_image, $book_image, $id, $send_data_to_db, $update_book_column, $update_book_column_data, $conn, 'book_id', $location);
                    header('location: ./books_dashboard.php');
                } elseif (!in_array($actual_book_name, $book_name_array)) {

                    $book_column = ['book_name', 'book_author', 'book_category', 'book_copies','book_price','book_description', 'book_image_name', 'created_date', 'modified_Date', 'book_unique_image_name'];
                    $book_details_array = [$book_name, $author_name, $category_name, $book_copies,$book_price,$book_description, $book_image_name, $created_date, $modified_date,$fetch_unique_image];
                    $image_upload->image_upload($dbname, $err_image, $book_image, $id, $send_data_to_db, $book_column, $book_details_array, $conn, 'book_id', $location);
                    header('location: ./books_dashboard.php');
                } else {
                    $errmsg = "This book already exists";
                    return $errmsg;
                }
            } else {
                if (!empty($book_image_name)) {
                    $book_column = ['book_name', 'book_author', 'book_category', 'book_copies','book_price','book_description', 'book_image_name', 'created_date', 'modified_Date', 'book_unique_image_name'];
                    $book_details_array = [$book_name, $author_name, $category_name, $book_copies,$book_price,$book_description, $book_image_name, $created_date, $modified_date];
                    $image_upload->image_upload($dbname, $err_image, $book_image, $id, $send_data_to_db, $book_column, $book_details_array, $conn, 'book_id', $location);
                } else {
                    $err_image = "Please Select Image";
                }
            }
        }
    } else {
        $errmsg = "Please complete the form";
    }
    // echo $category_name;
    $column = ['book_quantity'];
    $row_data = [$total_book_copies];
    $update_category_table = $send_data_to_db->update_to_tb('category_details', $column, $row_data, 'category_name', $category_name, $conn);

    if (!$update_category_table) {
        echo "Error:" . mysqli_error($conn);
    }

}

?>