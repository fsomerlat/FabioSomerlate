<?php require_once 'header/header.php';  ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		<div class="form-group">
			<h4 class="listaCliente carregaClientes"></h4>
			<hr class="hrListaCliente"/>
				<table class="table table-hover table-responsive table-bordered" id="listTableCliente">
					<thead>
						<tr class="warning">
							<th>
								id
							</th>
							<th>
								Nome do cliente
							</th>
							<th>
								Sobrenome
							</th>
							<th>
								E-mail
							</th>
							<th>
								Telefone
							</th>
							 <th>
								Data de nascimento
							</th>
							<th>
								
							</th>
							 <th>
				
							</th>
						</tr>
					</thead>
					<tbody>
						<!-- CARREGA LISTA DE CLIENTES VIA AJAX -->
					</tbody>
				
				</table>
			</div>
		</div>
	</div>
</div>
<br/><br/><br/>

<?php require_once 'footer/footer.php'; ?>