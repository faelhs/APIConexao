<?php

/* 
 * Api de solicitações web desenvolvida para PrivateGamesBrasil
 * Desenvolvido por Rafael Henrique da Silva.
 * Whatsapp: +1 (941) 216-6633.
 * Skype: .
 * Email: fael.co.sa@gmail.com.
 * Qualquer duvida de uso leia a documentação, caso restem duvidas entre em contato por um dos meios acima.
 */

$keys = ["9b5e0ebc9434f840e75c03db90c87164","7f7f1a397a141d015d5eab70be7a2776"];
$key = $_POST['key'];
if (!in_array($key, $keys)){
    print nl2br("\nErro 100");
    print nl2br("\nChave de acesso não cadastrada.");
    exit;
}
?>