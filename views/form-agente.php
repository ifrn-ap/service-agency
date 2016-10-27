<center><h2>Cadastrado de Agente</h2></center>
<br> <br>
<div class="row">
	<div class="col-md-12">
	<form role="form" action="agente.php" method="POST">
	<input name="acao" type="hidden" value="<?php if($_GET['acao'] == 'atualizar')
	echo 'up-agente'; else echo 'add-agente'?>">

	<input type="hidden" class="form-control" name="id" value="<?php if(isset($_POST['id'])) echo $_POST['id']?>">

	<div class="form-group">
		<label for="nome">
			Nome:
		</label>
		<input type="text" class="form-control" id="nome" name="nome" placeholder="Informe o nome" value="<?php if(isset($_POST['nome'])) echo $_POST['nome']?>">
	</div>
	<div class="form-group">
		<label for="descricao">
			Sobrenome:
		</label>
		<input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Informe o sobrenome" value="<?php if(isset($_POST['sobrenome'])) echo $_POST['sobrenome'] ?>">
	</div>
	<div class="form-group">
		<label for="cpf">
			CPF:
		</label>
		<input type="text" class="form-control" id="cpf" name="cpf" placeholder="Informe o CPF" value="<?php if(isset($_POST['cpf'])) echo $row['cpf']; ?>">
	</div>
	<div class="form-group">
		<label for="email">
			E-mail:
		</label>
		<input type="email" class="form-control" id="email" name="email" placeholder="Informe o E-mail" value="<?php if(isset($_POST['email'])) echo $row['email']; ?>">
	</div>
		
	<div class="form-group">
		<label for="rua">
			Rua:
		</label>
		<input type="text" class="form-control" id="rua" name="rua" placeholder="Informe a rua" value="<?php if(isset($_POST['rua'])) echo $row['rua']; ?>">
	</div>
	<div class="form-group">
		<label for="bairro">
			Bairro:
		</label>
		<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Informe o bairro" value="<?php if(isset($_POST['bairro'])) echo $row['bairro']; ?>">
	</div>
	<div class="form-group">
		<label for="numero">
			Número:
		</label>
		<input type="text" class="form-control" id="numero" name="numero" placeholder="Informe o número da casa" value="<?php if(isset($_POST['numero'])) echo $row['numero']; ?>">
	</div>
		<div class="form-group">
		<label for="area">
			Area do Agente
		</label>
			<select class="form-control" name="area">
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
	<div class="form-group">
		<label for="setor_de_atuacao">
			Setor de atuação:
		</label><br/>
			<input type="radio" id="setor_de_atuacao" name="setor_de_atuacao" value="Saúde" <?php if((isset($row['setor_de_atuacao']))&&($row['setor_de_atuacao']=='Saúde')) echo 'checked'; ?>/> Saúde <br>
         	<input type="radio" id= "setor_de_atuacao" name="setor_de_atuacao" value="Urbanismo" <?php if((isset($row['setor_de_atuacao']))&&($row['setor_de_atuacao']=='Urbanismo')) echo 'checked'; ?>/> Urbanismo <br/>
         	
	</div>
	<button type="submit" class="btn btn-default">
		<?php if($_GET['acao'] == 'atualizar')
	echo 'Atualizar'; else echo 'Cadastrar'?>
	</button>

	</form>
	</div>
</div>