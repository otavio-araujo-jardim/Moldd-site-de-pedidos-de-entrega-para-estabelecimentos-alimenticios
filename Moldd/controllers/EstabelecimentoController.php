<?php

require_once 'models/UsuarioModel.php';
require_once 'models/EstabelecimentoModel.php';
require_once 'models/ProdutoModel.php';
require_once 'models/ComentarioModel.php';
require_once 'models/EnderecoModel.php';
require_once 'models/EstrelasModel.php';

class EstabelecimentoController {

	public function pagInicioAction() {
		$view = new view('views/inicioEstabelecimento.php');
	    $view->mostrarConteudo();
	}

    public function pagCadastrarAction () {
            //redirecionando para a pagina de cadastro de estabelecimento
            $view = new view('views/cadastroEstabelecimento.php');
            $view->mostrarConteudo();

    }

    public function pagCardapioAction () {
    		$estabelecimento = new EstabelecimentoModel();
			$infos = $estabelecimento->adquirirInfo($_REQUEST['id']);

			$estabelecimento->setId($_SESSION['usuario']);
			$listaEstabelecimento = $estabelecimento->carregarEstabelecimentosRecentes();

    		$produto = new ProdutoModel();
			$listaProdutos = $produto->carregarProdutos(true);

			$comentario = new ComentarioModel();
			$listaComentarios = $comentario->carregarComentarios($_REQUEST['id'], false);

			$estrelas = new EstrelasModel();
			$estrelas->setId_cliente($_SESSION['usuario']);
			$estrelas->setId_estabelecimento($_REQUEST['id']);
			$quantEstrelas = $estrelas->obterEstrelas();


            //redirecionando para a pagina de cardapio do estabelecimento
            $view = new view('views/cardapioEstabelecimento.php');
            $view->setParams(array("estabelecimento" => $infos['estabelecimento'], "listaEstabelecimento" => $listaEstabelecimento, "listaProdutos" => $listaProdutos, "listaComentarios" => $listaComentarios, "quantEstrelas" => $quantEstrelas));
            $view->mostrarConteudo();

        }

        public function pagConcluirAction () {

        	$existe = true;

        	$id = $_POST['id'];

        	$listaItens = array();
    		$produto = new ProdutoModel();

        	for ($i=0; $existe == true ; $i++) { 
        		
        		if (isset($_POST["produto-".$i])) {

        			$item = array();
				    $item[1] = $produto->carregarItemProduto($_POST["produto-".$i]);
				    $item[2] = $_POST["quant-".$i];				    

				    array_push($listaItens, $item);

        		} else {
        			$existe = false;
        		}
        	}

        	$endereco = new EnderecoModel();
	    	if (isset($_SESSION['usuario'])) {
				$endereco->setId_cliente($_SESSION['usuario']);
			}
			$listaEnderecos = $endereco->listar();

			$estabelecimento = new EstabelecimentoModel();
			$infos = $estabelecimento->adquirirInfo($_GET['id']);

			$estabelecimento->setId($_SESSION['usuario']);
			$listaEstabelecimento = $estabelecimento->carregarEstabelecimentosRecentes();

            //redirecionando para a pagina de cadastro de estabelecimento
        	$view = new view('views/conclusaoPedido.php');
        	$view->setParams(array("listaItens" => $listaItens, 'listaEnderecos' => $listaEnderecos, 'estabelecimento' => $infos['estabelecimento'], 'listaEstabelecimento' => $listaEstabelecimento));
        	$view->mostrarConteudo();
        }

        public function pagAlterarCardapioAction() {
        	$produto = new ProdutoModel();
        	$listaProdutos = $produto->carregarProdutos(false);

        	$view = new view('views/alterarCardapio.php');
            $view->setParams(array("listaProdutos" => $listaProdutos));
            $view->mostrarConteudo();
        }

