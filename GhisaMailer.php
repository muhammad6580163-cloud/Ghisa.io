<?php
// includes/GhisaMailer.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

function sendAcceptanceEmail($userEmail, $userName){

    $mail = new PHPMailer(true);

    try{
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'yourgmail@gmail.com'; // CHANGE THIS
        $mail->Password   = 'your_app_password';   // CHANGE THIS
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('yourgmail@gmail.com', 'GHISA');
        $mail->addAddress($userEmail);

        $mail->isHTML(true);
        $mail->Subject = 'Congratulations! Welcome to GHISA';

        $mail->Body = "
            <h2>Congratulations $userName!</h2>
            <p>We are glad to inform you that your application to GHISA has been accepted.</p>
            <p>Welcome to Gujba High Institution Student Association.</p>
        ";

        $mail->send();
        return true;

    }catch(Exception $e){
        return false;
    }
}