<?php

	class UsuarioModel{
		private $servername = "localhost";
		private $database = "service_agency";
		private $username = "root";
		private $password = "";
		private $con;

		public function __construct(){

		}

		private function conectar(){
			$this->con = new mysqli($this->servername,
									$this->username,
									$this->password,
									$this->database);
			if($this->con->connect_error){
				die("Falha ao conectar: " . mysqli_connect_error());
				return false;
			}
			$this->con->set_charset('utf8');
			return true;
		}

		//função de login de usuario
		public function login($email, $senha, $tipo){
			$user = null;
			if($this->conectar()){
				$sql = "SELECT * FROM usuario WHERE email=? AND senha=sha1(?) AND tipo=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("ssi", $email, $senha, $tipo);
				$stmt->execute();
				$results = $stmt->get_result();
				if($results->num_rows > 0){
					while($row = $results->fetch_assoc()){
						$user = array();
						$user['id'] = $row['id'];
						$user['nome'] = $row['nome'];
						$user['email'] = $row['email'];
						$user['tipo'] = $row['tipo'];
					}
				}
				$stmt->close();
			}
			return $user;
		}		
		//fim da função de login

		//funções de usuario
		public function add_usuario($nome, $email, $senha, $tipo){
			$id = null;
			if($this->conectar()){
				$sql = "INSERT INTO Usuario(nome, email, senha, tipo)
					VALUES(?, ?, sha1(?), ?)";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("sssi", $nome, $email, $senha, $tipo);
				if($stmt->execute()){
				$id = $this->con->insert_id;
				$stmt->close();
				}
			}
			return $id;
		}

		public function getUsuario($id){
			$usuario = null;
			if($this->conectar()){
				$sql = "SELECT * FROM usuario WHERE id=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $id);
				if($stmt->execute())
					$usuario = $stmt->get_result();
				$stmt->close();
			}
			return $usuario;
		}

		public function atualiza_usuario($id, $nome, $email){
			if($this->conectar()){
				$sql = "UPDATE usuario SET nome=?, email=? WHERE id=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("iss", $id, $nome, $email);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return true;
		}

		public function alterar_senha($id, $senha){
			if($this->conectar()){
				$sql = "UPDATE usuario SET senha=sha1(?) WHERE id=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("is", $id, $senha);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}
		//fim das funções de usuario
		//Funções de Agente
		public function add_agente($nome, $sobrenome, $cpf, $email, $rua, $bairro, $numero, $setor_de_atuacao, $usuario_id, $area, $agente){
		$id = null;
		if($this->conectar()){
			$sql = "INSERT INTO agente(nome, sobrenome, cpf, email, rua, bairro, numero, setor_de_atuacao, usuario_id, area_codigo, agente_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = $this->con->prepare($sql);
		
			$stmt->bind_param("ssssssssii", $nome, $sobrenome, $cpf, $email, $rua, $bairro, $numero, $setor_de_atuacao, $usuario_id, $area, $agente);
			if($stmt->execute())
				$id =  $this->con->insert_id;
			$stmt->close();
		}
		return $id;
		} 

		public function listaAgente(){
			$agente = null;
			if($this->conectar()){
				$sql = "SELECT * FROM agente";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$agente = $stmt->get_result();
				$stmt->close();
			}
			return $agente;
		}

		public function verAgente($id){
			$agente = null;
			if($this->conectar()){
				$sql = "SELECT * FROM agente WHERE id=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $id);
				if($stmt->execute())
					$agente = $stmt->get_result();
				$stmt->close();
			}
			return $agente;
		}

		public function getId($id){
			$agente = null;
			if($this->conectar()){
				if($_SESSION['user']['tipo']==1) $sql = "SELECT id FROM agente WHERE usuario_id=?";
				if($_SESSION['user']['tipo']==0) $sql = "SELECT id FROM cidadao WHERE usuario_id=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $id);
				if($stmt->execute())
					$agente = $stmt->get_result();
				$stmt->close();
			}
			$agente = $agente->fetch_assoc();
			return $agente['id'];
		}

		public function deletarAgente($id){
			$agente = null;
			if($this->conectar()){
				$sql = "DELETE FROM agente WHERE usuario_id=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $id);
				if($stmt->execute())
					$sql = "DELETE FROM usuario WHERE id =?";
				$stmt = $this->con->prepare($sql);
					$stmt->bind_param("i", $id);
					if($stmt->execute())
						$agente = true;
				$stmt->close();
			}
			return $agente;
		}

		public function up_agente($id, $nome, $sobrenome, $cpf, $email, 
			$rua, $bairro, $numero, $setor_de_atuacao){
			if($this->conectar()){
				$sql = "UPDATE agente SET nome=?, sobrenome=?, cpf=?, email=?, 
				rua=?, bairro=?, numero=?, setor_de_atuacao=? WHERE id=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("ssssssssi", $nome, $sobrenome, $cpf, $email, 
					$rua, $bairro, $numero, $setor_de_atuacao, $id);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}

	function filtrarAgente($codigo){
		$agente = null;
			if($this->conectar()){
				$sql = "SELECT * FROM agente as a, area as b WHERE a.area_codigo=b.codigo AND a.area_codigo=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $codigo);
				if($stmt->execute())
					$agente = $stmt->get_result();
				$stmt->close();
			}
			return $agente;
		}
		//Fim das funções de Agente

		//Funções de agendamento
		public function add_agendamento($data, $data_cadastro, $localidade, $tipo_solicitacao, $solicitacao, $iduser){
		$id = null;
		$status  = 'Definindo';
		if($this->conectar()){
			$sql = "INSERT INTO agendamento(data, data_cadastro, localidade, tipo_solicitacao, solicitacao, cidadao_id, status) VALUES(?, ?, ?, ?, ?, ?, ?)";
			$stmt = $this->con->prepare($sql);
			$stmt->bind_param("sssssis", $data, $data_cadastro, $localidade, $tipo_solicitacao, $solicitacao, $iduser, $status);
			if($stmt->execute())
				$id =  $this->con->insert_id;
			$stmt->close();
		}
		return $id;
		}

		public function listaAgendamento(){
			$agendamento = null;
			if($this->conectar()){
				$sql = "SELECT * FROM agendamento as a, cidadao as c WHERE c.id=a.cidadao_id";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$agendamento = $stmt->get_result();
				$stmt->close();
			}
			return $agendamento;
		}

		public function verAgendamento($codigo){
			$agendamento = null;
			if($this->conectar()){
				$sql = "SELECT * FROM agendamento WHERE codigo=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $codigo);
				if($stmt->execute())
					$agendamento = $stmt->get_result();
				$stmt->close();
			}
			return $agendamento;
		}

		public function deletarAgendamento($codigo){
			$agendamento = null;
			if($this->conectar()){
				$sql = "DELETE FROM agendamento WHERE codigo=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $codigo);
				if($stmt->execute())
				$agendamento = $stmt->get_result();
				$stmt->close();
			}
			return $agendamento;
		}

		public function up_agendamento($codigo, $localidade, $tipo_solicitacao, $solicitacao){
			if($this->conectar()){
				$sql = "UPDATE agendamento SET localidade=?, tipo_solicitacao=?, solicitacao=? WHERE codigo=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("issssssss", $codigo, $localidade, $tipo_solicitacao, $solicitacao);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}
		function filtrarAgendamento($tipo_solicitacao){
			$agendamento = null;
			if($this->conectar()){
				$sql = "SELECT * FROM agendamento WHERE tipo_solicitacao=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("s", $tipo_solicitacao);
				if($stmt->execute())
					$agendamento = $stmt->get_result();
				$stmt->close();
			}
			return $agendamento;
		}
		//Fim das funções de agendamento

		//funções de area
		public function add_area($area){
		$id = null;
		if($this->conectar()){
			$sql = "INSERT INTO area(area) VALUES(?)";
			$stmt = $this->con->prepare($sql);
			$stmt->bind_param("s", $area);
			if($stmt->execute())
				$id =  $this->con->insert_id;
			$stmt->close();
		}
		return $id;
		} 

		public function listaArea(){
			$area = null;
			if($this->conectar()){
				$sql = "SELECT * FROM area";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$area = $stmt->get_result();
				$stmt->close();
			}
			return $area;
		}

		public function verArea($codigo){
			$area = null;
			if($this->conectar()){
				$sql = "SELECT * FROM area WHERE codigo=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $codigo);
				if($stmt->execute())
					$area = $stmt->get_result();
				$stmt->close();
			}
			return $area;
		}

		public function deletarArea($codigo){
			$area = null;
			if($this->conectar()){
				$sql = "DELETE FROM area WHERE codigo=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $codigo);
				if($stmt->execute())
				$area = $stmt->get_result();
				$stmt->close();
			}
			return $area;
		}

		public function up_area($codigo, $area){
			if($this->conectar()){
				$sql = "UPDATE area SET area=? WHERE codigo=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("is", $codigo, $area);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}

		public function associar($agente, $area){
			if($this->conectar()){
				$sql = "INSERT INTO area_has_agente(agente_id, area_codigo) VALUES(?, ?)";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("ii", $agente, $area);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}
		//fim das funções de area

		// funções do cidadão

		public function add_cidadao($nome, $sobrenome, $cpf, $email, $data_nascimento, $rua, $bairro, $numero, $usuario_id){
			$id = null;
			if($this->conectar()){
			$sql = "INSERT INTO cidadao(nome, sobrenome, cpf, email, data_nascimento, rua, bairro, numero, usuario_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = $this->con->prepare($sql);
		
			$stmt->bind_param("ssssssssi", $nome, $sobrenome, $cpf, $email, $data_nascimento, $rua, $bairro, $numero, $usuario_id);
			if($stmt->execute())
				$id =  $this->con->insert_id;
			$stmt->close();
		}
		return $id;
		}
		public function listaCidadao(){
			$cidadao = null;
			if($this->conectar()){
				$sql = "SELECT * FROM cidadao";
				$stmt = $this->con->prepare($sql);
				if($stmt->execute())
					$cidadao = $stmt->get_result();
				$stmt->close();
			}
			return $cidadao;
		}

		public function verCidadao($id){
			$cidadao = null;
			if($this->conectar()){
				$sql = "SELECT * FROM cidadao WHERE id=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $id);
				if($stmt->execute())
					$cidadao = $stmt->get_result();
				$stmt->close();
			}
			return $cidadao;
		}

		public function get_idcidadao($id){
			$cidadao = null;
			if($this->conectar()){
				$sql = "SELECT id FROM cidadao WHERE usuario_id=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $id);
				if($stmt->execute())
					$cidadao = $stmt->get_result();
				$stmt->close();
			}
			$row=$cidadao->fetch_assoc();
			return $row['id'];
		}

		public function deletarCidadao($id){
			$cidadao = null;
			if($this->conectar()){
				$sql = "DELETE FROM cidadao WHERE usuario_id=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("i", $id);
				if($stmt->execute())
					$sql = "DELETE FROM usuario WHERE id=?";
					$stmt = $this->con->prepare($sql);
					$stmt->bind_param("i", $id);
					if($stmt->execute())
						$cidadao = true;
					$stmt->close();
				$stmt->close();
			}
			return $cidadao;
		}

		public function valida_cpf($cpf){ 
			$cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
			// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
			if ( strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
				return FALSE;
			} else { // Calcula os números para verificar se o CPF é verdadeiro
				for ($t = 9; $t < 11; $t++) {
					for ($d = 0, $c = 0; $c < $t; $c++) {
						$d += $cpf{$c} * (($t + 1) - $c);
					}
					$d = ((10 * $d) % 11) % 10;
					if ($cpf{$c} != $d) {
						return FALSE;
					}
				}
				return TRUE;
			}
		}

		public function up_cidadao($id, $nome, $sobrenome, $cpf, $email, $data_nascimento, $bairro, $rua, $numero){
			if($this->conectar()){
				$sql = "UPDATE cidadao SET nome=?, sobrenome=?, cpf=?, email=?, data_nascimento=?, bairro=?, rua=?, numero = ? WHERE id=?";
				$stmt = $this->con->prepare($sql);
				$stmt->bind_param("ssssssssi", $nome, $sobrenome, $cpf, $email, $data_nascimento, $bairro, $rua, $numero, $id);
				if($stmt->execute())
					return true;
				$stmt->close();
			}
			return false;
		}

		public function add_status($status, $descricao, $agendamento_codigo, $dt_alteracao){
		$id = null;
		if($this->conectar()){
			$sql = "INSERT INTO observacao(status, descricao, agendamento_codigo, dt_alteracao) VALUES(?, ?, ?, ?)";
			$stmt = $this->con->prepare($sql);
			$stmt->bind_param("ssis", $status, $justificativa, $agendamento_codigo, $dt_alteracao);
			if($stmt->execute())
				$id =  $this->con->insert_id;
			$stmt->close();
		}
		return $id;
		}
	}

		
?>