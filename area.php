<?php
  session_start();
  require_once 'Controlador.php';
  $control = new Controlador();
  
  include 'views/header.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['acao']=='add-area'){
      $control->add_area();
      }else if($_POST['acao']=='up-area'){
      $control->up_area();
      }else if($_POST['acao']=='associar'){
      $control->associar();
      }
    }else if($_SERVER['REQUEST_METHOD'] == 'GET'){
  if($_GET['acao']=='cadastrar'){
    $control->cadastroArea();
  }else if($_GET['acao']=='listar'){
    $control->listaArea();
  }else if ($_GET['acao'] == 'deletar'){
    $control->deletarArea();
  }else if($_GET['acao'] == 'visualizar'){
  $control->verArea();
    }else if ($_GET['acao'] == 'atualizar'){
    $control->atualizarArea();
  }else if($_GET['acao'] == 'areaAgente') {
  $control->associar_area();
  }

    }

    include 'views/footer.php';
 ?>