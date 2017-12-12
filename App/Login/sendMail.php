<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class MailSender {

    public function sendMail($receiver, $subject, $body) {
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 1;                                 // disable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'abc123@gmail.com';                 // SMTP username
            $mail->Password = 'abc123';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                          // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465; //587                                   // TCP port to connect to
            //Recipients
            $mail->setFrom('web-luv2q@mail-tester.com', 'Admin');
            $mail->addAddress($receiver, 'Member User');     // Add a recipient
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = $body;

            $mail->send();
        } catch (Exception $e) {
            
        }
    }

}
?>

