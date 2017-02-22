/**
 * 
 */

var FormHelperUser = (function() { 
	
	
	var visualizaSenha =  function() {
		
		$(".vizualizarSenha").click(function() {
			
			$('input[name=cpSenha]').attr('type','text');
			
			setTimeout(function() {
				$('input[name=cpSenha]').attr('type','password');

			},2000);
		});
	};
	
	var expandePainel = function(idComplemento) {
		
		setInterval(function() {
			
			$("#panel-element_" + idComplemento).collapse();
			
		},200);
	};
	
	
	var carregaComplementos =  function() {
		

		var url   = window.location.search.replace("?", "");
		var itens = url.split("&");
		
		var arry = {
				
			'panel' : itens[0],
			
 		} 
		
		var ar = arry.panel.substring(6,12);

		return ar;
	};
	

	var alteraCorNivelAcesso = function() {
		
		
		$("#cpNivelAcesso").change(function() {
			
			var classArry = ['panel-default','panel-danger','panel-warning','panel-info','panel-success'];
			
		
			if(this.value == "C") {
				
				for(var i=0; i < classArry.length; i++) {
					
					$(this).closest('.panel').removeClass(classArry[i]).addClass('panel-default');
					$(this).closest('.panel').removeClass('pane-default').addClass(classArry[2]);
				}					
				
			
			} else if(this.value == "S") {
				
				for(var i=0; i < classArry.length; i++) {
					
					$(this).closest('.panel').removeClass(classArry[i]).addClass('panel-default');
					$(this).closest('.panel').removeClass('panel-default').addClass(classArry[3]);
				}	
			
			} else if(this.value == "A") {
				
				for(var i=0; i < classArry.length; i++) {
					
					$(this).closest('.panel').removeClass(classArry[i]).addClass('panel-default');
					$(this).closest('.panel').removeClass('panel-default').addClass(classArry[4]);
				}	
				
			} else {
		
				for(var i=0; i < classArry.length; i++) {
					
					$(this).closest('.panel').removeClass(classArry[i]).addClass('panel-default');
			
				}	
			}				
		});
		
	};
	

	var bindEvents = function() {
		
		expandePainel(carregaComplementos());
	    alteraCorNivelAcesso();
	    visualizaSenha();
	    
		$(document).on('click', '.excluirUsuario', function() {
			return confirm('Tem certeza que deseja excluir esse registro ?');
		});
	    
		
	};
	
	return {
		
		bindEvents: bindEvents,
	}
	
})();