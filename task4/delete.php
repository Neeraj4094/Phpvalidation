<?php
include 'dbconnection.php';
include 'session.php';

$id = $_GET["id"];
$result = "select * from registeration_login where id = $id";
$result1 = mysqli_query($con, $result);
$fetchdata = mysqli_fetch_all($result1);


if ($fetchdata[0][2] == $_SESSION['submit']['email']) {
    session_destroy();
    $deleteImageRecords = "DELETE FROM record_of_image WHERE User_id = $id";
    $queryImageRecords = mysqli_query($con, $deleteImageRecords);

    if (!$queryImageRecords) {
        echo "Error deleting image records: " . mysqli_error($con);
    } else {
        $deleteRegistration = "DELETE FROM registeration_login WHERE ID = $id";
        $queryRegistration = mysqli_query($con, $deleteRegistration);

        if (!$queryRegistration) {
            echo "Error deleting registration record: " . mysqli_error($con);
        } else {
            echo "Deleted Successfully";
            header("location: registeration_form_in_html.php");
        }
    }
} else {

    $data = '';
    $deleteImageRecords = "DELETE FROM record_of_image WHERE User_id = $id";
    $queryImageRecords = mysqli_query($con, $deleteImageRecords);

    if (!$queryImageRecords) {
        echo "Error deleting image records: " . mysqli_error($con);
    } else {
        $deleteRegistration = "DELETE FROM registeration_login WHERE ID = $id";
        $queryRegistration = mysqli_query($con, $deleteRegistration);

        if (!$queryRegistration) {
            echo "Error deleting registration record: " . mysqli_error($con);
        } else {
            echo "Deleted Successfully";

            header("location: admin3.php");
        }
    }
}
?>