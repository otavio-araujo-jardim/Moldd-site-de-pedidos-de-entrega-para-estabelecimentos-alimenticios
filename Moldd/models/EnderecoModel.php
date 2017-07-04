<?php

require_once 'lib/conexaoModel.php';

class EnderecoModel extends ConexaoModel {
	
	private $id;
	private $numero;
	private $endereco;
	private $estado;
	private $complemento;
	private $cep;
	private $id_cliente;
	
	function __construct($conectado = false) {
		if ($conectado == false) {
			parent::__construct();
		}
    }
    
    /**
     *Metodos Getters e Setters
     */

    public function getId() {
    	return $this->id;
    }

    public function setId($id) {
    	$this->id = $id;
    }

    public function getNumero() {
    	return $this->numero;
    }

    public function setNumero($numero) {
    	$this->numero = $numero;
    }

    public function getEndereco() {
    	return $this->endereco;
    }

    public function setEndereco($endereco) {
    	$this->endereco = $endereco;
    }

    public function getEstado() {
    	return $this->estado;
    }

    public function setEstado($estado) {
    	$this->estado  = $estado;
    }

    public function getComplemento() {
    	return $this->complemento;
    }

    public function setComplemento($complemento) {
    	$this->complemento = $complemento;
    }

    public function getCep() {
    	return $this->cep;
    }

    public function setCep($cep) {
    	$this->cep = $cep;
    }

    public function getId_cliente() {
    	return $this->id_cliente;
    }

    public function setId_cliente($id_cliente) {
    	$this->id_cliente = $id_cliente;
    }

    public function salvar() {

    	if (is_null($this->getId())) {
    		try {		        

    			$consulta1 = $this->pdo->prepare("INSERT INTO endereco (cep,estado,endereco,numero,complemento,id_cliente) 
    			VALUES(:cep,:estado,:endereco,:numero,:complemento,:id_cliente)"); 
    			$consulta1->bindValue(":cep",$this->getCep());
    			$consulta1->bindValue(":estado",$this->getEstado());
    			$consulta1->bindValue(":endereco",$this->getEndereco());
    			$consulta1->bindValue(":numero",$this->getNumero());
    			$consulta1->bindValue(":complemento",$this->getComplemento());
    			$consulta1->bindValue(":id_cliente",$this->getId_cliente());
    			$consulta1->execute();

    		} catch (PDOException $e){
    			echo "Erro: ".$e->getMessage();
    			exit();
    		}
    	} else {
    		try {
    			$consulta = $this->pdo->prepare("UPDATE endereco SET cep=:cep, estado=:endereco,numero=:numero, 
    			complemento=:complemento, id_cliente=:id_cliente WHERE id_endereco = :id"); 
    			$consulta1->bindValue(":cep",$this->getCep());
    			$consulta1->bindValue(":estado",$this->getEstado());
    			$consulta1->bindValue(":endereco",$this->getEndereco());
    			$consulta1->bindValue(":numero",$this->getNumero());
    			$consulta1->bindValue(":complemento",$this->getComplemento());
    			$consulta1->bindValue(":id_cliente",$this->getId_cliente());
    			$consulta1->bindValue(":id",$this->getId());
    			$consulta->execute();

    		} catch (PDOException $e){
    			echo "Erro: ".$e->getMessage();
    			exit();
    		}
    	}

    }

    public function listar() {
    	try {
    		$consulta = $this->pdo->prepare("SELECT id_endereco,
									    			numero,
									    			endereco,
									    			estado,
									    			complemento,
									    			cep
    										   FROM endereco
    										  WHERE id_cliente = :id"); 

    		$consulta->bindValue(":id",$this->getId_cliente());
    		$consulta->execute();

    		if ($consulta->rowCount() > 0) {
    			$listaEnderecos = array();
    			$linha = $consulta->fetchAll(PDO::FETCH_OBJ);

    			foreach ($linha as $listar) {
	            //salva o id_usuario do e-mail na variavel id desta calsse
    				$endereco = new EnderecoModel(true);
    				$endereco->setId($listar->id_endereco);
    				$endereco->setNumero($listar->numero);
    				$endereco->setEndereco($listar->endereco);
    				$endereco->setEstado($listar->estado);
    				$endereco->setComplemento($listar->complemento);
    				$endereco->setCep($listar->cep);
    				array_push($listaEnderecos, $endereco);            
    			}

    			return $listaEnderecos;

    		} else {
                return false;
            }

    	} catch (PDOException $e){
    		echo "Erro: ".$e->getMessage();
    		exit();
    	}
    }

    public function adquirirEndereco() {
        try {
            $consulta = $this->pdo->prepare("SELECT id_endereco,
                                                    numero,
                                                    endereco,
                                                    estado,
                                                    complemento,
                                                    cep
                                               FROM endereco
                                              WHERE id_endereco = :id"); 

            $consulta->bindValue(":id",$this->getId());
            $consulta->execute();

            if ($consulta->rowCount() > 0) {

                $linha = $consulta->fetch(PDO::FETCH_OBJ);

                    $endereco = new EnderecoModel(true);
                    $endereco->setId($linha->id_endereco);
                    $endereco->setNumero($linha->numero);
                    $endereco->setEndereco($linha->endereco);
                    $endereco->setEstado($linha->estado);
                    $endereco->setComplemento($linha->complemento);
                    $endereco->setCep($linha->cep);           
                

                return $endereco;

            } else {
                return false;
            }

        } catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            exit();
        } 
    }

    public function excluirEndereco() {
         try {

            $consulta1 = $this->pdo->prepare("DELETE FROM endereco WHERE id_endereco = :id_endereco");
            $consulta1->bindValue(":id_endereco",$this->getId());
            $consulta1->execute();

        } catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            exit();
        }
    }

}	

?>