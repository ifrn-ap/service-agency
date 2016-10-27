<center><h2>Cadastrado de Área</h2></center>
<br> <br>
<div class="row">
	<div class="col-md-12">
	<form role="form" action="area.php" method="POST">
	<input name="acao" type="hidden" value="<?php if($_GET['acao'] == 'atualizar')
	echo 'up-area'; else echo 'add-area'?>">

	<input type="hidden" class="form-control" name="codigo" value="<?php if(isset($_POST['codigo'])) echo $_POST['codigo']?>">

	<div class="form-group">
		<label for="area">
			Area:
		</label>
		<input type="text" class="form-control" id="area" name="area" placeholder="Informe a area" value="<?php if(isset($_POST['area'])) echo $_POST['area']?>">
	</div>
	
	<button type="submit" class="btn btn-default">
		<?php if($_GET['acao'] == 'atualizar')
	echo 'Atualizar'; else echo 'Cadastrar'?>
	</button>

	</form>
	</div>
</div>