 <?php  
  session_start();
  require_once 'Controlador.php';
  $control = new Controlador();
  $control->checkLogin();
  include 'views/header.php';

  if($_SERVER['REQUEST_METHOD'] == 'GET'){
      if($_GET['acao']=='cadastroUsuario'){
      $control->cadastroUsuario();
    }else if($_GET['acao'] == 'atualizar')
      {
        $control->up_usuario();
      }
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($_POST['acao']=='add_usuario'){
      $control->add_usuario();
    }else if($_POST['acao'] == 'up-user')
      {
        $control->atualiza_usuario();
      }
  }
    include 'views/footer.php';
 ?>