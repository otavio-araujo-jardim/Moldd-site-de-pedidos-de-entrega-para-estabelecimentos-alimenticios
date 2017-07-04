<?php
require_once 'lib/conexaoModel.php';

class ProdutoModel extends ConexaoModel{

    private $id;
    private $nome;
    private $preco;
    private $id_estabelecimento;
    private $ativo;

    function __construct() {
        parent::__construct();
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

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setpreco($preco) {
        $this->preco = $preco;
    }

    public function getId_estabelecimento() {
        return $this->id_estabelecimento;
    }

    public function setid_estabelecimento($id_estabelecimento) {
        $this->id_estabelecimento = $id_estabelecimento;
    }

    public function getAtivo() {
        return $this->ativo;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }




    public function carregarProdutos($ativos) {

        if (isset($_REQUEST['id']) || isset($_SESSION['usuario'])) {

            if (isset($_REQUEST['id'])) {
                $this->setId_estabelecimento($_REQUEST['id']); 

            } else if (isset($_SESSION['usuario'])) { 
                $this->setId_estabelecimento($_SESSION['usuario']);

            }

            $sql = "SELECT `id_produto`,`nome`,`preco`,`ativo` 
                      FROM `produto` 
                     WHERE `id_estabelecimento` = :id 
                       AND `excluido` = 0";
            
            if ($ativos == true) {
                $sql .=  " AND ativo = true";
            }

            $produtos = $this->pdo->prepare($sql);
            $produtos->bindValue(":id",$this->getId_estabelecimento());
            $produtos->execute();



            if ($produtos->rowCount() > 0) {
                $listaProdutos = array();
                $linhaPro = $produtos->fetchAll(PDO::FETCH_OBJ);

                foreach ($linhaPro as $linha) {

                    $produto = new produtoModel(true);
                    $produto->setId($linha->id_produto);
                    $produto->setNome($linha->nome);
                    $produto->setPreco($linha->preco);
                    $produto->setAtivo($linha->ativo);

                    array_push($listaProdutos, $produto);
                }              

                return $listaProdutos;

            } else {
                return false;
            }
        }

    }

    public function carregarItemProduto($idItemPro) {

        if (isset($idItemPro)) {
            $this->setId($idItemPro);

            $produtos = $this->pdo->prepare("SELECT `id_produto`,`nome`,`preco` FROM `produto` WHERE `id_produto` = :id");
            $produtos->bindValue(":id",$this->getId());
            $produtos->execute();

            if ($produtos->rowCount() > 0) {
                $linhaPro = $produtos->fetch(PDO::FETCH_OBJ);

                $produto = new produtoModel(true);
                $produto->setId($linhaPro->id_produto);
                $produto->setNome($linhaPro->nome);
                $produto->setPreco($linhaPro->preco);

                return $produto;

            } else {
                return false;
            }
        }
    }

    public function salvar() {
        try {               

                $consulta1 = $this->pdo->prepare("INSERT INTO produto (nome, preco, id_estabelecimento) 
                VALUES(:nome, :preco, :id_estabelecimento)");
                $consulta1->bindValue(":nome",$this->getNome());
                $consulta1->bindValue(":preco",$this->getPreco());
                $consulta1->bindValue(":id_estabelecimento",$this->getId_estabelecimento());
                $consulta1->execute();

            } catch (PDOException $e){
                echo "Erro: ".$e->getMessage();
                exit();
            }
    }

    public function excluir() {
            try {              

                $consulta = $this->pdo->prepare("SELECT COUNT(*) FROM item WHERE id_produto = :id_produto");
                $consulta->bindValue(":id_produto",$this->getId());
                $consulta->execute();

                if ($consulta->fetchColumn() > 0) {

                    $consulta1 = $this->pdo->prepare("UPDATE produto SET  excluido = true WHERE id_Produto = :id_produto");
                    $consulta1->bindValue(":id_produto",$this->getId());
                    $consulta1->execute();

                } else {

                    $consulta1 = $this->pdo->prepare("DELETE FROM produto WHERE id_produto = :id_produto");
                    $consulta1->bindValue(":id_produto",$this->getId());
                    $consulta1->execute();

                }

            } catch (PDOException $e){
                echo "Erro: ".$e->getMessage();
                exit();
            }
    }

    public function alterarCardapio() {
        try {               

            $consulta1 = $this->pdo->prepare("UPDATE produto SET  ativo = :ativo WHERE id_Produto = :id_produto");
            $consulta1->bindValue(":id_produto",$this->getId());
            $consulta1->bindValue(":ativo",$this->getAtivo());
            $consulta1->execute();

        } catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            exit();
        }
    }

    public function obterId($value='') {
        try {               

            $produto = $this->pdo->prepare("SELECT id_produto FROM produto ORDER BY id_produto DESC LIMIT 1");
            $produto->execute();

            if ($produto->rowCount() > 0) {
                $linhaPro = $produto->fetch(PDO::FETCH_OBJ);


                return $linhaPro->id_produto;

            } else {
                return false;
            }

        } catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            exit();
        }
    }
}
?>