        public function manterEstabelecimentoAction() {
        	$estabelecimento = new EstabelecimentoModel();

        	if (isset($_POST['nomer'],$_POST['emailr'],$_POST['telefoner'],
        		$_POST['nomee'],$_POST['emaile'],$_POST['senhae'],
        		$_POST['telefonee'],$_POST['tipoe'],$_POST['tipoe'],
        		$_POST['cnpje'],$_POST['estadoe'],$_POST['enderecoe'],
        		$_POST['numeroe'],$_POST['cepe'],$_POST['complementoe'],
        		$_POST['fretee'])) {
        		$estabelecimento->setNomeRepresentante($_POST['nomer']);
        	$estabelecimento->setEMailRepresentante($_POST['emailr']);
        	$estabelecimento->setTelefoneRepresentante($_POST['telefoner']);
        	$estabelecimento->setNome($_POST['nomee']);
        	$estabelecimento->setEMail($_POST['emaile']);
        	$estabelecimento->setSenha($_POST['senhae']);
        	$estabelecimento->setTelefone($_POST['telefonee']);
        	$estabelecimento->setTipo($_POST['tipoe']);
        	$estabelecimento->setCnpj($_POST['cnpje']);
        	$estabelecimento->setEstado($_POST['estadoe']);
        	$estabelecimento->seTendereco($_POST['enderecoe']);
        	$estabelecimento->setNumero($_POST['numeroe']);
        	$estabelecimento->setCep($_POST['cepe']);
        	$estabelecimento->setComplemento($_POST['complementoe']);
        	$estabelecimento->setFrete($_POST['fretee']);



        	if (isset( $_POST[ 'inicioDome' ] )) {
        		$estabelecimento->setHora_inicio_dom($_POST[ 'inicioDome' ]);
        	} else {
        		$estabelecimento->setHora_inicio_dom(null);
        	}

        	if (isset( $_POST[ 'encerramentoDome' ] )) {
        		$estabelecimento->setHora_encerramento_dom($_POST[ 'encerramentoDome' ]);
        	} else {
        		$estabelecimento->setHora_encerramento_dom(null);
        	}



        	if (isset( $_POST[ 'inicioSege' ] )) {
        		$estabelecimento->setHora_inicio_seg($_POST[ 'inicioSege' ]);
        	} else {
        		$estabelecimento->setHora_inicio_seg(null);
        	}

        	if (isset( $_POST[ 'encerramentoSege' ] )) {
        		$estabelecimento->setHora_encerramento_seg($_POST[ 'encerramentoSege' ]);
        	} else {
        		$estabelecimento->setHora_encerramento_seg(null);
        	}



        	if (isset( $_POST[ 'inicioTere' ] )) {
        		$estabelecimento->setHora_inicio_ter($_POST[ 'inicioTere' ]);
        	} else {
        		$estabelecimento->setHora_inicio_ter(null);
        	}

        	if (isset( $_POST[ 'encerramentoTere' ] )) {
        		$estabelecimento->setHora_encerramento_ter($_POST[ 'encerramentoTere' ]);
        	} else {
        		$estabelecimento->setHora_encerramento_ter(null);
        	}



        	if (isset( $_POST[ 'inicioQuae' ] )) {
        		$estabelecimento->setHora_inicio_qua($_POST[ 'inicioQuae' ]);
        	} else {
        		$estabelecimento->setHora_inicio_qua(null);
        	}

        	if (isset( $_POST[ 'encerramentoQuae' ] )) {
        		$estabelecimento->setHora_encerramento_qua($_POST[ 'encerramentoQuae' ]);
        	} else {
        		$estabelecimento->setHora_encerramento_qua(null);
        	}



        	if (isset( $_POST[ 'inicioQuie' ] )) {
        		$estabelecimento->setHora_inicio_qui($_POST[ 'inicioQuie' ]);
        	} else {
        		$estabelecimento->setHora_inicio_qui(null);
        	}

        	if (isset( $_POST[ 'encerramentoQuie' ] )) {
        		$estabelecimento->setHora_encerramento_qui($_POST[ 'encerramentoQuie' ]);
        	} else {
        		$estabelecimento->setHora_encerramento_qui(null);
        	}



        	if (isset( $_POST[ 'inicioSexe' ] )) {
        		$estabelecimento->setHora_inicio_sex($_POST[ 'inicioSexe' ]);
        	} else {
        		$estabelecimento->setHora_inicio_sex(null);
        	}

        	if (isset( $_POST[ 'encerramentoSexe' ] )) {
        		$estabelecimento->setHora_encerramento_sex($_POST[ 'encerramentoSexe' ]);
        	} else {
        		$estabelecimento->setHora_encerramento_sex(null);
        	}



        	if (isset( $_POST[ 'inicioSabe' ] )) {
        		$estabelecimento->setHora_inicio_sab($_POST[ 'inicioSabe' ]);
        	} else {
        		$estabelecimento->setHora_inicio_sab(null);
        	}

        	if (isset( $_POST[ 'encerramentoSabe' ] )) {
        		$estabelecimento->setHora_encerramento_sab($_POST[ 'encerramentoSabe' ]);
        	} else {
        		$estabelecimento->setHora_encerramento_sab(null);
        	}






        	if (isset($_SESSION['usuario'])) {
        		$estabelecimento->setId($_SESSION['usuario']);
        	}

        	if ($estabelecimento->salvar() == false) {
        		echo "<script language='javascript' type='text/javascript'>" .
        		"alert('Este E-Mail já existe!');" .
        		"</script>";

        		echo "<script>javascript:history.back(-2)</script>";
        	} else {
				echo "<script language='javascript' type='text/javascript'>" .
	                "alert('Conta cadastrada com sucesso!');" .
	            "</script>";

				$_SESSION['usuario'] = $estabelecimento->getId();
	            $_SESSION['tipo'] = "E";
	            $_SESSION['nome'] = $estabelecimento->getNome();

				$view = new view('views/mudarImagem.php');
		    	$view->mostrarConteudo();
			}
		}
	}

