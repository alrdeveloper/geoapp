<?php

namespace application\dao;

/**
 * Description of AppOrder
 * Classe para retornar a forma de ordenar registros para consulta SQL
 * @author allan roberto
 */
class AppOrderSQL {

    private $order;

    public function __construct($order) {
        $this->setOrder($order);
    }

    /**
     * M�todo setOrder
     * @param type $order parametro para definir forma de ordenar registros
     */
    public function setOrder($order) {
        switch ($order) {
            case "c":
                $order = $this->returnCrescente();
                break;
            case "d":
                $order = $this->returnDecrescente();
                break;
            default :
                $order = $this->returnCrescente();
                break;
        }
        $this->order = $order;
    }

    /**
     * M�todo getOrder
     * @return type Ordem de registros do select
     */
    public function getOrder() {
        return $this->order;
    }

    /**
     * M�todo returnCrescente
     * @return string
     */
    function returnCrescente() {
        return " ASC ";
    }

    /**
     * M�todo returnDecrescente
     * @return string 
     */
    function returnDecrescente() {
        return " DESC ";
    }

}
