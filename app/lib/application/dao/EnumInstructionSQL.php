<?php

namespace application\dao;

/**
 * Description of EnumInstructionSQL
 * Classe que retorna atributos essenciais para criação de comandos SQL
 * @author allan
 */
class EnumInstructionSQL {

    /**
     * Método igual
     * Retorna comparador igual
     * @return string
     */
    public function igual() {
        return "Igual";
    }

    /**
     * Método diferente
     * Retorna comparador diferente
     * @return string
     */
    public function diferente() {
        return "Diferente";
    }

    /**
     * Método comecaCom
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
     * Método contem
     * Retorna consulta pelo termo
     * @return string
     */
    public function contem() {
        return "Contem";
    }

    /**
     * Método naoContem
     * Retorna consulta que não contém o termo
     * @return string
     */
    public function naoContem() {
        return "Nao Contem";
    }

    /**
     * Método maior
     * Retorna comparador maior
     * @return string
     */
    public function maior() {
        return "Maior";
    }

    /**
     * Método menor
     * Retorna comparador menor
     * @return string
     */
    public function menor() {
        return "Menor";
    }

    /**
     * Método maiorIgual
     * Retorna comparador maior igual
     * @return string
     */
    public function maiorIgual() {
        return "Maior Igual";
    }

    /**
     * Método igual
     * Retorna comparador menor igual
     * @return string
     */
    public function menorIgual() {
        return "Menor Igual";
    }

    /**
     * Método entre
     * Retorna comparador entre
     * @return string
     */
    public function entre() {
        return "Entre";
    }

    /**
     * Método enumOrder
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
     * Método enumLogico
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
     * Método enumComparer
     * Retorna a lista de comparação de dados
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
     * Método getComparer
     * Retorna a comparação para comando sql
     * @param type $attribute - atributo para comparação
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
