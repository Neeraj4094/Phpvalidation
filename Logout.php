<?php
require 'login_with_php.php';
unset($_SESSION['Login']);
header("location: /phpprogramms/Login_form_in_html.php");

print_r($_SESSION);
?>