<?php require_once '../core/config.php';

 	$cat =  new Categoria();
 	
 	if($_REQUEST["acao"] == "cadastrar"):
 	
 		$nome = addslashes($_REQUEST["cpNomeCategoria"]);
 	
 		$cat->__set("cpNomeCategoria", $nome);
 		
 		$verificaNome = !isset($nome);
 		
 		$verificaDuplicidade = !empty($cat->verificaDuplicidade($nome));
 		
 		if($verificaNome):
 		
 			echo "<script language='javascript'>
 						window.alert('É necessário preencher o campo [ NOME DA CATEGORIA ]!');
 						window.history.go(-1);
 					</script>";
 		
 		elseif($verificaDuplicidade):
 			
 			echo "<script language='javascript'>
 						window.alert('Categoria [ $nome ] já é cadastrada !');
 						window.history.go(-1);
 					</script>";
 		
 		else:
 		
 			$cat->INSERT();
 			echo"<script language='javascript'>
 						window.alert('Registro cadastrado corretamente !');
 						window.location.href='../view/Categoria.php?panel=347409';
 					</script>";
 		endif;
 	endif;
 	
	
 	if($_REQUEST["acao"] == "deletar"):
 	
 		$id = (int)$_REQUEST["id"];
 	    $list = $cat->listId($id);
        
 	    $nome = $list->cpNomeCategoria;
 	    
 		$cat->DELETE($id);
 		echo "<script language='javascript'>
 					window.alert('Registro [ $nome ] foi excluído com sucesso !');
 					window.location.href='../view/Categoria.php?panel=347409';
 				</script>";
 	endif;
 	
 	
 	if($_REQUEST["acao"] == "atualizar"):
 	
 		$id = (int)	addslashes($_REQUEST["id"]);
 		
 		$cat->__set("cpNomeCategoria", addslashes($_REQUEST["cpNomeCategoria"]));
 		$nome = $cat->__get("cpNomeCategoria");
 		$validaNomeVazio = empty(addslashes($_REQUEST["cpNomeCategoria"]));
 		$verificaDuplicidade = !empty($cat->verificaDuplicidade(addslashes($nome)));
 		
 		if($verificaNome):
 			
 			echo "<script language='javascript'>
 						window.alert('È necessário preencher o campo [ NOME DA CATEGORIA ] ! ');
 						window.location.href='../view/Categoria.php?panel=178370';
 					</script>";
 		
 		elseif($verificaDuplicidade):
 			
 			echo "<script language='javascript'>
 						window.alert('Categoria [ $nome ] já é cadastrada !');
 						window.location.href='../view/Categoria.php?panel=347409';
 					</script>";
 		else:
 		$cat->UPDATE($id);
 		echo "<script language='javascript'>
 					window.alert('Registro [ $nome ] foi atualizado com sucesso !');
 					window.location.href='../view/Categoria.php?panel=347409';
 				</script>";
 		endif;
 	endif;
 	
 	
 	