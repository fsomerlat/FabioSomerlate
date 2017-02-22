var Service_Cliente = (function() {
	
	var buscaInformcoesViaCep = function() {
		
		$("#cpCep").bind("blur", function() {
				
				
			var cep = $(this).val().replace(/\D/g,'');
			
			if(cep != '') {
				
				var validaCep = /^[0-9]{8}$/;
				
				if(validaCep.test(cep)) {
					
					FormHelperClient.loading('loading');
					
					$.getJSON('https://viacep.com.br/ws/' + cep +'/json/?callback=', function(dados) {
							
						if(!('erro' in dados)) {
							
							$("#cpLogradouro").val(dados.logradouro);
							$("#cpBairro").val(dados.bairro);
							$("#cpCidade").val(dados.localidade);
							$("#cpUf").val(dados.uf);
							
						} else {
							
							FormHelperClient.toClear('toClear');
							window.alert('O cep informado não foi encontrado !');
						}
					});
				} else {
					
					FormHelperClient.toClear('toClear');
					window.alert('O formato do cep informado não é válido !');
				}
			} else {
				
				FormHelperClient.toClear('toClear');
				window.alert('Informe um cep válido !');
			}
		});
	};
	
	var carregaInfoClientes = function(url) {
		
		var itens = '';
			
		$.ajax({
			
			url: url,
			cache: false,
			dataType: "json",
			beforeSend: function() {
				
				$(".carregaClientes").html("Carregando lista de clientes ...");
			},
			error: function() {
				
				$(".carregaClientes").html("Houve algum erro com a fonte de dados !");
			},
			success: function(retorno) {
				
				if(retorno[0].erro) {
					
					$(".carregaClientes").html(retorno[0].erro);
					
				} else {
					
					setTimeout(function() {
						
						for(var i=0; i < retorno.length; i++) {
							
							var arry = retorno[i].cpDataNascimento.split('-');
								dia  = arry[2];
								mes  = arry[1];
								ano  = arry[0];
							
							dataNascimento = mes +'/'+dia+'/'+ano;
							
							itens += '<tr>';
							itens += '<td>' + retorno[i].idCliente + '</td>';
							itens += '<td>' + retorno[i].cpNome + '</td>';
							itens += '<td>' + retorno[i].cpSobreNome + '</td>';
							itens += '<td>' + retorno[i].cpEmail + '</td>';
							itens += '<td>' + retorno[i].cpTelefone + '</td>';
							itens += '<td>' + dataNascimento + '</td>';
							itens += '<td><a href="../view/CadastrarCliente.php?acao=editar&id='+retorno[i].idCliente+'" title="editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>';
							itens += '<td><a href="../controller/Cliente_controller.php?acao=deletar&id='+retorno[i].idCliente+'" title="excluir"><span class="glyphicon glyphicon-trash excluirCliente" aria-hidden="true"></span></a></td>';
							itens += '</tr>';
	
						}
						
						$("#listTableCliente tbody").html(itens);
						$(".carregaClientes").html("Lista de clientes !");						
					
					},1200);
				}
			}
			
		});
	};		
	
	
	var carregaInfoClienteAjaxDB = function() {
		
		buscaInformcoesViaCep();
		$("body").load(
				carregaInfoClientes("http://localhost/FabioSomerlate/service/Service_Cliente.php")
		);
	};
	
	return {
		
		carregaInfoClienteAjaxDB: carregaInfoClienteAjaxDB
		
	};

	
})();