<html> 
	<head>
		<meta charset="UTF-8"/>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
		<link type="text/css" rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">

					<h2 class="h2_Login">login <span class="glyphicon glyphicon-lock " aria-hidden="true"></span></h2>
					<hr class="hrIndex"/>
		
				</div>
				
				<div class="col-md-4"></div>
				
				<form role="form" id="form1" name="form1" action="../controller/ControleDeAcesso_controller.php" class="form1" method="POST">
					<div class="col-md-4">
					<div class="form-group">
						 
						<label for=Usuario>
							Usuário
						</label>
						<input type="text" class="form-control toClear" name="cpNome" id="cpNome" />
						<msgUsuario class="msgClear"></msgUsuario>
					</div>
					<div class="form-group">
						 
						<label for="Senha">
							Senha
						</label>
						<input type="password" class="form-control toClear" id="cpSenha" name="cpSenha" />
						<msgSenha class="msgClear"></msgSenha>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="submit" id="btnEnviar" name="acao" class="btn btn-default form-control" value="entrar"/>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="reset"  class="btn btn-warning form-control" value="limpar" />
						</div>
					</div>
					</div>
				</form>
				</div>
				
				<div class="col-md-4"></div>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/validateLogin.js"></script>	
	</body>
</html>