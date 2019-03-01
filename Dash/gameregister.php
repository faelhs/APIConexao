<?php
/*
  DashBoard desenvolvida para PrivateGamesBrasil
  Desenvolvido por Rafael Henrique da Silva.
  Whatsapp: +1 (941) 216-6633.
  Skype: .
  Email: fael.co.sa@gmail.com.
  Qualquer duvida de uso leia a documentação, caso restem duvidas entre em contato por um dos meios acima.
 */
 $data = array(
        'key' => '9b5e0ebc9434f840e75c03db90c87164',
        'tipo' => 'gamedata',
        'login' => $_SESSION['login']
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $_url_solicitacoes);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $retorno = curl_exec($ch);
    curl_close($ch);
    if (strpos($retorno, "200 OK")) {
        $nr = explode("\n", $retorno);
        $ns = explode(":", $nr[0]);
       // print_r($ns);
    } 
    
    if($_POST){
        $data = array(
        'key' => '9b5e0ebc9434f840e75c03db90c87164',
        'tipo' => 'cadastrojogo',
        'login' => $_SESSION['login'],
        'game' => $_POST['game']
        );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $_url_solicitacoes);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $retorno = curl_exec($ch);
    curl_close($ch);
 //echo $retorno;
    if (strpos($retorno, "200 OK")) { 
       echo '<script> window.location = "index.php?pg=gameregister"; </script>';
    }
    }
?>

<!-- main area -->

<div class="main-content">

    <div class="row">
        
        <div class="col-md-4">
            <div class="card no-border">
                <div class="card-block">
                    <div class="text-center">
                        <h6>Mu Online</h6>
                        <h3 class="m-t"><?php if($ns[4]==0){echo "Não cadastrado";}else{echo "Cadastrado";}?></h3>
                        <p><?php if($ns[4]!=0){echo "Desde: ".$ns[5];}?> </p>
                    </div>
                    <div class="text-center">
                        <img src="images/muicon.png" class="img-responsive center-block relative" alt="" style="max-width: 230px;left: 1rem;">
                    </div>
                    <div class="text-center">
                        <form id="formmu" name="formmu" method="POST" action="#">
                          <input type="hidden" id="game" name="game" value="4"> 
                          <?php if($ns[4]==0){echo '<input class="btn btn-primary btn-sm" type="submit" value="Cadastrar"/>';}else{echo '<a href="#" class="btn btn-primary btn-sm">Mudar Senha</a>';} ?>
                        </form>
                        </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card no-border">
                <div class="card-block">
                    <div class="text-center">
                        <h6>Ragnarok</h6>
                        <h3 class="m-t"><?php if($ns[1]==0){echo "Não cadastrado";}else{echo "Cadastrado";}?></h3>
                        <p><?php if($ns[1]!=0){echo "Desde: ".$ns[2];}?>  </p>
                    </div>
                    <div class="text-center">
                        <img src="images/ragicon.png" class="img-responsive center-block relative" alt="" style="max-width: 230px;left: 1rem;">
                    </div>
                    <div class="text-center">
                         <form id="formmu" name="formmu" method="POST" action="#">
                          <input type="hidden" id="game" name="game" value="1"> 
                          <?php if($ns[1]==0){echo '<input class="btn btn-primary btn-sm" type="submit" value="Cadastrar"/>';}else{echo '<a href="#" class="btn btn-primary btn-sm">Mudar Senha</a>';} ?>
                        </form> </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- /main area -->