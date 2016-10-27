<center><h2>Agendamentos Cadastrados</h2></center>
<br> <br>
<div class="row">
  <form role="form" action="agendamento.php" method="POST">
      <input name="acao" type="text" value="filtrar" hidden />
        <div class="form-group">
          <div class="col-sm-6">
            <select name = "tipo_solicitacao" class="form-control">
              <option value=""></option>
              <option value="Saúde">Saúde</option>
              <option value="Urbano">Urbano</option>
            </select>
          </div>
          <div class="col-sm-3">
             <button type="submit" class="btn btn-success">
              Filtrar
             </button>
          </div>
        </div>
  </form>
</div><br><br><br>
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Código Do Agendamento</th>
          <th>Data de cadastro</th> 
          <th>Data</th>
          <th>Localidade</th>
          <th>Tipo De Solicitação</th>
          <th>Solicitação</th>
          <th>Status</th>

        </tr>
      </thead>
      <tfoot>
      </tfoot>
      <tbody>


      <?php
        $control = new Controlador();
        if($_SESSION['user']['tipo']==1){
          $id_agente = $control->getId($_SESSION['user']['id']);
          $indice = 'agente_id';
        }
        if($_SESSION['user']['tipo']==1){
          $id_agente = $control->getId($_SESSION['user']['id']);
          $indice = 'cidadao_id';
        }
          if(!is_null($_POST['agendamento'])){
            $agendamento = $_POST['agendamento'];
            if($agendamento->num_rows > 0){
                while($row = $agendamento->fetch_assoc()){
                  if(isset($id_agente)){
                  if($row[$indice]==$id_agente){
                   echo '<tr>
                    <td>'.$row['codigo'].'</td>
                    <td>'.$row['data_cadastro'].'</td>
                    <td>'.$row['data'].'</td>
                    <td>'.$row['localidade'].'</td>
                    <td>'.$row['tipo_solicitacao'].'</td>
                    <td>'.$row['solicitacao'].'</td>
                    <td><a href="agendamento.php?acao=visualizar&codigo='.$row['codigo'].'" class="btn btn-info">Visualizar</a></td>
                    <td><a href="agendamento.php?acao=atualizar&codigo='.$row['codigo'].'" class="btn btn-warning">Atualizar</a></td>
                    <td><a href="agendamento.php?acao=deletar&codigo='.$row['codigo'].'" class="btn btn-danger">Excluir</a></td><tr>'
                  ;
                }
                }else{
                   echo '<tr>
                    <td>'.$row['codigo'].'</td>
                    <td>'.$row['data_cadastro'].'</td>
                    <td>'.$row['data'].'</td>
                    <td>'.$row['localidade'].'</td>
                    <td>'.$row['tipo_solicitacao'].'</td>
                    <td>'.$row['solicitacao'].'</td>
                    <td>'.$row['status'].'</td>

          <td><a href="agendamento.php?acao=associar&codigo='.$row['codigo'].'" class="btn btn-info">Agente</a></td>
          <td><a href="agendamento.php?acao=visualizar&codigo='.$row['codigo'].'" class="btn btn-info">Visualizar</a></td>
          <td><a href="agendamento.php?acao=atualizar&codigo='.$row['codigo'].'" class="btn btn-warning">Atualizar</a></td>
          <td><a href="agendamento.php?acao=deletar&codigo='.$row['codigo'].'" class="btn btn-danger">Excluir</a></td><tr>'
          ;
                }
              }
            }else
              echo 'Nenhum agendamento cadastrado';
          }
      ?>
      
      </tbody>
    </table>
  </div>
</div>
</div>