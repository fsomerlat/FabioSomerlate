<?php require_once 'Usuario.php';

	class ControleAcesso extends Usuario  {
		
		
		public function getUser($nome,$senha) {
			
			$sql="SELECT 
					
					cpNome,cpSenha,cpStatus,cpNivelAcesso
				  
				  FROM $this->table
				  
				  WHERE cpNome = '$nome' AND cpSenha= '".sha1($senha)."'";
			
			$getUser=DB::prepare($sql);
			$getUser->bindParam(":cpNome", $nome, PDO::PARAM_STR);
			$getUser->bindParam(":cpSenha", $senha,  PDO::PARAM_STR);
			$getUser->execute();
			
			try {
				
				return $getUser->fetch();
			
			} catch(PDOException $e) {
				
				echo 'Error no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
			}
		}
		
	
		public function getSessaoUser($nome,$senha,$status,$nivelAcesso) {
					
			$sql="SELECT 
					
					cpNome,cpSenha,cpStatus,cpNivelAcesso
				  
				  FROM $this->table
				  
				  WHERE cpNome = ? AND cpSenha = ? AND cpStatus = ? AND cpNivelAcesso = ?";

			$getSessao=DB::prepare($sql);
			$getSessao->bindParam(1, $nome, PDO::PARAM_STR);
			$getSessao->bindParam(2, $senha, PDO::PARAM_STR);
			$getSessao->bindParam(3, $status, PDO::PARAM_STR);
			$getSessao->bindParam(4, $nivelAcesso, PDO::PARAM_STR);
			
			$getSessao->execute();
			
			try {
				
				return $getSessao->fetch(PDO::FETCH_ASSOC);
			
			} catch (PDOException $e) {
				
				echo 'Erro no arquivo '.$e->getFile().' referente a mensagem '.$e->getMessage().' na linha '.$e->getLine();
			}
			
		}
	}
	
	
	
	
	
