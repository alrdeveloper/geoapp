<?php

namespace application\modulos\DocumentoRemetente;

use application\lib\AppEntidade;
use application\lib\IEntidade;
use application\dao\AppDaoMY;
use application\dao\AppInstructionSQL;

class DocumentoRemetente extends AppEntidade implements IEntidade {

    private $documento_remetente, $preferencia;

    public function __construct($values) {
        parent::__construct($values);
    }
    
	public function __destruct() { }

    function __get($name) {
        switch ($name) {
            case "Preferencia":
                return $this->enumPreferencia($value);
                break;
            default :
            	return parent::__get($name);
        }
    }

    public function setId($id) {
        parent::setId($id);
    }

    public function executeOperation($cmd) {
        return parent::executeOperation($cmd);
    }

    public function setValues($values) {
    	parent::setValues($values);
    }

    public function getDocumentoRemetente() {
        return $this->documento_remetente;
    }

    public function setDocumentoRemetente($documento_remetente) {
        $this->documento_remetente = $documento_remetente;
    }

    public function getPreferencia() {
        return $this->preferencia;
    }

    public function setPreferencia($preferencia) {
        $this->preferencia = empty($preferencia) ? 1 : $preferencia;
    }

	public function setStatus($status) {
		parent::setStatus($status);
	}

    
    public function validaUpdate() {
        return $this->validaInsert();
    }

    public function validaInsert() {
        $msg = array();
        if (empty($this->documento_remetente)) {
            $msg[] = "O campo DocumentoRemetente � obrigat�rio";
        }
        return $msg;
    }

    public function enumPreferencia($value) {
        if (!empty($value)) {
            switch ($value) {
                case 1:
                    $result = "Principal";
                    break;
                case 2:
                    $result = "Secund�rio";
                    break;
            }
        } else {
            $result = "O tipo de e-mail n�o foi informado";
        }
        return $result;
    }

    public function listData($cmd, $values) {
        $resultSet = parent::listData($cmd, $values);
        if (!empty($resultSet)) {
            for ($i = 0; $i < count($resultSet); $i++) {
                $obj[$i] = new DocumentoRemetente("");
                $obj[$i]->setId($resultSet[$i]["id"]);
                $obj[$i]->setIdentificador($resultSet[$i]["identificador"]);
                $obj[$i]->setDocumentoRemetente($resultSet[$i]["documento_remetente"]);
                $obj[$i]->setPreferencia($resultSet[$i]["preferencia"]);
                $obj[$i]->setStatus($resultSet[$i]["status"]);
            }
            return $obj;
        } else {
            return false;
        }
    }
    
    public function loadData($cmd, $values) {
    	$resultSet = parent::loadData($cmd, $values);
    	if (!empty($resultSet)) {
   			$this->setId($resultSet["id"]);
   			$this->setIdentificador($resultSet["identificador"]);
   			$this->setDocumentoRemetente($resultSet["documento_remetente"]);
   			$this->setPreferencia($resultSet["preferencia"]);
   			$this->setStatus($resultSet["status"]);
    	} else {
    		return false;
    	}
    }
    
    public function removeData($cmd, $values) {
    	return parent::removeData($cmd, $values);
    }

}
