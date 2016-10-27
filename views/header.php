<?php 
  if(!isset($_SESSION)){
    session_start();
}
  require_once 'controlador.php';
  $control = new Controlador();
  ob_start();
 ?>
<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Service Agency</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/agency.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD93Lx0eH82Lru01AtZAfyLswWsrfd9BMA&amp;&libraries=places"></script>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src = "js/locationpicker.jquery.min.js"></script>
    <script type="text/javascript" src = "js/autocomplete.js"></script>
<style>

</style>
</head>
<body>

<div class="container-fluid">
<center><h1><a class="navbar-brand page-scroll"></a></h1></center><?php if(isset($_SESSION['user'])){ ?>
			 <nav class="navbar navbar-default navbar-fixed-top" style="background-color: black;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
		<li><a href="painel.php">
     Service Agency
    </a></li>
    


    <?php if($_SESSION['user']['tipo']==2){ ?>
    <li class="dropdown" style="background-color: black;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Agente<span class="caret"></span></a>
          <ul class="dropdown-menu" style="background-color: black;">
            <li><a href="agente.php?acao=cadastrar">Cadastrar Agente</a></li>
            <li><a href="agente.php?acao=listar">Listar Agente</a></li>
		 </ul>
     <?php }?>
     <?php if($_SESSION['user']['tipo']==2  || $_SESSION['user']['tipo'] == 1){?>
		<li class="dropdown" style="background-color: black;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Cidadão<span class="caret"></span></a>
          <ul class="dropdown-menu" style="background-color: black;">
            <li><a href="cidadao.php?acao=listar">Listar</a></li>
		 </ul>
     <?php }?>
    <li class="dropdown" style="background-color: black;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Agendamento
          <span class="caret"></span></a>
          <ul class="dropdown-menu" style="background-color: black;">
          <li><a href="agendamento.php?acao=cadastrar">Cadastrar Agendamento</a></li>
          <li><a href="agendamento.php?acao=listar">Listar Agendamento</a></li>
     </ul>
    <?php if($_SESSION['user']['tipo']==2 ){?>
    <li class="dropdown" style="background-color: black;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Area
          <span class="caret"></span></a>
          <ul class="dropdown-menu" style="background-color: black;">
          <li><a href="area.php?acao=cadastrar">Cadastrar Area</a></li>
          <li><a href="area.php?acao=listar">Listar Area</a></li>
     </ul>
      <?php }?>
      </ul>
	 

	  <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <?php
              if(isset($_SESSION['user']))
                echo $_SESSION['user']['nome'];
              else
                echo 'Usu&aacute;rio';
            ?>
            <span class="caret"></span></a>
          <ul class="dropdown-menu" style = "background-color: black;">
          <li><a href="perfil.php">Perfil</a></li>
          <li><a href="logout.php">Logout</a></li>
          </ul></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br/><br/><br/><br/><br/><br/>
<?php } ?>
<div class="container-fluid">		
