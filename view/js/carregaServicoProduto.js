var Service_Produto = (function(){
	
	var carregaInfoProduto = function(url) {
		
		var itens = '';
		$.ajax({
			
			url:url,
			cache: false,
			dataType:"json",
			beforeSend: function() {
				$(".h4_listaProduto").html("Carregando lista de produtos...");
			},
			error: function() {
				$(".h4_listaProduto").html("Houve algum erro com a fonte de dados !");
			},
			success: function(retorno) {
				if(retorno[0].erro) {
					
					$(".h4_listaProduto").html(retorno[0].erro);
					
				}else{
					
					setTimeout(function() {
						
						for(var i=0;i < retorno.length; i++) {
							
							itens += "<tr>";
							itens += "<td>" +retorno[i].idProduto+ "</td>";
							itens += "<td>" +retorno[i].cpNome+ "</td>";
							itens += "<td>" +retorno[i].cpNomeCategoria+ "</td>";
							itens += "<td>" +retorno[i].cpQtd+ "</td>";
							itens += "<td>" +retorno[i].cpValor+ "</td>";
							itens += "<td>" +retorno[i].cpObservacao+ "</td>";
							itens += "<td><a href='Produto.php?panel=627928&acao=editar&id="+retorno[i].idProduto+"' title='editar'><span class='glyphicon glyphicon-pencil super editarProduto' aria-hidden='true'></span></a></td>";
							itens += "<td><a href='../controller/Produto_controller.php?acao=deletar&id="+retorno[i].idProduto+"' title='excluir'><span class='glyphicon glyphicon-trash super excluirProduto' aria-hidden='true'></span></a></td>";
							itens += "</tr>";
						}
						
						$("#tableProdutos tbody").html(itens);
						$(".h4_listaProduto").html("Lista de produtos !");						
					
					},2000);
				}
			} 
		});
	};
	
	var carregaInfoProdutoAjaxDB = function(){
		
		carregaInfoProduto("http://localhost/FabioSomerlate/service/Service_Produto.php");
	};
	
	return {
		
		carregaInfoProdutoAjaxDB: carregaInfoProdutoAjaxDB
	};
	
})();