<?php
session_start();

if(isset($_POST['otp'])) {
    if($_POST['otp'] == $_SESSION['otp']) {
        echo "OTP Verified";
        unset($_SESSION['otp']); // Clear OTP after verification
    } else {
        echo "Invalid OTP. Try again.";
    }
}
?>
