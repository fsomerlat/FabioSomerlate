
document.getElementById('btnEnviar').onclick = function() {
		
	var Errors = [];
	
	var valida =  function(campo, valor, mensagem) {
		
		(returnId(campo) == valor) ? Errors.push(mensagem) : false;
		
	};
	
	var returnId =  function(Nids) {
		
		var id = document.getElementById(Nids);
		return id.value;
	};

	valida('cpNome', '', 'È necessário preencher o campo [ NOME ] !');
	valida('cpSobreNome', '', 'È necessário preencher o campo [ SOBRENOME ] !');
	valida('cpEmail', '', 'È necessário preencher o campo [ E-MAIL ] !');
	valida('cpTelefone', '', 'È necessário preencher o campo [ TELEFONE ] !');
	valida('cpCep', '', 'È necessário preencher o campo [ CEP ] !');
	valida('cpDataNascimento', '', 'È necessário preencher o campo [ DATA DE NASCIMENTO ] !');
	valida('cpLogradouro', '', 'È necessário preencher o campo [ RUA ] !');
	valida('cpNumero','', 'È necessário preencher o campo [ NUMERO ] !');
	valida('cpBairro', '', 'È necessário preencher o campo [ BAIRRO ] !');
	valida('cpCidade','','È necessário preencher o campo [ CIDADE ] !')
	valida('cpUf', '', 'È necessário preencher o campo [ UF ] !');
	valida('cpSexo', '', 'È necessário preencher o campo [ SEXO ] !');
	
	if(Errors.length > 0) {
		
		var msg = Errors.reduce(function(a , b) {
			
			return a + b + '\n';
			
		}, '');
		
		window.alert(msg); return false;

	}				
};	
			
	

	

	
		
	



























































