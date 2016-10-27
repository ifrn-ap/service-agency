<?php
  include 'views/header.php';
?>
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="2">Informa&ccedil;&otilde;es</th>
        </tr>
      </thead>
      <tfoot>
      </tfoot>
      <tbody>
      <tr>
        <td><strong>Nome</strong></td><td><?php echo htmlentities($_SESSION['user']['nome']); ?></td>
      </tr>
      <tr>
        <td><strong>Nome de Usuario</strong></td><td><?php echo htmlentities($_SESSION['user']['email']); ?></td>
      </tr>
      <tr>
        <td><strong>Tipo de Usu&aacute;rio</strong></td><td>
        <?php 
        if($_SESSION['user']['tipo']==2){ 
      echo "Administrador";
        }else if($_SESSION['user']['tipo']==1){
      echo "Agente Comunitário";
        }else{
          echo "Cidadão";
        }
        ?>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
  <p>
    <a href="usuario.php?acao=atualizar&id=<?php echo $_SESSION['user']['id']; ?>" class="btn btn-default" role="button">Atualizar</a>
  </p>
</div>
</div>

<?php
  include 'views/footer.php';
?>