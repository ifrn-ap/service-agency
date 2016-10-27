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

          if(!is_null($_POST['agendamento'])){
            $agendamento = $_POST['agendamento'];
            if($agendamento->num_rows > 0){
                while($row = $agendamento->fetch_assoc()){
                  $data = $row['data'];
                  $data_cadastro = $row['data_cadastro'];

           echo '
         
      <tr>
        <td><strong>Codigo</strong></td></td><td>'.$row['codigo'].'</td>
      </tr>
      <tr>
        <td><strong>Data de Cadastro</strong></td><td>'.$row['data_cadastro'].'</td>
      </tr>
      <tr>
        <td><strong>Data</strong></td><td>'.$row['data'].'</td>
      </tr>
      <tr>
        <td><strong>Tipo de solicitacao</strong></td></td><td>'.$row['tipo_solicitacao'].'</td></td>
      </tr>
      <tr>
        <td><strong>solicitacão</strong></td></td><td>'.$row['solicitacao'].'</td></td>
      </tr>
      <tr>
        <td><strong>Cidadão ID</strong></td></td><td>'.$row['cidadao_id'].'</td></td>
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

<center><h1>Informe os dados de confirmação de agendamento</h1></center>
<div class="row">
  <form role="form" action="observacao.php" method="POST">
      <input name="acao" type="text" value="observacao" hidden />
        <div class="form-group">
          <div class="col-sm-12">
          <label for="estado">
            Estado: 
          </label>
            <select name = "status" class="form-control">
              <option value=""></option>
              <option value="Confirmado">Confirmado</option>
              <option value="Alterado">Alterado</option>  
              <option value="Cancelado">Cancelado</option>
            </select>
         <br>
              <label for="justificativa">
                Justificativa: 
              </label>
              <textarea  rows="5" cols="50" maxlength="100" style="resize: none;" name="solicitacao" id = "solicitacao" class="form-control"  placeholder = "Insira uma justificativa" required></textarea>
             
             <br/>
              <label>
                  Data do Pedido:
              </label>
                <input class = "form-control" id ="data" type="date" name="data" value="<?php echo $data_cadastro; ?>">
                <br/>
                <label>
                  Data da Visita:
                </label>
                <input class = "form-control" id ="data_cadastro" type="date" name="data_cadastro" value="<?php echo $data; ?>">
                <br/>
                <label>
                  Data de Atendimento:
                </label>
                <input class = "form-control" id ="dt_alteracao" type="date" name="dt_alteracao">
            </div>
            <br/><br/>
          <div class="col-sm-3">
             <button type="submit" class="btn btn-success">
              Enviar
             </button>
          </div>
        </div>
  </form>
</div><br><br><br>