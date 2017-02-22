var Service_Genericos = (function(){
	
	var carregaTeCategoria_IdCategoria = function(className,idCampo) {
		
		var option = '';
		$.ajax({
			
			url:"http://localhost/FabioSomerlate/service/Service_Categoria.php",
			cache: false,
			dataType:"json",
			beforeSend: function(){
				$(idCampo).html("<option value='0'>Aguarde carregando...</option>");
			},
			error: function() {
				$(className).html("Erro ao buscar categorias para sessão de produtos! ");
			},
			success: function(retorno) {
				if(retorno[0].erro) {
					$(className).html(retorno[0].erro);
				} else {
					
					setTimeout(function() {
						
						for(var i=0; i < retorno.length; i++) {
							
							option += "<option value='"+retorno[i].idCategoria+"'>"+retorno[i].cpNomeCategoria+"</option>";
						}
						
						$(idCampo).html("<option value='0'>Selecione</option>" + option);
						
					},2000);
				}
			}
		});
	};
	
	var carregaInfoFkCategoriaAjaxDB =  function() {
		
		carregaTeCategoria_IdCategoria(".msgProduto","#cpteCategoria_idCategoria");
	};
	
	return {
		
		carregaInfoFkCategoriaAjaxDB: carregaInfoFkCategoriaAjaxDB
	}
})();