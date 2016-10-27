<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="2">Informa&ccedil&otildees</th>
        </tr>
      </thead>
      <tfoot>
      </tfoot>
      <tbody>

      <?php 

          if(!is_null($_POST['cidadao'])){
            $cidadao = $_POST['cidadao'];
            if($cidadao->num_rows > 0){
                while($row = $cidadao->fetch_assoc()){
           echo '
         
      <tr>
        <td><strong>Codigo</strong></td></td><td>'.$row['id'].'</td>
      </tr>
      <tr>
        <td><strong>Nome</strong></td><td>'.$row['nome'].'</td>
      </tr>
      <tr>
        <td><strong>Sobrenome</strong></td></td><td>'.$row['sobrenome'].'</td></td>
      </tr>
      <tr>
        <td><strong>CPF</strong></td></td><td>'.$row['cpf'].'</td></td>
      </tr>
      <tr>
        <td><strong>E-mail</strong></td></td><td>'.$row['email'].'</td></td>
      </tr>
	     <tr>
        <td><strong>Data de Nascimento</strong></td></td><td>'.$row['data_nascimento'].'</td></td>
      </tr>
      <tr>
        <td><strong>Rua</strong></td></td><td>'.$row['rua'].'</td></td>
      </tr>
      <tr>
        <td><strong>Bairro</strong></td></td><td>'.$row['bairro'].'</td></td>
      </tr>
      <tr>
        <td><strong>Número</strong></td></td><td>'.$row['numero'].'</td></td>
      </tr>
      <tr>
        <td><strong>Número</strong></td></td><td>'.$row['numero'].'</td></td>
      </tr>';
          }
          }
        }

          ?>
      </tbody>
    </table>
  </div>
</div>
</div>