<?php
require_once 'models/UsuarioModel.php';
require_once 'lib/conexaoModel.php';

class ClienteModel extends ConexaoModel{

    private $id;
    private $email;
    private $senha;

    private $nome;
    private $telefone;

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

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function salvar() {
        try {

           $consulta = $this->pdo->prepare("SELECT * FROM usuario WHERE email LIKE :email");
           $consulta->bindValue(":email",$this->getEMail());
           $consulta->execute();

           if (!($consulta->rowCount() > 0)) {

               $consulta1 = $this->pdo->prepare("INSERT INTO usuario (email,senha) VALUES(:email,:senha)"); 
               $consulta1->bindValue(":email",$this->getEMail());
               $consulta1->bindValue(":senha",$this->getSenha());
               $consulta1->execute();



               $consulta2 = $this->pdo->prepare("SELECT * FROM usuario WHERE email LIKE :email");
               $consulta2->bindValue(":email",$this->getEMail());
               $consulta2->execute();


               if ($consulta2->rowCount() > 0) {
                   $linha = $consulta2->fetchAll(PDO::FETCH_OBJ);
                   foreach ($linha as $listar) {
	                        //salva o id_usuario do e-mail na variavel id desta calsse
                       $this->setId($listar->id_usuario);              
                   }

               }



               $consulta3 = $this->pdo->prepare("INSERT INTO cliente (id_cliente, nome, telefone)		
                   VALUES(:id_cliente, :nome,:telefone)");

               $consulta3->bindValue(":nome",$this->getNome());
               $consulta3->bindValue(":telefone",$this->getTelefone());
               $consulta3->bindValue(":id_cliente",$this->getId());
               $consulta3->execute();

               return true;
           } else {
              return false;
          }

      } catch (PDOException $e){
        echo "Erro: ".$e->getMessage();
        exit();
    }
        

    }


    public function adquirirInfo($idCli) {
        if($idCli == false) {
            $this->setId($_SESSION['usuario']);
        } else {
          $this->setId($idCli);
        }
        $consultaInfo = $this->pdo->prepare("SELECT * FROM usuario WHERE id_usuario = :id");
        $consultaInfo->bindValue(":id",$this->getId());
        $consultaInfo->execute();



        if ($consultaInfo->rowCount() > 0) {
            $linha = $consultaInfo->fetch(PDO::FETCH_OBJ);
            
            $usuario = new UsuarioModel(true);
            $usuario->setEmail($linha->email);


            $consultaInfo1 = $this->pdo->prepare("SELECT * FROM cliente WHERE id_cliente = :id");
            $consultaInfo1->bindValue(":id",$this->getId());
            $consultaInfo1->execute();


            if ($consultaInfo1->rowCount() > 0) {

                $linha2 = $consultaInfo1->fetch(PDO::FETCH_OBJ);

                
                $cliente = new ClienteModel(true);
                $cliente->setNome($linha2->nome);
                $cliente->setId($linha2->id_cliente);
                $cliente->setTelefone($linha2->telefone);

                $Infos = Array("usuario" => $usuario , "cliente" => $cliente);

                return $Infos;

            } else {
                return false;
            }

        } else {
            return false;
        }
        
    }

    public function verificarSenha($senha) {
        $this->setId($_SESSION['usuario']);
        $consultaInfo1 = $this->pdo->prepare("SELECT senha FROM usuario WHERE id_usuario = :id");
        $consultaInfo1->bindValue(":id",$this->getId());
        $consultaInfo1->execute();

        if ($consultaInfo1->rowCount() > 0) {

            $linha = $consultaInfo1->fetch(PDO::FETCH_OBJ);



            if ($linha->senha == $senha) {
                return true;

            } else {
                return false;
            }

        } else {
            return false;
        }

    }

    public function manterAlteracoes() {
        try {
            $consulta = $this->pdo->prepare("UPDATE usuario SET email = :email WHERE id_usuario = :id"); 
            $consulta->bindValue(":email",$this->getEMail());
            $consulta->bindValue(":id",$this->getId());
            $consulta->execute();

            $consulta1 = $this->pdo->prepare("UPDATE cliente SET nome = :nome, telefone = :telefone
                WHERE id_cliente = :id");

            $consulta1->bindValue(":nome",$this->getNome());
            $consulta1->bindValue(":telefone",$this->getTelefone());
            $consulta1->bindValue(":id",$this->getId());
            $consulta1->execute();

            return true;

        } catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            exit();
        }
    }

    public function salvarSenha() {
        try {
            $consulta = $this->pdo->prepare("UPDATE usuario SET senha = :senha WHERE id_usuario = :id"); 
            $consulta->bindValue(":senha",$this->getSenha());
            $consulta->bindValue(":id",$this->getId());
            $consulta->execute();          

            return true;

        } catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            exit();
        }
    }
    

}