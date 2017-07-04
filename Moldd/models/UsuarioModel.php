<?php
require_once 'lib/conexaoModel.php';

class UsuarioModel extends ConexaoModel {

	private $id;
	private $email;
	private $senha;	

	function __construct($conectado = false) {
        if ($conectado == false) {
            parent::__construct();
        }
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getEMail() {
        return $this->email;
    }

    public function setEMail($email) {
        $this->email = $email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }
   
    /**
     * método que verifica se existe um e-mail no bando de dados igual ao que foi mandado como parâmetro,
     * caso exista, salva o id_usuario do e-mail na variavel id desta calsse e retorna true,
     * caso não, retorna false;
     */
    public function existente($email) {        

    	try {
	        $consulta = $this->pdo->prepare("SELECT id_usuario,email FROM usuario WHERE email LIKE :email");
	        $consulta->bindValue(":email",$email);
	        $consulta->execute();


	        if ($consulta->rowCount() > 0) {
	        	$this->setEMail($email);
	        	$linha = $consulta->fetchAll(PDO::FETCH_OBJ);
	        	foreach ($linha as $listar) {
	        		//salva o id_usuario do e-mail na variavel id desta calsse
	        		$this->setId($listar->id_usuario);        		
	        	}        	
	        	return true;

	        } else {
	        	return false;
	        }
        } catch (PDOException $e){
        	echo "Erro: ".$e->getMessage();
        	exit();
        }
    }

    /**
     * método que verifica se a senha do e-mail desta classe é iqual a senha passada como parmetro
     */
    public function validar($senha) {
    	try {
	    	$consulta = $this->pdo->prepare("SELECT senha FROM usuario WHERE email LIKE :email");
	        $consulta->bindValue(":email",$this->email);
	        $consulta->execute();

	        if ($consulta->rowCount() > 0) {
	        	$linha = $consulta->fetchAll(PDO::FETCH_OBJ);
	        	foreach ($linha as $listar) {
	        		return $listar->senha == $senha;
	        	}
	        }
        } catch (PDOException $e){
        	echo "Erro: ".$e->getMessage();
        	exit();
        }
    }

    /**
     * método que verifica se o tipo de usuario é C ou E (Cliente, Estabelecimento)
     */
    public function redirecionar() {
    	try {
	    	$consulta = $this->pdo->prepare("SELECT 'C' AS tipo,
                                                    id_cliente 
                                               FROM cliente
	    									  WHERE id_cliente = :id
											  union
											 SELECT 'E' AS tipo, 
                                                    id_estabelecimento 
                                               FROM estabelecimento
											  WHERE id_estabelecimento = :id;"
											 );
	        $consulta->bindValue(":id",$this->id,PDO::PARAM_INT);
	        $consulta->execute();


	        if ($consulta->rowCount() > 0) {
	        	$linha = $consulta->fetchAll(PDO::FETCH_OBJ);
	        	foreach ($linha as $listar) {        		
	        		return $listar;
	        	}
	        }
        } catch (PDOException $e){
        	echo "Erro: ".$e->getMessage();
        	exit();
        }
    }
    
}
?>