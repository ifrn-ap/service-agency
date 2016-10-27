 <?php 
  require_once 'Controlador.php';
  $control = new Controlador();

  include 'views/header.php';
 
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['acao']=='add-cidadao'){
      $control->add_cidadao();
      }else if($_POST['acao']=='up-cidadao'){
      $control->up_cidadao();
      }
    }else if($_SERVER['REQUEST_METHOD'] == 'GET'){
  if($_GET['acao']=='cadastrar'){
    $control->cadastroCidadao();
  }else if($_GET['acao']=='listar'){
    $control->listaCidadao();
  }else if ($_GET['acao'] == 'deletar'){
    $control->deletarCidadao();
  }else if($_GET['acao'] == 'visualizar'){
  $control->verCidadao();
    }else if ($_GET['acao'] == 'atualizar'){
    $control->atualizarCidadao();
  }

    }

 
include 'views/footer.php';
 ?>