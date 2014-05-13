<?php

namespace application\dao;

/**
 * Description of EnumInstructionSQL
 * Classe que retorna atributos essenciais para cria��o de comandos SQL
 * @author allan
 */
class EnumInstructionSQL {

    /**
     * M�todo igual
     * Retorna comparador igual
     * @return string
     */
    public function igual() {
        return "Igual";
    }

    /**
     * M�todo diferente
     * Retorna comparador diferente
     * @return string
     */
    public function diferente() {
        return "Diferente";
    }

    /**
     * M�todo comecaCom
     * Retorna consulta pelo termo inicial
     * @return string
     */
    public function comecaCom() {
        return "Comeca Com";
    }

    /**
     * Metodo terminaCom
     * Retorna consulta pelo termo final
     * @return string
     */
    public function terminaCom() {
        return "Termina Com";
    }

    /**
     * M�todo contem
     * Retorna consulta pelo termo
     * @return string
     */
    public function contem() {
        return "Contem";
    }

    /**
     * M�todo naoContem
     * Retorna consulta que n�o cont�m o termo
     * @return string
     */
    public function naoContem() {
        return "Nao Contem";
    }

    /**
     * M�todo maior
     * Retorna comparador maior
     * @return string
     */
    public function maior() {
        return "Maior";
    }

    /**
     * M�todo menor
     * Retorna comparador menor
     * @return string
     */
    public function menor() {
        return "Menor";
    }

    /**
     * M�todo maiorIgual
     * Retorna comparador maior igual
     * @return string
     */
    public function maiorIgual() {
        return "Maior Igual";
    }

    /**
     * M�todo igual
     * Retorna comparador menor igual
     * @return string
     */
    public function menorIgual() {
        return "Menor Igual";
    }

    /**
     * M�todo entre
     * Retorna comparador entre
     * @return string
     */
    public function entre() {
        return "Entre";
    }

    /**
     * M�todo enumOrder
     * Retorna a forma de ordenar registros
     * @param int $value
     * @return string 
     */
    public function enumOrder($value) {
        $result = "";
        if (empty($value)) {
            $value = 1;
        }
        switch ($value) {
            case 1 :
                $result = "ASC";
                break;
            case 2 :
                $result = "DESC";
                break;
        }
        return $result;
    }

    /**
     * M�todo enumLogico
     * Retorna um operador logico AND/OR
     * @param int $value
     * @return string 
     */
    public function enumLogico($value) {
        $result = "";
        if (empty($value)) {
            $value = 1;
        }
        switch ($value) {
            case 1 :
                $result = "AND";
                break;
            case 2 :
                $result = "OR";
                break;
            default :
                $result = "AND";
                break;
        }
        return $result;
    }

    /**
     * M�todo enumComparer
     * Retorna a lista de compara��o de dados
     * @return string
     */
    public function enumComparer() {
        $list = array();

        $list[] = $this->igual();
        $list[] = $this->diferente();
        $list[] = $this->maior();
        $list[] = $this->maiorIgual();
        $list[] = $this->menor();
        $list[] = $this->menorIgual();
        $list[] = $this->contem();
        $list[] = $this->naoContem();
        $list[] = $this->comecaCom();
        $list[] = $this->terminaCom();

        return $list;
    }

    /**
     * M�todo getComparer
     * Retorna a compara��o para comando sql
     * @param type $attribute - atributo para compara��o
     * @param type $comparer - comparador da consulta
     * @return string - comando sql
     */
    public function getComparer($attribute, $comparer) {
        switch ($comparer) {
            case $this->igual() :
                $sql = $attribute . " = :" . $attribute;
                break;
            case $this->diferente() :
                $sql = $attribute . " <> :" . $attribute;
                break;
            case $this->contem() :
                $sql = $attribute . " LIKE :" . $attribute;
                break;
            case $this->comecaCom() :
                $sql = $attribute . " LIKE :" . $attribute;
                break;
            case $this->terminaCom() :
                $sql = $attribute . " LIKE :" . $attribute;
                break;
            case $this->naoContem() :
                $sql = $attribute . " NOT LIKE :" . $attribute;
                break;
            case $this->maior() :
                $sql = $attribute . " > :" . $attribute;
                break;
            case $this->maiorIgual() :
                $sql = $attribute . " >= :" . $attribute;
                break;
            case $this->menor() :
                $sql = $attribute . " < :" . $attribute;
                break;
            case $this->menorIgual() :
                $sql = $attribute . " <= :" . $attribute;
                break;
        }
        return $sql;
    }

}
