<?php
/* 
DashBoard desenvolvida para PrivateGamesBrasil
Desenvolvido por Rafael Henrique da Silva.
Whatsapp: +1 (941) 216-6633.
Skype: .
Email: fael.co.sa@gmail.com.
Qualquer duvida de uso leia a documentação, caso restem duvidas entre em contato por um dos meios acima.
 */
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }
  
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Private Games Brasil - DashBoard</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <!-- page stylesheets -->
  <!-- end page stylesheets -->
  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="styles/webfont.css">
  <link rel="stylesheet" href="styles/climacons-font.css">
  <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="styles/font-awesome.css">
  <link rel="stylesheet" href="styles/card.css">
  <link rel="stylesheet" href="styles/sli.css">
  <link rel="stylesheet" href="styles/animate.css">
  <link rel="stylesheet" href="styles/app.css">
  <link rel="stylesheet" href="styles/app.skins.css">
  <!-- endbuild -->
</head>

<body class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane"></div>
    </div>
  </div>
  <!-- /page loading spinner -->
  <div class="app layout-fixed-header">
<?php include 'sidebar.php'; ?>
    <!-- content panel -->
    <div class="main-panel">
<?php include 'topheader.php';?>
<?php include 'main.php';?>
    </div>
    <!-- /content panel -->
<?php include 'footer.php';?>

  </div>
  <!-- build:js({.tmp,app}) scripts/app.min.js -->
  <script src="scripts/helpers/modernizr.js"></script>
  <script src="vendor/jquery/dist/jquery.js"></script>
  <script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
  <script src="vendor/fastclick/lib/fastclick.js"></script>
  <script src="vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script src="scripts/helpers/smartresize.js"></script>
  <script src="scripts/constants.js"></script>
  <script src="scripts/main.js"></script>
  <!-- endbuild -->
  <!-- page scripts -->
  <script src="vendor/flot/jquery.flot.js"></script>
  <script src="vendor/flot/jquery.flot.resize.js"></script>
  <script src="vendor/flot/jquery.flot.categories.js"></script>
  <script src="vendor/flot/jquery.flot.stack.js"></script>
  <script src="vendor/flot/jquery.flot.time.js"></script>
  <script src="vendor/flot/jquery.flot.pie.js"></script>
  <script src="vendor/flot-spline/js/jquery.flot.spline.js"></script>
  <script src="vendor/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <!-- end page scripts -->
  <!-- initialize page scripts -->
  <script src="scripts/helpers/sameheight.js"></script>
  <script src="scripts/ui/dashboard.js"></script>
  <!-- end initialize page scripts -->
</body>

</html>