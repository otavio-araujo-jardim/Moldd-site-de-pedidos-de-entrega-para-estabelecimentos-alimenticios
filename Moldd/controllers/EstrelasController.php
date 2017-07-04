<?php
require_once 'models/EstrelasModel.php';

class EstrelasController {
    
	public function salvarVotoAction() {

		$estrelas = new EstrelasModel();
		$estrelas->setId_cliente($_SESSION['usuario']);
		$estrelas->setId_estabelecimento($_POST['id']);
		$estrelas->setNum_estrelas($_POST['estrelas']);
        $estrelas->salvarVoto();

		$media = $estrelas->obterMediaEstrelas();
		

        if ($media) {

        	echo round($media);

        }
	}

	public function carregarMediaEstrelas() {
		
		$estrelas = new EstrelasModel();
		$retorno->$estrelas->obterEstrelas();

		if ($retorno) {

        	echo $retorno;

        }

	}

}

?>