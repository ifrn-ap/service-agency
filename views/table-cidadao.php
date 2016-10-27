<center><h2>Cidadãos Cadastrados</h2></center>
<br> <br>
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Código Do Cidadão</th>
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>CPF</th>
          <th>E-mail</th>
          <th>Data de nascimento</th>
          <th>Rua</th>
          <th>Bairro</th>
          <th>Número</th>
        </tr>
      </thead>
      <tfoot>
      </tfoot>
      <tbody>


      <?php
      $modal = 0;
          if(!is_null($_POST['cidadao'])){
            $cidadao = $_POST['cidadao'];
            if($cidadao->num_rows > 0){
                while($row = $cidadao->fetch_assoc()){
                  $modal = $modal +1;
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
                                                        Deseja relamente excluir esse cidadão?
                                                    </center>
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center">
                                                   <a href="cidadao.php?acao=deletar&id='.$row['id'].'" class="btn btn-danger">Sim</a>
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
                    <td>'.$row['data_nascimento'].'</td>
                    <td>'.$row['rua'].'</td>
                    <td>'.$row['bairro'].'</td>
                    <td>'.$row['numero'].'</td>
                    

          <td><a href="cidadao.php?acao=visualizar&id='.$row['id'].'" class="btn btn-info">Visualizar</a></td>
          <td><a href="cidadao.php?acao=atualizar&id='.$row['id'].'" class="btn btn-warning">Atualizar</a></td>
          <td><a href="" class="btn btn-danger" data-toggle="modal" data-target="#myModal'.$modal.'">Excluir</a></td><tr>'
          ;
                }
            }else
              echo 'Nenhum cidadão cadastrado';
          }
      ?>
      
      </tbody>
    </table>
  </div>
</div>
</div>