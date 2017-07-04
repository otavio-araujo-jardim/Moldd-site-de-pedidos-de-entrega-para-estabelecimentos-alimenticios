<?php
class conexaoModel {
    private $host = "localhost";
    private $dbnome = "dbtccV5";
    private $usuario = "root";
    private $senha = "";

    protected $pdo;

    public function __construct() {
       
        try{
            $this->pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->dbnome,$this->usuario,$this->senha);
            $this->pdo->setAttribute ( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );
            $this->pdo->exec('SET NAMES utf8');

        }catch(PDOException $e){           

        }
        
    }

}
?>