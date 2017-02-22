<?php require_once 'DB.php';

	class Categoria {
		
		protected $table = "teCategoria";
		private $idCategoria,
				$cpNomeCategoria;
		
	    public function __set($attr,$valor) {
	    	
	    	$this->$attr = $valor;
	    }
	    
	    public function __get($attr) {
	    	
	    	return $this->$attr;
	    }
	    
	    
	    public function INSERT() {
	    	
	    	$sql="INSERT INTO
    				$this->table (cpNomeCategoria) VALUES (:cpNomeCategoria) ";
	    	$in=DB::prepare($sql);
	    	$in->bindParam(":cpNomeCategoria",$this->cpNomeCategoria,PDO::PARAM_STR);
	    	
	    	try {
	    		
	    		return $in->execute();
	    		
	    	} catch(PDOException $e) {
	    		
	    		echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
	    	}
	    	
	    }
	    
	    public function getJSON() {
	    	
	    	$sql="SELECT idCategoria,cpNomeCategoria 
	    		  FROM $this->table";
	    	$s=DB::prepare($sql);
	    	$s->bindParam(":idCategoria", $this->idCategoria,PDO::PARAM_INT);
	    	$s->bindParam(":cpNomeCategoria", $this->cpNomeCategoria,PDO::PARAM_STR);
	    	$s->execute();
	    	
	    	try {
	    		
	    		$arry = $s->fetchAll(PDO::FETCH_ASSOC);
	    		return json_encode($arry, JSON_PRETTY_PRINT);
	    		
	    	} catch(PDOException $e) {
	    		
	    		echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage.' na linha '.$e->getLine();
	    	}
	    	
	    }
	    
	    public function verificaDuplicidade($nome) {
	    	
	    	$sql="SELECT cpNomeCategoria 
	     		  FROM $this->table
	    		  WHERE cpNomeCategoria = ?";
	    	
	    	$row=DB::prepare($sql);
	    	$row->bindParam(":cpNomeCategoria", $nome,PDO::PARAM_STR);
	    	$row->execute(array($this->cpNomeCategoria));
	    	try {
	    		
	    		return $row->rowCount();
	    	
	    	} catch(PDOException $e) {
	    		
	    		echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
	    	}
	    }
	    
	    public function listId($id) {
	    	
	    	$sql="SELECT cpNomeCategoria 
	    		  FROM $this->table
	    		  WHERE idCategoria=:idCategoria";
	    	$list=DB::prepare($sql);
	    	$list->bindParam(":idCategoria", $id, PDO::PARAM_INT);
	    	$list->execute();
	    	
	    	try { 
	    		
	    		return $list->fetch();
	    		
	    	} catch(PDOException $e) {
	    		
	    		echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
	    	}
	    }
	    
	    public function DELETE($id) {
	    	
	    	$sql="DELETE FROM $this->table 
	    		  WHERE idCategoria=:idCategoria";
	    	
	    	$del=DB::prepare($sql);
	    	$del->bindParam(":idCategoria",$id, PDO::PARAM_INT);
	    	
	    	try {
	    		
	    		return $del->execute();
	    	
	    	} catch(PDOException $e) {
	    		
	    		echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
	    		
	    	}
	    }
	    
	    public function UPDATE($id) {
	    	
	    	$sql="UPDATE $this->table SET cpNomeCategoria=:cpNomeCategoria WHERE idCategoria=:idCategoria";
	    	$up=DB::prepare($sql);
	    	$up->bindParam(":idCategoria",$id, PDO::PARAM_INT);
	    	$up->bindParam(":cpNomeCategoria", $this->cpNomeCategoria, PDO::PARAM_STR);
	    	
	    	try {
	    		
	    		return $up->execute();
	    	
	    	} catch(PDOException $e) {
				    	
	    		echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
	    	}
		}
		
	
	
	
}
