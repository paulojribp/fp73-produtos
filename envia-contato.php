<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

require_once "PHPMailerAutoload.php";

$mail = new PHPMailer();
$mail->SMTPDebug = 3;
$mail->isSMTP();
$mail->Host = 'mx1.hostinger.com.br';
$mail->Port = 2525;
//$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "junior@paulo-alura.hol.es";
$mail->Password = "123456";

$mail->setFrom("junior@paulo-alura.hol.es", "Alura Curso PHP e MySQL");
$mail->addAddress("paulojribp@gmail.com");
$mail->Subject = "Email de contato da loja";
$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";
if($mail->send()) {
    //echo "Mensagem enviada com sucesso";
    header("Location: index.php");
} else {
    //echo "Erro ao enviar mensagem " . $mail->ErrorInfo;
    header("Location: contato.php");
}
die();