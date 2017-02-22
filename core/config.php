<?php function __autoLoad($className) {
	
	$dir = [
			'../model/',
			'../service/'
	];
	foreach($dir as $key => $values):
		if(file_exists($values.$className.'.php')):
			require_once $values.$className.'.php';
		endif;
endforeach;
}
	

