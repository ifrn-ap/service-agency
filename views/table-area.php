<center><h2>Áreas Cadastradas</h2></center>
<br> <br>
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Código Da area</th>
          <th>Area</th>
        </tr>
      </thead>
      <tfoot>
      </tfoot>
      <tbody>


      <?php
          if(!is_null($_POST['area'])){
            $area = $_POST['area'];
            if($area->num_rows > 0){
                while($row = $area->fetch_assoc()){
                   echo '<tr>
                    <td>'.$row['codigo'].'</td>
                    <td>'.$row['area'].'</td>
          <td><a href="area.php?acao=visualizar&codigo='.$row['codigo'].'" class="btn btn-info">Visualizar</a></td>
          <td><a href="area.php?acao=atualizar&codigo='.$row['codigo'].'" class="btn btn-warning">Atualizar</a></td>
          <td><a href="area.php?acao=deletar&codigo='.$row['codigo'].'" class="btn btn-danger">Excluir</a></td><tr>'
          ;
                }
            }else
              echo 'Nenhuma area cadastrada';
          }
      ?>
      
      </tbody>
    </table>
  </div>
</div>
</div>