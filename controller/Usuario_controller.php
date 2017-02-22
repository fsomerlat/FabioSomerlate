<?php require_once '../core/config.php';

	$usu  = new Usuario();
	
	if($_REQUEST["acao"] == 'enviar'):
	
		$usu->__set("cpNome", addslashes($_REQUEST["cpNome"]));
		$usu->__set("cpSenha", addslashes(sha1($_REQUEST["cpSenha"])));
		$usu->__set("cpStatus" , addslashes($_REQUEST["cpStatus"]));
		$usu->__set("cpNivelAcesso", addslashes($_REQUEST["cpNivelAcesso"]));
		

		if(strlen($usu->__get("cpNome")) < 3):
		
			echo "<script language='javascript'>
						window.alert('È necessário um nome maior que 3 caracteres !');
						window.history.go(-1);
					</script>";
		
		elseif(strlen($usu->__get("cpSenha") <= 4)):
			
			echo "<script language='javascript'>
						window.alert('È necessário informar uma senha maior que 4 caracteres !');
						window.history.go(-1);
					</script>";
		
		elseif($usu->__get("cpStatus") == ""):
		
			echo "<script language='javascript'>
						window.alert('Informe um status !');
						window.history.go(-1);
					</script>";
		
		elseif($usu->__get("cpNivelAcesso") == ""):
			
			echo "<script language='javascript'>
						window.alert('Informe um nível de acesso !');
						window.history.go(-1);
					</script>";
		
		elseif($usu->verificaDuplicidade($usu->__get("cpNome"))):
			
			echo "<script language='javascript'>
						window.alert('O usuário informado já existe !');
						window.history.go(-1);
					</script>";
		else:
			
			 $usu->INSERT();
			 echo "<script language='javascript'>
						window.alert('Usuário inserido com sucesso !');
						window.location.href='../view/Usuario.php?panel=423644';
					</script>";
		endif;
	endif;
	
	
	if($_REQUEST["acao"] == "deletar"):
	
		$id = (int)$_GET["id"];
	    
		$usu->DELETE($id);
		
		echo "<script language='javascript'>
					window.alert('Usuário excluído com sucesso !');
					window.location.href='../view/Usuario.php?panel=423644';
				</script>";
	
	endif;
	
	if($_REQUEST["acao"] == "atualizar"):
	
		$id = $_REQUEST["id"];
		
		$usu->__set("cpNome", addslashes($_REQUEST["cpNome"]));
		$usu->__set("cpSenha", addslashes(sha1($_REQUEST["cpSenha"])));
		$usu->__set("cpStatus", addslashes($_REQUEST["cpStatus"]));
		$usu->__set("cpNivelAcesso", addslashes($_REQUEST["cpNivelAcesso"]));
		
		if(strlen($usu->__get("cpNome")) < 3):
			
		echo "<script language='javascript'>
					window.alert('Informe um nome maior que 3 caracteres !');
					window.history.go(-1);
				</script>";
		
		elseif(strlen($usu->__get("cpSenha") <= 4)):
		
		echo "<script language='javascript'>
					window.alert('Informe uma senha maior que 4 caracteres !');
					window.history.go(-1);
				</script>";
			
		elseif(empty($usu->__get("cpStatus"))):
		
		echo "<script language='javascript'>
					window.alert('È necessário selecionar um status !');
					window.history.go(-1);
				</script>";
		
		elseif(empty($usu->__get("cpNivelAcesso"))):
		
		echo "<script language='javascript'>
					window.alert('È necessário selecionar um nível de acesso !');
					window.history.go(-1);
				</script>";
		else:
		
		$usu->UPDATE($id);
		
		echo "<script language='javascript'>
					window.alert('Registro atualizado com sucesso !');
					window.location.href='../view/Usuario.php?panel=423644';
				</script>";
		
		endif;
	endif;
