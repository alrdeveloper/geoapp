<?php

namespace application\dao;

use application\lib\AppParam;

/**
 * Description of AppInstructionSQL
 * Classe para construção de comandos sql
 * @author home
 */
class AppInstructionSQL {

    private $table;
    private $column;
    private $param;
    private $condiction;
    private $order;
    private $limit;
    private $offset;
    private $enum;
    private $sql;

    /**
     * Método contrutor da classe
     * Instancia a classe EnumInstructionSQL
     */
    function __construct($table) {
        $this->setTable($table);
        $this->setEnum();
    }

    function __toString() {
        return $this->sql;
    }

    public function getParam() {
        return $this->param;
    }

    public function setParam($values) {
        $this->param = new AppParam($values);
    }

    /**
     * Metodo getColumn
     * Retorna uma string separada em virgulas com com as colunas para consulta SQL
     * @return type 
     */
    public function getColumn() {
        if (empty($this->column)) {
            $this->column = "*";
        } else {
            $this->column = implode(", ", $this->column);
        }
        return $this->column;
    }

    /**
     * Metodo setColumn
     * Cria um array com colunas instrucao SQL
     * @param type $column 
     */
    public function setColumn($column) {
        $this->column[] = $column;
    }

    /**
     * Metodo getCondiction
     * Monta sequencia condicional para select, update e delete
     * @return string
     */
    public function getCondiction() {
        $result = "";
        if (!empty($this->condiction)) {
            for ($i = 0; $i < count($this->condiction); $i++) {
                if ($i == (count($this->condiction) - 1)) {
                    $result .= $this->enum->getComparer($this->condiction[$i]["column"], $this->condiction[$i]["comparer"]);
                } else {
                    $result .= $this->enum->getComparer($this->condiction[$i]["column"], $this->condiction[$i]["comparer"]) . " " . $this->enum->enumLogico($this->condiction[$i]["operator"]) . " ";
                }
            }
        }
        return $result;
    }

    /**
     * Metodo setCondiction
     * Attribui valores para os parametros e os armazena dentor de um array
     * @param type $column Nome da coluna
     * @param type $comparer Forma de comparacao
     * @param type $operator Operador logico and/or
     */
    public function setCondiction($column, $comparer, $operator) {
        $i = count($this->condiction);

        $this->condiction[$i]["column"] = $column;
        $this->condiction[$i]["comparer"] = $comparer;
        $this->condiction[$i]["operator"] = $operator;

        $i++;
    }

    /**
     * Método getTable
     * Retorna o valor para a vari?vel table
     * @return string
     */
    public function getTable() {
        return $this->table;
    }

    /**
     * Método getSql
     * Retorna o valor para a vari?vel sql
     * @return string
     */
    public function getSql() {
        return $this->sql;
    }

    /**
     * Método getOrder
     * Retorna o valor da vari?vel order
     * @return string
     */
    public function getOrder() {
        return $this->order;
    }

    /**
     * Método getLimit
     * Retorna o valor da vari?vel limit
     * @return string
     */
    public function getLimit() {
        return $this->limit;
    }

    /**
     * Método setOrder
     * Attribui valores para os parametros 
     * @param unknown $column
     * @param unknown $order
     */
    public function setOrder($column, $order) {
        if (empty($column)) {
            $column = "id";
        }
        $this->order = "ORDER BY " . $column . " " . $this->enum->enumOrder($order);
    }

    /**
     * Método setLimit
     * Attribui valor para parametro
     * @param unknown $limit
     */
    public function setLimit($limit) {
        $this->limit = "LIMIT " . $limit;
    }

    /**
     * Método getOffSet
     * Retorna o valor da variavel offset
     * @return string
     */
    public function getOffSet() {
        return $this->offset;
    }

    /**
     * Método setOffSet
     * Attribui valor para parametro
     * @param unknown $offset
     */
    public function setOffSet($offset) {
        $this->offset = "OFFSET " . $offset;
    }

    public function getEnum() {
        return $this->enum;
    }

    public function setEnum() {
        $this->enum = new EnumInstructionSQL();
    }

    /**
     * Método setTable
     * Attribui valor para parametro
     * @param unknown $table
     */
    public function setTable($table) {
        $this->table = $table;
    }

    /**
     * Método setSql
     * Attribui valor para parametro
     * @param unknown $sql
     */
    public function setSql($sql) {
        $this->sql = $sql;
    }

