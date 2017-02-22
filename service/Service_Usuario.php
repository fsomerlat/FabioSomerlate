<?php if(file_exists('../model/Usuario.php')):
		require_once '../model/Usuario.php';
	  endif;

	  header('Content-Type: application/json');
	  
	  $usu =  new Usuario();
	  
	  echo  $usu->getJSON();