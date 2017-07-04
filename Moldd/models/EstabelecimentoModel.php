<?php
require_once 'models/UsuarioModel.php';
require_once 'lib/conexaoModel.php';

class EstabelecimentoModel extends ConexaoModel{

    private $id;
    private $email;
    private $senha;

    private $nome;
    private $telefone;
    private $tipo;
    private $cnpj;
    private $estado;
    private $endereco;
    private $numero;
    private $cep;
    private $complemento;
    private $frete;
    private $nomeRepresentante;
    private $emailRepresentante;
    private $telefoneRepresentante;
    private $estrelas;

    private $hora_inicio_dom;
    private $hora_encerramento_dom;

    private $hora_inicio_seg;
    private $hora_encerramento_seg;

    private $hora_inicio_ter;
    private $hora_encerramento_ter;

    private $hora_inicio_qua;
    private $hora_encerramento_qua;

    private $hora_inicio_qui;
    private $hora_encerramento_qui;

    private $hora_inicio_sex;
    private $hora_encerramento_sex;

    private $hora_inicio_sab;
    private $hora_encerramento_sab;

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

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getCep() {
        return $this->cep;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }    

    public function getFrete() {
        return $this->frete;
    }

    public function setFrete($frete) {
        $this->frete = $frete;
    }

    public function getNomeRepresentante() {
        return $this->nomeRepresentante;
    }

    public function setNomeRepresentante($nomeRepresentante) {
        $this->nomeRepresentante = $nomeRepresentante;
    }

    public function getEmailRepresentante() {
        return $this->emailRepresentante;
    }

    public function setEmailRepresentante($emailRepresentante) {
        $this->emailRepresentante = $emailRepresentante;
    }

    public function getTelefoneRepresentante() {
        return $this->telefoneRepresentante;
    }

    public function setTelefoneRepresentante($telefoneRepresentante) {
        $this->telefoneRepresentante = $telefoneRepresentante;
    }

    public function getEstrelas() {
        return $this->estrelas;
    }

    public function setEstrelas($estrelas) {
        $this->estrelas = $estrelas;
    }



    public function getHora_inicio_dom() {
        return $this->hora_inicio_dom;
    }

    public function setHora_inicio_dom($hora_inicio_dom) {
        $this->hora_inicio_dom = $hora_inicio_dom;
    }

    public function getHora_encerramento_dom() {
        return $this->hora_encerramento_dom;
    }

    public function setHora_encerramento_dom($hora_encerramento_dom) {
        $this->hora_encerramento_dom = $hora_encerramento_dom;
    }



    public function getHora_inicio_seg() {
        return $this->hora_inicio_seg;
    }

    public function setHora_inicio_seg($hora_inicio_seg) {
        $this->hora_inicio_seg = $hora_inicio_seg;
    }

    public function getHora_encerramento_seg() {
        return $this->hora_encerramento_seg;
    }

    public function setHora_encerramento_seg($hora_encerramento_seg) {
        $this->hora_encerramento_seg = $hora_encerramento_seg;
    }



    public function getHora_inicio_ter() {
        return $this->hora_inicio_ter;
    }

    public function setHora_inicio_ter($hora_inicio_ter) {
        $this->hora_inicio_ter = $hora_inicio_ter;
    }

    public function getHora_encerramento_ter() {
        return $this->hora_encerramento_ter;
    }

    public function setHora_encerramento_ter($hora_encerramento_ter) {
        $this->hora_encerramento_ter = $hora_encerramento_ter;
    }



    public function getHora_inicio_qua() {
        return $this->hora_inicio_qua;
    }

    public function setHora_inicio_qua($hora_inicio_qua) {
        $this->hora_inicio_qua = $hora_inicio_qua;
    }

    public function getHora_encerramento_qua() {
        return $this->hora_encerramento_qua;
    }

    public function setHora_encerramento_qua($hora_encerramento_qua) {
        $this->hora_encerramento_qua = $hora_encerramento_qua;
    }



    public function getHora_inicio_qui() {
        return $this->hora_inicio_qui;
    }

