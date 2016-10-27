<?php
//inicio de codigo modificado
	require_once 'modelo.php';

	class Controlador{
		private $userModel;
		public function __construct(){
			$this->userModel = new UsuarioModel();
		}
		
		function login($email, $senha, $tipo){
			$resp = $this->userModel->login($email, $senha, $tipo);
			return $resp;
		}

		function checkLogin(){
			if(!isset($_SESSION['user'])){
				header('Location: index.php');
			}
		}

		function logout(){
			$_SESSION['user'] = null;
			session_destroy();
			header('Location: index.php');
		}
		//fim das funções de login
		//funções de usuario
		function up_usuario(){
			$user = $this->userModel->getUsuario($_GET['id']);
			if($user->num_rows > 0){
				if($row = $user->fetch_assoc()){
					$_POST['id'] = $row['id'];
					$_POST['nome'] = $row['nome'];
					$_POST['email'] = $row['email'];
					$_POST['senha'] = "";

				}
			}
			require_once 'views/form-usuario.php';
		}

		function atualiza_usuario(){
			$retp = true;
			$ret = false;

			if(!empty($_POST['nome']) && !empty($_POST['email'])){

					$ret = $this->userModel->atualiza_usuario($_POST['id'], $_POST['nome'], 
					$_POST['email']);
    		

    		if(!empty($_POST['senha']) && isset($_POST['senha'])){
				$retp = $this->userModel->alterar_senha($_POST['senha'], $_POST['id']);
			}

			if($ret && $retp){ 
				echo 'Todos os dados foram atualizados com sucesso!';
			}else{ 
				echo 'Erro ao atualizar dados!';
			}
			
		}else{
			echo 'necessario preencher todos os campo';
		}
		}
		//fim das funções de usuario
		//funções de agente
		function add_agente(){

			if(!empty($_POST['nome']) && !empty($_POST['sobrenome'])
			 && !empty($_POST['cpf']) && !empty($_POST['email'])
			 && !empty($_POST['rua']) && !empty($_POST['bairro']) && !empty($_POST['numero']) && !empty($_POST['setor_de_atuacao'])){
			 	$_POST['tipo'] = 1;
			 	$_POST['usuario'] = $this->userModel->add_usuario($_POST['nome'], $_POST['email'], 12345, $_POST['tipo'], $_POST['agente']);
					
					$id = $this->userModel->add_agente(
					$_POST['nome'], $_POST['sobrenome'],
					$_POST['cpf'], $_POST['email'],
					$_POST['rua'], $_POST['bairro'],
					$_POST['numero'],  $_POST['setor_de_atuacao'], 
					$_POST['usuario'], $_POST['area']);
    				echo 'Usuário cadastrado com sucesso com codigo
    				(ID = '.$id.')';
    		
    		}else{
    			echo 'Necessário preencher todos os campos!';
    		}
		}

		function cadastroAgente(){
			$_POST['area'] = $this->userModel->listaArea();
			require_once 'views/form-agente.php';
		}

		function listaAgente(){
			$_POST['area'] = $this->userModel->listaArea();
			$_POST['agente'] = $this->userModel->listaAgente();
			include_once 'views/table-agente.php';
		}

		function verAgente(){
			$_POST['agente'] = $this->userModel->verAgente($_GET['id']);
			include_once 'views/perfil-agente.php';
		}

		function atualizarAgente(){
			$_POST['agente'] = $this->userModel->verAgente($_GET['id']);
			if($_POST['agente']->num_rows > 0){
				if($row = $_POST['agente']->fetch_assoc()){
					$_POST['id'] = $row['id'];
					$_POST['nome'] = $row['nome'];
					$_POST['sobrenome'] = $row['sobrenome'];
					$_POST['cpf'] = $row['cpf'];
					$_POST['email'] = $row['email'];
					$_POST['rua'] = $row['rua'];
					$_POST['bairro'] = $row['bairro'];
					$_POST['numero'] = $row['numero'];
					$_POST['setor_de_atuacao'] = $row['setor_de_atuacao'];
			}
			require_once 'views/form-agente.php';
		}
	}

		function up_agente(){
			if(!empty($_POST['nome']) && 
			!empty($_POST['sobrenome']) && 
			!empty($_POST['cpf']) && 
			!empty($_POST['email']) && 
			!empty($_POST['rua']) && 
			!empty($_POST['bairro']) && 
			!empty($_POST['numero']) && 
			!empty($_POST['setor_de_atuacao'])){
				
				$id = $this->userModel->up_agente($_POST['id'],
				$_POST['nome'], $_POST['sobrenome'], $_POST['cpf'], $_POST['email'], $_POST['rua'], 
				$_POST['bairro'], $_POST['numero'], $_POST['setor_de_atuacao']);

				if($id){
					echo "Dados atualizados com sucesso";
				}else{
					echo "Erro na atualização dos dados";
				}
    				

    		}else{
    			echo 'Necessário preencher todos os campos!';
				}
			}

		function deletarAgente(){
			$resp = $this->userModel->deletarAgente($_GET['id']);
			header("Location: agente.php?acao=listar");
		}

		function filtrarAgente(){
			$_POST['agente'] = $this->userModel->filtrarAgente($_POST['area']);	
			$_POST['area'] = $this->userModel->listaArea();
			include_once 'views/table-agente.php';
		}
		//fim das funções de agente	

		//funções de cidadão
		function add_cidadao(){
			if($this->userModel->valida_cpf($_POST['cpf'])){
			 	$_POST['tipo'] = 0;
			 	$_POST['usuario'] = $this->userModel->add_usuario($_POST['nome'], $_POST['email'],
			 	 12345, $_POST['tipo']);
					
					$id = $this->userModel->add_cidadao(
					$_POST['nome'], $_POST['sobrenome'],
					$_POST['cpf'], $_POST['email'],
					$_POST['dt_nasc'], $_POST['bairro'],
					$_POST['rua'],  $_POST['numero'], 
					$_POST['usuario']);
    				if($id!=null){
    					$caminho='login.php?email='.$_POST['email'];
    					header("Location: ".$caminho);
    				}
    		}else{
    			echo 'CPF invalido';
    		}
    	}

		function atualizarCidadao(){
			$_POST['cidadao'] = $this->userModel->verCidadao($_GET['id']);
			if($_POST['cidadao']->num_rows > 0){
				if($row = $_POST['cidadao']->fetch_assoc()){
					$_POST['id'] = $row['id'];
					$_POST['nome'] = $row['nome'];
					$_POST['sobrenome'] = $row['sobrenome'];
					$_POST['cpf'] = $row['cpf'];
					$_POST['email'] = $row['email'];
					$_POST['data_nascimento'] = $row['data_nascimento'];
					$_POST['rua'] = $row['rua'];
					$_POST['bairro'] = $row['bairro'];
					$_POST['numero'] = $row['numero'];
			}
			require_once 'views/form-cidadao.php';
		}
	}
		function up_cidadao(){
			if(!empty($_POST['nome']) && 
			!empty($_POST['sobrenome']) && 
			!empty($_POST['cpf']) && 
			!empty($_POST['email']) && 
			!empty($_POST['dt_nasc']) &&
			!empty($_POST['rua']) && 
			!empty($_POST['bairro']) && 
			!empty($_POST['numero'])){
				
				$id = $this->userModel->up_cidadao($_POST['id'],
				$_POST['nome'], $_POST['sobrenome'], $_POST['cpf'], $_POST['email'], $_POST['dt_nasc'], $_POST['rua'], 
				$_POST['bairro'], $_POST['numero']);

				if($id){
					echo "Dados atualizados com sucesso";
				}else{
					echo "Erro na atualização dos dados";
				}
    				

    		}else{
    			echo 'Necessário preencher todos os campos!';
				}
			}

		function deletarCidadao(){
			$resp = $this->userModel->deletarCidadao($_GET['id']);
			header("Location: cidadao.php?acao=listar");
		}

		function listaCidadao(){
			$_POST['cidadao'] = $this->userModel->listaCidadao();
			include_once 'views/table-cidadao.php';
		}

		function verCidadao(){
			$_POST['cidadao'] = $this->userModel->verCidadao($_GET['id']);
			include_once 'views/perfil-cidadao.php';
		}

		//fim das funções de cidadão

		//funções de agendamento
		function add_agendamento(){

			$_POST['id'] = $this->userModel->get_idcidadao($_SESSION['user']['id']);
			$id = $this->userModel->add_agendamento(
			$_POST['data'], $_POST['data_cadastro'], $_POST['localidade'], $_POST['tipo_solicitacao'],
			$_POST['solicitacao'], $_POST['id']);
    		echo 'Agendamento cadastrado com sucesso com codigo(ID = '.$id.')';
    		}

		function cadastroAgendamento(){
			require_once 'views/form-agendamento.php';
		}

		function listaAgendamento(){
			$_POST['agendamento'] = $this->userModel->listaAgendamento();
			include_once 'views/table-agendamento.php';
		}

		function verAgendamento(){
			$_POST['agendamento'] = $this->userModel->verAgendamento($_GET['codigo']);
			include_once 'views/perfil-agendamento.php';
		}

		function atualizarAgendamento(){
			$_POST['agendamento'] = $this->userModel->verAgendamento($_GET['codigo']);
			if($_POST['agendamento']->num_rows > 0){
				if($row = $_POST['agendamento']->fetch_assoc()){
					$_POST['codigo'] = $row['codigo'];
					$_POST['data'] = $row['data'];
					$_POST['localidade'] = $row['localidade'];
					$_POST['tipo_solicitacao'] = $row['tipo_solicitacao'];
					$_POST['solicitacao'] = $row['solicitacao'];
			}
			require_once 'views/form-agendamento.php';
		}
	}

		function up_agendamento(){
			if(!empty($_POST['data']) &&
			!empty($_POST['localidade']) && 
			!empty($_POST['tipo_solicitacao']) && 
			!empty($_POST['solicitacao'])){
				
				$id = $this->userModel->up_agendamento($_POST['codigo'], $_POST['data'], $_POST['localidade'], $_POST['tipo_solicitacao'], $_POST['solicitacao']);

				if($id){
					echo "Dados atualizados com sucesso";
				}else{
					echo "Erro na atualização dos dados";
				}
    				

    		}else{
    			echo 'Necessário preencher todos os campos!';
				}
			}

		function deletarAgendamento(){
			$resp = $this->userModel->deletarAgendamento($_GET['codigo']);
			header("Location: agendamento.php?acao=listar");
		}

		function filtrarAgendamento(){
			$_POST['agendamento'] = $this->userModel->filtrarAgendamento($_POST['tipo_solicitacao']);
					include_once 'views/table-agendamento.php';
		}

		//fim das funções de agendamento

		//funções de area
		function add_area(){
			if(!empty($_POST['area'])){
					$id = $this->userModel->add_area(
					$_POST['area']);
    				echo 'Area cadastrada com sucesso com codigo
    				(ID = '.$id.')';
    		header("Location: area.php?acao=listar");

    		
    		}else{
    			echo 'Necessário preencher todos os campos!';
    		}
		}

		function getId($id){
			$id = $this->userModel->getId($id);
			return $id;
		}

		function cadastroArea(){
			require_once 'views/form-area.php';
		}

		function listaArea(){
			$_POST['area'] = $this->userModel->listaArea();
			include_once 'views/table-area.php';
		}

		function verArea(){
			$_POST['area'] = $this->userModel->verArea($_GET['codigo']);
			include_once 'views/perfil-area.php';
		}

		function atualizarArea(){
			$_POST['area'] = $this->userModel->verArea($_GET['codigo']);
			if($_POST['area']->num_rows > 0){
				if($row = $_POST['area']->fetch_assoc()){
					$_POST['codigo'] = $row['codigo'];
					$_POST['area'] = $row['area'];
			}
			require_once 'views/form-area.php';
		}
	}

		function up_area(){
			if(!empty($_POST['area'])){
				
				$codigo = $this->userModel->up_area($_POST['codigo'],
				$_POST['area']);

				if($codigo){
					echo "Dados atualizados com sucesso";
				}else{
					echo "Erro na atualização dos dados";
				}
    				

    		}else{
    			echo 'Necessário preencher todos os campos!';
				}
			}

		function deletarArea(){
			$resp = $this->userModel->deletarArea($_GET['codigo']);
			header("Location: area.php?acao=listar");
		}

		function associar(){
			if(!empty($_POST['agente']) && !empty($_POST['area'])){
				$ret = $this->userModel->associar($_POST['agente'], $_POST['area']);
				if($ret)
    				echo 'Associado!';
    			else
    				echo 'Ja esta associado!';
    		}else
    			echo 'Necessário preencher todos os campos!';
		}

		function associar_area(){
			$_POST['area'] = $this->userModel->listaArea();
			$_POST['agente'] = $this->userModel->listaAgente();
			require_once 'views/form-agente-area.php';
		}

		//fim das funções de area

	function add_status(){
		if(!empty($_POST['status']) && !empty('descricao') && !empty('agendamento_codigo') && !empty('dt_alteracao')){
					$id = $this->userModel->add_status(
					$_POST['status'], $_POST['descricao'], $_POST['agendamento_codigo'], $_POST['dt_alteracao']);
    				echo 'status cadastrado com sucesso com codigo
    				(ID = '.$id.')';
    		header("Location: status.php?acao=cadastrar");

    		
    		}else{
    			echo 'Necessário preencher todos os campos!';
    		}
	}
}

?>