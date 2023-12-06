<?php
require '../admin_session.php';
unset($_SESSION['login']);
header("location: ../book_home.php");
?>