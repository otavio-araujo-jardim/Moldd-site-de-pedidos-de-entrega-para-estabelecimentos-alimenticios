<?php
require_once 'lib/conexaoModel.php';

class ComentarioModel extends ConexaoModel {

	private $id;
	private $texto;
	private $id_estabelecimento;
    private $id_cliente;	

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

    public function getTexto() {
        return $this->texto;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }

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

    public function carregarComentarios($id, $cliente) {
        try {
            
            $sql  = "SELECT cli.id_cliente, 
                            cli.nome, 
                            com.id_comentario, 
                            com.texto,
                            est.nome AS nome_estabelecimento,
                            est.id_estabelecimento
                               
                       FROM cliente         cli, 
                            comentario      com,
                            estabelecimento est
                               
                      WHERE cli.id_cliente = com.id_cliente
                        AND est.id_estabelecimento = com.id_estabelecimento 
                    ";

            if ($cliente) {
                $sql .= " AND com.id_cliente = :id";
            } else {
                $sql .= " AND com.id_estabelecimento = :id";
            }



            $consulta = $this->pdo->prepare($sql);

            $consulta->bindValue(":id",$id);
            $consulta->execute();

            if ($consulta->rowCount() > 0) {
                $listaComentarios = array();
                $linha = $consulta->fetchAll(PDO::FETCH_OBJ);

                if ($cliente) {
                    foreach ($linha as $listar) {

                        $existe;  
                        
                        if (file_exists('views/imagem-Perfil/imagem-Perfil-Cliente/perfil-cliente-'.$listar->id_cliente.'.png')) { 

                            $existe = true;

                        } else { 

                            $existe = false;

                        }                    

                        $comentario = array(
                            "id_comentario"           => $listar->id_comentario,
                            "id_cliente"              => $listar->id_cliente,
                            "nome_estabelecimento"    => $listar->nome_estabelecimento,
                            "id_estabelecimento"      => $listar->id_estabelecimento,
                            "nome"                    => $listar->nome,
                            "texto"                   => $listar->texto,
                            "imgExiste"               => $existe
                        );
                        array_push($listaComentarios, $comentario);            
                    }

                } else {

                    foreach ($linha as $listar) {

                        $existe;

                        if (file_exists('views/imagem-Perfil/imagem-Perfil-Estabelecimento/perfil-estabelecimento-'.$listar->id_estabelecimento.'.png')) { 

                            $existe = true;

                        } else { 

                            $existe = false;

                        }

                        $comentario = array(
                            "id_comentario" => $listar->id_comentario,
                            "id_cliente"    => $listar->id_cliente,
                            "nome"          => $listar->nome,
                            "texto"         => $listar->texto,
                            "imgExiste"     => $existe
                        );
                        array_push($listaComentarios, $comentario);
                    }

                }

                return $listaComentarios;

            } else {
                return false;
            }

        } catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            exit();
        }
    }

    public function salvar() {
        try {               

            $consulta1 = $this->pdo->prepare("INSERT INTO comentario (texto, id_cliente, id_estabelecimento) 
                VALUES(:texto, :id_cliente, :id_estabelecimento)");

            $consulta1->bindValue(":texto",$this->getTexto());
            $consulta1->bindValue(":id_cliente",$this->getId_cliente());
            $consulta1->bindValue(":id_estabelecimento",$this->getId_estabelecimento());
            $consulta1->execute();

        } catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            exit();
        }

        $listaComentarios = $this->carregarComentarios($this->getId_estabelecimento(), false);

        return $listaComentarios;
    }

    public function excluir() {

        try {
            
            $consulta1 = $this->pdo->prepare("DELETE FROM comentario WHERE id_comentario = :id");
        
            $consulta1->bindValue(":id",$this->getId());

            $consulta1->execute();

        } catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            exit();
        }
    }

}
?>