	public function pagMudarFotoAction() {
		$view = new view('views/mudarImagem.php');
		$view->mostrarConteudo();
	}	

    public function pagConfiguracaoAction()	{
		$estabelecimentoInfo = new EstabelecimentoModel();
		$Infos = $estabelecimentoInfo->adquirirInfo(false);
		$view = new view('views/configuracaoEstabelecimento.php');
		$view->setParams($Infos);
		$view->mostrarConteudo();

	}

	public function salvarAlteracoesAction() {
		$estabelecimento = new EstabelecimentoModel();
		if ($estabelecimento->verificarSenha($_POST[ 'senha' ])) {
			// this.manterestabelecimentoAction();		
		    
			$estabelecimento->setNome($_POST['nomee']);
			$estabelecimento->setEMail($_POST['emaile']);
			$estabelecimento->setTelefone($_POST['telefonee']);
			$estabelecimento->setTipo($_POST['tipoe']);
			$estabelecimento->setCnpj($_POST['cnpje']);
			$estabelecimento->setEstado($_POST['estadoe']);
			$estabelecimento->seTendereco($_POST['enderecoe']);
			$estabelecimento->setNumero($_POST['numeroe']);
			$estabelecimento->setCep($_POST['cepe']);
			$estabelecimento->setComplemento($_POST['complementoe']);
			$estabelecimento->setFrete($_POST['fretee']);
			$estabelecimento->setNomeRepresentante($_POST['nomer']);
	    	$estabelecimento->setEMailRepresentante($_POST['emailr']);
		    $estabelecimento->setTelefoneRepresentante($_POST['telefoner']);

		    if (isset( $_POST[ 'inicioDome' ] )) {
                $estabelecimento->setHora_inicio_dom($_POST[ 'inicioDome' ]);
            } else {
                $estabelecimento->setHora_inicio_dom(null);
            }

            if (isset( $_POST[ 'encerramentoDome' ] )) {
                $estabelecimento->setHora_encerramento_dom($_POST[ 'encerramentoDome' ]);
            } else {
                $estabelecimento->setHora_encerramento_dom(null);
            }



            if (isset( $_POST[ 'inicioSege' ] )) {
                $estabelecimento->setHora_inicio_seg($_POST[ 'inicioSege' ]);
            } else {
                $estabelecimento->setHora_inicio_seg(null);
            }

            if (isset( $_POST[ 'encerramentoSege' ] )) {
                $estabelecimento->setHora_encerramento_seg($_POST[ 'encerramentoSege' ]);
            } else {
                $estabelecimento->setHora_encerramento_seg(null);
            }



            if (isset( $_POST[ 'inicioTere' ] )) {
                $estabelecimento->setHora_inicio_ter($_POST[ 'inicioTere' ]);
            } else {
                $estabelecimento->setHora_inicio_ter(null);
            }

            if (isset( $_POST[ 'encerramentoTere' ] )) {
                $estabelecimento->setHora_encerramento_ter($_POST[ 'encerramentoTere' ]);
            } else {
                $estabelecimento->setHora_encerramento_ter(null);
            }



            if (isset( $_POST[ 'inicioQuae' ] )) {
                $estabelecimento->setHora_inicio_qua($_POST[ 'inicioQuae' ]);
            } else {
                $estabelecimento->setHora_inicio_qua(null);
            }

            if (isset( $_POST[ 'encerramentoQuae' ] )) {
                $estabelecimento->setHora_encerramento_qua($_POST[ 'encerramentoQuae' ]);
            } else {
                $estabelecimento->setHora_encerramento_qua(null);
            }



            if (isset( $_POST[ 'inicioQuie' ] )) {
                $estabelecimento->setHora_inicio_qui($_POST[ 'inicioQuie' ]);
            } else {
                $estabelecimento->setHora_inicio_qui(null);
            }

            if (isset( $_POST[ 'encerramentoQuie' ] )) {
                $estabelecimento->setHora_encerramento_qui($_POST[ 'encerramentoQuie' ]);
            } else {
                $estabelecimento->setHora_encerramento_qui(null);
            }



            if (isset( $_POST[ 'inicioSexe' ] )) {
                $estabelecimento->setHora_inicio_sex($_POST[ 'inicioSexe' ]);
            } else {
                $estabelecimento->setHora_inicio_sex(null);
            }

            if (isset( $_POST[ 'encerramentoSexe' ] )) {
                $estabelecimento->setHora_encerramento_sex($_POST[ 'encerramentoSexe' ]);
            } else {
                $estabelecimento->setHora_encerramento_sex(null);
            }



            if (isset( $_POST[ 'inicioSabe' ] )) {
                $estabelecimento->setHora_inicio_sab($_POST[ 'inicioSabe' ]);
            } else {
                $estabelecimento->setHora_inicio_sab(null);
            }

            if (isset( $_POST[ 'encerramentoSabe' ] )) {
                $estabelecimento->setHora_encerramento_sab($_POST[ 'encerramentoSabe' ]);
            } else {
                $estabelecimento->setHora_encerramento_sab(null);
            }

	        if ($estabelecimento->manterAlteracoes()) {
	        	echo "<script language='javascript' type='text/javascript'>" .
	                "alert('Alterações salvas com sucesso');" .
	             "</script>";
	        }
		} else {
			echo "<script language='javascript' type='text/javascript'>" .
	                "alert('Senha Invalida');" .
	             "</script>";
		}

		$this->pagConfiguracaoAction();
	}

