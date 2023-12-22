<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'book_renting_system';
$booklist = '';

/**
 * class create_tb
 *
 * This is a brief description of the create_tb class.
 * This class is used to create table in database
 */
class create_tb
{
    /**
     * Create a new table in the database.
     *
     * This function takes a database connection and a table name as parameters and it attempts to create a new table with the specified name.
     * This function is used to create table which takes two parameters 
     * @param mixed $conn The database connection object. This is used for checking the connection
     * @param mixed $tablename The name of the table to be created.
     * @return bool Returns true if the table creation was successful, false otherwise.
     */
    public function create_table(mixed $conn, mixed $tablename): bool
    {
        if ($conn->query($tablename) === TRUE) {
            // Table created successfully
            return true;
        } else {
            die("Error: " . $conn->error . "<br>");
        }
    }
}

// Used for creating database & tables, checking conection with the databse & also checks that the table or database is already created or not
try {

    $conn = new mysqli($server, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        // Database created successfully
    } else {
        echo "Error: " . $conn->error . "<br>";
    }

    $conn->select_db($dbname);

    $admin_table_name = "admin_data";
    $admin_tablecolumn_name = "CREATE TABLE IF NOT EXISTS $admin_table_name(
        admin_id INT(4) PRIMARY KEY AUTO_INCREMENT,
        admin_name VARCHAR(30),
        admin_email VARCHAR(35),
        admin_password VARCHAR(100),
        admin_phone_number text(255),
        admin_occupation varchar(20)
    )";

    $createtable = new create_tb();
    $create_admin_table = $createtable->create_table($conn, $admin_tablecolumn_name);
    if (!$create_admin_table) {
        echo "Error:" . mysqli_error($conn);
    }

    $books_table_name = "books_details";
    $books_tablecolumn_name = "CREATE TABLE IF NOT EXISTS $books_table_name(
    book_id INT(4) PRIMARY KEY AUTO_INCREMENT,
    book_name VARCHAR(255),
    book_author VARCHAR(20),
    book_category VARCHAR(20),
    book_copies INT(3),
    book_price text(10),
    book_description text(255),
    book_image_name VARCHAR(35),
    created_date datetime,
    modified_date datetime,
    book_unique_image_name TEXT(40)
    )";

    $create_book_table = $createtable->create_table($conn, $books_tablecolumn_name); //Create table of books
    if (!$create_book_table) {
        echo "Error:" . mysqli_error($conn);
    }

    $category_table_name = "category_details";
    $category_tablecolumn_name = "CREATE TABLE IF NOT EXISTS $category_table_name(
    category_id INT(4) PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(255),
    category_image_name VARCHAR(35),
    category_unique_image_name TEXT(40),
    book_quantity INT(3)
    )";

    $create_category_table = $createtable->create_table($conn, $category_tablecolumn_name); //Create table of books
    if (!$create_category_table) {
        echo "Error:" . mysqli_error($conn);
    }

    $user_table_name = "User_details";
    $user_tablecolumn_name = "CREATE TABLE IF NOT EXISTS $user_table_name(
        user_id INT(4) PRIMARY KEY AUTO_INCREMENT,
        user_name VARCHAR(30),
        user_email VARCHAR(40),
        user_password VARCHAR(100),
        user_phone_no text(255),
        user_address VARCHAR(50),
        gender varchar(10),
        user_status varchar(20)
    )";

    $create_user_table = $createtable->create_table($conn, $user_tablecolumn_name); //Create table of users
    if (!$create_user_table) {
        echo "Error:" . mysqli_error($conn);
    }

    $rented_book_table_name = "rented_book_details";
    $rented_book_tablecolumn_name = "CREATE TABLE IF NOT EXISTS $rented_book_table_name(
        rented_id INT(4) PRIMARY KEY AUTO_INCREMENT,
        user_id int(4),
        user_address VARCHAR(50),
        user_state varchar(20),
        user_city varchar(20),
        user_pin_code int(6),
        book_id int(3),
        issue_date date,
        returned_date date,
        renting_charges int(5),
        user_name_on_card varchar(40),
        user_card_number int(16),
        user_card_expiration_date varchar(35),
        user_card_cvc int(4),
        payment_status varchar(10)
    )";

    $create_rented_book_table = $createtable->create_table($conn, $rented_book_tablecolumn_name); //Create table of users
    if (!$create_rented_book_table) {
        echo "Error:" . mysqli_error($conn);
    }

    $cart_table_name = "cart_details";
    $cart_tablecolumn_name = "CREATE TABLE IF NOT EXISTS $cart_table_name(
        cart_id INT(4) PRIMARY KEY AUTO_INCREMENT,
        book_id int(4),
        user_id int(4)
    )";

    $create_cart_table = $createtable->create_table($conn, $cart_tablecolumn_name); //Create table of users
    if (!$create_cart_table) {
        echo "Error:" . mysqli_error($conn);
    }

    $user_review_table_name = "user_review_details";
    $user_review_tablecolumn_name = "CREATE TABLE IF NOT EXISTS $user_review_table_name(
        review_id INT(4) PRIMARY KEY AUTO_INCREMENT,
        user_id int(4),
        user_review varchar(100),
        user_rating int(2)
    )";

    $create_user_review_table = $createtable->create_table($conn, $user_review_tablecolumn_name); //Create table of users
    if (!$create_user_review_table) {
        echo "Error:" . mysqli_error($conn);
    }
} catch (Exception $e) {
    echo "Connection Failed:" . $e->getMessage();
}

?>