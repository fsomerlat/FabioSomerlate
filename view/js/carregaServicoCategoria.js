var Service_Categoria =  (function() {
	
	var carregaInfoCategoria = function(url) {
		
		itens = '';
		
		$.ajax({
			
			url: url,
			cache: false,
			dataType:"json",
			beforeSend: function() {
				
				$(".h4_listaCategorias").html("Carregando lista de categorias...");
			},
			error: function() {
				
				$(".h4_listaCategorias").html("Houve um erro com a fonte de dados !");
			},
			success: function(retorno) {
				
				if(retorno[0].erro) {
					
					$(".h4_listaCategorias").html(retorno[0].erro);
				
				} else {
					
					setTimeout(function() {
						
						for(var i=0; i < retorno.length; i++) {
							
							itens += '<tr>';
							itens += '<td>' + retorno[i].idCategoria + '</td>';
							itens += '<td>' + retorno[i].cpNomeCategoria+ '</td>';
							itens += '<td><a href="Categoria.php?panel=178370&acao=editar&id='+retorno[i].idCategoria+'" title="editar"><span class="glyphicon glyphicon-pencil super"  aria-hidden="true"></span></a></td>';
							itens += '<td><a href="../controller/Categoria_controller.php?acao=deletar&id='+retorno[i].idCategoria+'" title="excluir"><span class="glyphicon glyphicon-trash super excluirCategoria" aria-hidden="true"></span></a></td>';
							itens += '</tr>';
						}
						
						$("#tableCategoria tbody").html(itens);
						$(".h4_listaCategorias").html("Lista de categorias !");					
					},1000);
					
				}
			}
		});
		
	};	
	
	var carregaInfoCategoriaAjaxDB = function() { 
		
		$("body").load(	
			carregaInfoCategoria("http://localhost/FabioSomerlate/service/Service_Categoria.php")
		);
	};
	
	return  {
		
		carregaInfoCategoriaAjaxDB: carregaInfoCategoriaAjaxDB
	};
	
	
})();