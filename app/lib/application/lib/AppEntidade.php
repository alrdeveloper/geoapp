<?php

namespace application\lib;

use application\dao\AppInstructionSQL;
use application\dao\AppDaoMY;

abstract class AppEntidade {
	
	protected $id, $identificador, $prioridade, $status, $values;
	
	private $dao;
	
	function __construct() {
		$this->dao = new AppDaoMY ();
	}
	
	function __destruct() {
	}
	
	/**
	 * __set atribui valor para uma propriedade inacessivel

	 * @param $name
	 * @param $value
	 */
	function __set($name, $value) {
		switch ($name) {
			case "Status" :
				$name = $this->enumStatus ( $value );
				break;
		}
	}
	
	/**
	 * __get recupera o valor de uma variavel incacessivel
	 * 
	 * @param $name
	 * @return string
	 */
	function __get($name) {
		if (! empty ( $name )) {
			switch ($name) {
				case "Status" :
					return $this->enumStatus ( $this->status );
					break;
			}
		} else {
			return "Atributo não localizado";
		}
	}
	
	/**
	 * setParam atribui valor para variaveis padrao da classe
	 * 
	 * @param $id
	 * @param $identificador
	 * @param $prioridade
	 * @param $status
	 */
	function setParam($id, $identificador, $prioridade, $status) {
		$this->setId ( $id );
		$this->setIdentificador ( $identificador );
		$this->setPrioridade ( $prioridade );
		$this->setStatus ( $status );
	}
	
	/**
	 * getId retorna o valor do id
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * setId atribui o valor do id
	 * 
	 * @param
	 *        	$id
	 */
	public function setId($id) {
		$this->id = $id;
	}
	
	/**
	 * getIdentificador retorna o valor do identificador
	 */
	public function getIdentificador() {
		return $this->identificador;
	}
	
	/**
	 * setIdentificador atribui o valor do identificador
	 * 
	 * @param
	 *        	$identificador
	 */
	public function setIdentificador($identificador) {
		$this->identificador = AppSystem::identificador ( $identificador );
	}
	
	/**
	 * getPrioridade retorna o valor da prioridade
	 * @param $prioridade
	 */
	public function getPrioridade() {
		return $this->prioridade;
	}
	
	/**
	 * setPrioridade atribui valor a vari?vel $prioridade
	 * @param $prioridade        	
	 */
	public function setPrioridade($prioridade) {
		$this->prioridade = $prioridade;
	}
	
	/**
	 * getStatus retorna o valor do status
	 */
	public function getStatus() {
		return $this->status;
	}
	
	/**
	 * setStatus atribui o valor do status
	 * @param $status
	 */
	public function setStatus($status) {
		$this->status = $status;
	}
	
	/**
	 * getValues retorna o valor do values
	 */
	public function getValues() {
		return $this->values;
	}
	
	/**
	 * setValues atribui o valor do values
	 * @param $values
	 */
	public function setValues($values) {
		// Preparando variáveis para atribuir valores dentro do objeto
		$this->values = $this->tratarSet ( $values );
		
		// Setar dados no objeto
		foreach ( $this->values as $key => $value ) {
			eval ( $this->values [$key] );
		}
		$this->preparaValues ( $values );
	}
	public function preparaValues($values) {
		$this->values = $this->tratarGet ( $values );
		foreach ( $this->values as $key => $value ) {
			eval ( "\$result[\$key] = " . $this->values [$key] );
		}
		$par = new AppParam ( $result );
		$this->values = $par->tratarArray ( $result );
	}
	
	/**
	 * validaInsert verifica se todos os requisitos para insercao na tabela
	 * estao de acordo
	 * @return array
	 */
	abstract function validaInsert();
	
	/**
	 * validaUpdate verifica se todos os requisitos para insercao na tabela
	 * estao de acordo
	 * @return array
	 */
	abstract function validaUpdate();
	
