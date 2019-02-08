<?php

/* 
 * Api de solicitações web desenvolvida para PrivateGamesBrasil
 * Desenvolvido por Rafael Henrique da Silva.
 * Whatsapp: +1 (941) 216-6633.
 * Skype: .
 * Email: fael.co.sa@gmail.com.
 * Qualquer duvida de uso leia a documentação, caso restem duvidas entre em contato por um dos meios acima.
 */
ini_set('display_errors', 1);

error_reporting(E_ALL);

 
function sendmail($login,$email,$tipo){
try{
$from = "naoresponda@pgbrasil.com";

$to = $email;


switch($tipo){
    case 1: 
        include 'email-validar.php';
        $subject = "Ativação da conta";
        $message = $x;
        break;
    case 2: 
        include 'email-recuperar.php';
        $subject = "Recuperação de senha";
        $message = $x;
        break;
    default : 
        print nl2br("\nErro 102");
        print nl2br("\nTipo de email não reconhecido \n");
}

$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Private Games Brasil <$from>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

mail($to, $subject, $message, $headers);

 print nl2br("\n OK 200 ");
 print nl2br("\n Email Enviado");
} catch (Exception $e){
    print nl2br("\nErro 101");
    print nl2br("\nFalha ao enviar email \n");
    var_dump( $e->errorInfo() );
    exit;
}
}
?>