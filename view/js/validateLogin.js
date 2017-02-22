/** * 
 */

$(document).ready(function() {
	
	$("#btnEnviar").click(function() {
		
		var usuario = $("#cpNome").val().length < 3,
			senha = $("#cpSenha").val() == "";
		
		if(usuario) {
			
			$("#cpNome").focus(); 
			$("msgUsuario").html('Esse campo deve conter no mínimo 3 caracteres !').css({color:'red'});
			return false;

		} else if(senha) {
				
			$("#cpSenha").focus();
			$("msgSenha").html('Esse campo não pode ser vazio !').css({color:'red'}); 
			$("msgUsuario").html('O campo está ok !').css({color:'green'});
			return false;
				
		 } else  {
			 
			$('#form1').submit();
		 }
	});	
})
