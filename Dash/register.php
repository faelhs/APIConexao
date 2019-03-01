
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro Dash - Private Games Brasil</title>
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
                        <h3>Cadastro</h3>
                        <h5 id="result" style="color:red"></h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input name="nome" id="nome" type="text" class="form-control" placeholder="Nome">

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input name="sobrenome" id="sobrenome" type="text" class="form-control" placeholder="Sobrenome">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                </div>
                                <input name="email" id="email" type="text" class="form-control" placeholder="E-mail">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input name="telefone" id="telefone" type="text" class="form-control" placeholder="Telefone">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-transgender"></i></span>
                                </div>
                                <select name="sexo" id="sexo" class="form-control">
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                                </div>
                                <input name="nascimento" id="nascimento" type="text" class="form-control" placeholder="DD/MM/AAAA">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input name="login" id="login" type="text" class="form-control" placeholder="Login">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input name="senha" id="senha" type="password" class="form-control" placeholder="Senha">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input name="resenha" id="resenha" type="password" class="form-control" placeholder="Re-Senha">
                            </div>
                            <div class="row align-items-center remember">
                                Ao continuar você concorda com os <a href="#"> termos </a> do portal Private Games Brasil.
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Cadastrar" class="btn float-right login_btn">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links">
                            Já tem uma conta?<a href="login.php">Log-in</a>
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
    $data = array(
        'key' => '9b5e0ebc9434f840e75c03db90c87164',
        'tipo' => 'cadastro',
        'link' => 'http://localhost/api/Validar.php',
        'nome' => $dados[0],
        'sobrenome' => $dados[1],
        'nascimento' => $dados[2],
        'email' => $dados[3],
        'telefone' => $dados[4],
        'sexo' => $dados[5],
        'login' => $dados[6],
        'senha' => $dados[7],
        'resenha' => $dados[8],
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $_url_solicitacoes);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $retorno = curl_exec($ch);
    curl_close($ch);
    echo $retorno;
    if (strpos($retorno, "200 OK")) {
        ?>
        <script>
            document.getElementById("result").innerHTML = "Cadastrado com sucesso!";
        </script>
        <?php
    } elseif (strpos($retorno, "Erro 001")) {
        ?>
        <script>
            document.getElementById("result").innerHTML = "Preencha todos campos";
        </script>
        <?php
    } elseif (strpos($retorno, "Erro 002")) {
        ?>
        <script>
            document.getElementById("result").innerHTML = "Usuario já existe";
        </script>
        <?php
    } elseif (strpos($retorno, "Erro 003")) {
        ?>
        <script>
            document.getElementById("result").innerHTML = "Sexo deve ser informado M ou F";
        </script>
        <?php
    } elseif (strpos($retorno, "Erro 004")) {
        ?>
        <script>
            document.getElementById("result").innerHTML = "E-Mail em uso";
        </script>
        <?php
    } elseif (strpos($retorno, "Erro 005")) {
        ?>
        <script>
            document.getElementById("result").innerHTML = "Senhas divergentes";
        </script>
        <?php
    } elseif (strpos($retorno, "Erro 005")) {
        ?>
        <script>
            document.getElementById("result").innerHTML = "Senhas divergentes";
        </script>
        <?php
    } elseif (strpos($retorno, "Erro 006")) {
        ?>
        <script>
            document.getElementById("result").innerHTML = "Senha minimo 8 digitos";
        </script>
        <?php
    } elseif (strpos($retorno, "Erro 007")) {
        ?>
        <script>
            document.getElementById("result").innerHTML = "login minimo 4 digitos";
        </script>
        <?php
    }
}
?>