var Service_Usuario = (function() {
		
	var carregaInfoUsuario = function(url) {
		
		var itens = '';
		 
		$.ajax({
			
			url: url,
			cache: false,
			dataType:"json",
			beforeSend: function() {
				
				$('.carregaUsuario').html('Carregando lista de usuários...');
			},
			error: function() {
				
				$('.carregaUsuario').html('Houve um erro com a fonte de dados !');
			},
			success: function(retorno) {
				
				if(retorno[0].erro) { 
					
					$('.carregaUsuario').html(retorno[0].erro);
					
				} else {
						
					
				setTimeout(function() {
					
					for(var i=0; i < retorno.length; i++) {
						
						var attr_status = retorno[i].cpStatus,
							attr_nivelAcesso = retorno[i].cpNivelAcesso,
							status = '',
						    nivel  = '';
						
						if(attr_status == "B") {status = 'Bloqueado';}
						else if(attr_status == "A") {status = "Ativo";}
						
						if(attr_nivelAcesso == "C") { nivel = "Comum" ;}
						else if(attr_nivelAcesso == "S") {nivel = "Super";}
						else if(attr_nivelAcesso == "A") {nivel = "Administrador";}
						
						
						itens += '<tr class="danger">';
						itens += '<td>' + retorno[i].idUsuario + '</td>';
						itens += '<td>' + retorno[i].cpNome + '</td>';
 						itens += '<td>' + status + '</td>';
 						itens += '<td>' + nivel + '</td>';
 						itens += '<td><a href="../view/Usuario.php?panel=811355&acao=editar&id='+retorno[i].idUsuario+'" title="editar"><span class="glyphicon glyphicon-pencil admin" id="editarUsuario" aria-hidden="true"></span></a></td>';
 						itens += '<td><a href="../controller/Usuario_controller.php?acao=deletar&id='+retorno[i].idUsuario+'" title="excluir"><span class="glyphicon glyphicon-trash admin excluirUsuario"  aria-hidden="true"></span></a></td>';
 						itens += '</tr>';	
 							
					}
					
					$('#tableUsuario tbody').html(itens);
					$('.carregaUsuario').html('Painel de controle  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>');
				},1200);							

				}
			}
		});
	};
	
	
	var carregaInfoUsuarioAjaxDB = function() {
		
		$("body").load(
			carregaInfoUsuario("http://localhost/FabioSomerlate/service/Service_Usuario.php")
		);
	};	
	

	return {
		
		carregaInfoUsuarioAjaxDB: carregaInfoUsuarioAjaxDB
	};
	
})();



























