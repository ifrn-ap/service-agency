
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="2">Informações</th>
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
           echo '
         
      <tr>
        <td><strong>Codigo</strong></td></td><td>'.$row['codigo'].'</td>
      </tr>
      <tr>
        <td><strong>Nome</strong></td><td>'.$row['area'].'</td>
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