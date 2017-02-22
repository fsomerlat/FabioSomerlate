var FormHelperProduto = (function() {
	
	
	var expandePainel = function(idPanel) {
		
		$('#panel-element_' + idPanel).collapse();
	};
	
	var verificaUrl = function() {
		
		var url = window.location.search.replace("?",""),
		 	itens = url.split("&");
		
		var arry = {
				
				'panel' : itens[0]
		}	
		return arry.panel.substring(6,11);
	};
	
	var bindEvents = function() {
		
		expandePainel(verificaUrl());
		
		$(document).on('click','.excluirProduto', function() {
			
			return confirm("Tem certeza que deseja excluir esse registro ?");
		});
	};
	
	return  {
		
		bindEvents: bindEvents,
	};
})();