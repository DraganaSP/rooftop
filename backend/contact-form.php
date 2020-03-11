<?php
ini_set("SMTP", "mail.zend.com");
ini_set("sendmail_from", "shlomo@zend.com");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './config.php';
require '../phpmailer/phpmailer/src/Exception.php';
require '../phpmailer/phpmailer/src/PHPMailer.php';
require '../phpmailer/phpmailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['contact_name']) && !empty($_POST['contact_phone']) && !empty($_POST['contact_email']) && !empty($_POST['contact_message'])) {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = MAIL_ADDRESS;
            $mail->Password   = PASSWORD;
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom(FROM_ADDRESS);
            $mail->addAddress(TO_ADDRESS);

            if(!empty($_FILES['contact_file'])){
                $mail->addAttachment($_FILES['contact_file']['tmp_name'], $_FILES['contact_file']['name']);
            }

            $mail->isHTML(true);
            $mail->Subject = $_POST['contact_name'];
            $mail->Body    = "Име: " . $_POST['contact_name'] .
                "<br>Телефон: " . $_POST['contact_phone'] .
                "<br>Маил: " . $_POST['contact_email'] .
                "<br>Порака: " . $_POST['contact_message'];
            $mail->AltBody = "Име: " . $_POST['contact_name'] .
                "Телефон: " . $_POST['contact_phone'] .
                "Маил: " . $_POST['contact_email'] .
                "Порака: " . $_POST['contact_message'];

            $mail->send();
            header('Location:../index.html');
            die();
        } catch (Exception $e) {
            header('Location:404.php');
            die();
        }
    }
}
