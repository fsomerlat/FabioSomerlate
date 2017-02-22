<?php require_once '../core/config.php';
	
 	$cli = new Cliente();
	if($_REQUEST["acao"] == "enviar"):

		$cli->__set("cpNome",  addslashes($_REQUEST["cpNome"]));
		$cli->__set("cpSobreNome", addslashes($_REQUEST["cpSobreNome"]));
		$cli->__set("cpEmail",  addslashes($_REQUEST["cpEmail"]));
		$cli->__set("cpTelefone",  addslashes($_REQUEST["cpTelefone"]));
		$cli->__set("cpCep",   addslashes($_REQUEST["cpCep"]));
		$cli->__set("cpLogradouro", addslashes($_REQUEST["cpLogradouro"]));
		$cli->__set("cpNumero", addslashes($_REQUEST["cpNumero"]));
		$cli->__set("cpBairro", addslashes($_REQUEST["cpBairro"]));
		$cli->__set("cpCidade", addslashes($_REQUEST["cpCidade"]));
		$cli->__set("cpUf", addslashes($_REQUEST["cpUf"]));
		$cli->__set("cpSexo", addslashes($_REQUEST["cpSexo"]));
		$cli->__set("cpObservacao", addslashes($_REQUEST["cpObservacao"]));
		
		
		$dt = DateTime::createFromFormat('d/m/Y',$_REQUEST["cpDataNascimento"]);
		$nova_data = $dt->format('Y-d-m');
		$cli->__set("cpDataNascimento",  $nova_data);
		
		$verificaNome = strlen($cli->__get("cpNome")) < 3;
		$verifiDataNasc = $cli->__get("cpDataNascimento");
		
		
		if($verificaNome):

			echo "<script language='javascript'>
					window.alert('Informe um nome maior que 3 caracteres !');
					window.history.go(-1);
				</script>";
		
		elseif($cli->verificaDuplicidade() > 0):

			echo "<script language='javascript'>
					window.alert('E-mail ou nome e sobrenome já cadastrado !');
					window.history.go(-1);
				</script>";
		
		elseif(!isset($verifiDataNasc)):
		
			echo "<script language='javascript'>
					window.alert('O campo data de nascimento não pode ser vazio !');
					window.history.go(-1);
				</script>";
		else:
		
		$cli->INSERT();

		echo "<script language='javascript'>
				window.alert('Registro inserido corretamente !');
				window.location.href='../view/ListarCliente.php';
			</script>";
		endif;
	endif; 

	if($_REQUEST["acao"] == "atualizar"):

		$id = $_REQUEST["id"];
	
		$cli->__set("cpNome",  addslashes($_REQUEST["cpNome"]));
		$cli->__set("cpSobreNome", addslashes($_REQUEST["cpSobreNome"]));
		$cli->__set("cpEmail",  addslashes($_REQUEST["cpEmail"]));
		$cli->__set("cpTelefone",  addslashes($_REQUEST["cpTelefone"]));
		$cli->__set("cpCep",   addslashes($_REQUEST["cpCep"]));
		$cli->__set("cpLogradouro", addslashes($_REQUEST["cpLogradouro"]));
		$cli->__set("cpNumero", addslashes($_REQUEST["cpNumero"]));
		$cli->__set("cpBairro", addslashes($_REQUEST["cpBairro"]));
		$cli->__set("cpCidade", addslashes($_REQUEST["cpCidade"]));
		$cli->__set("cpUf", addslashes($_REQUEST["cpUf"]));
		$cli->__set("cpSexo", addslashes($_REQUEST["cpSexo"]));
		$cli->__set("cpObservacao", addslashes($_REQUEST["cpObservacao"]));
		
		
		$data = DateTime::createFromFormat('d/m/Y',$_REQUEST["cpDataNascimento"]);
		$nova_data = $data->format('Y-d-m');
		$cli->__set("cpDataNascimento", $nova_data);
		
		
		if(strlen($cli->__get("cpNome")) < 3):
		
		echo "<script language='javascript'>
		
					window.alert('È necessário informar um nome com mais de 3 caracteres !');
					window.history.go(-1);
				</script>";
		
		elseif(empty($cli->__get("cpSobreNome"))):
		
		echo "<script language='javascript'>
		
					window.alert('O campo sobrenome não pode ser vazio !');
					window.history.go(-1);
				</script>";
		
		elseif(empty($cli->__get("cpEmail"))):
		
		echo "<script language='javascript'>
		
					window.alert('O campo email não pode ser vazio !');
					window.history.go(-1);
				</script>";
		
		elseif(empty($cli->__get("cpTelefone"))):
		
		echo "<script language='javascript'>
		
					window.alert('O campo telefone não pode ser vazio !');
					window.history.go(-1);
				</script>";
		
		elseif(empty($cli->__get("cpCep"))):
		
		echo "<script language='javascript'>
		
					window.alert('O campo cep não pode ser vazio !');
					window.history.go(-1);
				</script>";
		
		elseif(empty($cli->__get("cpLogradouro"))):
		
		echo "<script language='javascript'>
		
					window.alert('O campo rua não pode ser vazio !');
					window.history.go(-1);
				</script>";
		
		elseif(empty($cli->__get("cpNumero"))):
		
		echo "<script language='javascript'>
		
					window.alert('O campo numero não pode ser vazio !');
					window.history.go(-1);
				</script>";
		elseif(empty($cli->__get("cpBairro"))):
		
		echo "<script language='javascript'>
		
					window.alert('O campo bairro não pode ser vazio !');
					window.history.go(-1);
				</script>";
		
		elseif(empty($cli->__get("cpCidade"))):
		
		echo "<script language='javascript'>
		
					window.alert('O campo cidade não pode ser vazio !');
					window.history.go(-1);
				</script>";
		
		elseif(empty($cli->__get("cpUf"))):
		
		echo "<script language='javascript'>
		
					window.alert('O campo uf não pode ser vazio !');
					window.history.go(-1);
				</script>";

		elseif(empty($cli->__get("cpSexo"))):
		
		echo "<script language='javascript'>
		
					window.alert('O campo sexo não pode ser vazio !');
					window.history.go(-1);
				</script>";
		else:
		
		$cli->UPDATE($id);
		echo "<script language='javascript'>
		
					window.alert('Registro atualizado com sucesso !');
					window.location.href='../view/ListarCliente.php';
				</script>";
		
		endif;	
	endif;
	
	if($_REQUEST["acao"] == "deletar"):
	
		$id = $_REQUEST['id'];
	
		$cli->DELETE($id);
		
		echo "<script language='javascript'>
				
					window.alert('Registro excluído com sucesso !');
					window.history.go(-1);
				</script>";
		
	endif;
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	