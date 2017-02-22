<?php require_once 'DB.php';

	class Cliente { //INICIO DOO ESCOPO 

		protected $table = "tuCliente";
		private $idCliente,
				$cpNome,
				$cpSobreNome,
				$cpEmail,
				$cpTelefone,
				$cpDataNascimento,
				$cpLogradouro,
				$cpNumero,
				$cpBairro,
				$cpUf,
				$cpCidade,
				$cpObservacao;
		
				
	    public function __set($attr, $valor) { 
	    	
	    	$this->$attr = $valor;
	    }

	    public function __get($attr) {

	    	return $this->$attr;
	    }
	    
	    public function INSERT() {

	    	$sql="INSERT INTO 
	    				
	    			$this->table 
	    			
	    				(cpNome,cpSobreNome,cpEmail,cpTelefone,cpDataNascimento,cpCep,cpLogradouro,cpBairro,cpCidade,cpUf,cpNumero,cpSexo,cpObservacao)
	    				
	    		  VALUES 
	    		  
	    				(:cpNome,:cpSobreNome,:cpEmail,:cpTelefone,:cpDataNascimento,:cpCep,:cpLogradouro,:cpBairro,:cpCidade,:cpUf,:cpNumero,:cpSexo,:cpObservacao)";
	    	
	    	$in=DB::prepare($sql);
	    	$in->bindParam(':cpNome', $this->cpNome, PDO::PARAM_STR);
	    	$in->bindParam(":cpSobreNome", $this->cpSobreNome, PDO::PARAM_STR);
	    	$in->bindParam(':cpEmail', $this->cpEmail, PDO::PARAM_STR);
	    	$in->bindParam(':cpTelefone', $this->cpTelefone, PDO::PARAM_STR);
	    	$in->bindParam(':cpDataNascimento', $this->cpDataNascimento, PDO::PARAM_STR);
	    	$in->bindParam(':cpCep',$this->cpCep,PDO::PARAM_STR);
	    	$in->bindParam(':cpLogradouro', $this->cpLogradouro, PDO::PARAM_STR);
	    	$in->bindParam(':cpBairro', $this->cpBairro, PDO::PARAM_STR);
	    	$in->bindParam(':cpCidade', $this->cpCidade, PDO::PARAM_STR);
	    	$in->bindParam(':cpUf', $this->cpUf, PDO::PARAM_STR);
	    	$in->bindParam(':cpNumero', $this->cpNumero, PDO::PARAM_INT);
	    	$in->bindParam(':cpSexo', $this->cpSexo,PDO::PARAM_STR);
	    	$in->bindParam(':cpObservacao', $this->cpObservacao, PDO::PARAM_STR);

			try {
 				
 				return $in->execute();

			} catch(PDOException $e) {

				echo 'Error no arquivo ' .$e->getFile().' referente a seguinte mensagem '.$e->getMessage(). ' na linha '.$e->getLine();
			}
	    }

	    public function ListId($id) {

	    	$sql="SELECT 
	    			cpNome,cpSobreNome,cpEmail,cpTelefone,cpDataNascimento,cpCep,cpLogradouro,cpNumero,cpBairro,cpCidade,cpUf,cpSexo,cpObservacao
	    		  FROM 
	    			$this->table 
	    		  WHERE 
	    			idCliente = :idCliente";
	    	
	    	$s=DB::prepare($sql);
	    	$s->bindParam(":idCliente",$id,PDO::PARAM_INT);
	    	$s->execute();

	    	try {

	    		return $s->fetch();

	    	} catch(PDOException $e) {

	    		echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
	    	}

	    }
	    
		public function UPDATE($id) { 

	    	$sql="UPDATE 
	    				$this->table 
	    			SET 
	    				cpNome=:cpNome, cpSobreNome=:cpSobreNome,cpEmail=:cpEmail,cpTelefone=:cpTelefone,cpDataNascimento=:cpDataNascimento,
	    				cpCep=:cpCep,cpLogradouro=:cpLogradouro,cpNumero=:cpNumero,cpBairro=:cpBairro,cpCidade=:cpCidade,cpUf=:cpUf,cpSexo=:cpSexo,cpObservacao=:cpObservacao
	    	
	    		  WHERE idCliente=:idCliente";
	    	
	    	$up=DB::prepare($sql);
	    	$up->bindParam(":idCliente", $id, PDO::PARAM_INT);
	    	$up->bindParam(":cpNome", $this->cpNome, PDO::PARAM_STR);
	    	$up->bindParam(":cpSobreNome", $this->cpSobreNome, PDO::PARAM_STR);
	    	$up->bindParam(":cpEmail",$this->cpEmail, PDO::PARAM_STR);
	    	$up->bindParam(":cpTelefone",$this->cpTelefone, PDO::PARAM_STR);
	    	$up->bindValue(":cpDataNascimento",$this->cpDataNascimento);
	    	$up->bindParam(":cpCep", $this->cpCep, PDO::PARAM_STR);
	    	$up->bindParam(":cpLogradouro", $this->cpLogradouro, PDO::PARAM_STR);
	    	$up->bindParam(":cpNumero", $this->cpNumero, PDO::PARAM_INT);
	    	$up->bindParam(":cpBairro", $this->cpBairro, PDO::PARAM_STR);
	    	$up->bindParam(":cpCidade", $this->cpCidade, PDO::PARAM_STR);
	    	$up->bindParam(":cpUf", $this->cpUf, PDO::PARAM_STR);
	    	$up->bindParam(":cpSexo", $this->cpSexo, PDO::PARAM_STR);
	    	$up->bindParam(":cpObservacao", $this->cpObservacao, PDO::PARAM_STR);

	    	try {

	    		return $up->execute();

	    	} catch(PDOException $e) {

	    		echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage(). ' na linha '.$e->getLine();
	    	}
	    }
	    
	    public function DELETE($id) {
	    	
	    	$sql="DELETE FROM $this->table WHERE idCliente=:idCliente";
	    	$del=DB::prepare($sql);
	    	$del->bindParam(":idCliente",$id, PDO::PARAM_INT);
	    	
	    	try {
	    		
	    		return $del->execute();
	    		
	    	} catch(PDOException $e) {
	    		
	    		echo 'Erro no arquivo ' .$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '. $e->getLine();
	    	}
	    }
	    
	   public function verificaDuplicidade() {
	   	 	
	   		$sql="SELECT 
	   				cpEmail,cpNome,cpSobreNome 
	   			  FROM 
	   				$this->table
	   			  WHERE 
	   				cpEmail = ? OR cpNome = ? AND cpSobreNome = ?  ";
	   		$s=DB::prepare($sql);
	   		$s->bindParam(":cpEmail", $this->cpEmail, PDO::PARAM_STR);
	   		$s->bindParam(":cpnome", $this->cpNome,PDO::PARAM_STR);
	   		$s->bindParam(":cpSobreNome", $this->cpSobreNome, PDO::PARAM_STR);
	   		$s->execute(array($this->cpEmail,$this->cpNome,$this->cpSobreNome));
	   		try {
	   			
	   			return $s->rowCount();
	   			
	   		} catch(PDOException $e) {
	   			
	   			echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
	   		}
	   }
	   	   
	   public function getJSON() {
	   	
	   	$sql ="SELECT idCliente,cpNome,cpSobreNome,cpEmail,cpTelefone,cpDataNascimento 
	   		   FROM  $this->table";
	    
	   	$s=DB::prepare($sql);
	   	$s->bindParam(":idCliente", $this->idCliente, PDO::PARAM_INT);
	   	$s->bindParam(":cpNome", $this->cpNome,PDO::PARAM_STR);
	   	$s->bindParam(":cpSobreNome", $this->cpSobreNome, PDO::PARAM_STR);
	   	$s->bindParam(":cpEmail", $this->cpEmail,PDO::PARAM_STR);
	   	$s->bindParam(":cpTelefone", $this->cpTelefone,PDO::PARAM_STR);
	   	$s->bindParam(":cpDataNascimento", $this->cpDataNascimento,PDO::PARAM_STR);
	  	$s->execute();
	   	
	   	try {
	   		
	   		$retornoJson = $s->fetchAll(PDO::FETCH_ASSOC);
	   		return json_encode($retornoJson, JSON_PRETTY_PRINT);
	   	
	   	}catch(PDOException $e) {
	   		
	   		echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '. $e->getMessage().' na linha' .$e->getLine();
	   	}
	   	
	   }
	} // FIM DO ESCOPO

	
	
	
	
	
	
	
	
	
	
	
	
	
	