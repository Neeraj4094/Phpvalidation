<?php
include "../send_fetch_data_from_db.php";
include '../validation.php';

$rent_price = !empty($_POST['rent_price']) ? $_POST['rent_price'] : '';
$err_category = $err_book = $err_author = $err_book_copies = $err_image = $err_book_price = $err_book_desciption = $errmsg = $err_book_rent = "";
$total_book_copies = 0;
$book_name_array = $fetch_all_book_categories = [];
$get_category_name = isset($_GET["category_name"]) ? $_GET["category_name"] : "";
$get_url_category_name = empty(!$get_category_name) ? ("add_books?category_name=" . $get_category_name) : 'add_books';

$fetch_db_books_data = $fetch_data_from_db->fetchdatafromdb($conn, 'books_details');
$fetch_db_category_data = $fetch_data_from_db->fetchdatafromdb($conn, 'category_details');

$fetch_category_query = $fetch_data_from_db->fetchiddata('category_details', $category_name, $conn, 'category_name');
$fetch_category_data = mysqli_fetch_all($fetch_category_query);

foreach ($fetch_db_books_data as $data) {
    $book_name_array_list = strtolower($data[1]);
    $book_name_array[] = ucfirst($book_name_array_list);
    $fetch_all_book_categories[] = $data[3];
}
foreach ($fetch_db_category_data as $data) {
    $fetch_book_category[] = $data[1];
}
if (empty($fetch_book_category)) {
    header("location: ../categories_details/add_categories");
}

if (empty($get_category_name)) {
    $fetch_category_name_array = $fetch_book_category;
}
$fetch_book_copies = $fetch_data_from_db->fetch_data('books_details', 'book_copies', $category_name, $conn, 'book_category');
$total = count($fetch_book_copies);
$total_book_copies = array_sum(array_map('array_sum', $fetch_book_copies));


$id = isset($_GET['id']) ? intval($_GET['id']) : '';
$image_upload = new upload_image();

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
$fetch_book_rent_price = isset($fetch_id_data[0][10]) ? $fetch_id_data[0][10] : '';
$fetch_unique_image = isset($fetch_id_data[0][11]) ? $fetch_id_data[0][11] : '';

$actual_book_name = ucfirst($book_name);
if (empty($book_image_name) && (!empty($id))) {
    $book_image_name = $fetch_book_image_name;
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["add_books"]))) {

    date_default_timezone_set('UTC');
    $created_date = date("Y-m-d H:i:s A");  //Created Date
    $modified_date = date("Y-m-d H:i:s A");  // Modified Date


    $err_category = $admin_entered_details->check_empty(ucwords($category_name));
    $err_book = $admin_entered_details->check_empty($book_name);
    $err_author = $admin_entered_details->name_validation($author_name);
    $err_book_copies = $admin_entered_details->check_empty($book_copies);
    $err_image = $admin_entered_details->image_validation($book_image, $id);
    $err_book_price = $admin_entered_details->check_empty($book_price);
    $err_book_desciption = $admin_entered_details->check_empty($book_description);
    $err_book_rent = $admin_entered_details->check_number($rent_price);

    if (empty($fetch_category_data)) {
        $err_category = 'This category does not exists';
    }
    if (empty($err_category) && empty($err_book) && empty($err_author) && empty($err_book_copies) && empty($err_book_price) && empty($err_book_desciption) && empty($err_book_rent)) {
        $tablename = 'books_details';
        $location = './books';

        if (empty($book_name_array)) {
            $book_column = ['book_name', 'book_author', 'book_category', 'book_copies', 'book_price', 'description', 'book_image_name', 'created_date', 'modified_Date','book_rent_price', 'book_unique_image_name'];
            $book_details_array = [$book_name, $author_name, $category_name, $book_copies, $book_price, $book_description, $book_image_name, $created_date, $modified_date,$rent_price];
            $image_upload->image_upload($tablename, $err_image, $book_image, $id, $send_data_to_db, $book_column, $book_details_array, $conn, 'book_id', $location);

        } else {
            $errmsg = !empty($id) //If id is not empty then the data will be "updated" otherwise it will go to the next condition which is used for "inserting" the data 
                ? (
                    ($actual_book_name == $fetch_book_name) // If the user entered book name or id book name is same then it will execute otherwise it will update the whole data if the book name is not matched with the user entered data
                    ? (
                        ($update_book_column = ['book_name', 'book_author', 'book_category', 'book_copies', 'book_price', 'description', 'book_image_name', 'modified_Date','book_rent_price', 'book_unique_image_name']) &&
                        ($update_book_column_data = [$book_name, $author_name, $category_name, $book_copies, $book_price, $book_description, $book_image_name, $modified_date,$rent_price, $fetch_unique_image]) &&
                        ($image_upload->image_upload($tablename, $err_image, $book_image, $id, $send_data_to_db, $update_book_column, $update_book_column_data, $conn, 'book_id', $location) ? header('location: ./books') : ("Error:" . mysqli_error($conn)))
                    )
                    : (
                        
                        (!in_array($actual_book_name, $book_name_array)) //It is used to check the entered book name is not exist in the table of database, if the book name exist then it will return a error otherwise it will update the whole data
                        ? (
                            ($book_column = ['book_name', 'book_author', 'book_category', 'book_copies', 'book_price', 'description', 'book_image_name', 'created_date', 'modified_Date','book_rent_price' ,'book_unique_image_name']) &&
                            ($book_details_array = [$book_name, $author_name, $category_name, $book_copies, $book_price, $book_description, $book_image_name, $created_date, $modified_date,$rent_price, $fetch_unique_image]) &&
                            (($image_upload->image_upload($tablename, $err_image, $book_image, $id, $send_data_to_db, $book_column, $book_details_array, $conn, 'book_id', $location)) ? header('location: ./books') : ("Error:" . mysqli_error($conn)))
                        )
                        : 'This book already exists'
                    )
                )
                : (!empty($book_image_name) //If the book image is empty then it will renturn an error otherwise it will execute the statements which is mentioned in this ternary conditions
                    ? (!in_array($actual_book_name, $book_name_array)) //It is used for inserting the book data in table of database
                    ? (
                        ($book_column = ['book_name', 'book_author', 'book_category', 'book_copies', 'book_price', 'description', 'book_image_name', 'created_date', 'modified_Date','book_rent_price', 'book_unique_image_name']) &&
                        ($book_details_array = [$book_name, $author_name, $category_name, $book_copies, $book_price, $book_description, $book_image_name, $created_date, $modified_date,$rent_price]) &&
                        ($image_upload->image_upload($tablename, $err_image, $book_image, $id, $send_data_to_db, $book_column, $book_details_array, $conn, 'book_id', $location))
                    )
                    : 'This book already exists'
                    : ($err_image = "Error! Please Select Image"));

        }
    } else {
        $errmsg = "Please complete the form";
    }

    $column = ['book_quantity'];
    $row_data = [$total_book_copies];
    $update_category_table = $send_data_to_db->update_to_tb('category_details', $column, $row_data, 'category_name', $category_name, $conn);

    echo (!$update_category_table) ? ("Error:" . mysqli_error($conn)) : '';

}

?>