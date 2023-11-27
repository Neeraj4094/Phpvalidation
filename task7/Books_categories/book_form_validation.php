<?php
include "../send_admin_data_to_db.php";
$err_category = $err_book = $err_author = $err_book_copies = $err_image ="";
$fetch_books_data_from_db = $fetch_data_from_db->fetchdatafromdb($conn, 'books_details');
foreach ($fetch_books_data_from_db as $row) {
    // $book_id_array[] = $row[0];
    $book_name_array_list = strtolower($row[1]);
    $book_name_array[] = ucfirst($book_name_array_list);
}
$id = isset($_GET['id']) ? intval($_GET['id']) :'';


$fetch_id_query = $fetch_data_from_db->fetchiddata('books_details', $id, $conn, 'book_id');
$fetch_id_data = mysqli_fetch_all($fetch_id_query);

$fetch_category_name = isset($fetch_id_data[0][3])?$fetch_id_data[0][3]:'';
$fetch_book_name = strtolower(isset($fetch_id_data[0][1])?$fetch_id_data[0][1]:'');
$fetch_book_name = ucfirst($fetch_book_name);
$fetch_author_name = isset($fetch_id_data[0][2])?$fetch_id_data[0][2]:'';
$fetch_copies = isset($fetch_id_data[0][4])?$fetch_id_data[0][4]:'';
$actual_book_name = ucfirst($book_name);

if(isset($_POST["add_books"])){
    $book_details_array = [$book_name,$author_name, $category_name,$book_copies,$book_image_name];
    
    $err_category = $admin_entered_details->emp($category_name);
    $err_book = $admin_entered_details->emp($book_name);
    $err_author = $admin_entered_details->name_validation($author_name);
    $err_book_copies = $admin_entered_details->emp($book_copies);
    if($err_category == null && $err_book == null && $err_author == null && $err_book_copies == null){
        if($actual_book_name == $fetch_book_name){
            
            $err_image = $admin_entered_details->image_validation($book_image,$conn,$send_data_to_db,$book_details_array,$book_name_array,$id);
            if(!$err_image){
                echo "Error: ". mysqli_error($conn);
            }
            // header('location: ./books_dashboard.php');
        }elseif(!in_array($actual_book_name,$book_name_array)){
            
            $err_image = $admin_entered_details->image_validation($book_image,$conn,$send_data_to_db,$book_details_array,$book_name_array,$id);
            if(!$err_image){
                echo "Error: ". mysqli_error($conn);
            }
            // header('location: ./books_dashboard.php');
        }else{
            $errmsg = "This book already exists";
            return $errmsg;
        }
    }else{
        $errmsg = "Please complete the form";
    }
}
?>