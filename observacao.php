<?php 
  require_once 'Controlador.php';
  $control = new Controlador();

  include 'views/header.php';
 
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['acao']=='cadastrar'){
      $control->add_status();
    }
  }

 
include 'views/footer.php';
 ?>