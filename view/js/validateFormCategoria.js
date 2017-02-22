document.getElementById('btnEnviarCategoria').onclick =  function() {
	
	var Errors = [];
	
	var valida = function(campo, msg) {
		
		(returnId(campo)=='' || returnId(campo)==0) ? Errors.push(msg) :  false;
	};
	
	var returnId = function(Nids) {
		
		var id = document.getElementById(Nids);
		return id.value;
	}
	
	valida('cpNomeCategoria','È necessário preencher o campo [ NOME DA CATEGORIA ] !');
	
	if(Errors.length > 0) {
		
		var msg = Errors.reduce(function(a, b) {
			
			return a + b + '\n';
			
		},'');
		
		window.alert(msg); return false;
	}
}