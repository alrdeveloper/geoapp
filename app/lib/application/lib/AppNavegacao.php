<?php

namespace application\lib;

class AppNavegacao {

    protected $_Itens;

    public function __construct($InsertHome = true) {
        $this->_Itens = $_Itens = array();
        if ($InsertHome) {
            $this->Adicionar("<i class='icon-cogs'></i> Home", AppConfig::urlPath());
        }
    }

    public function __destruct() {
        
     }

    /**
     * Informa o nome o link para a barra de navegação
     * @param type $Label - Nome do Link
     * @param type $Url - Link
     */
    public function Adicionar($Label, $Url = "") {
        $this->_Itens[] = array($Label, $Url);
    }

    public function AdicionarArray($Array) {
        $this->_Itens = array_merge($this->_Itens, $Array);
    }

    public function Gerar() {
        return $this->_Itens;
    }

}

?>