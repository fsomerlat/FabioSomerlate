<?php require_once 'DB.php';


	class Produto {
		
		protected $table = "tuProduto";
		private $cpNome,
				$cpteCategoria_idCategoria,
				$cpQtd,
				$cpValor,
				$cpObservacao;
		
	    public function __set($attr,$valor) {
	    	
	    	$this->$attr = $valor;
	    }
	    
	    public function __get($attr) {
	    	
	    	return $this->$attr;
	    }
	    
	    
	    public function INSERT() {
	    	
	    	$sql="INSERT INTO $this->table 
	    			(cpNome,cpteCategoria_idCategoria,cpQtd,cpValor,cpObservacao)
	    		  VALUES
	    			(:cpNome,:cpteCategoria_idCategoria,:cpQtd,:cpValor,:cpObservacao)";
	    	
	    	$in=DB::prepare($sql);
	    	$in->bindParam(":cpNome", $this->cpNome,PDO::PARAM_STR);
	    	$in->bindParam(":cpteCategoria_idCategoria",$this->cpteCategoria_idCategoria,PDO::PARAM_INT);
	    	$in->bindParam(":cpQtd",$this->cpQtd,PDO::PARAM_STR);
	    	$in->bindParam(":cpValor", $this->cpValor,PDO::PARAM_STR);
	    	$in->bindParam(":cpObservacao",$this->cpObservacao,PDO::PARAM_STR);
	    	
	    	try{
	    		
	    		return $in->execute();
	    	
	    	} catch(PDOException $e) {
	    		
	    		echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();	
	    	}
	    }
	    
	    public function getJSON() {
	    	
	    	$sql="SELECT 
	    			
	    		  	p.idProduto,p.cpNome,p.cpQtd,p.cpValor,p.cpObservacao ,c.cpNomeCategoria
	    		  
	    		 FROM 
	    		 $this->table as p INNER JOIN teCategoria as c ON c.idCategoria = p.cpteCategoria_idCategoria";
	    	$s=DB::prepare($sql);
	        $s->execute();
	        
	        try {
	        	
	        	$arry = $s->fetchAll(PDO::FETCH_ASSOC);
	        	echo json_encode($arry, JSON_PRETTY_PRINT);
	        
	        }catch(PDOException $e) {
	  			
	        	echo "Error no arquivo ".$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();       	
	        }
	    }
	    
	    public function getInfoProduto($id) {
	    	
	    	$sql="SELECT cpNome,cpteCategoria_idCategoria,cpQtd,cpValor,cpObservacao
	    		  FROM $this->table WHERE idProduto=:idProduto";
	    	
	    	$list=DB::prepare($sql);
	    	$list->bindParam(":idProduto", $id,PDO::PARAM_INT);
	    	$list->execute();
	    	
	    	try{
	    		
	    		return $list->fetch();
	    	
	    	} catch(PDOException $e) {
	    			
	    		echo "Erro no arquivo ".$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
	    	}
	    }
	    
	    public  function DELETE($id) {
	    	
	    	$sql="DELETE FROM $this->table
	    		  WHERE idProduto=:idProduto";
	    	
	    	$del=DB::prepare($sql);
	    	$del->bindParam(":idProduto",$id,PDO::PARAM_INT);
	    	
	    	try {
	    		
	    		return $del->execute();
	    	
	    	}catch(PDOException $e) {
	    		
	    		echo "Erro no arquivo ".$e->getFile()." referente a mensagem ".$e->getMessage()." na linha ".$e->getLine();
	    	}
	    }
	    
	    public function UPDATE($id) {
	    	
	    	$sql="UPDATE $this->table 
	    		  SET cpNome=:cpNome,cpteCategoria_idCategoria=:cpteCategoria_idCategoria,cpQtd=:cpQtd,cpValor=:cpValor,cpObservacao=:cpObservacao
	    		  WHERE idProduto=:idProduto";
	    	
	    	$up=DB::prepare($sql);
	    	$up->bindParam(":idProduto", $id,PDO::PARAM_INT);
	    	$up->bindParam(":cpNome", $this->cpNome,PDO::PARAM_STR);
	    	$up->bindParam(":cpteCategoria_idCategoria", $this->cpteCategoria_idCategoria,PDO::PARAM_INT);
	    	$up->bindParam(":cpQtd", $this->cpQtd,PDO::PARAM_STR);
	    	$up->bindParam(":cpValor", $this->cpValor,PDO::PARAM_STR);
	    	$up->bindParam(":cpObservacao", $this->cpObservacao,PDO::PARAM_STR);
	    	
	  		try{
	  			
	  			return $up->execute();
	  		
	  		} catch(PDOException $e) {
	  			
	  			echo "Erro no arquivo ".$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
	  		}
	    }
	    

}
	
	
	
	
	
	
	
	
	
	