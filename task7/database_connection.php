<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'book_renting_system';
$booklist ='';

class create_tb
{
    /**
     * This function is used to create table which takes two parameters 
     * @param mixed $conn This firstly checks the connection is established or not and if it is true then it is used to send data to database
     * @param mixed $tablename This is a table that we want to create and it has different type of values e.g. int, varchar, etc.
     */
    public function create_table(mixed $conn,mixed $tablename): bool
    {
        if ($conn->query($tablename) === TRUE) {
            // Table created successfully
            return true;
        } else {
            die("Error: " . $conn->error . "<br>");
        }
    }
}

try{
    $conn = new mysqli($server,$username,$password);
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
        admin_password VARCHAR(20),
        admin_phone_number int(10),
        admin_occupation varchar(20)
    )";

    $createtable = new create_tb();
    $create_admin_table = $createtable->create_table($conn,$admin_tablecolumn_name);
    if(!$create_admin_table){
        echo "Error:" . mysqli_error($conn);
    }
    
    $books_table_name = "books_list";
    $books_tablecolumn_name = "CREATE TABLE IF NOT EXISTS $books_table_name(
    ID INT(4) PRIMARY KEY AUTO_INCREMENT,
    book_name VARCHAR(255),
    book_author VARCHAR(20),
    book_category VARCHAR(20),
    book_copies INT(3),
    book_unique_image_name TEXT(40),
    book_image_name VARCHAR(35)
    )";
    
    $create_book_table = $createtable->create_table($conn, $books_tablecolumn_name); //Create table of books
    if(!$create_book_table){
        echo "Error:" . mysqli_error($conn);
    }

    $user_table_name = "User_details";
    $user_tablecolumn_name = "CREATE TABLE IF NOT EXISTS $user_table_name(
        user_id INT(4) PRIMARY KEY AUTO_INCREMENT,
        user_name VARCHAR(30),
        user_email VARCHAR(40),
        user_password VARCHAR(20),
        user_phone_no int(10),
        user_address VARCHAR(50),
        gender varchar(10)
    )";

    $create_user_table = $createtable->create_table($conn,$user_tablecolumn_name); //Create table of users
    if(!$create_user_table){
        echo "Error:" . mysqli_error($conn);
    }

}catch(Exception $e){
    echo "Connection Failed:" . $e->getMessage();
}

?>