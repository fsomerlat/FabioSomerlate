<?php if(file_exists('../model/Cliente.php')):
		include_once('../model/Cliente.php');
endif;

	header("Content-Type: application/json");
	
	$cli = new Cliente();
	echo $cli->getJSON();
	