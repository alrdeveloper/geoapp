<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace application\modulos\DocumentoValor;

use application\lib\AppView;

class DocumentoValorView extends AppView {
    
    public function __construct($modulo) {
        parent::__construct($modulo);
    }

    public function principal($obj, $post, $pg) {
    	$this->nav->Adicionar("Principal");
    	$this->assign("Nav", $this->nav->Gerar());
        
    	$this->assign("Obj", $obj);
        parent::principal($post, "DocumentoValor", $pg);
    }

    /* (non-PHPdoc)
     * @see \application\lib\AppView::gerenciar()
     */

    public function gerenciar($obj, $result) {
    	$this->nav->Adicionar("Principal", "/DocumentoValor/principal");
    	if (empty($obj->getId())) {
    		$this->nav->Adicionar("Novo");
    	} else {
    		$this->nav->Adicionar("Alterar <strong>#" . $obj->getId() . "</strong>");
    	}
    	$this->assign("Nav", $this->nav->Gerar());
   	
        parent::gerenciar($obj, "DocumentoValor", $result);
    }

    /* (non-PHPdoc)
     * @see \application\lib\AppView::visualizar()
     */

    public function visualizar($obj) {
    	$this->nav->Adicionar("Principal", "/DocumentoValor/principal");
    	$this->nav->Adicionar("Visualizar <strong>#" . $obj->getId() . "</strong>");
    	$this->assign("Obj", $obj);
    	$this->assign("Nav", $this->nav->Gerar());
    	 
        parent::visualizar("DocumentoValor");
    }

    /* (non-PHPdoc)
     * @see \application\lib\AppView::paramBySearch()
     */

    protected function paramBySearch() {
        $param = parent::paramBySearch();

        $param[2]["attribute"] = "documento_valor";
        $param[2]["value"] = "E-mail";

        $param[3]["attribute"] = "preferencia";
        $param[3]["value"] = "Prefer�ncia";

        $param[4]["attribute"] = "status";
        $param[4]["value"] = "Status";

        return $param;
    }

}
