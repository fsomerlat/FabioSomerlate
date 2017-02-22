<?php  require_once '../core/config.php';

  $prod = new Produto();
  
  if($_REQUEST["acao"] == "cadastrar"):
  	
  	$nome = $_REQUEST["cpNome"];
    $fkCategoria = $_REQUEST["cpteCategoria_idCategoria"];
    $qtd = $_REQUEST["cpQtd"];
    $valor = $_REQUEST["cpValor"];
    $obs = $_REQUEST["cpObservacao"];
    
    $prod->__set("cpNome", addslashes($nome));
    $prod->__set("cpteCategoria_idCategoria", addslashes($fkCategoria));
    $prod->__set("cpQtd", addslashes($qtd));
    $prod->__set("cpValor", addslashes($valor));
    $prod->__set("cpObservacao", $obs);
    
    if(empty($nome)):
    	
    	echo"<script language='javascript'>
    				window.alert('O campo [ NOME ] deve ser preenchido !');
    				window.history.go(-1);
    			</script>";
    
    elseif($fkCategoria == 0):
    
	    echo"<script language='javascript'>
	    				window.alert('O campo [ CATEGORIA ] deve ser selecionado !');
	    				window.history.go(-1);
	    			</script>";
    elseif(empty($qtd)):
  
    echo"<script language='javascript'>
    				window.alert('O campo [ QUANTIDADE ] deve ser preenchido !');
    				window.history.go(-1);
    			</script>";
    elseif(empty($valor)):
    
    echo"<script language='javascript'>
    				window.alert('O campo [ VALOR ] deve ser preenchido !');
    				window.history.go(-1);
    			</script>";
    else:
    	$prod->INSERT();
    	echo"<script language='javascript'>
    				window.alert('Registro inserido com sucesso !');
    				window.location.href='../view/Produto.php?panel=852096';
    			</script>";
    endif;
  endif;
  
  if($_REQUEST["acao"] == "atualizar"):
  
  	$id = $_REQUEST["id"];
  
  	$prod->__set("cpNome", addslashes($_REQUEST["cpNome"]));
  	$prod->__set("cpteCategoria_idCategoria", addslashes($_REQUEST["cpteCategoria_idCategoria"]));
  	$prod->__set("cpQtd",addslashes($_REQUEST["cpQtd"]));
  	$prod->__set("cpValor", addslashes($_REQUEST["cpValor"]));
  	$prod->__set("cpObservacao", addslashes(trim($_REQUEST["cpObservacao"])));  		
		if($_REQUEST['cpNome'] == ''):
				
			echo"<script language='javascript'>
					window.alert('È necessário preencher o campo [ NOME ] !');
					window.history.go(-1);
				</script>";
			
  		elseif($_REQUEST['cpteCategoria_idCategoria'] == 0):

  			echo "<script language='javascript'>
  					window.alert('È necessário preencher o campo [ CATEGORIA ] !');
  					window.history.go(-1);
  				</script>";
  				
  		elseif($_REQUEST['cpQtd'] == ''):
  			   
  			echo "<script language='javascript'>
  					window.alert('È necessário preencher o campo [ QUANTIDADE ] !');
  					window.history.go(-1);
  			</script>";
  			
  		elseif($_REQUEST['cpValor'] == ''):
  		
	  		echo "<script language='javascript'>
	  					window.alert('È necessário preencher o campo [ VALOR ] !');
	  					window.history.go(-1);
	  			</script>";
  		else:
  		
  			$prod->UPDATE($id);
  			echo "<script language='javascript'>
	  					window.alert('Registro atualizado com sucesso !');
	  					window.location.href='../view/Produto.php?panel=852096';
	  			</script>";
  		
		endif;
	  	
  	endif;
  	
  	
  	if($_REQUEST["acao"] == "deletar"):
  		
  		$id = addslashes($_REQUEST["id"]);
  		$nomeProd = $_REQUEST["cpNome"]; 
  		
  		$prod->DELETE($id);
  		echo "<script language ='javascript'>
  					window.alert('Registro [ $nomeProd ] foi excluído com sucesso !');
  					window.history.go(-1);
  				</script>";
  		
  	endif;

  
  
  