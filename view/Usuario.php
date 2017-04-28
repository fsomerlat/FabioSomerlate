<?php	require_once 'header/header.php'; 
		require_once '../model/Usuario.php';
		
		$usu = new Usuario();
		
		
		if($_GET["acao"] == "editar"):
			$acao = "atualizar";
			$id = (int)$_GET['id'];
			$edit = $usu->listId($id);
			
			else:
			
			$_GET["acao"] = null;
			
		endif;
?>

<div class="container-fluid">
	<div class="row">
	<div class="col-md-12 admin">
	<h3 class="sobreNivelAcesso">Sobre os níveis de acesso</h3>
	<hr class="hrNivelAcesso"/>		    
		<div class="col-md-4">
			<div class="form-group">
				 <span class="label label-warning"> Usuário comum</span> - Tem permissões de acesso moderado 
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			 <span class="label label-info"> Super usuário</span> - Tem permissões de acesso privilegiado 
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			 <span class="label label-success"> Administrador</span> - Tem acesso liberado em todos os módulos do sistema
			</div>
		</div>
		<hr/>		    
</div>
<div class="col-md-6">
	<h4 class="usu">Configurações</h4>
	<hr class="hrAdministrativoUsuario"/>
		<div class="panel-group" id="panel-892059">
			<div>
				<div class="panel panel-default admin">
					<div class="panel-heading">
						 <div class="panel-title" data-toggle="collapse" data-parent="#panel-892059" href="#panel-element_811355">Cadastrar usuários</div>
					</div>
					<div id="panel-element_811355" class="panel-collapse collapse">
						<div class="panel-body">
						<form name="form2" id="form2" action="../controller/Usuario_controller.php" method="GET">
							<div class="col-md-3">
								<div class="form-gorup">
									<label for="Usuario">Usuário</label>
									<input type="text" name="cpNome" id="cpNome" value="<?php echo (!empty($_GET["id"])) ? $edit->cpNome  :  "";  ?>" class="form-control" />
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label for="Senha">Senha</label>
									<input type="password" name="cpSenha" id="cpSenha" class="form-control" />
								</div>
							</div>
							
							<div class="col-md-1">
								<div class="form-group">
									<a href="#?" class="info" title="vizualizar senha"><span class="glyphicon glyphicon-eye-open vizualizarSenha" aria-hidden="true"></span></a>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="Status">Status</label>
									<select name="cpStatus" id="cpStatus" class="form-control">
										<option value=""><?php echo (!empty($_GET["id"])) ? $edit->cpStatus : "Selecione"; ?></option>
										<option value="A">Ativo</option>
										<option value="B">Bloqueado</option>
									</select>
								</div>
							</div>
							
							<div class="col-md-3">
								<div class="form-group">
									<label for="Nivel acesso">Acesso</label>
									<select name="cpNivelAcesso" id="cpNivelAcesso" class="form-control btn-default" nivelAcesso>
										<option value=""><?php echo (!empty($_GET["id"])) ? $edit->cpNivelAcesso  : "Selecione"; ?></option>
										<optgroup label="Níveis de acesso">
											<option value="C">Comum</option>
											<option value="S">Super</option>
											<option value="A">Admin</option>
										</optgroup>
									</select>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<input type="hidden" name="id" value="<?php echo (isset($_GET['id'])) ?  $id : "";?>"/>
									<input type="submit" name="acao" id="btnEnviarUsuario" value="<?php echo (isset($_GET["acao"])) ? $acao : "enviar"; ?>" class="btn btn-info form-control" />
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<input type="reset" class="btn btn-warning form-control" />
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					 <div class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-892059" href="#panel-element_423644">Listar usuários</div>
				</div>
				<div id="panel-element_423644" class="panel-collapse collapse">
					<div class="panel-body">
						
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
							<h4 class="carregaUsuario"></h4>
							<hr class="hrCarregaUsuario" />
								<table class="table table-hover table-responsive" id="tableUsuario">
									<thead>
										<tr class="warning">
											<th>
												id
											</th>
											<th>
												Nome
											</th>
											<th>
												Status
											</th>
											<th>
												Nível de acesso
											</th>
											<th>
												
											</th>
											<th>
												
											</th>
										</tr>
									</thead>
									<tbody>
										<!-- CARREGA LISTA DE USUÁRIOS VIA AJAX -->
									</tbody>
								</table>
							</div>
						</div>
					</div>	
					</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>
<br/><br/><br/>
<?php require_once 'footer/footer.php'; ?>
