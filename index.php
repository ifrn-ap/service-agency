<?php session_start(); ?>
<!DOCTYPE html>
<!--
 * A Design by GraphBerry
 * Author: GraphBerry
 * Author URL: http://graphberry.com
 * License: http://graphberry.com/pages/license
-->
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Agency</title>

	<!-- Load fonts -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>

	<!-- Load css styles -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<style type="text/css">
		.cor{
			color: black;
		}
	</style>
	<script>
            function formatar(mascara, documento){
      var i = documento.value.length;
      var saida = mascara.substring(0,1);
      var texto = mascara.substring(i)
      
      if (texto.substring(0,1) != saida){
                documento.value += texto.substring(0,1);
      }
      
    }
    </script>
</head>
<body>
	<div class="jumbotron home home-fullscreen" id="home">
		<div class="mask"></div>
		<a href="#" class="logo">
			<img src="img/logo.png" alt="Service Agency">
		</a>
		<a href="" class="menu-toggle" id="nav-expander">Menu</a>
		<!-- Offsite navigation -->
		<nav class="menu">
			<a href="#" class="close"><i class="fa fa-close"></i></a>
			<h3>Menu</h3>
			<ul class="nav">
				<li><a data-scroll href="#home">Home</a></li>
				<li><a data-scroll href="#about">Sobre</a></li>
				<li><a data-scroll href="#team">Desenvolvedores</a></li>
				<li><a data-scroll href="#cadastrar">Cadastra-se</a></li>
                <li><a data-toggle="modal" data-target="#myModal">Login</a></li>
			</ul>
			<ul class="social-icons">
				<li><a href=""><i class="fa fa-facebook"></i></a></li>
				<li><a href=""><i class="fa fa-twitter"></i></a></li>
				<li><a href=""><i class="fa fa-dribbble"></i></a></li>
				<li><a href=""><i class="fa fa-behance"></i></a></li>
				<li><a href=""><i class="fa fa-pinterest"></i></a></li>
			</ul>
		</nav>
<header><br><br><br><br><br><br><br>
    <div class="container">
            <div class="header-info">
                <h1 class="intro-lead-in" style=" color: #fff; 
                        text-shadow:#000 1px 4px 2px, #000 3px 15px 10px, #000 1px 1px 2px, #000 -1px -1px 2px;">Service Agency</h1>
                <p class="intro-lead-in" style=" color: #fff; 
                        text-shadow:#000 1px 4px 2px, #000 3px 15px 10px, #000 1px 1px 2px, #000 -1px -1px 2px;">Mais rapidez e comodidade para você. Desfrute dos nossos serviços!
                </p>
            </div>
        </div>
