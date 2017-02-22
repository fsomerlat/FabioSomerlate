<?php require_once 'header/header.php'; 
	  require '../model/Categoria.php';
	  
	  $cat = new Categoria();
	  
	  if($_GET["acao"] == "editar"):
	  	
	    $acao = "atualizar";
	  	$id = (int)$_GET["id"];
	  	$edit = $cat->listId($id);
	  	
	  	$nome = $edit->cpNomeCat;
	  	else:
	  		$_GET["acao"] = "";
	  endif;
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="panel-group" id="panel-466277">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <div class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-466277" href="#panel-element_178370">Cadastrar categoria</div>
					</div>
					<div id="panel-element_178370" class="panel-collapse collapse">
						<div class="panel-body">
						<form name="form3" id="form3" action="../controller/Categoria_controller.php" method="POST">
							<div class="col-md-6">
								<div class="form-group">
								<label for="Nome categoria">Nome da categoria</label>
									<input type="text" name="cpNomeCategoria" value="<?php echo (isset($_GET["id"])) ? $nome : ""; ?>" id="cpNomeCategoria" class="form-control" />
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input type="hidden" name="id" value="<?php echo (isset($_GET["id"])) ? $id : ""; ?>">
									<input type="submit" name="acao" id="btnEnviarCategoria" value="<?php echo (!empty($_GET["id"])) ? $acao : "cadastrar" ;?>" class="form-control btn btn-info btnCategoria" />
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input type="reset" class="form-control btn btn-warning btnCategoria" />
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel-group" id="panel-656670">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <div class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-656670" href="#panel-element_347409">Listar categoria</div>
					</div>
					<div id="panel-element_347409" class="panel-collapse collapse">
						<div class="panel-body">
					<h4 class=h4_listaCategorias></h4>
					<hr class="hr_categoria"/>
						<table class="table table-hover" id="tableCategoria">
							<thead>
								<tr class="warning">
									<th>id</th>
									<th>Nome</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<!-- CARREGA LISTA DE CATEGORIA VIA AJAX -->
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

