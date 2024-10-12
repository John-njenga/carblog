<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize and get form inputs
    $name = trim(stripslashes($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = trim(stripslashes($_POST['subject']));
    $message = trim(stripslashes($_POST['message']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    // Email information
    $email_to = 'njorogejn5@gmail.com'; // Replace with your email address
    $email_subject = $subject;
    $email_body = "Name: $name\n\nEmail: $email\n\nMessage:\n$message";

    $headers = "From: <$email>\r\n";
    $headers .= "Reply-To: $email";

    // Send email
    if (mail($email_to, $email_subject, $email_body, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Failed to send the email. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
