<?php	session_start();	require_once '../core/config.php';

	$acesso = new ControleAcesso();
	
	if($_REQUEST["acao"] == "entrar"):
		
		$nome  = addslashes($_REQUEST["cpNome"]);
		$senha = addslashes($_REQUEST["cpSenha"]);
		
		$getInfoUser = $acesso->getUser($nome,$senha);
		
		$nome   		=  $getInfoUser->cpNome;
		$senha  		=  $getInfoUser->cpSenha;
		$status 		=  $getInfoUser->cpStatus;
		$nivelAcesso 	=  $getInfoUser->cpNivelAcesso;
		
		
		$verifica  = $acesso->getSessaoUser($nome, $senha, $status, $nivelAcesso);
		
		$_SESSION['cpNome'] = $nome;
		$_SESSION['cpSenha'] = $senha;
		$_SESSION['cpStatus'] = $status;
		$_SESSION['cpNivelAcesso'] = $nivelAcesso;
		
		if($status == "B"):
			
			echo "<script language='javascript'>
						window.alert('Usuário [ $nome ] encontra-se bloqueado.Contate o administrador do sistema !');
						window.history.go(-1);
					</script>"; 
		
		elseif($verifica > 0):
		
			
			switch($nivelAcesso):
				
				case "C":
					header('location:../view/ListarCliente.php');
					$_SESSION['logado'] = true;
					break;
				case "S":
					header('location:../view/CadastrarCliente.php');
					$_SESSION['logado'] = true;
				break;
				case "A":
					header('location:../view/Usuario.php?panel=423644');
					$_SESSION['logado'] = true;
				break;
				default;
					header('location:../view/index.php');
					$_SESSION['logado'] = true;
			endswitch;
			else:
				echo "<script language='javascript'>
							window.alert('Usuário e/ou senha incorretos !');
							window.history.go(-1);
						</script>";
			
					$_SESSION['logado'] = true;
				
		endif;
	endif;