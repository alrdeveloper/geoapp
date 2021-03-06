<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace application\modulos\Passagem;

use application\lib\AppView;

class PassagemView extends AppView {
    
    public function __construct($modulo) {
        parent::__construct($modulo);
    }

    public function principal($obj, $post, $pg) {
    	$this->nav->Adicionar("Passagem - Principal");
    	$this->assign("Nav", $this->nav->Gerar());
        
    	$this->assign("Obj", $obj);
        parent::principal($post, "Passagem", $pg);
    }

    /* (non-PHPdoc)
     * @see \application\lib\AppView::gerenciar()
     */

    public function gerenciar($obj, $result, $select) {
    	$this->nav->Adicionar("Passagem - Principal", "/Passagem/principal");
    	if (empty($obj->getId())) {
    		$this->nav->Adicionar("Novo");
    	} else {
    		$this->nav->Adicionar("Alterar <strong>#" . $obj->getId() . "</strong>");
    	}
    	$this->assign("Nav", $this->nav->Gerar());
    	$this->assign("Select", $select);
   	
        parent::gerenciar($obj, "Passagem", $result);
    }

    /* (non-PHPdoc)
     * @see \application\lib\AppView::visualizar()
     */

    public function visualizar($obj) {
    	$this->nav->Adicionar("Passagem - Principal", "/Passagem/principal");
    	$this->nav->Adicionar("Visualizar <strong>#" . $obj->getId() . "</strong>");
    	$this->assign("Obj", $obj);
    	$this->assign("Nav", $this->nav->Gerar());
    	 
        parent::visualizar("Passagem");
    }

    /* (non-PHPdoc)
     * @see \application\lib\AppView::paramBySearch()
     */

    protected function paramBySearch() {
        $param = parent::paramBySearch();

        $param[2]["attribute"] = "nome";
        $param[2]["value"] = "Nome";

        $param[3]["attribute"] = "cpf";
        $param[3]["value"] = "CPF";

        $param[4]["attribute"] = "rg";
        $param[4]["value"] = "RG";

        $param[4]["attribute"] = "cnh";
        $param[4]["value"] = "CNH";

        $param[5]["attribute"] = "data_nascimento";
        $param[5]["value"] = "Data de Nascimento";

        return $param;
    }

}