    public function setHora_inicio_qui($hora_inicio_qui) {
        $this->hora_inicio_qui = $hora_inicio_qui;
    }

    public function getHora_encerramento_qui() {
        return $this->hora_encerramento_qui;
    }

    public function setHora_encerramento_qui($hora_encerramento_qui) {
        $this->hora_encerramento_qui = $hora_encerramento_qui;
    }



    public function getHora_inicio_sex() {
        return $this->hora_inicio_sex;
    }

    public function setHora_inicio_sex($hora_inicio_sex) {
        $this->hora_inicio_sex = $hora_inicio_sex;
    }

    public function getHora_encerramento_sex() {
        return $this->hora_encerramento_sex;
    }

    public function setHora_encerramento_sex($hora_encerramento_sex) {
        $this->hora_encerramento_sex = $hora_encerramento_sex;
    }



    public function getHora_inicio_sab() {
        return $this->hora_inicio_sab;
    }

    public function setHora_inicio_sab($hora_inicio_sab) {
        $this->hora_inicio_sab = $hora_inicio_sab;
    }

    public function getHora_encerramento_sab() {
        return $this->hora_encerramento_sab;
    }

    public function setHora_encerramento_sab($hora_encerramento_sab) {
        $this->hora_encerramento_sab = $hora_encerramento_sab;
    }






