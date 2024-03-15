<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Specify your email address
    $to = 'hplusfive@me.com';
    $subject = 'New Contact Form Submission';
    
    // Email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Email headers
    $email_headers = "From: $name <$email>";

    // Sending email
    if (mail($to, $subject, $email_content, $email_headers)) {
        // Successfully sent
        echo "<p>Thank you for your message, $name. We will get back to you soon!</p>";
    } else {
        // Failed to send
        echo '<p>Oops! Something went wrong, and we were unable to send your message.</p>';
    }
} else {
    // Not a POST request, redirect to form or show an error
    echo '<p>Please submit the form.</p>';
}
?>
