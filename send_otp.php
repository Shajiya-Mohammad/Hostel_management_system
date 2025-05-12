<?php
session_start();
require 'vendor/autoload.php'; // Load PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['email'])) {
    $email = $_POST['email'];

    // Generate a 6-digit OTP
    $otp = rand(100000, 999999);
    $_SESSION['otp'] = $otp;

    // Create PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'spsphostel@gmail.com'; // Replace with your Gmail
        $mail->Password = 'kylyvpeglblortug'; // Use your App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Settings
        $mail->setFrom('spsphostel@gmail.com', 'Your Website');
        $mail->addAddress($email);
        $mail->Subject = 'Your OTP Code';
        $mail->Body = "Your OTP is: $otp   THANK YOU FOR USING OUR WEBSITE";

        // Send Email
        $mail->send();
        echo "OTP Sent Successfully to $email";
    } catch (Exception $e) {
        echo "Error: " . $mail->ErrorInfo;
    }
}

?>
