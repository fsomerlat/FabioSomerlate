<?php if(file_exists('../model/Categoria.php')):
		
		require_once '../model/Categoria.php';
endif;
	
	$cat = new Categoria();
	
	header('Content-Type: application/json');
	
	echo $cat->getJSON();
	