<?php
require '../admin_session.php';
unset($_SESSION['login']);
header("location: ../home_page");
?>