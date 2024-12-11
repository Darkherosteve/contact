<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST['Submit'])) {
    $full_name = $_POST['name'];
    $Mail = $_POST['email'];
    $No = $_POST['phone'];
    $mess = $_POST['message'];

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'support@minionsenterprises.com';
        $mail->Password = 'Minionsgroup@10#';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('support@minionsenterprises.com', 'Website Online Inquiry');
        $mail->addAddress('stevesonsaji10@gmail.com', 'Support Team :)');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Inquiry Mail';
        $mail->Body = '<h3>Fullname: ' . $full_name . '</h3>
                       <h3>Email ID: ' . $Mail . '</h3>
                       <h3>Phone Number: ' . $No . '</h3>
                       <h3>Message: ' . $mess . '</h3>';

        $mail->send();
        echo "<script>
        alert('Email has been sent successfully!');
        window.location.href = 'contact.html';
      </script>";
    } catch (Exception $e) {
        echo "<script>
        alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
        window.location.href = 'contact.html';
      </script>";
    }
} else {
    echo "Error";
}
?>
