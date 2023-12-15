
<?php

$to_email = "4020.neeraj@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Click to reset password http://localhost/phpprogramms/task7/forget_password/new_password";
$headers = "From: sender\'s email";
 
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

