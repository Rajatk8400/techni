<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recipient email (CHANGE THIS TO YOUR EMAIL)
    $recipient = "info@NexGen Systems.com";

    // Check if it's a newsletter subscription
    if (isset($_POST["newsletter_email"])) {
        $email = filter_var(trim($_POST["newsletter_email"]), FILTER_SANITIZE_EMAIL);
        $subject = "New Newsletter Subscription";
        $email_content = "New subscription request for: $email";
        $headers = "From: Newsletter <noreply@NexGen Systems.com>";
        $redirect = "index.php?status=success";
    } else {
        // Contact Form Data
        $fname = strip_tags(trim($_POST["fname"]));
        $lname = strip_tags(trim($_POST["lname"]));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = strip_tags(trim($_POST["message"]));

        $subject = "New Website Inquiry from $fname $lname";
        $email_content = "First Name: $fname\n";
        $email_content .= "Last Name: $lname\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";
        $headers = "From: $fname $lname <$email>";
        $redirect = "contact.php?status=success";
    }

    // Send the email
    if (mail($recipient, $subject, $email_content, $headers)) {
        header("Location: $redirect");
    } else {
        header("Location: contact.php?status=error");
    }
} else {
    // Not a POST request
    header("Location: contact.php");
}
?>



