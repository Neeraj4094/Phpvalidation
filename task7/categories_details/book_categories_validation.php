<?php
include '../validation.php';
include '../send_fetch_data_from_db.php';
$err_category = $err_image = $errmsg = '';
if (empty($category_name)) {
    $category_name = '';
}
$location = '';
$id = isset($_GET['id']) ? intval($_GET['id']) : '';
$image_upload = new upload_image();

$book_id_query = $fetch_data_from_db->fetchiddata('books_details', $category_name, $conn, 'book_category');
$book_id_data = mysqli_fetch_all($book_id_query);
$fetch_copies = isset($book_id_data[0][4]) ? $book_id_data[0][4] : '';

$fetch_category_table_data = $fetch_data_from_db->fetchdatafromdb($conn, 'category_details');

foreach ($fetch_category_table_data as $row) {
    // $book_id_array[] = $row[0];
    $category_name_array[] = ucfirst($row[1]);
}

$fetch_id_query = $fetch_data_from_db->fetchiddata('category_details', $id, $conn, 'category_id');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);

$fetch_category_name = isset($fetch_id_data[0][1]) ? $fetch_id_data[0][1] : '';
$fetch_category_image_name = isset($fetch_id_data[0][2]) ? $fetch_id_data[0][2] : '';
$fetch_category_unique_image = isset($fetch_id_data[0][3]) ? $fetch_id_data[0][3] : '';

if (empty($book_image_name) && (!empty($id))) {
    $category_image_name = $fetch_category_image_name;
}
$category_name = ucwords($category_name);

if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["add_categories"]))) {
    $err_category = $admin_entered_details->check_empty($category_name);
    $err_image = $admin_entered_details->image_validation($category_image, $id);
    $category_image_name = isset($category_image['name']) ? $category_image['name'] : '';

    $tablename = 'category_details';
    if (empty($err_category)) {
        if (empty($category_name_array)) {
            $location = '../books_details/add_books?category_name=' . $category_name . '';
            $column_name = ['category_name', 'category_image_name', 'category_unique_image_name'];
            $row_data = [$category_name, $category_image_name];
            $image_upload->image_upload($tablename, $err_image, $category_image, $id, $send_data_to_db, $column_name, $row_data, $conn, 'category_id', $location);
        } else {
            if ($category_name == $fetch_category_name) {
                if (!empty($category_image_name)) {
                    $location = 'category';
                    $column_name = ['category_name', 'category_image_name', 'category_unique_image_name'];
                    $row_data = [$category_name, $category_image_name, $fetch_category_unique_image];
                    $update_category = $image_upload->image_upload($tablename, $err_image, $category_image, $id, $send_data_to_db, $column_name, $row_data, $conn, 'category_id', $location);
                    echo ((!$update_category) ? ("Error:" . mysqli_error($conn)) : '');

                } else {
                    $location = 'category';
                    $column_name = ['category_name', 'category_image_name', 'category_unique_image_name'];
                    $row_data = [$category_name, $fetch_category_image_name, $fetch_category_unique_image];
                    $update_category = $image_upload->image_upload($tablename, $err_image, $category_image, $id, $send_data_to_db, $column_name, $row_data, $conn, 'category_id', $location);
                    echo ((!$update_category) ? ("Error:" . mysqli_error($conn)) : '');

                }
                header("location: $location");
            } elseif (!in_array($category_name, $category_name_array)) {
                if (empty($id)) {
                    if (is_array($err_image)) {
                        $location = '../books_details/add_books?category_name=' . $category_name;
                        $column_name = ['category_name', 'category_image_name', 'category_unique_image_name'];
                        $row_data = [$category_name, $category_image_name];
                        $insert_category = $image_upload->image_upload($tablename, $err_image, $category_image, $id, $send_data_to_db, $column_name, $row_data, $conn, 'category_id', $location);
                        echo ((!$insert_category) ? ("Error:" . mysqli_error($conn)) : '');
                        header("location: $location");
                    } else {
                        $errmsg = "Please select image";
                    }
                } else {
                    if (!empty($category_image_name)) {
                        $column = ['book_category'];
                        $data = [$category_name];

                        $location = './category';
                        $column_name = ['category_name', 'category_image_name', 'category_unique_image_name'];
                        $row_data = [$category_name, $fetch_category_image_name, $fetch_category_unique_image];
                        $update_category = $image_upload->image_upload($tablename, $err_image, $category_image, $id, $send_data_to_db, $column_name, $row_data, $conn, 'category_id', $location);
                        echo (($update_category) ? ($send_data_to_db->update_to_tb('books_details', $column, $data, 'book_category', $fetch_category_name, $conn)) : ("Error:" . mysqli_error($conn)));
                    } else {
                        $column = ['book_category'];
                        $data = [$category_name];

                        $location = 'category';
                        $column_name = ['category_name', 'category_image_name', 'category_unique_image_name'];
                        $row_data = [$category_name, $fetch_category_image_name, $fetch_category_unique_image];
                        $update_category = $image_upload->image_upload($tablename, $err_image, $category_image, $id, $send_data_to_db, $column_name, $row_data, $conn, 'category_id', $location);

                        if ($update_category) {
                            $update_book_details_category_name = $send_data_to_db->update_to_tb('books_details', $column, $data, 'book_category', $fetch_category_name, $conn);
                            header("location: category");
                        } else {
                            "Error:" . mysqli_error($conn);
                        }
                    }
                }
            } else {
                $errmsg = "This category already exists";
            }
        }
    }
}
?>