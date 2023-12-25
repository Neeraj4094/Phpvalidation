<?php
require '../admin_session.php';


$login_email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';
$logout_path = isset($_GET['logout_email']) ? $_GET['logout_email'] : '';
unset($_SESSION['login']);
header("location: ../home_page");
?>
