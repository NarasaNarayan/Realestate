<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);
    $subject = trim($_POST["subject"]);

    // Validate input
    // if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     echo "Please fill in all fields correctly.";
    //     exit;
    // }

    // Set email parameters
    $to = "lakshminarayan202254@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Message from $name";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Subject:\n$subject\n";
    $email_content .= "Message:\n$message\n";

    $email_headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $email_content, $email_headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Sorry, something went wrong. Please try again.";
    }
} else {
    echo "There was a problem with your submission. Please try again.";
}
?>
