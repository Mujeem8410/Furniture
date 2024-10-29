<?php
// Check for empty fields and validate email
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "No arguments provided!";
    return false;
}

// Sanitize user inputs
$name = htmlspecialchars(strip_tags($_POST['name']));
$email_address = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$message = htmlspecialchars(strip_tags($_POST['message']));


$to = 'muzeemsaifi88@gmail.com'; 
$email_subject = "Website Contact Form: $name";
$email_body = "You have received a new message from your website contact form.\n\n".
              "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\r\n";
$headers .= "Reply-To: $email_address\r\n";


if(mail($to, $email_subject, $email_body, $headers)) {
    echo "Message sent successfully!";
    return true;
} else {
    echo "Message could not be sent. Please try again later.";
    return false;
}
?>
