<?php
/**
 * Essa classe é responsável por renderizar os arquivos HTML
 */
class View
{
    /**
     * Armazena o conteúdo HTML
     * @var string
     */
    private $conteudo;

    /**
     * Armazena o nome do arquivo de visualização
     * @var string
     */
    private $nomeView;

    /**
     * Armazena os dados que devem ser mostrados ao reenderizar o
     * arquivo de visualização
     * @var Array
     */
    private $parametros;

    /**
     * É possivel efetuar a parametrização do objeto ao instanciar o mesmo,
     * $nomeView é o nome do arquivo de visualização a ser usado e
     * $parametros são os dados que devem ser utilizados pela camada de visualização
     *
     * @param string $nomeView
     * @param Array $parametros
     */
    function __construct($nomeView = null, $parametros = null) {
        if($nomeView != null)
            $this->setView($nomeView);
        $this->parametros = $parametros;
    }

    /**
     * Define qual arquivo html deve ser renderizado
     * @param string $nomeView
     * @throws Exception
     */
    public function setView($nomeView) {
        if(file_exists($nomeView))
            $this->nomeView = $nomeView;
        else
            echo("Arquivo View: '$nomeView' não existe");
    }

    /**
     * Retorna o nome do arquivo que deve ser renderizado
     * @return string
     */
    public function getView() {
        return $this->nomeView;
    }

    /**
     * Define os dados que devem ser repassados à view
     * @param Array $parametros
     */
    public function setParams(Array $parametros) {
        $this->parametros = $parametros;
    }

    /**
     * Retorna os dados que foram ser repassados ao arquivo de visualização
     * @return Array
     */
    public function getParams() {
        return $this->parametros;
    }

    /**
     * Retorna uma string contendo todo
     * o conteudo do arquivo de visualização
     *
     * @return string
     */
    public function getConteudo() {
        ob_start();
        if(isset($this->nomeView))
            require_once $this->nomeView;
        $this->conteudo = ob_get_contents();
        ob_end_clean();
        return $this->conteudo;
    }

    /**
     * Imprime o arquivo de visualização
     */
    public function mostrarConteudo() {
        echo $this->getConteudo();
        exit;
    }
}
?>