<?php
  session_start();
  require_once 'Controlador.php';
  $control = new Controlador();
  
  include 'views/header.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['acao']=='add-agente'){
      $control->add_agente();
      }else if($_POST['acao']=='up-agente'){
      $control->up_agente();
      } else if ($_POST['acao']=='filtrar'){
        $control->filtrarAgente();
      }
    }else if($_SERVER['REQUEST_METHOD'] == 'GET'){
  if($_GET['acao']=='cadastrar'){
    $control->cadastroAgente();
  }else if($_GET['acao']=='listar'){
    $control->listaAgente();
  }else if ($_GET['acao'] == 'deletar'){
    $control->deletarAgente();
  }else if($_GET['acao'] == 'visualizar'){
  $control->verAgente();
    }else if ($_GET['acao'] == 'atualizar'){
    $control->atualizarAgente();
  }

    }

    include 'views/footer.php';
 ?>