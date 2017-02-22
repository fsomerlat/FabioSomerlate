<?php require_once 'header/header.php' ; 
	  require_once '../model/Cliente.php';

	  $cli = new Cliente();
	
	  
	  if($_REQUEST["acao"] == "editar" && isset($_GET["id"])):
		  	$id = (int)$_GET["id"];

		  	$edit = $cli->ListId($id);
		
		  	$data = DateTime::createFromFormat('Y-d-m',$edit->cpDataNascimento);
		  	$dataNascimento  = $data->format('d/m/Y');
	  	else:
	  		$id = "";
	  endif;	
?>

<div class="col-md-12">
	<div class="form-group">
		<h4 class="CadastroClientes">Cadastro de clientes</h4>
		<hr class="hrCadastraClientes"/>
	</div>
</div>

<form name="form1" id="form1" action="../controller/Cliente_controller.php" method="GET">
	<div class="col-md-3">
		<div class="form-group">
			<label for="Nome">Nome</label>
			<input type="text" name="cpNome" id="cpNome" value="<?php  if(!empty($_GET["id"])): echo $edit->cpNome; else: echo "";endif; ?>" class="form-control" />
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
		<label for="Sobre nome">Sobre nome</label>
			<input type="text" name="cpSobreNome" id="cpSobreNome" value="<?php if(!empty($_GET["id"])): echo $edit->cpSobreNome; else: echo ""; endif; ?>" class="form-control" />
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label for="Email">E-mail</label>
			<input type="email" name="cpEmail" id="cpEmail" value="<?php if(!empty($_GET["id"])): echo $edit->cpEmail; else: echo ""; endif; ?>" class="form-control" required />
		</div>
	</div>
	
	<div class="col-md-2">
		<div class="form-group">
			<label for="Telefone">Telefone</label>
			<input type="text" name="cpTelefone" id="cpTelefone" value="<?php if(!empty($_GET["id"])): echo $edit->cpTelefone; else: echo ""; endif; ?>" class="form-control"/>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label for="Cep">Cep</label>
			<input type="text" name="cpCep" id="cpCep" value="<?php if(!empty($_GET["id"])): echo $edit->cpCep; else: echo ""; endif; ?>" class="form-control" />
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label for="Data de Nascimento">Data de nascimento</label>
			<input type="text" name="cpDataNascimento" id="cpDataNascimento" value="<?php if(!empty($_GET["id"])): echo $dataNascimento; else: echo ""; endif; ?>" class="form-control" readonly />
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label for="Rua">Rua</label>
			<input type="text" name="cpLogradouro" readonly id="cpLogradouro" value="<?php if(!empty($_GET["id"])): echo $edit->cpLogradouro; else: echo ""; endif; ?>" class="form-control loading toClear" />
		</div>
	</div>
	
	<div class="col-md-1">
		<div class="form-group">
		<label for="Numero">Numero</label>
			<input type="number" name="cpNumero" id="cpNumero" value="<?php if(!empty($_GET["id"])): echo $edit->cpNumero; else: echo ""; endif; ?>" class="form-control" />
		</div>
	</div>	
	
	<div class="col-md-4">
		<div class="form-group">
			<label for="Bairro">Bairro</label>
			<input type="text" name="cpBairro" readonly id="cpBairro" value="<?php if(!empty($_GET["id"])): echo $edit->cpBairro; else: echo ""; endif; ?>" class="form-control loading toClear" />
		</div>
	</div>
	
	<div class="col-md-2">
		<div class="form-group">
		<label for="Cidade">Cidade</label>
			<input type="text" name="cpCidade" id="cpCidade" readonly value="<?php if(!empty($_GET["id"])): echo $edit->cpCidade; else: echo ""; endif; ?>" class="form-control loading toClear" />
		</div>
	</div>
	
	<div class="col-md-1">
		<div class="form-group">
			<label for="Estado">Uf</label>
			<input type="text" name="cpUf" id="cpUf" readonly value="<?php if(!empty($_GET["id"])): echo $edit->cpUf; else: echo ""; endif; ?>" class="form-control loading toClear" />
		</div>
	</div>	
	
	<div class="col-md-2">
		<div class="form-group">
			<label for="Sexo">Informe o sexo</label><br/>
			Masc:<input type="radio" name="cpRadio_sexo" value="Masculino"/>
			Femin:<input type="radio" name="cpRadio_sexo" value="Feminino" />
		</div>
	</div>
	
	<div class="col-md-2">
		<div class="form-group">
		<label for="Sexo informado">O sexo informado é:</label>
			<input type="text" name="cpSexo" id="cpSexo"  readonly class="form-control" />
		</div>
	</div>
	
	<div class="col-md-12">
		<div class="form-group">
		<label for="Observacao">Complemento</label>
			<textarea name="cpObservacao" id="cpObservacao" class="form-control"></textarea>
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group">
			<input type="hidden" name="id" value="<?php if(!empty($_GET["id"])): echo $id; else: echo "";endif; ?>"/>
			<input type="submit" name="acao" id="btnEnviar" value="<?php if($id != ''): echo "atualizar"; else: echo "enviar" ; endif; ?>" class="btn btn-info form-control" />
		</div> 
	</div>
	
	<div class="col-md-6">
		<div class="form-group">
			<input type="reset" name="acao" id="btnEnviar" value="limpar" class="btn btn-warning form-control" />
		</div>
	</div>
	
</form>
<br/><br/><br/>
<?php require_once 'footer/footer.php'; ?>