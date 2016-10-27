<div class="row">
	<div class="col-md-12">
		<form role="form" action="usuario.php" method="POST">
			<input name="acao" type="text" 
				<?php
					if($_GET['acao'] == 'atualizar')
						echo 'value="up-user"';
					else echo 'value="add-user';
				?>" hidden />

			<input name="id" id="id" type="text"
			 value="<?php if(isset($_POST['id'])) echo $_POST['id']; ?>" hidden />
			<div class="form-group">
				<label for="nome">
					Nome:
				</label>
				<input type="text" class="form-control" name="nome" id="nome"
				 placeholder = "Insira seu nome" value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>">
			</div>

			<div class="form-group">
				<label for="email">
					E-mail:
				</label>
				<input type="email" class="form-control" name="email" id="email"
				 value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
			</div>
			<div class="form-group">
				<label for="senha">
					Senha:
				</label>
				<input type="password" class="form-control" name="senha" id="senha" placeholder = "Insira sua senha" value="<?php if(isset($_POST['senha'])) echo $_POST['senha']; ?>">
			</div>
			<button type="submit" class="btn btn-default">
				<?php
					if($_GET['acao'] == 'atualizar')
						echo 'Atualizar';
					else echo 'Cadastrar';
				?>
			</button>
		</form>
	</div>
</div>