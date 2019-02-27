<?php

/* 
DashBoard desenvolvida para PrivateGamesBrasil
Desenvolvido por Rafael Henrique da Silva.
Whatsapp: +1 (941) 216-6633.
Skype: .
Email: fael.co.sa@gmail.com.
Qualquer duvida de uso leia a documentação, caso restem duvidas entre em contato por um dos meios acima.
 */

  //Cadastro MuOnline
                $data = array(  
                'key' => '9b5e0ebc9434f840e75c03db90c87164',
                'tipo' => 'login',    
                'login' => 'faelhs',  
                'pass' => 'c10437be'  
        );
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL, "http://localhost/api/index.php");
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $retorno = curl_exec($ch);
                curl_close($ch);
                echo $retorno;
                if (strpos($retorno, "200 OK")) {
                    print nl2br("\n 200 OK");
                    print nl2br("\n Cadastrado com sucesso.");
                    $nr = explode("\n",$retorno);
                    $ns = explode(":",$nr[0]);         
                }
                else{
                    print nl2br("\nErro::GamesRegister 012");
                    print nl2br("\nFalha ao cadastrar no MuOnline\n");
                }