</header>
	</div>


    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading cor">SOBRE O PROJETO</h2>
                    <hr><br><br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2" >
                     <p class="text-justify cor" style="size: 14px;">  Service Agency é uma ferramenta Web, 
                        desenvolvida por alunos do Instituto Federal de Educação, Ciência e Tecnologia 
                        do Rio Grande do Norte - Campus Apodi/RN, com o intuito de facilitar e melhorar a comunicação
                         entre a população da cidade de Apodi, para com os setores de Saúde e Urbanismo.</p>
                         <p class="text-justify cor">A ideia surgiu com a percepção das dificuldades que nós tinhamos de solicitar os orgãos responsáveis os serviços citados acima.</p>
                </div>
                <div class="col-lg-4">
                    <p class="text-justify cor">  Com isso desenvolvemos pesquisas no intuito de desvendar as diversas situções, para que possamos solucionar o problema de forma eficiente.</p>
                    <p class="text-justify cor"> Venha, conheça-nos e desfrute do nosso sistema. Resolva seus problemas de forma rápida e eficiente.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="bg-light-gray" style="background-color: #C0C0C0; ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading cor">DESENVOLVEDORES</h2><hr><br><br><br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        <a href="https://www.facebook.com/italo.ferreira.7370013" target="_blank"><img src="img/team/italo.jpg" class="img-responsive img-circle" alt="Clique para ver o Facebook"></a>
                        <center>
                        <h4 class="cor">Ítalo Ferreira</h4>
                        <p class="text-muted cor">Programador</p>
                        </center>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="team-member">
                        <a href="https://www.facebook.com/mateus.sena.5059?fref=ts" target="_blank"><img src="img/team/mateus.jpg" class="img-responsive img-circle" alt="Clique para ver o Facebook"></a>
                        <center>
                        <h4 class="cor">Mateus De Sena</h4>
                        <p class="text-muted cor">Programador</p>
                    	</center>
                    </div>
                </div>
        
                <div class="col-sm-4">
                    <div class="team-member">
                        <a href="https://www.facebook.com/paula.vitoria.3975?fref=ts" target="_blank"><img src="img/team/paula.jpg" class="img-responsive img-circle" alt="Clique aqui para ver o Facebook"></a>
                        <center>
                        <h4 class="cor">Paula Vitória</h4>
                        <p class="text-muted cor">Design</p>
                    	</center>
                    </div>
                </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
            
            </div>
        </div>
    </section>
    <!-- Cadastrar Section -->
    <section id="cadastrar">
        <h1 style="color: black;"><center>Cadastre-se</center></h1><br/><br/>
        <div class="container">
            <div class="col-md-8 col-lg-offset-2">
    <form role="form" action="cidadao.php" method="POST">
    <input type="hidden" name="acao" value="add-cidadao">
    <div class="form-group">
        <label for="nome">
            Nome:
        </label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira seu nome" required>
    </div>
    <div class="form-group">
        <label for="sobrenome">
            Sobrenome:
        </label>
        <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Insira seu sobrenome" required>
    </div>
    <div class="form-group">
        <label for="dt_nasc">
            Data de nascimento:
        </label>
        <input type="date" class="form-control" id="dt_nasc" name="dt_nasc" required>
    </div>
    <div class="form-group">
        <label for="cpf">
            CPF:
        </label>
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Insira seu CPF" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required>
    </div>
    <div class="form-group">
        <label for="email">
            E-mail:
        </label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Insira seu endereço de E-mail" required>
    </div>
        
    <div class="form-group">
        <label for="rua">
            Rua:
        </label>
        <input type="text" class="form-control" id="rua" name="rua" placeholder="Insira a rua onde você reside" required>
    </div>
    <div class="form-group">
        <label for="bairro">
            Bairro:
        </label>
        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Insira o bairro onde você reside" required>
    </div>
        <div class="form-group">
        <label for="numero">
            Número:
        </label>
        <input type="text" class="form-control" id="numero" name="numero" placeholder="Insira o número da sua casa" required>
    </div>
    <center>
    <br>
    <button type="submit" class="btn btn-lg" style="background-color: black; color: white;">
       Cadastrar
    </button></center>
</div>
</form>
            </div>
        </div>
    </section>

	<!-- Contact section end -->
	<!-- Footer start -->
	<footer style="background-color: black; ">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<span class="copyright" style="color: white;">Copyright &copy; Your Website 2016</span>
				</div>
				<div class="col-md-4">
					<ul class="social-icons">
						<li><a href=""><i class="fa fa-facebook"></i></a></li>
						<li><a href=""><i class="fa fa-twitter"></i></a></li>
						<li><a href=""><i class="fa fa-dribbble"></i></a></li>
						<li><a href=""><i class="fa fa-behance"></i></a></li>
						<li><a href=""><i class="fa fa-pinterest"></i></a></li>
					</ul>
				</div>
				<div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Politica de privacidade</a>
                        </li>
                        <li><a href="#">Termos de uso</a>
                        </li>
                    </ul>
                </div>
			</div>
		</div>
	</footer>
	<!-- Footer end  -->
	<div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <center><h4 class="modal-title cor">Login</h4></center>
                    </div>
                    <br/>
                    <div class="modal-body">
            
<form role="form" action="login.php" method="POST">
    <div class="form-group">
        <label for="id" style="color: black;">
            E-mail:
        </label>
        <input type="text" class="form-control" id="id" name="email" placeholder="Informe o seu E-mail" required>
    </div>
    <div class="form-group">
        <label for="senha" style="color: black;">
            Senha:
        </label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Informe sua senha" required>
    </div>
    
    <label for="tipo" style="color: black;">
            Tipo:
        </label>
        <select type="text" class="form-control" id="tipo" name="tipo" required">
            <option></option>
            <option value="0">Usuario</option>
            <option value="1">Agente</option>
            <option value="2">Administrador</option>
        </select>
    </div>
    <center>
    <button type="submit" class="btn btn-success" style="background-color: black;">
        Entrar
    </button>
    </center>
</form>
            
    </div>
                        <br/>
                    </div>
                </div>
            </div>
        </div>

	<!-- Load jQuery -->
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>

	<!-- Load Booststrap -->
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<script type="text/javascript" src="js/smooth-scroll.js"></script>

	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

	<!-- Load custom js for theme -->
	<script type="text/javascript" src="js/app.js"></script>
</body>
</html>