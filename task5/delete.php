<?php
include '../task5/Registeration_form_with_php.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$querydata = $dbdata->fetchiddata('registeration_login', $id, $con, 'ID');
$fetchdata = mysqli_fetch_all($querydata);
$delete = new deletefromdb();
if ($fetchdata[0][2] == $_SESSION['email']) {
    session_destroy();
    $delete->deletefromdb('record_of_image', 'registeration_login', $con, 'user_id', 'ID', $id, 'login_form_in_html.php');
} else {

    $delete->deletefromdb('record_of_image', 'registeration_login', $con, 'user_id', 'ID', $id, 'admin3.php');
}
