<?php

require_once 'lib/conexaoModel.php';

class EstrelasModel extends ConexaoModel {

	private $id_estabelecimento;
    private $id_cliente;
	private $num_estrelas;
	
	function __construct($conectado = false) {
		if ($conectado == false) {
			parent::__construct();
		}
    }
    
    /**
     *Metodos Getters e Setters
     */

    public function getId_estabelecimento() {
        return $this->id_estabelecimento;
    }

    public function setId_estabelecimento($id_estabelecimento) {
        $this->id_estabelecimento = $id_estabelecimento;
    }

    public function getId_cliente() {
        return $this->id_cliente;
    }

    public function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function getNum_estrelas() {
        return $this->num_estrelas;
    }

    public function setNum_estrelas($num_estrelas) {
        $this->num_estrelas = $num_estrelas;
    }

    public function salvarVoto() {
        
        try {

            $consulta1 = $this->pdo->prepare("SELECT *

                                                FROM estrelas

                                               WHERE id_cliente = :id_cliente

                                                 AND id_estabelecimento = :id_estabelecimento
                                            ");

            $consulta1->bindValue(":id_cliente",$this->getId_cliente());
            $consulta1->bindValue(":id_estabelecimento",$this->getId_estabelecimento());
            $consulta1->execute();       

            if ($consulta1->rowCount() == 0) {

                $consulta2 = $this->pdo->prepare("INSERT INTO estrelas (id_cliente, id_estabelecimento,num_estrelas) 
                                                 VALUES(:id_cliente,:id_estabelecimento,:num_estrelas)"); 
                $consulta2->bindValue(":id_cliente",$this->getId_cliente());
                $consulta2->bindValue(":id_estabelecimento",$this->getId_estabelecimento());
                $consulta2->bindValue(":num_estrelas",$this->getNum_estrelas());
                $consulta2->execute();

                return true;

            } else {

                $consulta2 = $this->pdo->prepare("UPDATE estrelas 

                                                     SET num_estrelas = :num_estrelas

                                                   WHERE id_cliente = :id_cliente

                                                     AND id_estabelecimento = :id_estabelecimento
                                                ");

                $consulta2->bindValue(":id_cliente",$this->getId_cliente());
                $consulta2->bindValue(":id_estabelecimento",$this->getId_estabelecimento());
                $consulta2->bindValue(":num_estrelas",$this->getNum_estrelas());
                $consulta2->execute();

                return true;

            }

        } catch (PDOException $e){
            return "Erro: ".$e->getMessage();
            exit();
        }

    }

    public function obterEstrelas() {
        try {
            $consulta = $this->pdo->prepare("SELECT num_estrelas

                                               FROM estrelas

                                              WHERE id_cliente = :id

                                                AND id_estabelecimento = :id_estabelecimento
                                            "); 

            $consulta->bindValue(":id",$this->getId_cliente());
            $consulta->bindValue(":id_estabelecimento",$this->getId_estabelecimento());
            $consulta->execute();

            if ($consulta->rowCount() > 0) {

                $linha = $consulta->fetch(PDO::FETCH_OBJ);


                    $estrelas = new EstrelasModel();
                    $estrelas->setNum_estrelas($linha->num_estrelas);          
                

                return $estrelas;

            } else {
                return false;
            }

        } catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            exit();
        }
    }

    public function obterMediaEstrelas() {

        try {
            $consulta = $this->pdo->prepare("SELECT AVG(NUM_ESTRELAS)  AS ESTRELAS

                                                    FROM ESTRELAS 

                                                   WHERE ID_ESTABELECIMENTO = :id
                                                ");

            $consulta->bindValue(":id",$this->getId_estabelecimento());
            $consulta->execute();

            $linha = $consulta->fetch(PDO::FETCH_OBJ);

            return $linha->ESTRELAS;

        } catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            exit();
        }
    }

}	

?>