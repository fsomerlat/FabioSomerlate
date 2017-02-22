<?php require_once ('header/header.php');require_once('../core/config.php'); 
	
	if($_GET["acao"]=="editar"):
		
		$acao = "atualizar";
		$prod = new Produto();
		$id = (int)$_GET["id"];
		$get =  $prod->getInfoProduto($id);
		
		else:
	
		  $_GET["acao"] = null;
	endif;
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="panel-group" id="panel-194203">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <div class="panel-title" data-toggle="collapse" data-parent="#panel-194203" href="#panel-element_627928">Cadastrar produtos</div>
					</div>
					<div id="panel-element_627928" class="panel-collapse collapse">
						<div class="panel-body">
						<div class="msgProduto"></div>
						<form name="form4" id="form4" action="../controller/Produto_controller.php" method="POST">
							<div class="col-md-4">
								<div class="form-group">
									<label for="Nome">Nome</label>
									<input type="text" name="cpNome" id="cpNome" value="<?php echo(!empty($_GET["id"])) ? $get->cpNome : ""; ?>" class="form-control" />
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="Categoria">Categoria</label>
									<select name="cpteCategoria_idCategoria" id="cpteCategoria_idCategoria" class="form-control">
										<!-- CARREGA VIA AJAX -->
									</select>									
																	
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label for="Quantidade">Quantidade</label>
									<input type="text" name="cpQtd" value="<?php echo (!empty($_GET["id"])) ? $get->cpQtd : "" ;?>" id="cpQtd" class="form-control" />
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="form-group">
									<label for="Valor">Valor</label>
									<input type="text" name="cpValor" value="<?php echo (!empty($_GET["id"])) ? $get->cpValor : ""; ?>" id="cpValor" class="form-control" />
								</div> 
							</div>	
							
							<div class="col-md-12">
								<div class="form-group">
								<label for="Observacao do produto">Observação</label>
									<textarea name="cpObservacao" id="cpObservacao" class="form-control" ><?php echo (!empty($_GET["id"])) ? $get->cpObservacao : "" ;?></textarea>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<input type="hidden" name="id" value="<?php echo (isset($_GET["id"])) ? $id : "" ;?>" />
									<input type="submit" name="acao" id="btnCadastrarProduto" value="<?php echo (!empty($_GET["id"])) ? $acao : "cadastrar" ;?>" class="form-control btn btn-info" />
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<input type="reset" class="form-control btn btn-warning" />
								</div>
							</div>
						</form>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel-group" id="panel-303393">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <div class="panel-title" data-toggle="collapse" data-parent="#panel-303393" href="#panel-element_852096">Listar produtos</div>
					</div>
					<div id="panel-element_852096" class="panel-collapse collapse">
						<div class="panel-body">
						<h4 class="h4_listaProduto"></h4>
						<hr class="hr_listaProduto"/>
							<table class="table table-hover" id="tableProdutos">
								<thead>
								<tr class="warning">	
									<th>id</th>
									<th>Produto</th>
									<th>Categoria</th>
									<th>QTDA</th>
									<th>Valor</th>
									<th>Observação</th>
									<th></th>
									<th></th>
								</tr>
								</thead>
								<tbody>
									<!-- CARREGA LISTA DE PRODUTOS VIA AJAX -->
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once 'footer/footer.php'; ?>