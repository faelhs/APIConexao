<!DOCTYPE html>
<!--
Api de solicitações web desenvolvida para PrivateGamesBrasil
Desenvolvido por Rafael Henrique da Silva.
Whatsapp: +1 (941) 216-6633.
Skype: .
Email: fael.co.sa@gmail.com.
Qualquer duvida de uso leia a documentação, caso restem duvidas entre em contato por um dos meios acima.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        if($_POST){
        $dados = [  filter_input(INPUT_POST, 'nome' ,FILTER_SANITIZE_STRING ,FILTER_FLAG_ENCODE_AMP),
                    filter_input(INPUT_POST, 'sobrenome' ,FILTER_SANITIZE_STRING ,FILTER_FLAG_ENCODE_AMP),
                    filter_input(INPUT_POST, 'nascimento' ,FILTER_SANITIZE_STRING ,FILTER_FLAG_ENCODE_AMP),
                    filter_input(INPUT_POST, 'email' ,FILTER_SANITIZE_STRING ,FILTER_FLAG_ENCODE_AMP),
                    filter_input(INPUT_POST, 'telefone' ,FILTER_SANITIZE_STRING ,FILTER_FLAG_ENCODE_AMP),
                    filter_input(INPUT_POST, 'sexo' ,FILTER_SANITIZE_STRING ,FILTER_FLAG_ENCODE_AMP),
                    filter_input(INPUT_POST, 'login' ,FILTER_SANITIZE_STRING ,FILTER_FLAG_ENCODE_AMP),
                    filter_input(INPUT_POST, 'senha' ,FILTER_SANITIZE_STRING ,FILTER_FLAG_ENCODE_AMP),
                    filter_input(INPUT_POST, 'resenha' ,FILTER_SANITIZE_STRING ,FILTER_FLAG_ENCODE_AMP)
                ];

            $cr = curl_init();   
            curl_setopt($cr, CURLOPT_URL, "http://coordenacao02.micropro.btu/api/index.php");   
            curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);   
            curl_setopt($cr, CURLOPT_POST, TRUE);  
            curl_setopt($cr, CURLOPT_POSTFIELDS, ""
                    . "key=9b5e0ebc9434f840e75c03db90c87164"
                    . "&tipo=cadastro"
                    . "&link=http://coordenacao02.micropro.btu/api/Validar.php"
                    . "&nome=".$dados[0]
                    . "&sobrenome=".$dados[1]
                    . "&nascimento=".$dados[2]
                    . "&email=".$dados[3]
                    ."&telefone=".$dados[4]
                    ."&sexo=".$dados[5]
                    ."&login=".$dados[6]
                    ."&senha=".$dados[7]
                    ."&resenha=".$dados[8]);   
            $retorno = curl_exec($cr);  
            curl_close($cr); 
            echo $retorno;
        }
        ?>
        
        <form action="#" method="Post">
            <br>Nome<input id="nome" name="nome">
            <br>Sobre nome<input id="sobrenome" name="sobrenome">
            <br>email<input id="email" name="email">   
            <br>telefone<input id="telefone" name="telefone">   
            <br>sexo<input id="sexo" name="sexo">   
            <br>nascimento<input id="nascimento" name="nascimento">   
            <br>login<input id="login" name="login">   
            <br>senha<input id="senha" name="senha">   
            <br>resenha<input id="resenha" name="resenha">       
            <br><button type="submit">Enviar</button>
        </form>
    </body>
</html>
