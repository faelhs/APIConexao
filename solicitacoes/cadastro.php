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
//include 'mailler.php';
$dados = [ filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP),
    filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP),
    filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP),
    filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP),
    filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP),
    filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP),
    filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP),
    filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP),
    filter_input(INPUT_POST, 'resenha', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP)
];
$link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP);
if (in_array(NULL, $dados)) {
    print nl2br("\nErro 001");
    print nl2br("\npreencha todos os campos");
    exit;
}

$sql = "SELECT login FROM usuarios WHERE login = '$dados[6]'";
$result = $dbapi->query($sql);
$rows = $result->fetchAll();

if ($rows) {
    print nl2br("\nErro 002");
    print nl2br("\nlogin em uso escolha outro");
    exit;
}
if ($dados[5] == "F" || $dados[5] == "M") {
    
} else {
    print nl2br("\nErro 003");
    print nl2br("\nSexo deve ser informado como F para feminino ou M para masculino");
    exit;
}

$sql = "SELECT email FROM usuarios WHERE email = '$dados[3]'";
$result = $dbapi->query($sql);
$rows = $result->fetchAll();

if ($rows) {
    print nl2br("\nErro 004");
    print nl2br("\nemail já cadastrado");
    exit;
}


if ($dados[7] != $dados[8]) {
    print nl2br("\nErro 005");
    print nl2br("\nsenhas não conferem");
    exit;
}

if (strlen($dados[7]) < 8) {
    print nl2br("\nErro 006");
    print nl2br("\nSenha deve ter pelo menos 4 digitos");
    exit;
}

if (strlen($dados[6]) < 4) {
    print nl2br("\nErro 007");
    print nl2br("\nLogin deve ter pelo menos 4 digitos");
    exit;
}

$code = rand(10000, 100000);
$sql = "INSERT INTO usuarios(nome, sobrenome, nascimento, email, telefone,sexo,login,senha,code,verificado) "
        . "VALUES"
        . "('$dados[0]','$dados[1]','$dados[2]','$dados[3]','$dados[4]','$dados[5]','$dados[6]','$dados[7]','$code','1')";
$stmt = $dbapi->prepare($sql);
$result = $stmt->execute();

if (!$result) {
    var_dump($stmt->errorInfo());
    exit;
}

$sql = "INSERT INTO game_data(login)"
        . "VALUES"
        . "('$dados[6]')";
$stmt = $dbapi->prepare($sql);
$result = $stmt->execute();

if (!$result) {
    var_dump($stmt->errorInfo());
    exit;
}
$nome = $dados[0];
//sendmail($dados[7], $dados[3], 1);
print nl2br("\n 200 OK ");
print nl2br("\nCadastro efetuado com sucesso");
?>