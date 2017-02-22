<?php  require_once('AcessoUrlBloqueado.php'); ?>
<html>
	<head>
		<meta charset="UTF-8" />
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
		<link type="text/css" rel="stylesheet" href="css/jquery-ui.css" />
		<link type="text/css" rel="stylesheet" href="css/datepicker.css"/>	
		<link type="text/css" rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
		<link type="text/css" rel="stylesheet" href="css/style.css" />
	</head>
	<body>
	
	<input type="hidden" name="cpPrivilegioUsuario" id="cpPrivilegioUsuario" value="<?php echo $_SESSION['cpNivelAcesso']; ?>"/>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<blockquote>
					<p class="pheader">
						GECFest - <?php echo "Seja bem vindo(a) ".$_SESSION['cpNome']." !"; ?> 
					</p class="pheader"> <small>Sistema de Gerenciamento  <cite>e Controle  | Hoje é dia - <hj></hj></cite></small>
				</blockquote>
			</div>
			<div class="col-md-8">
					<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
						<div class="navbar-header">
							 
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
							</button> <a class="navbar-brand" href="#"> <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a>
						</div>
						
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">

								<li class="dropdown">
									 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categoria<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li>
											<a href="Categoria.php?panel=178370">Cadastrar</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="Categoria.php?panel=347409">Listar</a>
										</li>
									</ul>
								</li>
							</ul>
							
							<ul class="nav navbar-nav">

								<li class="dropdown">
									 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cliente<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li>
											<a href="CadastrarCliente.php">Cadastrar</a>
										</li>
										<li>
											<a href="ListarCliente.php">Listar</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">histórico</a>
										</li>
									</ul>
								</li>
							</ul>
							
							<ul class="nav navbar-nav">

								<li class="dropdown">
									 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produto<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li>
											<a href="Produto.php?panel=627928">Cadastrar</a>
										</li>
										<li>
											<a href="Produto.php?panel=852096">Listar</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">histórico</a>
										</li>
									</ul>
								</li>
							</ul>							
							
							<ul class="nav navbar-nav">

								<li class="dropdown">
									 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pedidos<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li>
											<a href="Pedidos.php?#">Agendar</a>
											
										</li>
										<li>
											<a href="Pedidos.php?#">Listar</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">histórico</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#"></a>
										</li>
									</ul>
								</li>
							</ul>
							
							<ul class="nav navbar-nav navbar">
								<li class="dropdown">
									 <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Usuários <strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li class="admin">
											<a href="Usuario.php?panel=811355" id="usuarioMenu"> cadastrar</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="Usuario.php?panel=423644" id="usuarioMenu"> listar</a>
										</li>															  																		
									</ul>
								</li>											
							</ul>	
							
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									 <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Acessos <strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li class="admin">
											<a href="http://www.gecsistemas.hol.es" target="_blank"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> site</a>
										</li>
				
										<li class="divider">
										</li>
										<li>
											<a href="sessionLogout.php?sessao=logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> logout</a>
										</li>															  																		
									</ul>
								</li>											
							</ul>							
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>