<?php
require_once 'lib/conexaoModel.php';

class PedidoModel extends ConexaoModel {

	private $id;
    private $data_Entrega;
    private $data_Realizacao;
    private $finalizado;
    private $id_endereco;
    private $id_cliente;
    private $id_estabelecimento;

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

    public function getData_Entrega() {
        return $this->data_Entrega;
    }

    public function setData_Entrega($data_Entrega) {
        $this->data_Entrega = $data_Entrega;
    }

    public function getData_Realizacao() {
        return $this->data_Realizacao;
    }

    public function setData_Realizacao($data_Realizacao) {
        $this->data_Realizacao = $data_Realizacao;    
    }

    public function getId_endereco() {
        return $this->id_endereco;
    }

    public function setId_endereco($id_endereco) {
        $this->id_endereco = $id_endereco;
    }

    public function getId_cliente() {
        return $this->id_cliente;
    }

    public function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function getId_estabelecimento() {
        return $this->id_estabelecimento;
    }

    public function setId_estabelecimento($id_estabelecimento) {
        $this->id_estabelecimento = $id_estabelecimento;
    }



    public function cadastrarPedido() {
        try {               

            $consulta = $this->pdo->prepare("INSERT INTO pedido (data_entrega, data_realizacao, id_endereco, id_cliente, id_estabelecimento) VALUES (:data_entrega, :data_realizacao, :id_endereco, :id_cliente, :id_estabelecimento)"); 
            $consulta->bindValue(":data_entrega",$this->getData_entrega());
            $consulta->bindValue(":data_realizacao",$this->getData_realizacao());
            $consulta->bindValue(":id_endereco",$this->getId_endereco());
            $consulta->bindValue(":id_cliente",$this->getId_cliente());
            $consulta->bindValue(":id_estabelecimento",$this->getId_estabelecimento());
            $consulta->execute();

            $consulta1 = $this->pdo->prepare("SELECT * FROM pedido ORDER BY id_pedido DESC LIMIT 1");
            $consulta1->execute();

            if ($consulta1->rowCount() > 0) {
                $linha = $consulta1->fetch(PDO::FETCH_OBJ);
                
                $this->setId($linha->id_pedido);

            }

        } catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            exit();
        }
    }

    public function carregarPedidos($finalizado) {

            if (isset($this->id_estabelecimento)) {
                

                if ($finalizado) { 

                    $consulta = $this->pdo->prepare("SELECT id_pedido, 
                                                            data_Entrega, 
                                                            data_Realizacao, 
                                                            id_endereco, 
                                                            id_cliente, 
                                                            id_estabelecimento 

                                                       FROM pedido

                                                      WHERE `id_estabelecimento` = :id_estabelecimento 

                                                        AND finalizado = 1

                                                   ORDER BY data_Entrega DESC"
                                                    );

                    $consulta->bindValue(":id_estabelecimento",$this->getId_estabelecimento());
                    $consulta->execute();

                } else {
                    $consulta = $this->pdo->prepare("SELECT id_pedido, 
                                                            data_Entrega, 
                                                            data_Realizacao, 
                                                            id_endereco, 
                                                            id_cliente, 
                                                            id_estabelecimento 

                                                       FROM pedido 

                                                      WHERE `id_estabelecimento` = :id_estabelecimento 

                                                        AND finalizado = 0

                                                   ORDER BY data_Entrega DESC"
                                                    );           

                    $consulta->bindValue(":id_estabelecimento",$this->getId_estabelecimento());
                    $consulta->execute();
                }


                
            } else if (isset($this->id_cliente)) {
                $consulta = $this->pdo->prepare("SELECT id_pedido, 
                                                        data_Entrega, 
                                                        data_Realizacao, 
                                                        id_endereco, id_cliente, 
                                                        id_estabelecimento 

                                                   FROM pedido 

                                                  WHERE `id_cliente` = :id_cliente
                                                  
                                               ORDER BY data_Entrega DESC"
                                                );   

                $consulta->bindValue(":id_cliente",$this->getId_cliente());
                $consulta->execute();

            }

            if ($consulta->rowCount() > 0) {
                $listaPedidos = array();
                $linhaPed = $consulta->fetchAll(PDO::FETCH_OBJ);

                foreach ($linhaPed as $linha) {

                    $pedido = new pedidoModel(true);
                    $pedido->setId($linha->id_pedido);
                    $pedido->setData_entrega($linha->data_Entrega);
                    $pedido->setData_realizacao($linha->data_Realizacao);
                    $pedido->setId_endereco($linha->id_endereco);
                    $pedido->setId_cliente($linha->id_cliente);
                    $pedido->setId_estabelecimento($linha->id_estabelecimento);

                    array_push($listaPedidos, $pedido);
                }              

                return $listaPedidos;

            } else {
                return false;
            }
    }

    public function finalizar() {
        try { 

            $consulta = $this->pdo->prepare("UPDATE pedido SET finalizado = '1' WHERE id_pedido = :id");
            $consulta->bindValue(":id",$this->getId());
            $consulta->execute();

            

        } catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            exit();
        }
    }
}
?>