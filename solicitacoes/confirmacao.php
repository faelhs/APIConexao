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
$login = filter_input(INPUT_POST, 'login' ,FILTER_SANITIZE_STRING ,FILTER_FLAG_ENCODE_AMP);
$code = filter_input(INPUT_POST, 'code' ,FILTER_SANITIZE_STRING ,FILTER_FLAG_ENCODE_AMP);

$sql = "SELECT verificado , code FROM usuarios WHERE login = '".$login."'";
$result = $dbapi->query($sql);
$rows = $result->fetchAll( PDO::FETCH_ASSOC );


if (!$rows) {
    print nl2br("\nErro::Confirmação 006");
    print nl2br("\nUsuario nao cadastrado.");
    exit;
}
if($rows){
    if($rows[0][verificado] >= 1){
        print nl2br("\nErro::Confirmação 007");
        print nl2br("\nUsuario já está verificado");
        exit;
    }
    else if($rows[0][code] != $code){
        print nl2br("\nErro::Confirmação 008");
        print nl2br("\nCodigo de verificação invalido.");
        exit;
    }
    else{
        $sql = "UPDATE usuarios SET verificado = '1' WHERE login = '$login'";
        $stmt = $dbapi->prepare( $sql );
        $result = $stmt->execute();
        if ( ! $result )
        {
            print nl2br("\nErro::Confirmação 09");
            print nl2br("\nFalha ao validar cadastro\n");
            var_dump( $stmt->errorInfo() );
            exit;
        }
        //Confirmação
         print nl2br("\n 200 OK");
         print nl2br("\n Verificado com sucesso.");
    }
}

?>