<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $doctor = $_POST["doctor"];
    $message = strip_tags(trim($_POST["message"]));

    // Validate input
    if (empty($name) || empty($email) || empty($phone) || empty($doctor) || empty($message)) {
        echo "Please fill in all fields.";
        exit;
    }

    // Email details
    $to = "shravanphutanr@gmail.com"; // Replace with your email
    $subject = "New Appointment Request from $name";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Doctor Selected: $doctor\n";
    $email_content .= "Message: $message\n";

    // Headers
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Thank you! Your appointment request has been sent.";
    } else {
        echo "Oops! Something went wrong, and we couldn't send your request.";
    }
} else {
    echo "There was a problem with your submission, please try again.";
}
?>
