/**
 * 
 */

document.getElementById('btnEnviarUsuario').onclick = function() {
			
	var Errors = [];
	
	var valida = function(campo, msg) {
		
		if(returnId(campo)=='' || returnId(campo) ==0 ) {
			
			Errors.push(msg);
		}
	};
	
	var returnId = function(Nids) {
		
		var id = document.getElementById(Nids);
		return id.value;
	};
	
	valida('cpNome','È necessário preencher o campo [ USUÁRIO ] !');
	valida('cpSenha','È necessário preencher o campo [ SENHA ] !');
	valida('cpStatus','È necessário selecionar o campo [ STATUS ] !');
	valida('cpNivelAcesso','È necessário selecionar o campo [ ACESSO ] !');
	
	if(Errors.length > 0) {
		
		var msg = Errors.reduce(function(a,b) {
			
			return a + b + '\n';
		},'');
		
		window.alert(msg); return false;
	}
};