    public function salvar() {
        try {

            $consulta = $this->pdo->prepare("SELECT * FROM usuario WHERE email LIKE :email");
            $consulta->bindValue(":email",$this->getEMail());
            $consulta->execute();

            if (!($consulta->rowCount() > 0)) {

                $consulta = $this->pdo->prepare("INSERT INTO usuario (email,senha) VALUES(:email,:senha)"); 
                $consulta->bindValue(":email",$this->getEMail());
                $consulta->bindValue(":senha",$this->getSenha());
                $consulta->execute();



                $consulta1 = $this->pdo->prepare("SELECT * FROM usuario WHERE email LIKE :email");
                $consulta1->bindValue(":email",$this->getEMail());
                $consulta1->execute();


                if ($consulta1->rowCount() > 0) {
                    $linha = $consulta1->fetchAll(PDO::FETCH_OBJ);
                    foreach ($linha as $listar) {
                            //salva o id_usuario do e-mail na variavel id desta calsse
                        $this->setId($listar->id_usuario);              
                    }
                }

                $consulta2 = $this->pdo->prepare( "INSERT INTO  estabelecimento (
                                                                id_estabelecimento, 
                                                                nome, 
                                                                telefone, 
                                                                tipo, 
                                                                cnpj, 
                                                                estado, 
                                                                endereco, 
                                                                numero, 
                                                                cep, 
                                                                complemento, 
                                                                frete, 
                                                                nome_representante, 
                                                                email_representante, 
                                                                telefone_representante, 

                                                                hora_inicio_dom,
                                                                hora_encerramento_dom,

                                                                hora_inicio_seg,
                                                                hora_encerramento_seg,

                                                                hora_inicio_ter,
                                                                hora_encerramento_ter,

                                                                hora_inicio_qua,
                                                                hora_encerramento_qua,

                                                                hora_inicio_qui,
                                                                hora_encerramento_qui,

                                                                hora_inicio_sex,
                                                                hora_encerramento_sex,

                                                                hora_inicio_sab,
                                                                hora_encerramento_sab ) 

                                                       VALUES  (
                                                               :id_estabelecimento, 
                                                               :nome, 
                                                               :telefone, 
                                                               :tipo, 
                                                               :cnpj, 
                                                               :estado,
                                                               :endereco, 
                                                               :numero, 
                                                               :cep, 
                                                               :complemento, 
                                                               :frete, 
                                                               :nome_representante, 
                                                               :email_representante,
                                                               :telefone_representante, 

                                                               :hora_inicio_dom,
                                                               :hora_encerramento_dom,

                                                               :hora_inicio_seg,
                                                               :hora_encerramento_seg,

                                                               :hora_inicio_ter,
                                                               :hora_encerramento_ter,

                                                               :hora_inicio_qua,
                                                               :hora_encerramento_qua,

                                                               :hora_inicio_qui,
                                                               :hora_encerramento_qui,

                                                               :hora_inicio_sex,
                                                               :hora_encerramento_sex,

                                                               :hora_inicio_sab,
                                                               :hora_encerramento_sab ) 
                                                ");

                $consulta2->bindValue(":id_estabelecimento",$this->getId());
                $consulta2->bindValue(":nome",$this->getNome());
                $consulta2->bindValue(":telefone",$this->getTelefone());
                $consulta2->bindValue(":tipo",$this->getTipo());
                $consulta2->bindValue(":cnpj",$this->getCnpj());
                $consulta2->bindValue(":estado",$this->getEstado());
                $consulta2->bindValue(":endereco",$this->getEndereco());
                $consulta2->bindValue(":numero",$this->getNumero());
                $consulta2->bindValue(":cep",$this->getCep());
                $consulta2->bindValue(":complemento",$this->getComplemento());
                $consulta2->bindValue(":frete",$this->getFrete());
                $consulta2->bindValue(":nome_representante",$this->getNomeRepresentante());
                $consulta2->bindValue(":email_representante",$this->getEmailRepresentante());
                $consulta2->bindValue(":telefone_representante",$this->getTelefoneRepresentante());


                $consulta2->bindValue(":hora_inicio_dom",$this->getHora_inicio_dom());
                $consulta2->bindValue(":hora_encerramento_dom",$this->getHora_encerramento_dom());

                $consulta2->bindValue(":hora_inicio_seg",$this->getHora_inicio_seg());
                $consulta2->bindValue(":hora_encerramento_seg",$this->getHora_encerramento_seg());

                $consulta2->bindValue(":hora_inicio_ter",$this->getHora_inicio_ter());
                $consulta2->bindValue(":hora_encerramento_ter",$this->getHora_encerramento_ter());

                $consulta2->bindValue(":hora_inicio_qua",$this->getHora_inicio_qua());
                $consulta2->bindValue(":hora_encerramento_qua",$this->getHora_encerramento_qua());

                $consulta2->bindValue(":hora_inicio_qui",$this->getHora_inicio_qui());
                $consulta2->bindValue(":hora_encerramento_qui",$this->getHora_encerramento_qui());

                $consulta2->bindValue(":hora_inicio_sex",$this->getHora_inicio_sex());
                $consulta2->bindValue(":hora_encerramento_sex",$this->getHora_encerramento_sex());

                $consulta2->bindValue(":hora_inicio_sab",$this->getHora_inicio_sab());
                $consulta2->bindValue(":hora_encerramento_sab",$this->getHora_encerramento_sab());

                $consulta2->execute();

                return true;
            } else {
                return false;
            }

        } catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            exit();
        }
        

        
    }

    public function TotalfiltrarEstabelecimentos() {

        $where = Array();

        $estrelas = isset( $_POST[ 'estrelas' ] ) && $_POST[ 'estrelas' ] != "qualquer"? ":estrelas" : null;
        $tipo = isset( $_POST[ 'tipo' ] ) && $_POST[ 'tipo' ] != "qualquer"? ":tipo" : null;
        $nome = $_POST[ 'nome' ] != false? $_POST[ 'nome' ] : null;

        if( $estrelas ){ $where[] = "A.ESTRELAS = $estrelas"; }
        if( $tipo ){ $where[] = "`tipo` = $tipo"; }
        if( $nome ){ $where[] = "`nome` like '%".$nome."%'"; }

        $sql = "SELECT *
                  FROM (SELECT ESTAB.*,
                               ROUND(AVG(NUM_ESTRELAS))  AS ESTRELAS

                          FROM ESTABELECIMENTO ESTAB,
                               ESTRELAS ESTRE

                         WHERE ESTAB.ID_ESTABELECIMENTO = ESTRE.ID_ESTABELECIMENTO  

                         GROUP BY 
                               ID_ESTABELECIMENTO) A";

        if( sizeof( $where ) ) {
            $sql .= ' WHERE '.implode( ' AND ',$where );
        }

        try {

            $consulta = $this->pdo->prepare($sql); 

            if (isset($estrelas)) {$consulta->bindValue(":estrelas",$_POST[ 'estrelas' ]);}
            if (isset($tipo)) {$consulta->bindValue(":tipo",$_POST[ 'tipo' ]);}

            $consulta->execute();

        } catch(PDOException $e) {
            echo "Erro: ".$e->getMessage();
            exit();
        }

        if ($consulta->rowCount() > 0) {           

            return $consulta->rowCount();

        } else {

            return false;

        }
    }

    public function filtrarPorPagEstabelecimentos( $total ) {

        $pagina = (isset($_POST['pagina']))? $_POST['pagina'] : 1;

        $numResulPorPag = 5;

        $numPaginas = ceil($total/$numResulPorPag);

        $offset = ($numResulPorPag*$pagina)-$numResulPorPag;

        $where = Array();

        $estrelas = isset( $_POST[ 'estrelas' ] ) && $_POST[ 'estrelas' ] != "qualquer"? ":estrelas" : null;
        $tipo = isset( $_POST[ 'tipo' ] ) && $_POST[ 'tipo' ] != "qualquer"? ":tipo" : null;
        $nome = $_POST[ 'nome' ] != false? $_POST[ 'nome' ] : null;

        if( $estrelas ){ $where[] = "A.ESTRELAS = $estrelas"; }
        if( $tipo ){ $where[] = "`tipo` = $tipo"; }
        if( $nome ){ $where[] = "`nome` like '%".$nome."%'"; }

        $sql = "SELECT *
                  FROM (SELECT ESTAB.*,
                               ROUND(AVG(NUM_ESTRELAS))  AS ESTRELAS

                          FROM ESTABELECIMENTO ESTAB,
                               ESTRELAS ESTRE
                         

                         WHERE ESTAB.ID_ESTABELECIMENTO = ESTRE.ID_ESTABELECIMENTO



                         GROUP BY 
                               ID_ESTABELECIMENTO                         

                        ) A ";


        if( sizeof( $where ) ) {
            $sql .= ' WHERE '.implode( ' AND ',$where );
        }

        $sql .= " LIMIT ".$numResulPorPag."
                        OFFSET ".$offset;



        try {

            $consulta = $this->pdo->prepare($sql); 

            if (isset($estrelas)) {$consulta->bindValue(":estrelas",intval($_POST[ 'estrelas' ]));}
            if (isset($tipo)) {$consulta->bindValue(":tipo",$_POST[ 'tipo' ]);}
            $consulta->execute();

        } catch(PDOException $e) {
            echo "Erro: ".$e->getMessage();
            exit();
        }



        if ($consulta->rowCount() > 0) {

            $listaEstabelecimentos = array();
            $linha = $consulta->fetchAll(PDO::FETCH_OBJ);

            foreach ($linha as $listar) {



            //salva o id_usuario do e-mail na variavel id desta calsse
                $estabelecimento = array(
                    "id" => $listar->id_estabelecimento,
                    "nome" => $listar->nome,
                    "telefone" => $listar->telefone,
                    "tipo" => $listar->tipo,
                    "estado" => $listar->estado,
                    "endereco" => $listar->endereco,
                    "numero" => $listar->numero,
                    "cep" => $listar->cep,
                    "complemento" => $listar->complemento,
                    "frete" => $listar->frete,                   
                    "estrelas" => $listar->ESTRELAS,

                    "existe" => file_exists("views/imagem-Perfil/imagem-Perfil-Estabelecimento/perfil-estabelecimento-". $listar->id_estabelecimento .".png")                  
                );

                array_push($listaEstabelecimentos, $estabelecimento);            
            }

            return array('numPaginas'             => $numPaginas,
                         'listaEstabelecimentos'  => $listaEstabelecimentos,
                         'pagina'                 => $pagina,
                         'nome'                   => $_POST[ 'nome' ],
                         'estrelas'               => $_POST[ 'estrelas' ], 
                         'tipo'                   => $_POST[ 'tipo' ],
                         'total'                  => $total
                          );
            
        } else {

            return false;

        }
    }

    public function adquirirInfo($idEsta) {
        if ($_SESSION['tipo'] == "E") {
            $this->setId($_SESSION['usuario']);
        } else {
          $this->setId($idEsta);
        }

        $consultaInfo = $this->pdo->prepare("SELECT * FROM usuario WHERE id_usuario = :id");
        $consultaInfo->bindValue(":id",$this->getId());
        $consultaInfo->execute();

        if ($consultaInfo->rowCount() > 0) {
            $linha = $consultaInfo->fetch(PDO::FETCH_OBJ);
            
            $usuario = new UsuarioModel(true);
            $usuario->setEmail($linha->email);


            $consultaInfo1 = $this->pdo->prepare("SELECT * FROM estabelecimento WHERE id_estabelecimento = :id");
            $consultaInfo1->bindValue(":id",$this->getId());
            $consultaInfo1->execute();


            if ($consultaInfo1->rowCount() > 0) {

                $consultaInfo2 = $this->pdo->prepare("SELECT AVG(NUM_ESTRELAS)  AS ESTRELAS

                                                        FROM ESTRELAS ESTRE

                                                       WHERE ID_ESTABELECIMENTO = :id
                                                    ");

                $consultaInfo2->bindValue(":id",$this->getId());
                $consultaInfo2->execute();

                $linha2 = $consultaInfo1->fetch(PDO::FETCH_OBJ);

                $linha3 = $consultaInfo2->fetch(PDO::FETCH_OBJ);
                
                $estabelecimento = new EstabelecimentoModel(true);

                $estabelecimento->setId($linha2->id_estabelecimento);
                $estabelecimento->setNome($linha2->nome);
                $estabelecimento->setTelefone($linha2->telefone);
                $estabelecimento->setTipo($linha2->tipo);
                $estabelecimento->setCnpj($linha2->cnpj);
                $estabelecimento->setEstado($linha2->estado);
                $estabelecimento->setEndereco($linha2->endereco);
                $estabelecimento->setNumero($linha2->numero);
                $estabelecimento->setCep($linha2->cep);
                $estabelecimento->setComplemento($linha2->complemento);
                $estabelecimento->setFrete($linha2->frete);
                $estabelecimento->setNomeRepresentante($linha2->nome_representante);
                $estabelecimento->setEmailRepresentante($linha2->email_representante);
                $estabelecimento->setTelefoneRepresentante($linha2->telefone_representante);
                $estabelecimento->setEstrelas($linha3->ESTRELAS);

                $estabelecimento->setHora_inicio_dom($linha2->hora_inicio_dom);
                $estabelecimento->setHora_encerramento_dom($linha2->hora_encerramento_dom);

                $estabelecimento->setHora_inicio_seg($linha2->hora_inicio_seg);
                $estabelecimento->setHora_encerramento_seg($linha2->hora_encerramento_seg);

                $estabelecimento->setHora_inicio_ter($linha2->hora_inicio_ter);
                $estabelecimento->setHora_encerramento_ter($linha2->hora_encerramento_ter);

                $estabelecimento->setHora_inicio_qua($linha2->hora_inicio_qua);
                $estabelecimento->setHora_encerramento_qua($linha2->hora_encerramento_qua);

                $estabelecimento->setHora_inicio_qui($linha2->hora_inicio_qui);
                $estabelecimento->setHora_encerramento_qui($linha2->hora_encerramento_qui);

                $estabelecimento->setHora_inicio_sex($linha2->hora_inicio_sex);
                $estabelecimento->setHora_encerramento_sex($linha2->hora_encerramento_sex);

                $estabelecimento->setHora_inicio_sab($linha2->hora_inicio_sab);
                $estabelecimento->setHora_encerramento_sab($linha2->hora_encerramento_sab);


                $Infos = Array("usuario" => $usuario , "estabelecimento" => $estabelecimento);

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

            $consulta1 = $this->pdo->prepare(   "UPDATE estabelecimento SET 
                                                        nome = :nome, 
                                                        telefone = :telefone, 
                                                        tipo = :tipo, 
                                                        cnpj = :cnpj, 
                                                        estado = :estado, 
                                                        endereco = :endereco, 
                                                        numero = :numero, 
                                                        cep = :cep, 
                                                        complemento = :complemento, 
                                                        frete = :frete,  
                                                        nome_representante = :nome_representante, 
                                                        email_representante = :email_representante,
                                                        telefone_representante = :telefone_representante,

                                                        hora_inicio_dom = :hora_inicio_dom,
                                                        hora_encerramento_dom = :hora_encerramento_dom,

                                                        hora_inicio_seg = :hora_inicio_seg,
                                                        hora_encerramento_seg = :hora_encerramento_seg,

                                                        hora_inicio_ter = :hora_inicio_ter,
                                                        hora_encerramento_ter = :hora_encerramento_ter,

                                                        hora_inicio_qua = :hora_inicio_qua,
                                                        hora_encerramento_qua = :hora_encerramento_qua,

                                                        hora_inicio_qui = :hora_inicio_qui,
                                                        hora_encerramento_qui = :hora_encerramento_qui,

                                                        hora_inicio_sex = :hora_inicio_sex,
                                                        hora_encerramento_sex = :hora_encerramento_sex,

                                                        hora_inicio_sab = :hora_inicio_sab,
                                                        hora_encerramento_sab = :hora_encerramento_sab


                                                  WHERE id_estabelecimento = :id_estabelecimento");

            $consulta1->bindValue(":id_estabelecimento",$this->getId());
            $consulta1->bindValue(":nome",$this->getNome());
            $consulta1->bindValue(":telefone",$this->getTelefone());
            $consulta1->bindValue(":tipo",$this->getTipo());
            $consulta1->bindValue(":cnpj",$this->getCnpj());
            $consulta1->bindValue(":estado",$this->getEstado());
            $consulta1->bindValue(":endereco",$this->getEndereco());
            $consulta1->bindValue(":numero",$this->getNumero());
            $consulta1->bindValue(":cep",$this->getCep());
            $consulta1->bindValue(":complemento",$this->getComplemento());
            $consulta1->bindValue(":frete",$this->getFrete());
            $consulta1->bindValue(":nome_representante",$this->getNomeRepresentante());
            $consulta1->bindValue(":email_representante",$this->getEmailRepresentante());
            $consulta1->bindValue(":telefone_representante",$this->getTelefoneRepresentante());            

            $consulta1->bindValue(":hora_inicio_dom",$this->getHora_inicio_dom());
            $consulta1->bindValue(":hora_encerramento_dom",$this->getHora_encerramento_dom());

            $consulta1->bindValue(":hora_inicio_seg",$this->getHora_inicio_seg());
            $consulta1->bindValue(":hora_encerramento_seg",$this->getHora_encerramento_seg());

            $consulta1->bindValue(":hora_inicio_ter",$this->getHora_inicio_ter());
            $consulta1->bindValue(":hora_encerramento_ter",$this->getHora_encerramento_ter());

            $consulta1->bindValue(":hora_inicio_qua",$this->getHora_inicio_qua());
            $consulta1->bindValue(":hora_encerramento_qua",$this->getHora_encerramento_qua());

            $consulta1->bindValue(":hora_inicio_qui",$this->getHora_inicio_qui());
            $consulta1->bindValue(":hora_encerramento_qui",$this->getHora_encerramento_qui());

            $consulta1->bindValue(":hora_inicio_sex",$this->getHora_inicio_sex());
            $consulta1->bindValue(":hora_encerramento_sex",$this->getHora_encerramento_sex());

            $consulta1->bindValue(":hora_inicio_sab",$this->getHora_inicio_sab());
            $consulta1->bindValue(":hora_encerramento_sab",$this->getHora_encerramento_sab());

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

    public function carregarEstabelecimentosRecentes() {
        
        $consulta = $this->pdo->prepare("  SELECT estab.id_estabelecimento,
                                                  estab.cep,
                                                  estab.endereco,
                                                  estab.numero,
                                                  estab.nome 

                                             FROM pedido           AS pedid,        
                                                  estabelecimento AS estab
                                                
                                            WHERE estab.id_estabelecimento = pedid.id_estabelecimento
                                              AND pedid.id_cliente = :id
                                         ORDER BY pedid.data_realizacao DESC
                                            LIMIT 5

                                        ");

        
        $consulta->bindValue(":id",$this->getId()); // Este id é do cliente
        $consulta->execute();


        if ($consulta->rowCount() > 0) {

            $listaEstabelecimentos = array();

            $linhaEstab = $consulta->fetchAll(PDO::FETCH_OBJ);

            foreach ($linhaEstab as $linha) {

                $estabelecimento = new EstabelecimentoModel(true);

                $estabelecimento->setId($linha->id_estabelecimento);
                $estabelecimento->setNome($linha->nome);
                $estabelecimento->setEndereco($linha->endereco);
                $estabelecimento->setNumero($linha->numero);
                $estabelecimento->setCep($linha->cep);

                array_push($listaEstabelecimentos, $estabelecimento);

            }              

            return $listaEstabelecimentos;

        } else {
            return false;
        }

    }

    public function obterHorarioDia($dia) {

        if ( $dia == 0 ) {

            $diaAbre = "dom";

        }


        if ( $dia == 1 ) {

            $diaAbre = "seg";

        }


        if ( $dia == 2 ) {

            $diaAbre = "ter";

        }


        if ( $dia == 3 ) {

            $diaAbre = "qua";

        }


        if ( $dia == 4 ) {

            $diaAbre = "qui";

        }


        if ( $dia == 5 ) {

            $diaAbre = "sex";

        }


        if ( $dia == 6 ) {

            $diaAbre = "sab";

        }
        
        $consulta = $this->pdo->prepare("  SELECT estab.hora_inicio_" . $diaAbre . ",
                                                  estab.hora_encerramento_" . $diaAbre . "

                                             FROM estabelecimento AS estab
                                                
                                            WHERE estab.id_estabelecimento = :id

                                        ");

        
        $consulta->bindValue(":id",$this->getId());
        $consulta->execute();


        if ($consulta->rowCount() > 0) {

            $linha = $consulta->fetch(PDO::FETCH_OBJ);

            $listaEstabelecimentoEspecifico = array();


            if ( $dia == 0 ) {

                $listaEstabelecimentoEspecifico['hora_inicio'] = $linha->hora_inicio_dom;
                $listaEstabelecimentoEspecifico['hora_encerramento'] = $linha->hora_encerramento_dom;

            }


            if ( $dia == 1 ) {

                $listaEstabelecimentoEspecifico['hora_inicio'] = $linha->hora_inicio_seg;
                $listaEstabelecimentoEspecifico['hora_encerramento'] = $linha->hora_encerramento_seg;

            }


            if ( $dia == 2 ) {

                $listaEstabelecimentoEspecifico['hora_inicio'] = $linha->hora_inicio_ter;
                $listaEstabelecimentoEspecifico['hora_encerramento'] = $linha->hora_encerramento_ter;

            }


            if ( $dia == 3 ) {

                $listaEstabelecimentoEspecifico['hora_inicio'] = $linha->hora_inicio_qua;
                $listaEstabelecimentoEspecifico['hora_encerramento'] = $linha->hora_encerramento_qua;

            }


            if ( $dia == 4 ) {

                $listaEstabelecimentoEspecifico['hora_inicio'] = $linha->hora_inicio_qui;
                $listaEstabelecimentoEspecifico['hora_encerramento'] = $linha->hora_encerramento_qui;

            }


            if ( $dia == 5 ) {

                $listaEstabelecimentoEspecifico['hora_inicio'] = $linha->hora_inicio_sex;
                $listaEstabelecimentoEspecifico['hora_encerramento'] = $linha->hora_encerramento_sex;

            }


            if ( $dia == 6 ) {

                $listaEstabelecimentoEspecifico['hora_inicio'] = $linha->hora_inicio_sab;
                $listaEstabelecimentoEspecifico['hora_encerramento'] = $linha->hora_encerramento_sab;

            }
            

            return $listaEstabelecimentoEspecifico;

        } else {
            return false;
        }

    }

}
?>