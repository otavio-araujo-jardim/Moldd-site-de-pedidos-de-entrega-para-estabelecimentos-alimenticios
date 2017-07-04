<?php
require_once 'lib/conexaoModel.php';

class ItemModel extends ConexaoModel{

    private $id_Produto;
    private $id_Pedido;
    private $quantidade;
    private $solicitacao;
    private $preco;

    function __construct($conectado = false) {
        if ($conectado == false) {
            parent::__construct();
        }
    }
    
    /**
     *Metodos Getters e Setters
     */

    public function getId_Produto() {
        return $this->id_Produto;
    }

    public function setId_Produto($id_Produto) {
        $this->id_Produto = $id_Produto;
    }

    public function getId_Pedido() {
        return $this->id_Pedido;
    }

    public function setId_Pedido($id_Pedido) {
        $this->id_Pedido = $id_Pedido;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function getSolicitacao() {
        return $this->solicitacao;
    }

    public function setSolicitacao($solicitacao) {
        $this->solicitacao = $solicitacao;
    }
    
    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function cadastrarItem() {
        $consulta = $this->pdo->prepare("SELECT * FROM pedido ORDER BY id_pedido DESC LIMIT 1");
        $consulta->execute();

        if ($consulta->rowCount() > 0) {
            $linha = $consulta->fetch(PDO::FETCH_OBJ);
            
            $this->setId_pedido($linha->id_pedido);
            try {               

                $consulta1 = $this->pdo->prepare("INSERT INTO item (id_produto, id_pedido, quantidade, solicitacao, preco) 
                    VALUES (:id_produto, :id_pedido, :quantidade, :solicitacao, :preco)"); 
                $consulta1->bindValue(":id_produto",$this->getId_produto());
                $consulta1->bindValue(":id_pedido",$this->getId_pedido());
                $consulta1->bindValue(":quantidade",$this->getQuantidade());
                $consulta1->bindValue(":solicitacao",$this->getSolicitacao());
                $consulta1->bindValue(":preco",$this->getPreco());
                $consulta1->execute();

            } catch (PDOException $e){
                echo "Erro: ".$e->getMessage();
                exit();
            }
        }
    }

    public function CarregarItens() {
        try {
            $consulta = $this->pdo->prepare("SELECT id_produto, quantidade, solicitacao, preco FROM item
                                              WHERE id_pedido = :id_pedido"); 

            $consulta->bindValue(":id_pedido",$this->getId_pedido());
            $consulta->execute();

            if ($consulta->rowCount() > 0) {
                $listaItems = array();
                $linha = $consulta->fetchAll(PDO::FETCH_OBJ);

                foreach ($linha as $listar) {
                    $item = new ItemModel(true);
                    $item->setId_Produto($listar->id_produto);
                    $item->setQuantidade($listar->quantidade);
                    $item->setSolicitacao($listar->solicitacao);
                    $item->setPreco($listar->preco);
                    array_push($listaItems, $item);            
                }

                return $listaItems;

            } else {
                return false;
            }

        } catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            exit();
        } 
    }

}