<?php
require 'vendor/autoload.php'; // Include PHPMailer library

// Initialize PHPMailer
$mail = new PHPMailer(true);

try {
    // SMTP settings (replace with your own)
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com'; // Your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'parthatest147@outlook.com'; // Your SMTP username
    $mail->Password = 'test@147'; // Your SMTP password
    $mail->SMTPSecure = 'tls'; // Use 'tls' or 'ssl'
    $mail->Port = 587; // SMTP port (usually 587 for TLS)

    // Sender and recipient
    $mail->setFrom('parthatest147@outlook.com', 'Your Name'); // Your name and email
    $mail->addAddress('parthatest147@outlook.com', 'Recipient Name'); // Recipient's name and email

    // Form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Email content
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body = "Name: $name\nEmail: $email\nMessage:\n$message";

    // Send email
    $mail->send();
    echo 'Message sent successfully!';

} catch (Exception $e) {
    echo 'Error sending message: ' . $mail->ErrorInfo;
}
?>
