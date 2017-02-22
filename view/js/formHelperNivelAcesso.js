var FormHelperNivelAcesso = (function() {
	
	var definePrivilegio = function() {
		
		var nivelAcesso = $("#cpPrivilegioUsuario").val();
	    if(nivelAcesso == "A") {
	    	
	    	return nivelAcesso;
	    	
	    }else if(nivelAcesso == "S") {
	    	
	    	return nivelAcesso;
	    	
	    }else if(nivelAcesso == "C") {
	    	
	    	return nivelAcesso;
	    	
	    } else {
	    	
	    	return false; 
	    }
	};	

	
	var bindEvents =  function() {
	
	 switch(definePrivilegio()) {
 		
 		case "S": $(".admin").hide(); break;
	 	case "C": $(".admin,.super").hide(); break;
 			
	 }		
		
	 $(document).on('mouseover','body',function() { //PARA ELEMENTOS NÃO CRIADOS
		  
		 	switch(definePrivilegio()) {
		 		
		 		case "S": $(".admin").hide(); break;
 		 		case "C": $(".admin,.super").hide(); break;
		 			
		 	}
	    });
	};
	return  {
		
		bindEvents: bindEvents,
	}
})();