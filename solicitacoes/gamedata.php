<?php

/*
  DashBoard desenvolvida para PrivateGamesBrasil
  Desenvolvido por Rafael Henrique da Silva.
  Whatsapp: +1 (941) 216-6633.
  Skype: .
  Email: fael.co.sa@gmail.com.
  Qualquer duvida de uso leia a documentação, caso restem duvidas entre em contato por um dos meios acima.
 */
require_once './Key/keys.php';
require_once './MySQL/Conexao.php';
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP);

$sql = "SELECT * FROM game_data WHERE login = '$login'";
$result = $dbapi->query($sql);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);

if (!$rows) {
    print nl2br("\nErro::GameData 001");
    print nl2br("\nFalha na consulta.");
    exit;
} else {
    $result = implode(":", $rows[0]);
    print nl2br($result);
    print nl2br("\n 200 OK");
    print nl2br("\n Dados recebidos");
}