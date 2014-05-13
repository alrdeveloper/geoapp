<?php

namespace application\modulos\Area;

use application\lib\AppEntidade;
use application\lib\IEntidade;
use application\dao\AppDaoMY;
use application\dao\AppInstructionSQL;
use application\lib\AppSystem;

class Area extends AppEntidade implements IEntidade {

    private $idAreaPai, $titulo, $descricao;

    public function __construct($values) {
        parent::__construct($values);
    }
    
	public function __destruct() { }
	
	public function __get($name) {
		switch ($name) {
			case AreaPrincipal:
				if (empty($this->idAreaPai)) {
					return "Área Principal";
				}
				else {
					return $this->returnPai();
				}		
			break;
			default:
				return parent::__get($name);
			break;
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

	public function getIdAreaPai()
	{
		return $this->idAreaPai;
	}

	public function setIdAreaPai($idAreaPai)
	{
		$this->idAreaPai = empty($idAreaPai) ? 0 : $idAreaPai;
	}

	public function getTitulo()
	{
		return $this->titulo;
	}

	public function setTitulo($titulo)
	{
		$this->titulo = $titulo;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}

	public function setStatus($status) {
		parent::setStatus($status);
	}

    public function validaUpdate() {
        return $this->validaInsert();
    }

    public function validaInsert() {
        $msg = array();
        if (empty($this->titulo)) {
            $msg[] = "O campo Título é obrigatório";
        }
        return $msg;
    }

    public function listData($cmd, $values) {
        $resultSet = parent::listData($cmd, $values);
        if (!empty($resultSet)) {
            for ($i = 0; $i < count($resultSet); $i++) {
                $obj[$i] = new Area("");
                $obj[$i]->setId($resultSet[$i]["id"]);
                $obj[$i]->setIdentificador($resultSet[$i]["identificador"]);
                $obj[$i]->setIdAreaPai($resultSet[$i]["id_area_pai"]);
                $obj[$i]->setTitulo($resultSet[$i]["titulo"]);
                $obj[$i]->setDescricao($resultSet[$i]["descricao"]);
                $obj[$i]->setStatus($resultSet[$i]["status"]);
            }
            return $obj;
        } else {
            return false;
        }
    }
    
    public function returnAreasForSelect() {
		$sql = "SELECT * FROM area WHERE status = 1 ORDER BY titulo ASC";
		return parent::listDataBySql($sql);
	}
	
	public function returnPai() {
		$sql = "SELECT * FROM area WHERE id = " . $this->idAreaPai;
		$result = parent::loadDataBySql($sql);
		return $result["titulo"];
	}
    
    public function loadData($cmd, $values) {
    	$resultSet = parent::loadData($cmd, $values);
    	if (!empty($resultSet)) {
   			$this->setId($resultSet["id"]);
   			$this->setIdentificador($resultSet["identificador"]);
   			$this->setIdAreaPai($resultSet["id_area_pai"]);
   			$this->setTitulo($resultSet["titulo"]);
   			$this->setDescricao($resultSet["descricao"]);
   			$this->setStatus($resultSet["status"]);
    	} else {
    		return false;
    	}
    }
    
    public function removeData($cmd, $values) {
    	return parent::removeData($cmd, $values);
    }

}
