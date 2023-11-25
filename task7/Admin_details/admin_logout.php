<?php
require 'admin_login.php';
unset($_SESSION);
session_destroy();
header("location: ./admin_login.php");
?>