<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'mailer/Exception.php';
require 'mailer/PHPMailer.php';
require 'mailer/SMTP.php';

header('Content-Type: application/json');

$message = "
 Мамараим шу почтани рассилкага кушиш керак: {$_POST['email']}<br/>
  
";

$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug  = SMTP::DEBUG_SERVER;
    $mail->CharSet    = 'UTF-8';
    $mail->isSMTP();
    $mail->Host       = 'smtp.yandex.ru';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'info@wijde.uz';
    $mail->Password   = '^/^=4nv7!X?O]V}TYHp`x:N1JK]RJgbWz#asVkH/}8=u.5Y`';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->SMTPAuth   = true;
    $mail->SMTPOptions= array (
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true)
    );

    //Recipients
    $mail->setFrom('info@wijde.uz', 'Mailer');
    $mail->addAddress('info@wijde.uz', 'Info Wijde');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Wijde Message';
    $mail->Body    = $message;

    $mail->send();
    echo json_encode(["success" => true]);
    } 
    catch (Exception $e) 
    {
    echo json_encode(["success" => false]);
    }
    
?>
