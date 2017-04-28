var FormHelperClient = (function() {

	
	var createDatePicker = function() {
  
	$( "#cpDataNascimento" ).datepicker({
		
		dateFormat: 'dd/mm/yy', //formato da data
	    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'], //nomes dos campos dos dias
	    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],//nomes do titulo dos dias
	    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'], //dias com nomes curtos
	    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],//nomes dos messes
	    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],//meses com nomes curtos
	    nextText: 'Próximo',//titulo do próximo texto
	    prevText: 'Anterior',//titulo do texto anterior

	    });
	};

	var dataDeHoje = function(objDt) {

		var dia = objDt.getDate(),
			mes = objDt.getMonth() + 1,
			ano = objDt.getFullYear();

		if(dia < 10) { dia = '0' + dia; }
		if(mes < 10) { mes = '0' + mes; }

		return dia + '/' + mes + '/' + ano; 
	};

	var preencheComDataDeHoje = function() {

		$('hj').html(dataDeHoje(new Date()));
	};

	var mascarasNosCampos =  function() {
		
		$("#cpTelefone").mask('(99) 9999-9999 ');
		$("#cpCep").mask('99999-999');
	};
	
	var loading =  function(className) {
		
		$('.' + className).val('carregando...');
	};
	
	
	var toClear = function(className) {
		
		$('.' + className).val('');
	};
	 
	
	var bindEvents = function() {

		
		$("input[name=cpRadio_sexo]").click(function() {
			
			$("#cpSexo").val(this.value);
		});	
		
		$(document).on('click','.excluirCliente', function() {
			
			return confirm('Tem certeza que deseja exluir esse registro ?');
		});
			

		createDatePicker();
		preencheComDataDeHoje();
		mascarasNosCampos();

	};

	return {

		bindEvents: bindEvents,
		loading: loading,
		toClear: toClear,
	}

})();