	public function ajaxAction() {
        $estabelecimento = new EstabelecimentoModel();

        if ($_POST['total']) {
        	$total = $_POST['total'];
        } else {
	        $total = $estabelecimento->TotalfiltrarEstabelecimentos();
	    }
        
        if ($total != false) {
        	$listaEstabelecimentos = $estabelecimento->filtrarPorPagEstabelecimentos($total);
        	

			echo json_encode($listaEstabelecimentos, JSON_PRETTY_PRINT);

        } else {
        	echo "false";
        }
	}

    public function obterHorarioAction() {

        $estabelecimento = new EstabelecimentoModel();
        $estabelecimento->setId( $_POST['id'] );
        $listaEstabelecimentoEspecifico = $estabelecimento->obterHorarioDia( $_POST['dia'] );

        echo json_encode($listaEstabelecimentoEspecifico, JSON_PRETTY_PRINT);

    }


	public function mudarSenhaAction() {
		$estabelecimento1 = new EstabelecimentoModel();
		if ($estabelecimento1->verificarSenha($_POST[ 'senhaatual' ])) {
			if ($_POST[ 'senhanova' ] ==$_POST[ 'senhaconfirmar' ]) {
				$estabelecimento1->setSenha($_POST[ 'senhanova' ]);
				$estabelecimento1->salvarSenha();

				echo "<script language='javascript' type='text/javascript'>" .
				"alert('Senha salva com sucesso');" .
				"</script>";

			} else {
				echo "<script language='javascript' type='text/javascript'>" .
				"alert('Senhas não conferem');" .
				"</script>";
			}
		} else {
			echo "<script language='javascript' type='text/javascript'>" .
	                "alert('Senha Invalida');" .
	             "</script>";
		}

		$this->pagConfiguracaoAction();
	}

