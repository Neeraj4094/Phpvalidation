<?php
// include 'session.php';
require './registeration_form_with_php.php';
$errmsg = $dbfetchdata = $errloginemail = $errloginpassword = '';
$dbfetchdata = new dbfetchdata();
$checkemail = $dbfetchdata->searchemail($registerationdata, $emailinlogin);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $errloginemail = $name->email_match($emailinlogin);
        $errloginpassword = $name->validation_password($passwordinlogin);
        if (!empty($emailinlogin) && !empty($passwordinlogin)) {
            if (in_array($emailinlogin, $checkemail) && in_array($passwordinlogin, $checkemail)) {
                $_SESSION = ["email" => $emailinlogin, "password" => $passwordinlogin];
                header("location: ./admin3.php");
            } else {
                $errmsg = "Email & password not matched";
            }
        } else {
            $errmsg = "Please complete the form";
        }
    }
}
