<?php
require 'login_with_php.php';
unset($_SESSION);
session_destroy();
header("location: ./login_form_in_html.php");
echo "Session Not exists";
?>