	/**
	 * insertData envia registros para inserir o banco de dados
	 * @param $values
	 * @return integer - id do registro cadastrado
	 */
	function insertData(AppInstructionSQL $cmd) {
		$msg = $this->validaInsert ();
		if (empty ( $msg )) {
			// Gera o comando sql
			$cmd->instructionInsertSQL ();
			
			// Executando comando SQL
			$result = $this->dao->insert ( $cmd, $this->values );
			if (! is_array ( $result )) {
				$this->setId ( $result );
			}
			return $result;
		} else {
			return $msg;
		}
	}
	
	/**
	 * updateData envia registros para atualizar o banco de dados
	 * @param $values
	 * @return integer - quantidade de linhas afetadas
	 */
	function updateData(AppInstructionSQL $cmd) {
		$msg = $this->validaUpdate ();
		if (empty ( $msg )) {
			$cmd->instructionUpdateSQL ( "id", $cmd->getEnum ()->igual (), 1 );
			
			// Executando comando SQL
			$result = $this->dao->update ( $cmd, $this->values );
			
			if (! is_array ( $result )) {
				$this->setId ( $result );
			}
			return $result;
		} else {
			return $msg;
		}
	}
	
	/**
	 * consultById preencher um objeto com registros vindos do banco de dados
	 * 
	 * @return objeto preenchido
	 */
	function consultById(AppInstructionSQL $cmd, $values) {
		if (! empty ( $cmd->getTable () )) {
			// Especificando a coluna que ser? consultada
			$cmd->setColumn ( "*" );
			
			// Especificando o condicional
			$cmd->setCondiction ( "id", $cmd->getEnum ()->igual (), 1 );
			
			// Retornando o comando SQL
			$cmd->instructionSelectSQL ( "", "", "", "" );
			
			// Enviando a consulta com os par?metros a serem consultados
			$resultSet = $this->dao->select ( $cmd, $values );
		} else {
			$resultSet = "O nome da tabela deve ser especificado";
		}
		return $resultSet;
	}
	
	/**
	 * removeData envia registros para excluir/atualizar o banco de dados
	 * @return integer - quantidade de linhas afetadas
	 */
	function removeData(AppInstructionSQL $cmd, $values) {
		if (! empty ( $cmd->getTable () )) {
			$cmd->instructionUpdateSQL ( "id", $cmd->getEnum ()->igual (), 1 );
			
			// Enviando o comando sql para inativar o registro
			$resultSet = $this->dao->delete ( $cmd, $this->values );
		} else {
			$resultSet = "O nome da tabela deve ser especificado";
		}
		return $resultSet;
	}
	
	/**
	 * loadData carrega um registro especifico pelo id do banco de dados
	 * @return array - objeto preenchido pelo array
	 */
	function loadData(AppInstructionSQL $cmd, $values) {
		if (! empty ( $this->getId () )) {
			// Pegando valor do id
			$values ["id"] = $this->getId ();
			
			// Efetua uma consulta por id
			$resultSet = $this->consultById ( $cmd, $values );
			
			// Retorna o resultado da consulta
			return $resultSet;
		}
	}
	
	/**
	 * loadDataBySql
	 * Função retorna um único registro por uma comando sql 
	 * @param $sql
	 * @return array
	 */
	function loadDataBySql($sql) {
		$resultSet = array();
		if (!empty($resultSet)) {
			$resultSet = $this->dao->selectBySql($sql);
		}
		return $resultSet;
	}

	/**
	 * listDataBySql
	 * Função retorna uma lista de registros por uma comando sql
	 * @param $sql
	 * @return array
	 */
	function listDataBySql($sql) {
		$resultSet = array();
		if (!empty($sql)) {
			$resultSet = $this->dao->listDataBySql($sql);
		}
		return $resultSet;
	}
	
