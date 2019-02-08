<?php

/* 
 * Api de solicitações web desenvolvida para PrivateGamesBrasil
 * Desenvolvido por Rafael Henrique da Silva.
 * Whatsapp: +1 (941) 216-6633.
 * Skype: .
 * Email: fael.co.sa@gmail.com.
 * Qualquer duvida de uso leia a documentação, caso restem duvidas entre em contato por um dos meios acima.
 */

require_once './Key/keys.php';
require_once './MySQL/Conexao.php';
include 'mailler.php';

$email = filter_input(INPUT_POST, 'email' ,FILTER_SANITIZE_STRING ,FILTER_FLAG_ENCODE_AMP);
$caso = filter_input(INPUT_POST, 'caso' ,FILTER_SANITIZE_STRING ,FILTER_FLAG_ENCODE_AMP);
$link = filter_input(INPUT_POST, 'link' ,FILTER_SANITIZE_STRING ,FILTER_FLAG_ENCODE_AMP);
$sql = "SELECT email , code , login , senha , nome , verificado FROM usuarios WHERE email = '".$email."'";
$result = $dbapi->query($sql);
$rows = $result->fetchAll( PDO::FETCH_ASSOC );

switch($caso){
    case 1: recuperar();
        break;
    case 2: reenviar();
        break;
    default: exit;   
}

function recuperar(){
if (!$this->$rows) {
    print nl2br("\nErro 006");
    print nl2br("\nEmail nao cadastrado.");
    exit;
}

else{
    $nome = $this->$rows[0][nome];
    $senha = $this->$rows[0][senha];
    sendmail($this->$rows[0][login], $$this->$rows[0][email], 2);
}
}
function reenviar(){
    if (!$this->$rows) {
    print nl2br("\nErro 006");
    print nl2br("\nEmail nao cadastrado.");
    exit;
    }
else{
    if($$this->rows[0][verificado] >= 1){
         print nl2br("\nErro 007");
         print nl2br("\nUsuario já está verificado");
         exit;
    }
    $nome = $this->$rows[0][nome];
    $code = $this->$rows[0][code];            
    sendmail($this->$rows[0][login], $$this->$rows[0][email], 1);
    }
}
