<?php
        ini_set("SMTP", "mail.zend.com");
        ini_set("sendmail_from", "shlomo@zend.com");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../phpmailer/phpmailer/src/Exception.php';
require '../phpmailer/phpmailer/src/PHPMailer.php';
require '../phpmailer/phpmailer/src/SMTP.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['contact_name']) && !empty($_POST['contact_email']) && !empty($_POST['contact_message'])){

        $to = 'Sohil Desai<dragana.spasovska94@gmail.com>';
        $from = 'Sohil Desai<sohildesaixxxx@hotmail.com>';
        $subject = 'Test Mail';
    
        $headers  = 'MIME-Version: 1.0'. "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from . "\r\n";
        $headers .= 'X-Mailer: PHP/'.phpversion();
        $headers .= 'To: ' . $to . "\r\n";
$headers .= 'From: '.$from . "\r\n";
    
        $message = 'This mail is sent for testing.';
    
        $mail = mail($to, $subject, $message, $headers);
    
        if (!$mail) {
            return 'Error occured sending mail.';
        }
    
        return 'Mail successfully sent.';
//         $mail = new PHPMailer(true);

//         try {
//             //Server settings
//             $mail->SMTPDebug = 0;                      // Enable verbose debug output
//             $mail->isSMTP();                                            // Send using SMTP
//             $mail->Host = 'localhost';                    // Set the SMTP server to send through
//             $mail->SMTPAuth   = false;                                   // Enable SMTP authentication
//             // $mail->Username   = 'user@gmail.com';                     // SMTP username
//             // $mail->Password   = 'password';                               // SMTP password
//             // $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
//             // $mail->Port       = 587;                           // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
//             // $mail->Mailer = “smtp”;
        
//             $mail->SMTPAuth = false;
// $mail->SMTPAutoTLS = false; 
// $mail->Port = 25;
//             //Recipients
//             $mail->setFrom('from@example.com');
//             $mail->addAddress('dragana.spasovska94@gmail.com');     // Add a recipient
//             // $mail->addAddress('ellen@example.com');               // Name is optional
//             // $mail->addReplyTo('info@example.com', 'Information');
//             // $mail->addCC('cc@example.com');
//             // $mail->addBCC('bcc@example.com');
        
//             // // Attachments
//             // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//             // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
//             // Content
//             $mail->isHTML(true);                                  // Set email format to HTML
//             $mail->Subject = 'Here is the subject';
//             $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//             $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
//             $mail->send();
//             echo 'Message has been sent';
//         } catch (Exception $e) {
//             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//         }
    }
}