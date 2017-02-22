<?php  session_start();  $verificaSessao = !isset($_SESSION['logado']);
if($verificaSessao):
	return header('location:acessoNegado.php');
endif;
