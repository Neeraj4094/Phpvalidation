<?php

function smtp_mailer($to_email, $subject, $body, $headers)
{
    $errmsg = '';
    if (mail($to_email, $subject, $body, $headers)) {
        $errmsg = 'Mail sent successfully. Please, check your mail';
        return $errmsg;
    }
    $errmsg = "Email sending failed...";
    return $errmsg;
}