	/**
	 * Método listData
	 * Retorna dados consultados via SQL;
	 * @param AppInstructionSQL $cmd        	
	 * @param $values
	 * @return array
	 */
	function listData(AppInstructionSQL $cmd, $values) {
		$dao = new AppDaoMY ();
		
		$consult = $dao->tratarValores ( $values );
		
		$resultSet = array ();
		if (! empty ( $cmd )) {
			$resultSet = $dao->listData ( $cmd, $consult, $values ["comparer"] );
		}
		return $resultSet;
	}
	
	/**
	 * executeOperation verifica qual a forma apropriada de enviar registros
	 * para o banco de dados
	 * @param $values
	 * @return integer - quantidade de registros afetados|id inserido no banco
	 */
	public function executeOperation($cmd) {
		if (! empty ( $this->id )) {
			return $this->updateData ( $cmd, $this->getValues () );
		} else {
			return $this->insertData ( $cmd, $this->getValues () );
		}
	}
	function enumStatus($value) {
		if (! empty ( $value )) {
			switch ($value) {
				case 1 :
					$result = "<i class='glyphicon glyphicon-ok'></i> Ativo";
					break;
				case 2 :
					$result = "<i class='glyphicon glyphicon-remove'></i> Inativo";
					break;
				case 3 :
					$result = "<i class='glyphicon glyphicon-cancel'></i> Cancelado";
					break;
			}
		} else {
			$result = "O status não foi informado";
		}
		return $result;
	}
	
	/**
	 * Metodo tratarSet
	 * @param type $values        	
	 * @return type set os valores no objeto
	 */
	protected function tratarSet($values) {
		// Remover campos do banco de dados;
		unset ( $values ["priority"] );
		unset ( $values ["submit"] );
		
		if (! empty ( $values )) {
			$key = array_keys ( $values );
			for($i = 0; $i < count ( $key ); $i ++) {
				$var [$key [$i]] = $this->tratarKeySet ( $key [$i] ) . "('" . $values [$key [$i]] . "');";
			}
			return $var;
		} else {
			return $var;
		}
	}
	
	/**
	 * metodo tratarKeySet
	 * @param type $key variavel a ser tratada
	 * @return type retorna a chave de cada linha do array
	 */
	protected function tratarKeySet($key) {
		$key = explode ( "_", $key );
		$i = 0;
		foreach ( $key as $value ) {
			if ($i == 0) {
				$result = "\$this->set" . ucfirst ( $value );
			} else {
				$result .= ucfirst ( $value );
			}
			$i ++;
		}
		return $result;
	}
	
	/**
	 * metodo tratarKeyGet
	 * 
	 * @param type $key
	 *        	variavel a ser tratada
	 * @return type retorna a chave de cada linha do array
	 */
	protected function tratarKeyGet($key) {
		$key = explode ( "_", $key );
		$i = 0;
		foreach ( $key as $value ) {
			if ($i == 0) {
				$result = "\$this->get" . ucfirst ( $value );
			} else {
				$result .= ucfirst ( $value );
			}
			$i ++;
		}
		return $result;
	}
	
	/**
	 * Metodo tratarGet
	 * @param type $values        	
	 * @return type set os valores no objeto
	 */
	protected function tratarGet($values) {
		if (! empty ( $values )) {
			$key = array_keys ( $values );
			for($i = 0; $i < count ( $key ); $i ++) {
				$var [$key [$i]] = $this->tratarKeyGet ( $key [$i] ) . "();";
			}
			return $var;
		} else {
			return $var;
		}
	}
	public function returnCount(AppInstructionSQL $cmd, $post) {
		if (! empty ( $post ["param"] )) {
			$cmd->setCondiction ( $post ["attribute"], empty ( $post ["comparer"] ) ? "Contem" : $post ["comparer"], 1 );
		}
		$cmd->instructionCountSelectSQL ( $post ["attribute_order"], $post ["order"] );
		
		// Criando a consulta e retornando a contagem de registros;
		$dao = new AppDaoMY ();
		$count = $dao->listData ( $cmd, $dao->tratarValores ( $post ), $post ["comparer"] );
		return $count [0] [0];
	}
}