    /**
     * Metodo setSelect
     * Executa o set dos atributos abaixo
     * @param type $orderColumn Coluna para ordem de registros
     * @param type $order Ordem de registros
     * @param type $limit Quantidade de registros a serem retornados
     * @param type $offset Paginacao de registros
     */
    function setSelect($orderColumn, $order, $limit, $offset) {
        $this->setOrder($orderColumn, $order);
        $this->setLimit($limit);
        $this->setOffSet($offset);
    }

    /**
     * Metodo instructionCountSelectSQL
     * Método que monta um comando SQL para contagem de registros consulta
     * @param type $orderColumn Coluna para ordem de registros
     * @param type $order Ordem de registros
     * @return string
     */
    public function instructionCountSelectSQL($orderColumn, $order) {
        if (!empty($this->table)) {
            $this->setSelect($orderColumn, $order, "", "");
            $sql = "SELECT COUNT(id) FROM {$this->table} ";
            if (!empty($this->getCondiction())) {
                $sql .= "WHERE {$this->getCondiction()} ";
            }
            if (!empty($orderColumn)) {
            	$sql .= $this->getOrder() . " ";
            }
        } else {
            $sql[] = "Atenção, a tabela deve ser especificada";
        }
        $this->setSql($sql);
    }
    
    /**
     * Metodo instructionSelectSQL
     * Método que monta um comando SQL para consulta
     * @param type $orderColumn Coluna para ordem de registros
     * @param type $order Ordem de registros
     * @param type $limit Quantidade de registros a serem retornados
     * @param type $offset Paginacao de registros
     * @return string
     */
    public function instructionSelectSQL($orderColumn, $order, $limit, $offset) {
    	if (!empty($this->table)) {
    		$this->setSelect($orderColumn, $order, $limit, $offset);
    		$sql = "SELECT " . $this->getColumn() . " FROM {$this->table} ";
    		if (!empty($this->getCondiction())) {
    			$sql .= "WHERE {$this->getCondiction()} ";
    		}
    		if (!empty($orderColumn)) {
    			$sql .= $this->getOrder() . " ";
    		}
    		if (!empty($limit)) {
    			$sql .= $this->getLimit() . " ";
    			if (!empty($offset)) {
    				$sql .= $this->getOffSet();
    			}
    		}
    	} else {
    		$sql[] = "Atenção, a tabela deve ser especificada";
    	}
    	$this->setSql($sql);
    }

    /**
     * Metodo instructionDeleteSQL
     * Método que monta um comando SQL para apagar registro
     * @param type $column Nome da coluna
     * @param type $comparer Forma de comparacao
     * @param type $operator Operador logico and/or
     * @return string
     */
    public function instructionDeleteSQL($column, $comparer, $operator) {
        if (!empty($this->table) && !(empty($this->getCondiction()))) {
            $this->setCondiction($column, $comparer, $operator);
            $sql = "DELETE FROM {$this->table} ";
            if (!empty($this->getCondiction())) {
                $sql .= "WHERE {$this->getCondiction()} ";
            }
        } else {
            $sql[] = "Aten??o, a tabela e a condi??o devem ser especificados";
        }
        $this->setSql($sql);
    }

    /**
     * Metodo instructionUpdateSQL
     * Método que monta um comando SQL para atualizar registro
     * @param type $column Nome da coluna
     * @param type $comparer Forma de comparacao
     * @param type $operator Operador logico and/or
     * @return string
     */
    public function instructionUpdateSQL($column, $comparer, $operator) {
        if (!empty($this->table) && !empty($this->param->getKey())) {
            $key = $this->param->getKey();
            if (empty($this->condiction)) {
            	$this->setCondiction($column, $comparer, $operator);
            }
            $sql = "UPDATE {$this->table} SET ";
            for ($i = 0; $i < count($key); $i++) {
                if ($i == 0) {
                    $sql .= $key[$i] . " = :" . $key[$i] . " ";
                } else {
                    $sql .= ", " . $key[$i] . " = :" . $key[$i] . " ";
                }
            }
            if (!empty($this->getCondiction())) {
                $sql .= "WHERE {$this->getCondiction()} ";
            }
        } else {
            $sql[] = "Atenção, a tabela e valores devem ser especificados";
        }
        $this->setSql($sql);
    }

    /**
     * Metodo instructionInsertSQL
     * Método que monta um comando SQL para inserir registro
     * @return string
     */
    public function instructionInsertSQL() {
        if (!empty($this->table)) {
            $sql = "INSERT INTO " . $this->table . " (";
            $sql .= implode(", ", $this->param->getKey()) . ") ";
            $sql .= "VALUES (:" . implode(", :", $this->param->getKey()) . ")";
        } else {
            $sql[] = "Aten??o, a tabela e valores devem ser especificados";
        }
        $this->setSql($sql);
    }
}

?>