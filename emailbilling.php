<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Load PHPMailer

$host = "localhost"; // Change if necessary
$user = "root";      // Your database username
$pass = "";          // Your database password
$dbname = "ehostel"; // Your database name

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get admission ID from request
$admission_id = isset($_GET['admission_id']) ? intval($_GET['admission_id']) : 0;
if ($admission_id == 0) {
    die("Error: Invalid Admission ID.");
}

// Fetch billing and student details
$sql = "SELECT b.paid_amt, b.paid_date, b.payment_type, 
               h.emailid, h.name, r.room_no, bl.block_name 
        FROM billing b
        JOIN admission a ON b.admission_id = a.admission_id
        JOIN hosteller h ON a.hostellerid = h.hostellerid
        JOIN room r ON a.room_id = r.room_id
        JOIN blocks bl ON r.block_id = bl.block_id
        WHERE b.admission_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $admission_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("Error: No billing record found.");
}

// Assign fetched values
$email = $row['emailid'];
$name = $row['name'];
$room_no = $row['room_no'];
$block_name = $row['block_name'];
$paid_amt = $row['paid_amt'];
$paid_date = $row['paid_date'];
$payment_type = $row['payment_type'];

if (empty($email)) {
    die("Error: No email found for the given Admission ID.");
}

// Email Content
$subject = "Hostel Fee Payment Confirmation";
$body = "
    <p>Dear <b>$name</b>,</p>
    <p>Your hostel fee has been successfully paid.</p>
    <p><strong>Payment Details:</strong></p>
    <ul>
        <li><b>Amount Paid:</b> ₹$paid_amt</li>
        <li><b>Payment Date:</b> $paid_date</li>
        <li><b>Payment Method:</b> $payment_type</li>
        <li><b>Room Number:</b> $room_no</li>
        <li><b>Block Name:</b> $block_name</li>
    </ul>
    <p>Thank you for your payment.</p>
    <p>Regards,<br>Hostel Management</p>
";

// **SMTP Email Configuration**
$mail = new PHPMailer(true);

try {
    // SMTP Settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'spsphostel@gmail.com'; // Replace with your email
    $mail->Password = 'kylyvpeglblortug'; // Use your App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Email Headers
    $mail->setFrom('spsphostel@gmail.com', 'Hostel Management');
    $mail->addAddress($email, $name);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;

    // Send Email
    if ($mail->send()) {
        echo "Email sent successfully to $email.";
    } else {
        echo "Email sending failed.";
    }
} catch (Exception $e) {
    echo "Email sending failed: {$mail->ErrorInfo}";
}

$conn->close();
?>