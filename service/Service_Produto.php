<?php require_once '../core/config.php';
	
	header("Content-Type: application/json");
	
	$prod  = new Produto();
	
	$prod->getJSON();
 