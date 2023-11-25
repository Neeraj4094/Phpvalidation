<?php
$server = "localhost";
$username = "root";
$password1 = "";
$db = "student";
class create_table
{
    public function createtable(mixed $con,mixed $tablename): bool
    {
        if ($con->query($tablename) === TRUE) {
            // Table created successfully
            return true;
        } else {
            die("Error: " . $con->error . "<br>");
        }
    }
}
try {
    $con = new mysqli($server, $username, $password1);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $db";
    if ($con->query($sql) === TRUE) {
        // Database created successfully
    } else {
        echo "Error: " . $con->error . "<br>";
    }

    $con->select_db($db);

    $tableName = "registeration_login";
    $reg = "CREATE TABLE IF NOT EXISTS $tableName (
        ID INT(4) PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100),
        email VARCHAR(50),
        password VARCHAR(20),
        occupation VARCHAR(20),
        role VARCHAR(20),
        skills VARCHAR(20),
        created_date DATETIME,
        modified_date DATETIME
    );";
    $createtable = new create_table();
    $registerationtable = $createtable->createtable($con, $reg); //Registeration table created successfully

    $date = date('Y-m-d H:i:s');
    $imagename = "CREATE TABLE IF NOT EXISTS record_of_image (
        ID int(4) PRIMARY KEY AUTO_INCREMENT,
        user_image text, 
        user_id int(4),
        Image_name varchar(100),
        created_date DATETIME,
        Modified_Date datetime,
        foreign key (user_id) references registeration_login(ID)
    )";

    $imagetable = $createtable->createtable($con, $imagename); //Login table created successfully

} catch (Exception $e) {
    echo "Connection Failed: " . $e->getMessage();
}
