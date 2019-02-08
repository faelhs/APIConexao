<!DOCTYPE html>
<!--
Api de solicitações web desenvolvida para PrivateGamesBrasil
Desenvolvido por Rafael Henrique da Silva.
Whatsapp: +1 (941) 216-6633.
Skype: .
Email: fael.co.sa@gmail.com.
Qualquer duvida de uso leia a documentação, caso restem duvidas entre em contato por um dos meios acima.
-->
 <?php
        $login = $_GET['login'];
        $code = $_GET['code'];
        if($_POST){
            $cr = curl_init();   
            curl_setopt($cr, CURLOPT_URL, "http://coordenacao02.micropro.btu/api/index.php");   
            curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);   
            curl_setopt($cr, CURLOPT_POST, TRUE);  
            curl_setopt($cr, CURLOPT_POSTFIELDS, ""
                    . "key=9b5e0ebc9434f840e75c03db90c87164"
                    . "&tipo=confirmar"
                    . "&login=".$login 
                    . "&code=".$code);   
            $retorno = curl_exec($cr);  
            curl_close($cr); 
            echo $retorno;
        }
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       
        <form action="#" method="Post">
            <input name="login" id="login" value="<?php echo $login; ?>" type="hidden">
            <input name="code" id="code" value="<?php echo $code; ?>" type="hidden">
            <button type="submit">Validar  <?php echo $login; ?> </button>
        </form>
    </body>
</html>