	public function pagAdicionarImagemAction() {
		$view = new view('views/adicionarImagem.php');
		$view->mostrarConteudo();
	}

	public function salvarImagemAction() {
    	$diretorio = 'views/imagem-Perfil/imagem-Perfil-Estabelecimento/';

    	$arquivo = $diretorio.'perfil-estabelecimento-'. $_SESSION['usuario'].'.png';
    	if (move_uploaded_file($_FILES['imagem']['tmp_name'],$arquivo)) {

    		echo "<script language='javascript' type='text/javascript'>" .
	                "alert('Imagem válida e salva com sucesso!');" .
	             "</script>";
	            $view = new view('views/inicioEstabelecimento.php');
		    	$view->mostrarConteudo();
    	} else {
    		echo "<script language='javascript' type='text/javascript'>" .
	                "alert('Não foi possivel salvar esta imagem');" .
	             "</script>";

	        echo "<script>javascript:history.back(-2)</script>";
    	}
    }

	public function salvarimagemRestauranteAction() {
		$diretorio = 'views/Imagens-Estabelecimento/';

		$existe = true;


		for ($i=0; $existe == true ; $i++) {

			$arquivo = $diretorio.'imagem-Estabelecimento-'.  $_SESSION['usuario'].'-'. mt_rand() .'.png';

			if (!file_exists($arquivo)) {

				$existe = false;
				
				if (move_uploaded_file($_FILES['imagem']['tmp_name'],$arquivo)) {

					echo "<script language='javascript' type='text/javascript'>" .
					"alert('Imagem válida e salva com sucesso!');" .
					"</script>";

					header("Location: index.php?controle=estabelecimento&acao=pagAdicionarImagem");
				} else {
					echo "<script language='javascript' type='text/javascript'>" .
					"alert('Não foi possivel salvar esta imagem');" .
					"</script>";

					header("Location: index.php?controle=estabelecimento&acao=pagAdicionarImagem");
				}

			}

		}
	}


	public function ExcluirImagemAction() {
		
		$existe = true;

		if (file_exists($_REQUEST['num'])) {

			unlink($_REQUEST['num']);			
		}



		header("Location: index.php?controle=estabelecimento&acao=pagAdicionarImagem");

	}

	public function pagGaleriaAction() {
		$view = new view('views/galeria.php');
		$view->mostrarConteudo();
	}

	public function carregarEstabelecimentosRecentes() {
        
    }

}