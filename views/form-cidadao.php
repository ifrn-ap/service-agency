<center><h2>Cadastrado de Cidadão</h2></center>
<br> <br>
<div class="row">
	<div class="col-md-12">
	<form role="form" action="cidadao.php" method="POST">

	<input name="acao" type="hidden" value="<?php if($_GET['acao'] == 'atualizar')
	echo 'up-cidadao'; else echo 'add-cidadao'?>">

	<input type="hidden" class="form-control" name="id" value="<?php if(isset($_POST['id'])) echo $_POST['id']?>">

	<div class="form-group">
		<label for="nome">
			Nome:
		</label>
		<input type="text" class="form-control" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required>
	</div>
	<div class="form-group">
		<label for="sobrenome">
			Sobrenome:
		</label>
		<input type="text" class="form-control" id="sobrenome" name="sobrenome" value="<?php echo $row['sobrenome']; ?>" required>
	</div>
	<div class="form-group">
		<label for="dt_nasc">
			Data de nascimento:
		</label>
		<input type="date" class="form-control" id="dt_nasc" name="dt_nasc" value="<?php echo $row['data_nascimento']; ?>" required>
	</div>
	<div class="form-group">
		<label for="cpf">
			CPF:
		</label>
		<input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $row['cpf']; ?>" required>
	</div>
	<div class="form-group">
		<label for="email">
			E-mail:
		</label>
		<input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
	</div>
		
	<div class="form-group">
		<label for="rua">
			Rua:
		</label>
		<input type="text" class="form-control" id="rua" name="rua" value="<?php echo $row['rua']; ?>" required>
	</div>
	<div class="form-group">
		<label for="bairro">
			Bairro:
		</label>
		<input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $row['bairro']; ?>" required>
	</div>
		<div class="form-group">
		<label for="numero">
			Número:
		</label>
		<input type="text" class="form-control" id="numero" name="numero" value="<?php echo $row['numero']; ?>" required>
	</div>
	<button type="submit" class="btn btn-default">
		<?php if($_GET['acao'] == 'atualizar')
	echo 'Atualizar'; else echo 'Cadastrar'?>
	</button>
	</form>
	</div>
</div>