<?php
/**
 * Essa função garante que todas as classes
 * da pasta lib serão carregadas automaticamente
 */
function __autoload($classes)
{
    if(file_exists('lib/'.$classes.'.php'))
        require_once 'lib/'.$classes.'.php';
}

/**
 * Verifica qual classe controlador (Controller) o usuário deseja chamar
 * e qual método dessa classe (Action) deseja executar
 * Caso o controlador (controller) não seja especificado, o PadraoControllers será o padrão
 * Caso o método (Action) não seja especificado, o PadraoAction será o padrão
 **/
class Aplicacao
{
    /**
     * Usada pra guardar o nome da classe
     * de controle (Controller) a ser executada
     * @var string
     */
    protected $nomeClasseControle;

    /**
     * Usada para guardar o nome do metodo da
     * classe de controle (Controller) que deverá ser executado
     * @var string
     */
    protected $nomeMetodoAcao;

    /**
     * Verifica se os parâmetros de controlador (Controller) e ação (Action) foram
     * passados via parâmetros "Post" ou "Get" e carrega tais dados
     * nos respectivos atributos da classe
     */
    private function carregar()
    {
        /*
        * Se o controller nao for passado por GET,
        * assume-se como padrão o controller 'PadraoController';
        */
        $this->nomeClasseControle = isset($_REQUEST['controle']) ?  $_REQUEST['controle'] : 'Padrao';

        /*
        * Se a action nao for passada por GET,
        * assume-se como padrão a action 'PadraoAction';
        */
        $this->nomeMetodoAcao = isset($_REQUEST['acao']) ?  $_REQUEST['acao'] : 'Padrao';
    }

    /**
     *
     * Instancia classe referente ao Controlador (Controller) e executa
     * método referente e  acao (Action)
     * @throws Exception
     */
    public function executarMetodoControle()
    {
        $this->carregar();

        //verificando se o arquivo de controle existe
        $ClasseControlePasta = 'controllers/'.$this->nomeClasseControle.'Controller.php';
		
        if(file_exists($ClasseControlePasta)) {
            require_once $ClasseControlePasta;
			
			//verificando se a classe existe
			$nomeClasse = $this->nomeClasseControle.'Controller';
			
			if(class_exists($nomeClasse)) {
				$classe = new $nomeClasse;
				
				//verificando se o metodo existe
				$metodo = $this->nomeMetodoAcao.'Action';
				
				if(method_exists($classe,$metodo)) {
					$classe->$metodo();
				} else {
					echo("Metodo '$metodo' nao existe na classe $nomeClasse'<br/>");
				}
				
			} else {
				echo("Classe '$nomeClasse' nao existe no arquivo '$ClasseControlePasta'<br/>");
			}
		
		} else {
            echo('Arquivo '.$ClasseControlePasta.' nao encontrado<br/>');
		}
        
    }

    /**
     * Redireciona a chamada http para outra página
     * @param string $st_uri
     */
    static function redirecionar( $uri )
    {
        header("Location: $uri");
    }
}
?>