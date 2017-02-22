<?php require_once 'DB.php';

	class Usuario {
		
		protected $table = "tsUsuario";
		protected $idUsuario,
				  $cpNome,
				  $cpSenha,
				  $cpStatus,
				  $cpNivelAcesso;
		
		public function __set($attr,$valor) {
			
			$this->$attr = $valor;
		}
		
		public function __get($attr) {
			
			return $this->$attr;
		}
		
		
		public function INSERT() {
			
			$sql="INSERT INTO $this->table
					(cpNome,cpSenha,cpStatus,cpNivelAcesso)
				  VALUES 
				  	(:cpNome,:cpSenha,:cpStatus,:cpNivelAcesso)";
			
			$in=DB::prepare($sql);
			$in->bindParam(':cpNome', $this->cpNome, PDO::PARAM_STR);
			$in->bindParam(':cpSenha', $this->cpSenha, PDO::PARAM_STR);
			$in->bindParam(':cpStatus', $this->cpStatus, PDO::PARAM_STR);
			$in->bindParam(':cpNivelAcesso', $this->cpNivelAcesso, PDO::PARAM_STR);
			
			try {
				
				return $in->execute();
			
			} catch(PDOException $e) {
				
				echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();	
			}
		}
		
		public function verificaDuplicidade($nome) {
			
			$sql="SELECT 
					cpNome 
				  FROM 
				  	$this->table 
				  WHERE cpNome = ?";
			
			$s=DB::prepare($sql);
			$s->bindParam(":cpNome", $this->cpNome, PDO::PARAM_STR);
			$s->execute(array($this->cpNome));
			
			try {
				
				return $s->rowCount();
				
			} catch(PDOException $e) {
				
				echo 'Erro no arquivo ' .$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
			}
			
		}
		
		public function getJSON() { 
			
			$sql="SELECT 
					idUsuario,cpNome,cpStatus,cpNivelAcesso
				 FROM 
				 	$this->table
				 ORDER BY cpNome";
			
		    $s=DB::prepare($sql);
		    $s->bindParam(":idUsuario", $this->idUsuario,PDO::PARAM_INT);
		    $s->bindParam(":cpNome", $this->cpNome,PDO::PARAM_STR);
		    $s->bindParam(":cpStatus", $this->cpStatus, PDO::PARAM_STR);
		    $s->bindParam(":cpNivelAcesso", $this->cpNivelAcesso, PDO::PARAM_STR);
		    $s->execute();
		    
		   	try {
		   		
		   		$json = $s->fetchAll(PDO::FETCH_ASSOC);
		   		return json_encode($json, JSON_PRETTY_PRINT);
		   	
		   	} catch(PDOException $e) {
		   		
				echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();		   		
		   	}
		}
		
		public function listId($id) {
			
			$sql="SELECT 
					cpNome,cpStatus,cpNivelAcesso
				  FROM 
					$this->table
				  WHERE idUsuario=:idUsuario";
			
			$list=DB::prepare($sql);
			$list->bindParam(':idUsuario',$id, PDO::PARAM_INT);
			$list->execute();
			try {
				
				return $list->fetch();
				
			} catch(PDOException $e) {
				
				echo 'Erro no arquivo '.$e->getFile(). ' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
			}
		}
		
		public function DELETE($id) {
			
			$sql="DELETE FROM $this->table WHERE idUsuario=:idUsuario";
			$del=DB::prepare($sql);
			$del->bindParam(":idUsuario",$id, PDO::PARAM_INT);
			
			try {
				
				return $del->execute();
				
			} catch(PDOException $e) {
				
				echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
			}
			
		}
		
		public function UPDATE($id) {
			
			$sql="UPDATE $this->table  SET 
					
					cpNome=:cpNome, cpSenha=:cpSenha, cpStatus=:cpStatus, cpNivelAcesso=:cpNivelAcesso
				  
				  WHERE idUsuario=:idUsuario";
			
			$up=DB::prepare($sql);
			$up->bindParam(":idUsuario", $id, PDO::PARAM_INT);
			$up->bindParam(":cpNome", $this->cpNome, PDO::PARAM_STR);
			$up->bindParam(":cpSenha", $this->cpSenha, PDO::PARAM_STR);
			$up->bindParam(":cpStatus", $this->cpStatus, PDO::PARAM_STR);
			$up->bindParam(":cpNivelAcesso", $this->cpNivelAcesso, PDO::PARAM_STR);
			
			try {
				
				return $up->execute();
				
			} catch(PDOException $e) {
			
				echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
			}
		}
	}

	
	
	
	
	
	
	
