document.getElementById('btnCadastrarProduto').onclick = function() {
	
	var Errors = [];
	
	var valida =  function(campo, msg) {
		
		(returnId(campo) == '' || returnId(campo) == 0) ? Errors.push(msg) : false;
	}
	
	var returnId = function(Nids) {
		
		var id =  document.getElementById(Nids);
		return id.value;
	}
	
	valida("cpNome","È necessário preencher o campo [ NOME ] !");
	valida("cpteCategoria_idCategoria","È necessário selecionar uma [ CATEGORIA ] !");
	valida("cpQtd","È necessário preencher o campo [ QUANTIDADE ] !");
	valida("cpValor","È necessário preencher o campo [ VALOR ] !");
	
	if(Errors.length > 0) {
		
		var msg =  Errors.reduce(function(a,b) {
			
			return a + b + '\n';
		},'');
		
		window.alert(msg); return false;
	}
	
}