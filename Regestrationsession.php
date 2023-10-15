<?php
session_start();
require 'registerationwithphp.php';
if ($_SERVER['REQUEST_METHOD']=="POST") {
    if($_POST['submit']){

        $_SESSION[$_POST['email']] = $_POST;
    }
}
echo "<pre>";
print_r($_SESSION);
foreach($_SESSION as $v=>$j){
    echo "$v=>";
    print_r($j);
}
?>