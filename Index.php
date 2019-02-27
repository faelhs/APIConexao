<?php

/* 
 * Api de solicitações web desenvolvida para PrivateGamesBrasil
 * Desenvolvido por Rafael Henrique da Silva.
 * Whatsapp: +1 (941) 216-6633.
 * Skype: .
 * Email: fael.co.sa@gmail.com.
 * Qualquer duvida de uso leia a documentação, caso restem duvidas entre em contato por um dos meios acima.
 */

$tipo = $_POST['tipo'];
if($tipo != NULL){
    chamar_funcao($tipo);
}
function chamar_funcao($tipo){
    switch ($tipo){
        case cadastro: include 'solicitacoes/cadastro.php'; break;
        case confirmar: include 'solicitacoes/confirmacao.php'; break;
        case resend: include'solicitacoes/resend.php'; break;
        case login: include'solicitacoes/login.php'; break;
        default: break;
    }
}
?>
