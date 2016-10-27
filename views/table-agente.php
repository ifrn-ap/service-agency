<center><h2>Agentes Cadastrados</h2></center>
<br> <br>
<div class="row">
  <form role="form" action="agente.php" method="POST" id="form">
      <input name="acao" type="text" value="filtrar" hidden />
        <div class="form-group">
          <div class="col-sm-12">
            <select name = "area" class="form-control" onChange="document.getElementById('form').submit()">
              <option value=""></option>
             <?php 
          while ($row=$_POST['area']->fetch_assoc()){
            echo'
              <option value="'.$row['codigo'].'">'.$row['area'].'
              </option>
            ';
          } 
        ?>
            </select>
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
          <th>Código Do Agente</th>
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>CPF</th>
          <th>E-mail</th>
          <th>Rua</th>
          <th>Bairro</th>
          <th>Número</th>
          <th>Setor De Atuacao</th>
        </tr>
      </thead>
      <tfoot>
      </tfoot>
      <tbody>


      <?php
       $modal=0;
          if(!is_null($_POST['agente'])){
            $agente = $_POST['agente'];
            if($agente->num_rows > 0){
                while($row = $agente->fetch_assoc()){
                  $modal=$modal+1;
                   echo '
                      <div class="modal fade" id="myModal'.$modal.'" role="dialog">
                                    <div class="modal-dialog"> 
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">
                                                    &times;
                                                </button>
                                                <h4 class="modal-title">
                                                    <center>
                                                        Deseja relamente excluir esse agente?
                                                    </center>
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center">
                                                   <a href="agente.php?acao=deletar&id='.$row['usuario_id'].'" class="btn btn-danger">Sim</a>
                                                    <a href="" class="btn btn-danger" data-dismiss="modal">Não</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                   <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['nome'].'</td>
                    <td>'.$row['sobrenome'].'</td>
                    <td>'.$row['cpf'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['rua'].'</td>
                    <td>'.$row['bairro'].'</td>
                    <td>'.$row['numero'].'</td>
                    <td>'.$row['setor_de_atuacao'].'</td>

          <td><a href="agente.php?acao=visualizar&id='.$row['id'].'" class="btn btn-info">Visualizar</a></td>
          <td><a href="agente.php?acao=atualizar&id='.$row['id'].'" class="btn btn-warning">Atualizar</a></td>
          <td><a href="" class="btn btn-danger" data-toggle="modal" data-target="#myModal'.$modal.'">Excluir</a></td><tr>'
          ;
                }
            }else
              echo 'Nenhum agente cadastrado';
          }
      ?>
      
      </tbody>
    </table>
  </div>
</div>
</div>