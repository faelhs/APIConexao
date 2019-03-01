
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
    <head>
        <title>Login Dash - Private Games Brasil</title>
        <!--Made with love by Mutiullah Samim -->

        <!--Bootsrap 4 CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!--Fontawesome CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!--Custom styles-->
        <link rel="stylesheet" type="text/css" href="styles/login.css">
        
    </head>
    <body>
        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3>Log-in</h3>
                        <h5 id="result" style="color:red"></h5>

                    </div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input name="login" id="login" type="text" class="form-control" placeholder="username">

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input name="pass" id="pass" type="password" class="form-control" placeholder="password">
                            </div>
                            <div class="row align-items-center remember">
                                <input type="checkbox">Remember Me
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login" class="btn float-right login_btn">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links">
                            Não tem conta?<a href="register.php">Cadastre-se</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="#">Esqueceu a senha?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
/*
  DashBoard desenvolvida para PrivateGamesBrasil
  Desenvolvido por Rafael Henrique da Silva.
  Whatsapp: +1 (941) 216-6633.
  Skype: .
  Email: fael.co.sa@gmail.com.
  Qualquer duvida de uso leia a documentação, caso restem duvidas entre em contato por um dos meios acima.
 */
include "./Config.php";
if ($_POST) {
    $dados = [ filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP),
        filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_AMP)
    ];
    $data = array(
        'key' => '9b5e0ebc9434f840e75c03db90c87164',
        'tipo' => 'login',
        'login' => $dados[0],
        'pass' => $dados[1]
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $_url_solicitacoes);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $retorno = curl_exec($ch);
    //echo $retorno;
    curl_close($ch);
    if (strpos($retorno, "200 OK")) {
        $nr = explode("\n", $retorno);
        $ns = explode(":", $nr[0]);
        session_start();
        $_SESSION['login'] = $ns[7];
        $_SESSION['senha'] = $ns[8];
        $_SESSION['nome'] = $ns[1];
        $_SESSION['sobrenome'] = $ns[2];
        $_SESSION['nascimento'] = $ns[3];
        $_SESSION['email'] = $ns[4];
        $_SESSION['telefone'] = $ns[5];
        $_SESSION['sexo'] = $ns[6];
        header('location:index.php');
    } elseif (strpos($retorno, "Erro::Login 003")) {
        ?>
        <script>
            document.getElementById("result").innerHTML = "Conta não verificada";
        </script>
        <?php
    } elseif (strpos($retorno, "Erro::Login 002")) {
        ?>
        <script>
            document.getElementById("result").innerHTML = "Senha incorreta";
        </script>
        <?php
    } elseif (strpos($retorno, "Erro::Login 001")) {
        ?>
        <script>
            document.getElementById("result").innerHTML = "Usuario inexistente";
        </script>
        <?php
    }
}
?>