<center><h2>Cadastrado de Agendamento</h2></center>
<br> <br>
<div class="row">
	<div class="col-md-12">
	<form role="form" action="agendamento.php" method="POST">

	<input name="acao" type="hidden" value="<?php if($_GET['acao'] == 'atualizar')
	echo 'up-agendamento'; else echo 'add-agendamento'?>">

	<input type="hidden" class="form-control" name="id" value="<?php if(isset($_POST['codigo'])) echo $_POST['codigo']?>">

	<div class="form-group">
		<label for="solicitacao">
			Solicitação:
		</label>
		<textarea  rows="5" cols="50" maxlength="100" style="resize: none;" name="solicitacao" id = "solicitacao" class="form-control"  placeholder = "Insira uma descrição" required></textarea>
	</div>
		<div class="form-group">
		<label for="data">
			Data do cadastro:
		</label>
		<input type="date" class="form-control" id="data_cadastro" name="data_cadastro" value="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>">
	</div>
	<div class="form-group">
		<label for="data">
			Data da visita:
		</label>
		<input type="date" class="form-control" id="data" name="data" value="<?php if(isset($_POST['data'])) echo $row['data']; ?>"><br>

	<div class="form-group">
    <!--Requisição do endereço do usuário-->
         <div>
           <label>Localidade:
                <input class="form-control" type="text" id="address" name="localidade" placeholder="Digite seu endereço" required/>

                 <input type="hidden" id="latitude" name="lat" readonly>
                 <input type="hidden" id="longitude" name="long" readonly>
                 <input type="hidden" id="radius" readonly>
            </label>
         </div>

         <div id="mapaendereco" style="width: 100%; height: 300px;"></div>
            <script>
               $('#mapaendereco').locationpicker({
                 location: {latitude: -5.626563042165431, longitude: -37.80804050268557},
                  radius: 100,
                  inputBinding: {
                  latitudeInput: $('#latitude'),
                  longitudeInput: $('#longitude'),
                  radiusInput: $('#radius'),
                  locationNameInput: $('#address')
                },
                enableAutocomplete: true,
              });
              </script> 
         </div>
	<div class="form-group">
		<label for="tipo_solicitacao">
			Tipo de solicitação:
		</label><br/>
         	<input type="radio" id= "tipo_solicitacao" name="tipo_solicitacao" value="Urbano" <?php if((isset($row['tipo_solicitacao']))&&($row['tipo_solicitacao']=='Urbano')) echo 'checked'; ?>/> Urbano <br/>
         	<input type="radio" id="tipo_solicitacao" name="tipo_solicitacao" value="Saúde" <?php if((isset($row['tipo_solicitacao']))&&($row['tipo_solicitacao']=='Saúde')) echo 'checked'; ?>/> Saúde 
	</div>

	<button type="submit" class="btn btn-default">
		<?php if($_GET['acao'] == 'atualizar')
	echo 'Atualizar'; else echo 'Cadastrar'?>
	</button>
	</form>
	</div>
</div>