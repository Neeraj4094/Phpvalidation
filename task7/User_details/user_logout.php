<?php
require '../admin_session.php';
unset($_SESSION['login']);
header("location: ./user_login.php");
?>