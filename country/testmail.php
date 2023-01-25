<?php
function send_mail($email)
{
    $subject = "Welcome to our website";
    $message = "Thank you for registering on our website. We're glad to have you as a customer";
    $header = "From: WE-SHOP";
    mail($email, $subject, $message, $header);
}

$to = "keynalaure@gmail.com";
send_mail($to);
