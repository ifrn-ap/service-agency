<?php
  session_start();
  require_once 'Controlador.php';
  $control = new Controlador();
  
  include 'views/header.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['acao']=='add-agendamento'){
      $control->add_agendamento();
      }else if($_POST['acao']=='up-agendamento'){
      $control->up_agendamento();
      }else if($_POST['acao']=='buscar-agendamento'){
      $control->buscarAgendamento();
      } else if ($_POST['acao']=='filtrar'){
        $control->filtrarAgendamento();
      }
  }else if($_SERVER['REQUEST_METHOD'] == 'GET'){
  if($_GET['acao']=='cadastrar'){
    $control->cadastroAgendamento();
  }else if($_GET['acao']=='listar'){
    $control->listaAgendamento();
  }else if ($_GET['acao'] == 'deletar'){
    $control->deletarAgendamento();
  }else if($_GET['acao'] == 'visualizar'){
  $control->verAgendamento();
    }else if ($_GET['acao'] == 'atualizar'){
    $control->atualizarAgendamento();
  }

    }

    include 'views/footer.php';
 ?>