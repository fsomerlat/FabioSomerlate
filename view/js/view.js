$(document).ready(function() {
	
	FormHelperClient.bindEvents();
	FormHelperUser.bindEvents();	
	FormHelperNivelAcesso.bindEvents();
	FormHelperCategoria.bindEvents();
	FormHelperProduto.bindEvents();

	try {
		
		Service_Cliente.carregaInfoClienteAjaxDB();
	}
	catch(e) {
		
		console.log(e);
	}
	try {
			
		Service_Usuario.carregaInfoUsuarioAjaxDB();
	}
	catch(e) {
		
		console.log(e);
		
	}try {
	
		Service_Categoria.carregaInfoCategoriaAjaxDB();
	
	}
	catch(e) {
				
		console.log(e);
	}
	try{
		
		Service_Genericos.carregaInfoFkCategoriaAjaxDB();
	
	} 
	catch(e) {
		
		console.log(e);
	}
	try {
		
		Service_Produto.carregaInfoProdutoAjaxDB();
	
	}catch(e) {
		
		console.log(e);
	}
})