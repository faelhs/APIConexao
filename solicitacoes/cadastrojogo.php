<?php

/*
  DashBoard desenvolvida para PrivateGamesBrasil
  Desenvolvido por Rafael Henrique da Silva.
  Whatsapp: +1 (941) 216-6633.
  Skype: .
  Email: fael.co.sa@gmail.com.
  Qualquer duvida de uso leia a documentação, caso restem duvidas entre em contato por um dos meios acima.
 */
date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y');
require_once './Key/keys.php';
require_once './MySQL/Conexao.php';
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP);
$game = filter_input(INPUT_POST, 'game', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP);

$sql = "SELECT * FROM usuarios WHERE login = '$login'";
$result = $dbapi->query($sql);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
//print_r($rows);
if (!$rows) {
    print nl2br("\nErro::GamesRegister 006");
    print nl2br("\nUsuario não cadastrado no sistema.");
    exit;
}
switch ($game) {
    case 1:
        //Cadastro ragnarok.
        $sql = "SELECT userid FROM login WHERE userid = '".$rows[0][login]."'";
        $result = $dbrag->query($sql);
        $rowsrag = $result->fetchAll();

        if ($rowsrag) {
            $sql = "UPDATE game_data SET ragnarok = '1', ragdata = '" . $date . "', ragpass = '" . $rows[0][senha] . "' WHERE login = '" . $rows[0][login] . "'";
            $stmt = $dbapi->prepare($sql);
            $result = $stmt->execute();
            if (!$result) {
                print nl2br("\nErro::GamesRegister 009");
                print nl2br("\nFalha ao cadastrar no ragnarok\n");
                var_dump($stmt->errorInfo());
                exit;
            }
            print nl2br("\nErro 002");
            print nl2br("\nConta já cadastrada no servidor");
            exit;
        }
        $sql = "INSERT INTO login(userid, user_pass, sex, email,birthdate) VALUES('" . $rows[0][login] . "','" . $rows[0][senha] . "','" . $rows[0][sexo] . "','" . $rows[0][email] . "','" . $rows[0][nascimento] . "')";
        $stmt = $dbrag->prepare($sql);
        $result = $stmt->execute();
        if (!$result) {
            print nl2br("\nErro::GamesRegister 009");
            print nl2br("\nFalha ao cadastrar no ragnarok\n");
            var_dump($stmt->errorInfo());
            exit;
        } else {
            $sql = "UPDATE game_data SET ragnarok = '1', ragdata = '" . $date . "', ragpass = '" . $rows[0][senha] . "' WHERE login = '" . $rows[0][login] . "'";
            $stmt = $dbapi->prepare($sql);
            $result = $stmt->execute();
            if (!$result) {
                print nl2br("\nErro::GamesRegister 009");
                print nl2br("\nFalha ao cadastrar no ragnarok\n");
                var_dump($stmt->errorInfo());
                exit;
            }
            print nl2br("\n 200 OK");
            print nl2br("\n Cadastrado com sucesso.");
        }
        break;
    case 2:
        //Cadastro lineage
        $sql = "INSERT INTO accounts(login, password, email) VALUES('" . $rows[0][login] . "','" . base64_encode(pack('H*', sha1($rows[0][senha]))) . "','" . $rows[0][email] . "')";
        $stmt = $dblin->prepare($sql);
        $result = $stmt->execute();
        if (!$result) {
            print nl2br("\nErro::GamesRegister 010");
            print nl2br("\nFalha ao cadastrar no lineage\n");
            var_dump($stmt->errorInfo());
            exit;
        } else {
            $sql = "UPDATE game_data SET lineage = '1', lindata = '" . $date . "', linpass = '" . $rows[0][senha] . "' WHERE login = '" . $rows[0][login] . "' ";
            $stmt = $dbapi->prepare($sql);
            $result = $stmt->execute();
            if (!$result) {
                print nl2br("\nErro::GamesRegister 009");
                print nl2br("\nFalha ao cadastrar no ragnarok\n");
                var_dump($stmt->errorInfo());
                exit;
            }
            print nl2br("\n 200 OK");
            print nl2br("\n Cadastrado com sucesso.");
        }
        break;
    case 3:
        //Cadastro Eudemons
        $sql = "INSERT INTO accounts(login, password, email) VALUES('" . $rows[0][login] . "','" . base64_encode(pack('H*', sha1($rows[0][senha]))) . "','" . $rows[0][email] . "')";
        $stmt = $dbeod->prepare($sql);
        $result = $stmt->execute();
        if (!$result) {
            print nl2br("\nErro::GamesRegister 011");
            print nl2br("\nFalha ao cadastrar no eudemons\n");
            var_dump($stmt->errorInfo());
            exit;
        } else {
            $sql = "UPDATE game_data SET eudemon = '1', euddata = '" . $date . "', eudpass = '" . $rows[0][senha] . "' WHERE login = '" . $rows[0][login] . "' ";
            $stmt = $dbapi->prepare($sql);
            $result = $stmt->execute();
            if (!$result) {
                print nl2br("\nErro::GamesRegister 009");
                print nl2br("\nFalha ao cadastrar no ragnarok\n");
                var_dump($stmt->errorInfo());
                exit;
            }
            print nl2br("\n 200 OK");
            print nl2br("\n Cadastrado com sucesso.");
        }
        break;
    case 4:
        //Cadastro MuOnline
        $arraynasc = explode("/", $rows[0][nascimento]);

        $data = array(
            'Account' => $rows[0][login],
            'Mail' => $rows[0][email],
            'Re_Mail' => $rows[0][email],
            'Name' => $rows[0][nome],
            'Password' => $rows[0][senha],
            'Re_Password' => $rows[0][senha],
            'Phone' => $rows[0][telefone],
            'PID' => '1111111',
            'Question' => 'pgbrasil',
            'Resp' => 'portal de games',
            'Sex' => $rows[0][sexo],
            'Date_D' => $arraynasc[0],
            'Date_M' => $arraynasc[1],
            'Date_Y' => $arraynasc[2],
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://muonline.pgbrasil.net/system/?pag=register&cmd=true");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        if (strpos($output, "Sucesso")) {
            $sql = "UPDATE game_data SET mu = '1', mudata = '" . $date . "', mupass = '" . $rows[0][senha] . "' WHERE login = '" . $rows[0][login] . "' ";
            $stmt = $dbapi->prepare($sql);
            $result = $stmt->execute();
            if (!$result) {
                print nl2br("\nErro::GamesRegister 009");
                print nl2br("\nFalha ao cadastrar no ragnarok\n");
                var_dump($stmt->errorInfo());
                exit;
            }
            print nl2br("\n 200 OK");
            print nl2br("\n Cadastrado com sucesso.");
        } 
        elseif (strpos($output, "Login em uso")) {
            $sql = "UPDATE game_data SET mu = '1', mudata = '" . $date . "', mupass = '" . $rows[0][senha] . "' WHERE login = '" . $rows[0][login] . "' ";
            $stmt = $dbapi->prepare($sql);
            $result = $stmt->execute();
            if (!$result) {
                print nl2br("\nErro::GamesRegister 009");
                print nl2br("\nFalha ao cadastrar no ragnarok\n");
                var_dump($stmt->errorInfo());
                exit;
            }
            print nl2br("\n 200 OK");
            print nl2br("\n Cadastrado com sucesso.");
        } 
        else 
            {
            print nl2br("\nErro::GamesRegister 012");
            print nl2br("\nFalha ao cadastrar no MuOnline\n");
        }
        
        break;
    default:
        print nl2br("\nErro::GamesRegister 013");
        print nl2br("\nInforme um game para cadastro.");
        break;
}